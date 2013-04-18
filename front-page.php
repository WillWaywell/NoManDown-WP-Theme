<?php get_header(); ?>

<div class="intel-slider left">
	<header class="head">
		<h2 class="title">Featured Intel</h2>
		<nav class="navigation">
			<a href="#" class="active">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
		</nav>
	</header>
	<div class="slides">
		<div class="slide active" style="background-image: url(http://www.arma3.com/images/slides/alpha_briefing.jpg);">
			<div class="slide-content">
				<h2 class="title">Feature Title</h2>
				<p>Some parahraph to describe the current slide, with a title and readmore link</p>
				<a href="#" title="" class="slide-link">Read More</a>
			</div>
		</div>
		<div class="slide" style="background-image: url(http://www.arma3.com/images/slides/comm_guide_infantry.jpg);">
			<div class="slide-content">
				<h2 class="title">Feature Title</h2>
				<p>Some parahraph to describe the current slide, with a title and readmore link</p>
				<a href="#" title="" class="slide-link">Read More</a>
			</div>
		</div>
		<div class="slide" style="background-image: url(http://www.arma3.com/images/slides/alpha_briefing.jpg);">
			<div class="slide-content">
				<h2 class="title">Feature Title</h2>
				<p>Some parahraph to describe the current slide, with a title and readmore link</p>
				<a href="#" title="" class="slide-link">Read More</a>
			</div>
		</div>
		<div class="slide" style="background-image: url(http://www.arma3.com/images/slides/alpha_briefing.jpg);">
			<div class="slide-content">
				<h2 class="title">Feature Title</h2>
				<p>Some parahraph to describe the current slide, with a title and readmore link</p>
				<a href="#" title="" class="slide-link">Read More</a>
			</div>
		</div>
		<div class="slide" style="background-image: url(http://www.arma3.com/images/slides/alpha_briefing.jpg);">
			<div class="slide-content">
				<h2 class="title">Feature Title</h2>
				<p>Some parahraph to describe the current slide, with a title and readmore link</p>
				<a href="#" title="" class="slide-link">Read More</a>
			</div>
		</div>
	</div>
</div>

<div id="home-widgets-1" class="intel-widgets">
	<?php dynamic_sidebar( 'intel-widgets' ); ?>
</div>

<div class="clear"></div>
<div class="divider"></div>

<div id="home-widgets-1" class="home-widgets">
	<?php dynamic_sidebar( 'home-widgets-1' ); ?>
</div>

<div class="clear divider"></div>

<div id="home-widgets-2" class="home-widgets">
	<?php dynamic_sidebar( 'home-widgets-2' ); ?>
</div>

<?php get_footer(); ?>