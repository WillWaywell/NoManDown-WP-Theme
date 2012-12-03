<?php

function query_server($ip, $port)
{
	// OPEN THE QUERY SOCKET
	// --------------------------------
	$socket = fsockopen("udp://" . $ip, $port, $errno, $errstr, 1);
	stream_set_timeout($socket, 1); 
	
	// GET CHALLENGE CODE
	// --------------------------------
	$challenge_code = "";

	fwrite($socket, "\xFE\xFD\x09\xFF\xFF\xFF\x01");

	$challenge_packet = fread($socket, 4096);

	if (!$challenge_packet) return false;

	$challenge_code = substr($challenge_packet, 5, -1); // REMOVE HEADER AND TRAILING NULL
	$challenge_code = $challenge_code ? chr($challenge_code >> 24).chr($challenge_code >> 16).chr($challenge_code >> 8).chr($challenge_code >> 0) : "";

	fwrite($socket, "\xFE\xFD\x00\x10\x20\x30\x40{$challenge_code}\xFF\xFF\xFF\x01"); 

	
	// GET RAW PACKET DATA
	// --------------------------------
	$buffer = array();
	$packet_count = 0;
	$packet_total = 4;

	do
	{
		$packet_count ++;
		$packet = fread($socket, 4096);

		if (!$packet) return false;

		$packet       = substr($packet, 14); // REMOVE SPLITNUM HEADER
		$packet_order = ord(cut_byte($packet, 1));

		if ($packet_order >= 128) // LAST PACKET - SO ITS ORDER NUMBER IS ALSO THE TOTAL
		{
			$packet_order -= 128;
			$packet_total = $packet_order + 1;
		}

		$buffer[$packet_order] = $packet;
	}
	while ($packet_count < $packet_total);

	
	// PROCESS AND SORT PACKETS
	// --------------------------------
	foreach ($buffer as $key => $packet)
	{
		$packet = substr($packet, 0, -1); // REMOVE END NULL FOR JOINING

		if (substr($packet, -1) != "\x00") // LAST VALUE HAS BEEN SPLIT
		{
			$part = explode("\x00", $packet); // REMOVE SPLIT VALUE AS COMPLETE VALUE IS IN NEXT PACKET
			array_pop($part);
			$packet = implode("\x00", $part)."\x00";
		}

		if ($packet[0] != "\x00") // PLAYER OR TEAM DATA THAT MAY BE A CONTINUATION
		{
			$pos = strpos($packet, "\x00") + 1; // WHEN DATA IS SPLIT THE NEXT PACKET STARTS WITH A REPEAT OF THE FIELD NAME

			if (isset($packet[$pos]) && $packet[$pos] != "\x00") // REPEATED FIELD NAMES END WITH \x00\x?? INSTEAD OF \x00\x00
			{
				$packet = substr($packet, $pos + 1); // REMOVE REPEATED FIELD NAME
			}
			else
			{
				$packet = "\x00".$packet; // RE-ADD NULL AS PACKET STARTS WITH A NEW FIELD
			}
		}

		$buffer[$key] = $packet;
	}

	ksort($buffer);

	$buffer = implode("", $buffer);

	
	// SERVER SETTINGS
	// --------------------------------
	$buffer = substr($buffer, 1); // REMOVE HEADER \x00

	while ($key = strtolower(cut_string($buffer)))
	{
		$result[$key] = cut_string($buffer);
	}

	if ($result['numplayers'] == "0") { return $result; } // IF SERVER IS EMPTY SKIP THE PLAYER CODE

	// PLAYER DETAILS
	// --------------------------------
	$buffer = substr($buffer, 1); // REMOVE HEADER \x01

	while ($buffer)
	{
		if ($buffer[0] == "\x02") { break; }
		if ($buffer[0] == "\x00") { $buffer = substr($buffer, 1); }

		$field = cut_string($buffer, 0, "\x00\x00");
		$field = strtolower(substr($field, 0, -1));

		if     ($field == "player") { $field = "name"; }
		elseif ($field == "aibot")  { $field = "bot";  }

		if ($buffer[0] == "\x00") { $buffer = substr($buffer, 1); continue; }

		$value_list = cut_string($buffer, 0, "\x00\x00");
		$value_list = explode("\x00", $value_list);

		foreach ($value_list as $key => $value)
		{
			$result['players'][$key][$field] = $value;
		}
	}

	fclose($socket); // CLOSE THE QUERY SOCKET
	return $result;
}

function cut_byte(&$buffer, $length)
{
	$string = substr($buffer, 0, $length);
	$buffer = substr($buffer, $length);

	return $string;
}

function cut_string(&$buffer, $start_byte = 0, $end_marker = "\x00")
{
	$buffer = substr($buffer, $start_byte);
	$length = strpos($buffer, $end_marker);

	if ($length === FALSE) { $length = strlen($buffer); }

	$string = substr($buffer, 0, $length);
	$buffer = substr($buffer, $length + strlen($end_marker));

	return $string;
}

?>