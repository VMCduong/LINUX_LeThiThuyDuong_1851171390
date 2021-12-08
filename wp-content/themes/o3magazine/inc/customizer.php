<?php
/**
 * o3magazine Theme Customizer
 *
 * @package WordPress
 * @subpackage o3magazine
 * @since 1.0
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
  * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function o3magazine_register_theme_customizer($wp_customize) {
   class o3magazine_ADDITIONAL_Control extends WP_Customize_Control {
      public $type = 'textarea';
      public function render_content() {
         ?>
         <label>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
         </label>
         <?php } }
   // o3magazine color options
   $o3magazine_colors = array('o3magazine_primary_color' => array(
           'id' => 'o3magazine_primary_color',
           'default' => '#E85151',
           'title' => __('Primary Color', 'o3magazine')
       ),
       'o3magazine_link_color' => array(
           'id' => 'o3magazine_link_color',
           'default' => '#E85151',
           'title' => __('Link Color', 'o3magazine')
   ));
   $i = 20;
   foreach ($o3magazine_colors as $o3magazine_color) {
      $wp_customize->add_setting(
              $o3magazine_color['id'], array(
          'default' => $o3magazine_color['default'],
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'o3magazine_sanitize_hex_color',
          'sanitize_js_callback' => 'o3magazine_sanitize_escaping'
              )
      );
      $wp_customize->add_control(
              new WP_Customize_Color_Control(
              $wp_customize, $o3magazine_color['id'], array(
          'label' => $o3magazine_color['title'],
          'section' => 'colors',
          'settings' => $o3magazine_color['id'],
          'priority' => $i
              )
              )
      );
      $i++;
   }
   // o3magazine logo options
   $wp_customize->add_section('o3magazine_logo_section', array(
       'title' => __('Logo', 'o3magazine'),
       'priority' => 10
   ));
   $wp_customize->add_setting('o3magazine_logo', array
       ('default' => '',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'esc_url_raw'
   ));
   $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'o3magazine_logo', array(
       'label' => __('Logo', 'o3magazine'),
       'section' => 'o3magazine_logo_section',
       'settings' => 'o3magazine_logo',
   )));
   // o3magazine custom css options
   $wp_customize->add_section(
           'o3magazine_custom_css_section', array(
       'title' => __('Custom CSS', 'o3magazine'),
       'priority' => 200
           )
   );
   $wp_customize->add_setting(
           'o3magazine_custom_css', array(
       'default' => '',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'wp_filter_nohtml_kses',
       'sanitize_js_callback' => 'wp_filter_nohtml_kses'
           )
   );
   $wp_customize->add_control(
           new o3magazine_ADDITIONAL_Control(
           $wp_customize, 'o3magazine_custom_css', array(
       'label' => __('Add your custom css here and design live! (for advanced users)', 'o3magazine'),
       'section' => 'o3magazine_custom_css_section',
       'settings' => 'o3magazine_custom_css'
           )
           )
   );
   function o3magazine_sanitize_hex_color($color) {
      if ($unhashed = sanitize_hex_color_no_hash($color))
         return '#' . $unhashed;
      return $color;
   }
   function o3magazine_sanitize_escaping($input) {
      $input = esc_attr($input);
      return $input;
   }
}
add_action('customize_register', 'o3magazine_register_theme_customizer');


function o3magazine_customizer_css() {
   $customizer_css = '';
   $primary_color = esc_attr( get_theme_mod('o3magazine_primary_color', '#ffc800') );
$link_color = esc_attr( get_theme_mod('o3magazine_link_color', '#6a6a6a') );
   if ($primary_color && $primary_color != '#ffc800') {
      $customizer_css .= '
	     blockquote { border-left: 2px solid ' . $primary_color . '; }
           .post-header .entry-author, .post-header .entry-standard, .post-header .entry-date, .post-header .entry-tag { color: ' . $primary_color . '; }
           .entry-author, .entry-standard, .entry-date { color: ' . $primary_color . '; }
           a:hover { color: ' . $primary_color . '; }
           .widget_recent_entries li:before, .widget_recent_comments li:before { color: ' . $primary_color . '; }
           .underline { background: none repeat scroll 0 0 ' . $primary_color . '; }
           .widget-title { border-left: 3px solid ' . $primary_color . '; }
           .sticky { border: 1px solid ' . $primary_color . '; }
           .footer-background { border-top: 5px solid ' . $primary_color . '; }
           .site-title a:hover { color: ' . $primary_color . '; }
           button, input[type="button"], input[type="reset"], input[type="submit"] { background: none repeat scroll 0 0 ' . $primary_color . '; }
           .breadcrums span { color: ' . $primary_color . '; }
           .button:hover { color: ' . $primary_color . '; }
           .catagory-type a:hover { color: ' . $primary_color . '; }
           .copyright a span { color: ' . $primary_color . '; }
           button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { color: ' . $primary_color . '; }
           .widget_rss li a:hover { color: ' . $primary_color . '; }
           @media screen and (max-width: 768px) { nav li:hover ul li a:hover, nav li a:hover { background: ' . $primary_color . '; } }
           ';
   }
   if ($link_color && $link_color != '#6a6a6a') {
      $customizer_css .= '
           a { color: ' . $link_color . '; }
           .button { color: ' . $link_color . '; }
           .catagory-type a { color: ' . $link_color . '; }
           .widget_rss li a { color: ' . $link_color . '; }
           ';
   }
   ?>
   <style type="text/css"><?php echo $customizer_css; ?></style>
   <?php
   if (esc_attr(get_theme_mod('o3magazine_custom_css'))) {
      $customizer_css .= esc_attr(get_theme_mod('o3magazine_custom_css'));
      echo "<style type=\"text/css\">{$customizer_css}</style>";
   }
}
add_action('wp_head', 'o3magazine_customizer_css');
?>
