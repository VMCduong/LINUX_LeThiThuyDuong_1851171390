<?php
/**
 * TheVoice functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TheVoice
 */


if ( ! function_exists( 'thevoice_after_theme_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	function thevoice_after_theme_support() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Custom background color.
		add_theme_support('custom-background', apply_filters('thevoice_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'thevoice_content_width', 1140 );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size('thevoice-150-150',75,75,true);
		add_image_size('thevoice-500-300',500,300,true);
		add_image_size('thevoice-400-280',400,280,true);
		add_image_size('thevoice-400-500',400,500,true);
		add_image_size('thevoice-550-400',550,400,true);
		add_image_size('thevoice-1600-700',1600,700,true);

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 120,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
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
				'script',
				'style',
			)
		);

		/*
		 * Posts Format.
		 *
		 * https://wordpress.org/support/article/post-formats/
		 */
		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );

		// Woocommerce Support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TheVoice, use a find and replace
		 * to change 'thevoice' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'thevoice', get_template_directory() . '/languages' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

	}

endif;

add_action( 'after_setup_theme', 'thevoice_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function thevoice_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );
	
	$fonts_url = thevoice_fonts_url();
    if( $fonts_url ){
    	
    	require_once get_theme_file_path( 'assets/lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'thevoice-google-fonts',
			wptt_get_webfont_url( $fonts_url ),
			array(),
			$theme_version
		);
    }

    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/magnific-popup.css' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/lib/slick/css/slick.min.css');
	wp_enqueue_style( 'thevoice-style', get_stylesheet_uri(), array(), $theme_version );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/lib/slick/js/slick.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'theiaStickySidebar', get_template_directory_uri() . '/assets/lib/theiaStickySidebar/theia-sticky-sidebar.js', array('jquery'), '', 1);
	wp_enqueue_script( 'thevoice-ajax', get_template_directory_uri() . '/assets/lib/custom/js/ajax.js', array('jquery'), '', true );
	wp_enqueue_script( 'thevoice-custom', get_template_directory_uri() . '/assets/lib/custom/js/custom.js', array('jquery'), '', 1);
	wp_enqueue_script( 'thevoice-pagination', get_template_directory_uri() . '/assets/lib/custom/js/pagination.js', array('jquery'), '', 1 );
	
    $ajax_nonce = wp_create_nonce('thevoice_ajax_nonce');

    wp_localize_script( 
        'thevoice-ajax', 
        'thevoice_ajax',
        array(
            'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
            'ajax_nonce' => $ajax_nonce,

         )
    );

    // Global Query
    if( is_front_page() ){

    	$posts_per_page = absint( get_option('posts_per_page') );
        $c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $posts_args = array(
            'posts_per_page'        => $posts_per_page,
            'paged'                 => $c_paged,
        );
        $posts_qry = new WP_Query( $posts_args );
        $max = $posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $thevoice_default = thevoice_get_default_theme_options();
    $thevoice_pagination_layout = get_theme_mod( 'thevoice_pagination_layout',$thevoice_default['thevoice_pagination_layout'] );
    $wide_layout = get_theme_mod( 'ed_ticker_slider_wide_layout',$thevoice_default['ed_ticker_slider_wide_layout'] );

    // Pagination Data
    wp_localize_script( 
	    'thevoice-pagination', 
	    'thevoice_pagination',
	    array(
	        'paged'  => absint( $c_paged ),
	        'maxpage'   => absint( $max ),
	        'nextLink'   => next_posts( $max, false ),
	        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
	        'loadmore'   => esc_html__( 'Load More Posts', 'thevoice' ),
	        'nomore'     => esc_html__( 'No More Posts', 'thevoice' ),
	        'loading'    => esc_html__( 'Loading...', 'thevoice' ),
	        'pagination_layout'   => esc_html( $thevoice_pagination_layout ),
	        'ajax_nonce' => $ajax_nonce,
	     )
	);

    global $post;
    $single_post = 0;
    $thevoice_ed_post_reaction = '';
    if( isset( $post->ID ) && isset( $post->post_type ) && $post->post_type == 'post' ){

    	$thevoice_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'thevoice_ed_post_reaction', true ) );
    	$single_post = 1;

    }
	wp_localize_script(
	    'thevoice-custom', 
	    'thevoice_custom',
	    array(
	    	'single_post'						=> absint( $single_post ),
	        'thevoice_ed_post_reaction'  		=> esc_html( $thevoice_ed_post_reaction ),
	        'next_svg'   => thevoice_the_theme_svg('chevron-right',true),
            'prev_svg' => thevoice_the_theme_svg('chevron-left',true),
            'play' => thevoice_the_theme_svg( 'play', $return = true ),
            'pause' => thevoice_the_theme_svg( 'pause', $return = true ),
            'mute' => thevoice_the_theme_svg( 'mute', $return = true ),
            'unmute' => thevoice_the_theme_svg( 'unmute', $return = true ),
            'play_text' => esc_html__('Play','thevoice'),
            'pause_text' => esc_html__('Pause','thevoice'),
            'mute_text' => esc_html__('Mute','thevoice'),
            'unmute_text' => esc_html__('Unmute','thevoice'),
            'wide_layout'	=> absint( $wide_layout ),
	     )
	);

}

