<?php

function add_theme_scripts() {


  wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
  wp_enqueue_style( 'icon', get_template_directory_uri() . '/assets/fonts/ionicons.min.css');
  wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/bootstrap/css/custom.css');
  wp_enqueue_style( 'style', get_stylesheet_uri());


  wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/js/theme.js', true);

  // To open the reply in the same window  and dont get refreshed
  if( is_singular() && comments_open() && get_option('thread_comments') ){
    wp_enqueue_script('comment-reply');
  }


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
     return '… <a href="'. get_permalink($post->ID) . '">' . '<button class="btn btn-primary btn-primary--modified-2  py2 px2">Read More</button>' . '</a>';
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
    'before_widget' => '<div id="%1$s" class="card my-4 %2$s"><div class="card-body">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h5 class="card-header">',
    'after_title'   => '</h5>',
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


// social sharing button link function
function xivig_social_sharing_buttons($content) {
  global $post;
  if(is_singular() || is_home()){

    // Get current page URL
    $xivigURL = urlencode(get_permalink());

    // Get current page title
    $xivigTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
    // $xivigTitle = str_replace( ' ', '%20', get_the_title());

    // Get Post Thumbnail for pinterest
    $xivigThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$xivigTitle.'&amp;url='.$xivigURL.'&amp;via=xivig';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$xivigURL;
    $googleURL = 'https://plus.google.com/share?url='.$xivigURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$xivigURL.'&amp;title='.$xivigTitle;

    // Pinterest sharing URL without using any script
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$xivigURL.'&amp;media='.$xivigThumbnail[0].'&amp;description='.$xivigTitle;

    // Add sharing button at the end of page/page content
    $content .= '<!-- Implementing  social sharing buttons without any JavaScript loading. No plugin required. -->';
    $content .= '<div class="xivig-social">';
    $content .= '<h5>SHARE ON</h5> <a class="xivig-link xivig-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
    $content .= '<a class="xivig-link xivig-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
    $content .= '<a class="xivig-link xivig-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
    $content .= '<a class="xivig-link xivig-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
    $content .= '<a class="xivig-link xivig-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank">Pin It</a>';
    $content .= '</div>';

    return $content;
  }else{
    // if not a post/page then don't include sharing button
    return $content;
  }
};
add_filter( 'the_content', 'xivig_social_sharing_buttons');