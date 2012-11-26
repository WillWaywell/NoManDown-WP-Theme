<aside id="sidebar">
	<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar() ) : ?>
		<aside id="archives" class="widget">
			<h3 class="widget-title">Archives</h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>
	<?php endif; ?>
</aside>