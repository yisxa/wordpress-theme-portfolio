<?php define( 'WP_USE_THEMES', false ); get_header(); ?>

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


   <?php if(have_posts()): ?>
     <?php while(have_posts()): the_post(); ?>
       <p><?php the_content(); ?></p>
     <?php endwhile; ?>
   <?php endif; ?>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

<?php  ?>
http://wpthemedev-clone.local/

<?php $arrayName = array('' => , ); ?>

<!-- other -->
	<!-- <div class="container">
  <div class="row">
    <div class="col-md-8">
      <!-- wordpress loop starts here -->
      <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>

          <h2 class="mb-3"><?php the_title(); ?></h2>
          <h6><?php the_date(); ?></h6>
          <p>
            <img src="<?php echo get_theme_file_uri('assets/img/image_3.jpg'); ?>" alt="cool" class="img-fluid">
          </p>
          <!--  post thumbnail image full-width -->
							<?php if(has_post_thumbnail()) : ?>
								<div class="post-thumbnail__single">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php endif; ?>
          <p><?php the_content(); ?></p>
        <?php endwhile; ?>
      <?php endif; ?>


          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>

          <p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>

          <!--  Post Pagination -->
          <span>
            <?php
              if ( is_singular( 'post' )){
                the_post_navigation( array(
                  'mid_size' => 2,
                  'prev_text' => __('&laquo; Previous', 'xivig' ),
                  'next_text' => __('Next &raquo;', 'xivig' ),
                ));
              }
              ?>
          </span>


   <!--  </div>
    <div class="col-md-4">
      <div class="sidebar-box">
        <?php get_sidebar(); ?>
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" placeholder="Search...">
              </div>
            </form>
          </div>
          <div class="sidebar-box ftco-animate">
           <h3 class="heading-sidebar">Categories</h3>
           <ul class="categories">
            <li><a href="#">Interior Design <span>(12)</span></a></li>
            <li><a href="#">Exterior Design <span>(22)</span></a></li>
            <li><a href="#">Industrial Design <span>(37)</span></a></li>
            <li><a href="#">Landscape Design <span>(42)</span></a></li>
          </ul>
        </div>
    </div>
  </div>
</div>  -->
  <br><br>

  <?php get_header(); ?>
<main class="page projects-page">
        <section class="portfolio-block projects-cards">

            <div class="container">
                <div class="heading">
                    <h2>Welcome to Bandhu's Blog</h2>
                </div>
                  <?php if(have_posts()) : ?>
                        <?php while(have_posts()) : the_post(); ?>
                <div class="row">

                    <div class="col-md-6 col-md-4">
                         <div class="card border-0">
                            <!--  post thumbnail image -->
                            <?php if(has_post_thumbnail()) : ?>
                              <div class="post-thumbnail">
                                <?php the_post_thumbnail(); ?>
                              </div>
                            <?php endif; ?>
                              <div class="card-body">
                                  <h4><?php the_title(); ?></h4>
                                  <p><?php the_content(); ?></p>
                              </div>
                              <br>
                              <?php endwhile; ?>
                              <?php else : ?>
                                <?php echo wpautop("No posts were found"); ?>
                              <?php endif; ?>
                          </div>
                    </div>
                    <div class="col-md-4">
                      <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php get_footer(); ?>



    <!-- for getting the header.php link to the index.php -->
    <?php get_header(); ?>
    <br><br><br>
    <div class="main">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
              <div class="card border-0">
                <!--  post thumbnail image -->
                <?php if(has_post_thumbnail()) : ?>
                  <div class="post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                  </div>
                <?php endif; ?>
                   <div class="card-body">
                       <h4><?php the_title(); ?></h4>
                       <p><?php the_content(); ?></p>
                   </div>

               </div>
            <?php endwhile; ?>
            <?php else : ?>
              <?php echo wpautop("No posts were found"); ?>
            <?php endif; ?>
          </div>
          <div class="col-md-4">
            <!-- for getting the sidebar.php link to the index.php-->
            <?php get_sidebar(); ?>
          </div>
        </div>

      </div>
    </div>

    <!-- for getting the footer.php link to the index.php-->
    <?php get_footer(); ?>


[two_column]paragraph[/two_column][two_column]paragraph[/two_column][two_column]paragraph[/two_column]

two_column

[three_column]paragraph[/three_column][three_column]paragraph[/three_column][three_column]paragraph[/three_column]

[four_column]paragraph[/four_column][four_column]paragraph[/four_column][four_column]paragraph[/four_column][four_column]paragraph[/four_column]
