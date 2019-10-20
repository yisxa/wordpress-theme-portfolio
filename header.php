<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php the_title(); ?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    
    <!-- wp_head() is to be adeed in order to css and javascript properly -->
  	<?php wp_head(); ?>
</head>
<!-- body_class() function to get all the information about the loaded page -->
<body <?php body_class(); ?>>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="#">Bandhu</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">  
                <ul class="nav navbar-nav ml-auto">                
                    <?php 
                    // dynamic menu
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            
                            'menu_class' => 'nav navbar-nav navbar-nav-modified ml-auto',
                            
                            'before' => '<li class="nav-item" role="presentation"><a class="nav-link">',
                            'after' => '</a></li>'
                            // 'container' => false
                            // 'items_wrap' => '%3$s'
                            
                        ) );
                    ?>
                 </ul>
                   
            </div>
        </div>
    </nav>
