<?php
/**
 * blog_starter Sanitize Functions
 */

/**
 * Sanitize Checkbox for customizer
 */
function blog_starter_sanitize_checkbox( $checked ) {
		// returns true if checkbox is checked
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
/**
 * Sanitize Radio for customizer
 */
function blog_starter_sanitize_radio( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize Select for customizer
 */
function blog_starter_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
/**
 * Get Grid Layout
 */
function blog_starter_blog_grid() {
	if ( 'grid' == get_theme_mod( 'blog_layout' ) ) {
		return true;
	}
	return false;
}
/**
 * Get Grid Layout
 */
function blog_starter_front_blog_grid() {
	if ( 'grid' == get_theme_mod( 'front_post_layout' ) ) {
		return true;
	}
	return false;
}
/**
 * Get Categories 
 */
function blog_starter_get_categories(){
	$terms_array = array();
	$categories = get_terms(array(
		'taxonomy' => 'category',
	));
	foreach ($categories as $category) {
		$terms_array[$category->term_id] = $category->name;
	}
	return $terms_array;
}
function blog_starter_category_sanitize( $input ) {
	$valid = blog_starter_get_categories();
	foreach ( $input as $value ) {
		if ( ! array_key_exists( $value, $valid ) ) {
			return array();
		}
	}
	return $input;
}

/**
 * Sanitize number
 */

function blog_starter_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}
function blog_starter_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
//Sanitizes Fonts
function blog_starter_sanitize_fonts( $input ) {
	$valid = array(
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
		'Poppins:400,500,600,700,800,900' => 'Poppins',
		'Fraunces:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900' => 'Fraunces',
		'Merriweather:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900' => 'Merriweather',
		'Noto+Sans+TC:wght@300;400;500;700;900' => 'Noto Sans TC',
		'Hind:wght@300;400;500;600;700' => 'Hind',
		'Asap:wght@400;500;600;700' => 'Asap',
		'Sriracha' => 'Sriracha',
		'Yusei+Magic' => 'Yusei Magic',
		'Lexend+Mega' => 'Lexend Mega',
		'Big+Shoulders+Display:wght@100;300;400;500;600;700;800;900' => 'Big Shoulders Display',
		'Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900' => 'Nunito',
		'Noto+Serif:ital,wght@0,400;0,700;1,400;1,700' => 'Noto Serif',
		'Fira+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,800;1,900' => 'Fira Sans',
		'Akaya+Telivigala' => 'Akaya Telivigala',
		'Oi' => 'Oi',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * blog_starter Preloader
 */
if (!function_exists('blog_starter_preloader')) {
	function blog_starter_preloader(){
		if (get_theme_mod('prealoader_on_off', 'false') == true) {
			?>
				<div id="preloader" style="background-image: url(<?php echo esc_url(get_theme_mod('prealoader_image'));?>);"></div>
			<?php
		}
	}
}

/**
 * blog_starter_is_woocommerce_exist
 */

if (!function_exists('blog_starter_is_woocommerce_exists')) {
	function blog_starter_is_woocommerce_exists(){
		if (class_exists('woocommerce') && is_woocommerce()) {
			return true;
		}
		return false;
	}
}


/**
 * blog_starter is default page
 */
if (!function_exists('blog_starter_is_default_page')) {
	function blog_starter_is_default_page(){
		if (is_home() || is_archive() || is_404() || is_author() || is_category() || blog_starter_is_woocommerce_exists() || is_search() || is_tag() ) {
			return true;
		}
		return false;
	}
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */ 
function blog_starter_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'blog_starter_skip_link_focus_fix' );


function blog_starter_post_time_ago_function() {
return sprintf( esc_html__( '%s ago', 'blog-starter' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}
add_filter( 'get_the_date', 'blog_starter_post_time_ago_function' );
