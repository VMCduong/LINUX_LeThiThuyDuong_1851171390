<?php
/**
 * Blog Starter Theme Info
 *
 * @package Blog_Starter
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function blog_starter_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info', array(
		'title'       => __( 'Demo & Documentation' , 'blog-starter' ),
		'priority'    => 6,
	) );
    
    /** Important Links */
	$wp_customize->add_setting( 'blog_starter_theme_info',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<p>';
	$theme_info .= sprintf( __( 'Demo Link: %1$sClick here.%2$s', 'blog-starter' ),  '<a href="' . esc_url( 'http://blogstarter.theimran.com/pro/' ) . '" target="_blank">', '</a>' );
    $theme_info .= '</p><p>';

    $theme_info .= sprintf( __( 'Documentation Link: %1$sClick here.%2$s', 'blog-starter' ),  '<a href="' . esc_url( 'http://documentation.theimran.com/blog-starter' ) . '" target="_blank">', '</a>' );
     $theme_info .= '</p><p class="one-click-demo-import">';
    $theme_info .= sprintf( __( 'One Click Demo Import Only Available With Pro Version: %1$sView Details.%2$s', 'blog-starter' ),  '<a href="' . esc_url( 'https://theimran.com/themes/wordpress-theme/blog-starter-pro-personal-blog-wordpress-theme/' ) . '" target="_blank">', '</a>' );
    $theme_info .= '</p>';
	
	$wp_customize->add_control( new Blog_Starter_Note_Control( $wp_customize,
        'blog_starter_theme_info', 
            array(
                'section'     => 'theme_info',
                'description' => $theme_info
            )
        )
    );
    
}
add_action( 'customize_register', 'blog_starter_customizer_theme_info' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class blog_starter_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self();
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require get_template_directory() . '/inc/upgradetopro/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Blog_Starter_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Blog_Starter_Customize_Section_Pro(
				$manager,
				'upgradetopro',
				array(
					'priority'       => 1,
					'pro_text' => esc_html__( 'Blog Starter - Upgrade To Pro', 'blog-starter' ),
					'pro_url'  => 'https://theimran.com/themes/wordpress-theme/blog-starter-pro-personal-blog-wordpress-theme/',
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'blog-starter-customize-controls', get_theme_file_uri( '/inc/upgradetopro/customize-controls.js' ), array( 'customize-controls' ) );

		wp_enqueue_style( 'blog-starter-customize-controls', get_theme_file_uri( '/inc/upgradetopro/customize-controls.css' ));
	}
}

// Doing this customizer thang!
blog_starter_Customize::get_instance();
