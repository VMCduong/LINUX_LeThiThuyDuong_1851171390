<?php

/**

 * o3magazine back compat functionality

 *

 * Prevents o3magazine from running on WordPress versions prior to 4.1,

 * since this theme is not meant to be backward compatible beyond that and

 * relies on many newer functions and markup changes introduced in 4.1.

 *

 * @package WordPress

 * @subpackage o3magazine

 * @since o3magazine 1.0

 */



/**

 * Prevent switching to o3magazine on old versions of WordPress.

 *

 * Switches to the default theme.

 *

 * @since o3magazine 1.0

 */

function o3magazine_switch_theme() {

	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'o3magazine_upgrade_notice' );

}

add_action( 'after_switch_theme', 'o3magazine_switch_theme' );



/**

 * Add message for unsuccessful theme switch.

 *

 * Prints an update nag after an unsuccessful attempt to switch to

 * o3magazine on WordPress versions prior to 4.1.

 *

 * @since o3magazine 1.0

 */

function o3magazine_upgrade_notice() {

	$message = sprintf( __( 'o3magazine requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'o3magazine' ), $GLOBALS['wp_version'] );

	printf( '<div class="error"><p>%s</p></div>', $message );

}



/**

 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.

 *

 * @since o3magazine 1.0

 */

function o3magazine_customize() {

	wp_die( sprintf( __( 'o3magazine requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'o3magazine' ), $GLOBALS['wp_version'] ), '', array(

		'back_link' => true,

	) );

}

add_action( 'load-customize.php', 'o3magazine_customize' );



/**

 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.

 *

 * @since o3magazine 1.0

 */

function o3magazine_preview() {

	if ( isset( $_GET['preview'] ) ) {

		wp_die( sprintf( __( 'o3magazine requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'o3magazine' ), $GLOBALS['wp_version'] ) );

	}

}

add_action( 'template_redirect', 'o3magazine_preview' );

