<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Visum
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="600">
<meta http-equiv="pragma" content="no-cache">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <div id="preloader">
        <div class="container">
          <div class="square"></div>
          <div class="square"></div>
          <div class="square"></div>
          <div class="square"></div>
          <div class="square"></div>
          <span>Lataa...</span>
        </div>
    </div>

    <?php if ( has_nav_menu('right_menu') ) { ?>
        <div class="menu-wrap">        
            <nav class="menu">
                <div class="icon-list">
                    <?php wp_nav_menu(array('theme_location' => 'right_menu' )); ?>
                    <?php if ( is_active_sidebar( 'menu-sidebar' ) ) : ?>      
                    <nav class="sidebar-menu">
                        <?php dynamic_sidebar('menu-sidebar'); ?>
                    </nav>
            <?php endif; ?>
                </div>
            </nav>
        </div>
        <span class="menu-button" id="open-button"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></span>
    <?php } elseif ( has_nav_menu('left_menu') ) { ?>
        <div class="menu-wrap-left">        
            <nav class="menu">
                <div class="icon-list">
                    <?php wp_nav_menu( array('theme_location' => 'left_menu' ) ); ?>
                </div>
            </nav>
        </div>
        <span class="menu-button" id="open-button"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></span>
    <?php } elseif ( has_nav_menu('top_menu') ) { ?>
        <div class="menu-wrap-top">        
            <nav class="menu">
                <div class="icon-list">
                    <?php wp_nav_menu(array('theme_location' => 'top_menu' )); ?>
                </div>
            </nav>
        </div>
        <span class="menu-button" id="open-button"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></span>
    <?php } elseif ( has_nav_menu('bottom_menu') ) { ?>
        <div class="menu-wrap-bottom">        
            <nav class="menu">
                <div class="icon-list">
                    <?php wp_nav_menu(array('theme_location' => 'bottom_menu' )); ?>
                </div>
            </nav>
        </div>
        <span class="menu-button" id="open-button"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></span>
    <?php } elseif ( has_nav_menu('full_menu') ) { ?>
        <div class="menu-wrap-full">        
            <nav class="menu">
                <div class="icon-list">
                    <?php wp_nav_menu(array('theme_location' => 'full_menu' )); ?>
                </div>
            </nav>
        </div>
        <span class="menu-button" id="open-button"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></span>
    <?php } ?> 

<div id="page" class="hfeed site main">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'visum' ); ?></a>
    
	<div id="content" class="site-content">
