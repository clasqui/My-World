<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title('|', true, 'left'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

    <header id="branding" role="banner">
      
      <div id="top-red">
        <div id="search-box">
           <div id="close-x"><?php _e( 'x', 'noteworthy' ); ?></div>
           <?php get_search_form(); ?>
        </div>
      </div>
      
      <div id="inner-header" class="clearfix">
        
        <hgroup id="site-heading">
            <h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        </hgroup>
    
        <nav id="access" role="navigation">
            <h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'noteworthy' ); ?></h1>
            <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'noteworthy' ); ?>"><?php _e( 'Skip to content', 'noteworthy' ); ?></a></div>
            <?php noteworthy_main_nav(); // Adjust using Menus in Wordpress Admin ?>
            
        </nav><!-- #access -->
        
        <div id="search-icon"></div>
      </div>
    </header><!-- #branding -->
    
    <div id="container">