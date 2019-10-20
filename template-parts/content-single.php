<?php 

/**
 * The template partial for displaying the single blog post content
 *
 * @package Xivig Costomtheme
 * @since Customtheme 1.0.0
 * 
 */

?>

	<article class="posts">
		<!-- revealing post id and post class for styling individual post-->
		<div id="post-<?php the_ID(); ?>"<?php post_class();?> >
			<br>
			<h3><?php the_title(); ?></a></h3>
			<div class="metastyle">
				<p>created by <?php the_author();  ?> on <?php the_date(); ?></p>
			</div>
			<!--  post thumbnail image full-width -->
			<?php if(has_post_thumbnail()) : ?>
				<div class="post-thumbnail__single">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>
			<p><?php the_content(); ?></p>
		</div>	
	</article>