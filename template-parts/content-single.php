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
		<!-- Title -->
		<h2 class="mt-4"><?php the_title(); ?></h2>

		<!-- Author -->
		<p class="lead">
			by
			<a href="#"><?php the_author();  ?></a>
		</p>

		<hr>

		<!-- Date/Time -->
		<p>Posted on <?php the_date(); ?></p>

		<hr>
		<!--  post thumbnail image full-width -->
		<?php if(has_post_thumbnail()) : ?>

			<!-- Preview Image -->
			<img class="card-img-top" src="<?php the_post_thumbnail(); ?>
		<?php endif; ?>
		<hr>

		<!-- Post Content -->
		<p class="lead"><?php the_content(); ?></p>

		<blockquote class="blockquote">
			<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
			<footer class="blockquote-footer">Someone famous in
				<cite title="Source Title">Source Title</cite>
			</footer>
		</blockquote>

		<hr>
	</div>
</article>

