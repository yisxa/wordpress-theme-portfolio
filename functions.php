<?php

function add_theme_scripts() {


  wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
  wp_enqueue_style( 'icon', get_template_directory_uri() . '/assets/fonts/ionicons.min.css');
  wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/bootstrap/css/custom.css');
  wp_enqueue_style( 'style', get_stylesheet_uri());

  wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', true);

  wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/js/theme.js', true);

  //
  //   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
  //     wp_enqueue_script( 'comment-reply' );
  //   }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );



function xivig_customtheme_setup(){
	// register nav bar
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'xivig'),
    'footer' => __( 'Footer Menu', 'xivig' ),
    'social' => __( 'Social Links Menu', 'xivig' ),
  ));
	// Add theme support for document title tag
	add_theme_support( 'title-tag' );

  /**
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  // feature image support
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1568, 9999 );

      /**
       * Switch default core markup for search form, comment form, and comments
       * to output valid HTML5.
       */
      add_theme_support(
        'html5',
        array(
          'search-form',
          'comment-form',
          'comment-list',
          'gallery',
          'caption',
        )
      );

      /**
       * Add support for core custom logo.
       *
       * @link https://codex.wordpress.org/Theme_Logo
       */
      add_theme_support(
        'custom-logo',
        array(
          'height'      => 190,
          'width'       => 190,
          'flex-width'  => false,
          'flex-height' => false,
        )
      );

    }
    add_action('after_setup_theme', 'xivig_customtheme_setup');


// Excerpt length set
    function set_excerpt_length(){
      return 25;
    }
    add_filter('excerpt_length', 'set_excerpt_length');

//Display a Read More link in WordPress Excerpts
// Changing excerpt more
    function xivig_new_excerpt_more($more) {
     global $post;
     return '… <a href="'. get_permalink($post->ID) . '">' . '<button class="btn btn-primary btn-primary--modified  py2 px2">Read More</button>' . '</a>';
   }
   add_filter('excerpt_more', 'xivig_new_excerpt_more');


// register sidebar to show in the widgets area
   function xivig_customtheme_widgets(){
  /**
   * Creates a sidebar
   * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
   */
  $args = array(
    'name'          => __( 'Sidebar', 'xivig' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in the sidebar', 'xivig' ),
    'class'         => '',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  );
  register_sidebar( $args );

  register_sidebar(
    array(
      'name' => 'Home right sidebar',
      'id' => 'home_right_1',
      'description' => __( 'Xivig Widget Area', 'xivig right sidebar'),
      'before_widgets' => '<div>',
      'after_widgets' => '</div>',
      'before_title' => '<h1 class="rounded">',
      'after_widgets' => '</h1>',
    )
  );
  register_sidebar(
    array(
      'name' => 'Home left sidebar',
      'id' => 'home_left_1',
      'description' => __( 'Xivig Widget Area', 'xivig left sidebar'),
      'before_widgets' => '<div>',
      'after_widgets' => '</div>',
      'before_title' => '<h1 class="cool">',
      'after_widgets' => '</h1>',
    )
  );

  // footer navigation four column
  register_sidebar(
    array(
      'name' => 'Footer 1',
      'id' => 'footer_1',
      'description' => __( 'Xivig Widget Area', 'footer 1'),
    )
  );

  register_sidebar(
    array(
      'name' => 'Footer 2',
      'id' => 'footer_2',
      'description' => __( 'Xivig Widget Area', 'footer 2'),
    )
  );

  register_sidebar(
    array(
      'name' => 'Footer 3',
      'id' => 'footer_3',
      'description' => __( 'Xivig Widget Area', 'footer 3'),
    )
  );

  register_sidebar(
    array(
      'name' => 'Footer 4',
      'id' => 'footer_4',
      'description' => __( 'Xivig Widget Area', 'footer 4'),
    )
  );


}

add_action( 'widgets_init', 'xivig_customtheme_widgets');




// custom shortcode creation

function xivig_custom_shortcode($atts, $content=null){

  return '<div class="col-sm-4">' . $content . '</div>';
}

add_shortcode('three_column', 'xivig_custom_shortcode');


// custom shortcode creation

function xivig_custom_shortcode1($atts, $content=null){

  return '<div class="col-md-6">' . $content . '</div>';
}

add_shortcode('two_column', 'xivig_custom_shortcode1');


// custom shortcode creation

function xivig_custom_shortcode2($atts, $content=null){

  return '<div class="col-md-3">' . $content . '</div>';
}

add_shortcode('four_column', 'xivig_custom_shortcode2');

