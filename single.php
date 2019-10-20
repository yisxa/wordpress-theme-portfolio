	<!-- for getting the header.php link to the index.php -->
	<?php get_header(); ?>
	<br><br><br>
	<div class="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<!-- post content from template parts content-single -->
						<?php get_template_part('template-parts/content', 'single'); ?>
						<br>
						<!-- Add comments to the single post -->
						<?php
							if ( comments_open() || get_comments_number() ){
								comments_template();
							}

						 ?>
					<?php endwhile; ?>
					<?php else : ?>
						<?php echo wpautop("No posts were found"); ?>
					<?php endif; ?>
				</div>

				<div class="col-md-4">
					<br>
					<!-- for getting the sidebar.php link to the index.php-->
					<?php get_sidebar(); ?>
				</div>
			</div>

		</div>
	</div>
	<!-- for getting the footer.php link to the index.php-->
	<?php get_footer(); ?>

