<?php

/**

 * The template for displaying the header

 *

 * Displays all of the head element and everything up until the "site-content" div.

 *

 * @package WordPress

 * @subpackage o3magazine

 * @since o3magazine 1.0

 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/o3magazine/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/o3magazine/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/o3magezine/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/o3magazine/css/bootstrap.css">
	<!--<link rel="stylesheet" href="<?php //echo get_site_url();?>/wp-content/themes/o3magazine/css/style.css">
-->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site container">

	<div id="sidebar" class="sidebar">

		<header id="masthead" class="site-header" role="banner">

				<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'o3magazine' ); ?></button>
                <?php
				$header_image = get_header_image();
				if ( ! empty( $header_image ) ) {
					 echo '<img src="' . get_header_image() . '" class="header_image_size" alt="header_img">';
				}?>
                <?php 
					if ( ! empty( $header_image ) ) {
					if (get_theme_mod('o3magazine_logo')) :?>
                    <div class="without_head_img_1">
		                <img src='<?php echo esc_url(get_theme_mod('o3magazine_logo')); ?>' alt='Logo' width="100%" >
			        </div>
	           <?php endif;} else { if (get_theme_mod('o3magazine_logo')) :?>
		           <div class="without_head_img_22">
				       <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                       <img src='<?php echo esc_url(get_theme_mod('o3magazine_logo')); ?>' alt='Logo' width="100%" height="100"> </a>
					</div>
	            <?php endif;} ?>
            	<?php
					if ( ! empty( $header_image ) ) : ?>
                    <div class="header-title head_logo_title_full"><h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h3 class="site-description"><?php bloginfo('description'); ?></h3>
                    </div>
					<?php else : ?>

                    <div id="content" class="site-content site_title_without_image_div">
						<h1 class="site-title site_title_without_image"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h3 class="site-description site_description_without_image"><?php bloginfo('description'); ?></h3>
                    </div>
				<?php endif;?></header>
                </div>
                   <div class="menu">
  					  <?php wp_nav_menu( array('menu' => 'main-menu', 'container' => '', 'items_wrap' => '<ul class="mega-menu">%3$s</ul>' )); ?>
                </div>
                
                </div>
                
                
                
<!--	<div id="content" class="site-content">-->
	<div id="content" class="container">