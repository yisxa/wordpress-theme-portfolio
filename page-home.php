<?php 
/*

Template Name: Home page
 
 */
?>

<?php get_header(); ?>
<br><br><br>

<?php if(have_posts()): ?>
 <?php while(have_posts()): the_post(); ?>
 	<div class="container">
 		<div class="row">
 			<p><?php the_content(); ?></p>
 		</div> 		
 	</div>
 <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>