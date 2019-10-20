<?php 
/*
	Template Name: Page
*/
?>
<?php get_header(); ?>
<br><br><br>

<section>
			<?php // Display blog posts on any page @ https://m0n.co/l
			$temp = $wp_query; $wp_query= null;
			$wp_query = new WP_Query(); $wp_query->query('posts_per_page=4' . '&paged='.$paged);
			while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

			<h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
			<div class="metastyle">
					<p>created by <?php the_author();  ?> on <?php the_date(); ?></p>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-6 col-lg-4 col-sm-3">
							<div class="card border-2">
								<!--  post thumbnail image -->
								<?php if(has_post_thumbnail()) : ?>
									<div class="post-thumbnail">
										<?php the_post_thumbnail(); ?>
									</div>
								<?php endif; ?>
								<div class="card-body">
									<p><?php the_excerpt(); ?></p>
								</div>
							</div>	
						</div>
						<div class="col-md-6">
							<div class="card border-0"><a href="#"><img src="<?php echo get_theme_file_uri('/assets/img/nature/image1.jpg'); ?>" alt="Card Image" class="card-img-top scale-on-hover"></a>
							    <div class="card-body">
							        <h6><a href="#">Lorem Ipsum</a></h6>
							        <p class="text-muted card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.</p>
							    </div>
							</div>
						</div>
					</div>
						
				
				</div>
				<div class="col-md-4">
					<!-- for getting the sidebar.php link to the index.php-->
					<?php get_sidebar(); ?>
				</div>
	        </div>
	        <?php endwhile; ?>
			<?php if ($paged > 1) { ?>

					<nav id="nav-posts">
						<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
						<div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
					</nav>

					<?php } else { ?>

					<nav id="nav-posts">
						<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
					</nav>

					<?php } ?>

					<?php wp_reset_postdata(); ?>	

			
</section>

	



<?php get_footer(); ?>