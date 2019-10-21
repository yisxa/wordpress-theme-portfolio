<?php
/**
* Template Name: Blog Page Special
*/
?>

<?php get_header(); ?>
<hr style="color:blue; width:2px;">

<div class="section" id="b-section-header" name="Header">
  <div class="widget Header" data-version="2" id="Header1">
    <div class="header image-placement-behind no-image">
      <div class="container">
        <h1><a href="">JavaScript Tutorial</a></h1>
        <p>JavaScript</p>
      </div>
    </div>
  </div>
</div>


<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="my-4">Welcome to
        <small>JavaScript World</small>
      </h1>

      <?php // Display blog posts on any page
      $temp = $wp_query; $wp_query= null;
      $wp_query = new WP_Query(); $wp_query->query('posts_per_page=4' . '&paged='.$paged);
      while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

      <!-- Blog Post -->
      <div class="card mb-4">
        <!--  post thumbnail image -->
        <?php if(has_post_thumbnail()) : ?>
          <img class="card-img-top" src="<?php the_post_thumbnail();?>">
         <?php endif; ?>
        <div class="card-body">
          <h2 class="card-title"><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
          <p class="card-text"><?php the_excerpt(); ?></p>
        </div>
        <div class="card-footer text-muted">
          created by <?php the_author();  ?> on <?php the_date(); ?>
        </div>

      </div>
       <?php endwhile; ?>
<br>

      <!-- Pagination -->
       <?php if ($paged > 1) { ?>
      <ul class="pagination justify-content-center mb-4">

        <div class="page-item">
          <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
          <div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
        </div>
        <?php } else { ?>
        <div class="page-item disabled">
          <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
        </div>
        <?php } ?>
      </ul>
       <?php wp_reset_postdata(); ?>
    </div>

    <!-- Sidebar Widgets Column -->
   <div class="col-md-4">
      <!-- for getting the sidebar.php link to the index.php-->
          <?php get_sidebar(); ?>
    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->



<?php get_footer(); ?>