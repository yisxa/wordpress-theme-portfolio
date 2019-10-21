<?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
	<!-- <aside id="secondary" class="sidebar widget-area" role="complementary">

	</aside> -->
	<div class="sidebar-box">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
<?php endif; ?>