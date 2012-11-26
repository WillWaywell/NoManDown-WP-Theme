<footer>
</footer>

<?php wp_footer(); ?>
<?php 
/*
require 'lib/GameQ.php'; 

$servers = array(
	array(
		'id' => 'NMD DayZ',
		'type' => 'armedassault2oa',
		'host' => '94.76.229.69:2302',
	),
	array(
		'id' => 'NMD ACE',
		'type' => 'armedassault2oa',
		'host' => '94.76.229.69:2316',
	)
);

$gq = new GameQ();
$gq->addServers($servers);

// You can optionally specify some settings
$gq->setOption('timeout', 4); // Seconds

// You can optionally specify some output filters,
// these will be applied to the results obtained.
$gq->setFilter('normalise');

// Send requests, and parse the data
$results = $gq->requestData();*/

?>
<div class="overlay six">
	<a class="close">X</a>
	<h2 class="title">Join our servers via Play withSix</h2>
	<a href="http://play.withsix.com/" class="download" target="_blank">Download and install Play withSix</a>
	<ul class="server-list">
		<li class="server dayz">
			<div class="logo"></div>
			<div class="details">
				<h3 class="server-title">DayZ: Taviana</h3>
				<p class="players">Players: <span class="num">0</span></p>
				<button><a href="pws://server=94.76.229.69:2302" target="_blank">Join</a></button>
			</div>
			<div class="clear"></div>
		</li>
		<li class="server ace">
			<div class="logo"></div>
			<div class="details">
				<h3 class="server-title">A.C.E</h3>
				<p class="players">Players: <span class="num">0</span></p>
				<button><a href="pws://server=94.76.229.69:2316" target="_blank">Join</a></button>
			</div>
			<div class="clear"></div>
		</li>
	</ul>
</div>
<div id="blackout"></div>
<div id="loading"></div>

</body>
</html>