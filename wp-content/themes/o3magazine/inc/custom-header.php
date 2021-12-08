<?php
/**
 * Implements a custom header for o3magazine.
 * See http://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage o3magazine
 * @since 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses o3magazine_header_style()
 * @uses o3magazine_admin_header_style()
 * @uses o3magazine_admin_header_image()
 */
function o3magazine_custom_header_setup() {
   add_theme_support('custom-header', apply_filters('o3magazine_custom_header_args', array(
       'default-image' => '%s/images/4-825x510.png',
       'default-text-color' => 'FFFFFF',
       'width' => 1350,
       'height' => 500,
       'flex-height' => true,
       'wp-head-callback' => 'o3magazine_header_style',
       'admin-head-callback' => 'o3magazine_admin_header_style',
       'admin-preview-callback' => 'o3magazine_admin_header_image',
   )));

   // passing the default header image
   register_default_headers(array(
       'header-image' => array(
           'url' => '%s/images/4-825x510.png',
           'thumbnail_url' => '%s/images/4-825x510.png',
           'description' => __('Header Image', 'o3magazine')
       )
   ));
}

add_action('after_setup_theme', 'o3magazine_custom_header_setup');

if (!function_exists('o3magazine_header_style')) :
   /**
    * Styles the header image and text displayed on the blog
    *
    * @see o3magazine_custom_header_setup().
    */
   function o3magazine_header_style() {
      $header_text_color = get_header_textcolor();

      // If no custom options for text are set, let's bail
      // get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
      if (HEADER_TEXTCOLOR == $header_text_color) {
         return;
      }

      // If we get this far, we have custom styles. Let's do this.
      ?>
      <style type="text/css">
      <?php
// Has the text been hidden?
      if ('blank' == $header_text_color) :
         ?>
            .site-title,.site-description {position: absolute;clip: rect(1px, 1px, 1px, 1px);}
         <?php
// If the user has set a custom color for the text use that
      else :
         ?>
            .site-title a,.site-description {color: #<?php echo esc_attr($header_text_color); ?>;}
      <?php endif; ?>
      </style>
      <?php
   }
endif; // o3magazine_header_style
if (!function_exists('o3magazine_admin_header_style')) :
   /**
    * Styles the header image displayed on the Appearance > Header admin panel.
    *
    * @see o3magazine_custom_header_setup().
    */
   function o3magazine_admin_header_style() {
      ?>
      <style type="text/css">
         .appearance_page_custom-header #headimg {border: none;}
         #headimg h1,#desc {}
         #headimg h1 {}
         #headimg h1 a {}
         #desc {}
         #headimg img {}
      </style>
      <?php }
endif; 
if (!function_exists('o3magazine_admin_header_image')) :
   /**
    * Custom header image markup displayed on the Appearance > Header admin panel.
    * @see o3magazine_custom_header_setup().
    */
   function o3magazine_admin_header_image() {
      $style = sprintf(' style="color:#%s;"', get_header_textcolor());
      ?>
      <div id="headimg">
         <h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
         <div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo('description'); ?></div>
         <?php if (get_header_image()) : ?>
            <img src="<?php header_image(); ?>" alt="">
         <?php endif; ?>
      </div>
      <?php
   }
endif; // o3magazine_admin_header_image