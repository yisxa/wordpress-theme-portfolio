	<?php get_header(); ?>

<br><br><br>
	<section class="ftco-section" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
           <br>
            <h2 class="mb-4">Our Blog</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row d-flex">
        	<?php // Display blog posts on any page @ https://m0n.co/l
			$temp = $wp_query; $wp_query= null;
			$wp_query = new WP_Query(); $wp_query->query('posts_per_page=6' . '&paged='.$paged);
			while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
          	<div class="blog-entry justify-content-end">
          		                <!--  post thumbnail image -->
          									<?php if(has_post_thumbnail()) : ?>
          										<div class="post-thumbnail">
          											<?php the_post_thumbnail(); ?>
          										</div>
          									<?php endif; ?>
              
              <div class="text mt-3 float-right d-block">
                <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
                			<div class="metastyle">
                					<p>created by <?php the_author();  ?> on <?php the_date(); ?></p>
                			</div>
                <div class="d-flex align-items-center mb-3 meta">
	                
								<div class="card-body">
									<p><?php the_excerpt(); ?></p>
								</div>
                </div>
               
              </div>
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

          
          
        </div>
      </div>
    </section>

	<?php get_footer(); ?>