add_action( 'wp_enqueue_scripts', 'thevoice_register_styles' );

/**
 * Admin enqueue script
 */
function thevoice_admin_scripts($hook){

	$current_screen = get_current_screen();
	wp_enqueue_style('thevoice-admin', get_template_directory_uri() . '/assets/lib/custom/css/admin.css');
    if( $current_screen->id != "widgets" ) {

		wp_enqueue_media();
		wp_enqueue_style( 'wp-color-picker' );
	    
	    wp_enqueue_script('thevoice-admin', get_template_directory_uri() . '/assets/lib/custom/js/admin.js', array('jquery','wp-color-picker'), '', 1);

	    $ajax_nonce = wp_create_nonce('thevoice_ajax_nonce');
				
		wp_localize_script( 
	        'thevoice-admin', 
	        'thevoice_admin',
	        array(
	            'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
	            'ajax_nonce' => $ajax_nonce,
	            'upload_image'   =>  esc_html__('Choose Image','thevoice'),
	            'use_imahe'   =>  esc_html__('Select','thevoice'),
	            'active' => esc_html__('Active','thevoice'),
		        'deactivate' => esc_html__('Deactivate','thevoice'),
	         )
	    );

	}

    if( $current_screen->id === "widgets" ) {

        // Enqueue Script Only On Widget Page.
        wp_enqueue_media();
    	wp_enqueue_script('thevoice-widget', get_template_directory_uri() . '/assets/lib/custom/js/widget.js', array('jquery'), '', 1);
	}
    
}

add_action('admin_enqueue_scripts', 'thevoice_admin_scripts');


if( !function_exists( 'thevoice_js_no_js_class' ) ) :

	// js no-js class toggle
	function thevoice_js_no_js_class() { ?>

		<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script>
	
	<?php
	}
	
endif;

add_action( 'wp_head', 'thevoice_js_no_js_class' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function thevoice_menus() {

	$locations = array(
		'thevoice-primary-menu'  => __( 'Primary Menu', 'thevoice' ),
		'thevoice-social-menu'  => __( 'Social Menu', 'thevoice' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'thevoice_menus' );


add_filter('themeinwp_enable_demo_import_compatiblity','thevoice_demo_import_filter_apply');

if( !function_exists('thevoice_demo_import_filter_apply') ):

	function thevoice_demo_import_filter_apply(){

		return true;

	}

endif;

/**
 * Recommended Plugins
 */
require get_template_directory() . '/assets/lib/tgmpa/recommended-plugins.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/mega-menu/megamenu-custom-fields.php';
require get_template_directory() . '/inc/mega-menu/walkernav.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/single-related-posts.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/term-meta.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/assets/lib/custom/css/style.php';
require get_template_directory() . '/assets/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/template-parts/components/archive-content.php';
require get_template_directory() . '/template-parts/components/main-banner.php';
require get_template_directory() . '/template-parts/components/tiles-block.php';
require get_template_directory() . '/template-parts/components/info-block.php';
require get_template_directory() . '/template-parts/components/advertise-block.php';
require get_template_directory() . '/template-parts/components/carousel-block.php';
require get_template_directory() . '/template-parts/components/slider-block.php';
require get_template_directory() . '/template-parts/components/latest-posts-block.php';
require get_template_directory() . '/template-parts/components/home-widget-area.php';
require get_template_directory() . '/classes/admin-notice.php';
require get_template_directory() . '/classes/plugin-classes.php';
require get_template_directory() . '/classes/about.php';