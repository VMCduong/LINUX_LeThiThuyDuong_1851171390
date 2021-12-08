<?php
/**
 * Widget FUnctions.
 *
 * @package TheVoice
 */
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thevoice_widgets_init(){

    $thevoice_default = thevoice_get_default_theme_options();

    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'thevoice'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'thevoice'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Header Advertisement One', 'thevoice'),
        'id' => 'thevoice-header-1',
        'description' => esc_html__('Add widgets here.', 'thevoice'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    $twp_thevoice_home_sections_1 = get_theme_mod('twp_thevoice_home_sections_1', json_encode($thevoice_default['twp_thevoice_home_sections_1']));
    $twp_thevoice_home_sections_1 = json_decode($twp_thevoice_home_sections_1);

    foreach( $twp_thevoice_home_sections_1 as $thevoice_home_section ){

        $home_section_type = isset( $thevoice_home_section->home_section_type ) ? $thevoice_home_section->home_section_type : '';

        switch( $home_section_type ){

            case 'home-widget-area':

                $ed_home_widget_area = isset( $thevoice_home_section->section_ed ) ? $thevoice_home_section->section_ed : '';

                if( $ed_home_widget_area == 'yes' ){

                    register_sidebar(array(
                        'name' => esc_html__('Homepage Main Widget Area', 'thevoice'),
                        'id' => 'thevoice-home-main-widget-area',
                        'description' => esc_html__('Add widgets here.', 'thevoice'),
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget' => '</div>',
                        'before_title' => '<h2 class="block-title"><span>',
                        'after_title' => '</span></h2>',
                    ));

                    $enable_sidebar = isset( $thevoice_home_section->enable_sidebar ) ? $thevoice_home_section->enable_sidebar : '';

                    if( $enable_sidebar == 'yes' ){

                        register_sidebar(array(
                            'name' => esc_html__('Homepage Sidebar Widget Area', 'thevoice'),
                            'id' => 'thevoice-home-sidebar-widget-area',
                            'description' => esc_html__('Add widgets here.', 'thevoice'),
                            'before_widget' => '<div id="%1$s" class="widget %2$s">',
                            'after_widget' => '</div>',
                            'before_title' => '<h3 class="widget-title"><span>',
                            'after_title' => '</span></h3>',
                        ));

                    }

                }

                break;

            default:

                break;

        }

    }

    $thevoice_default = thevoice_get_default_theme_options();
    $footer_column_layout = absint(get_theme_mod('footer_column_layout', $thevoice_default['footer_column_layout']));

    for( $i = 0; $i < $footer_column_layout; $i++ ){

        if ($i == 0) {
            $count = esc_html__('One', 'thevoice');
        }
        if ($i == 1) {
            $count = esc_html__('Two', 'thevoice');
        }
        if ($i == 2) {
            $count = esc_html__('Three', 'thevoice');
        }

        register_sidebar(array(
            'name' => esc_html__('Footer Widget ', 'thevoice') . $count,
            'id' => 'thevoice-footer-widget-' . $i,
            'description' => esc_html__('Add widgets here.', 'thevoice'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title"><span>',
            'after_title' => '</span></h3>',
        ));

    }

}

add_action('widgets_init', 'thevoice_widgets_init');
require get_template_directory() . '/inc/widgets/widget-base.php';
require get_template_directory() . '/inc/widgets/author.php';
require get_template_directory() . '/inc/widgets/category.php';
require get_template_directory() . '/inc/widgets/recent-post.php';
require get_template_directory() . '/inc/widgets/social-link.php';
require get_template_directory() . '/inc/widgets/tab-posts.php';
require get_template_directory() . '/inc/widgets/carousel.php';
require get_template_directory() . '/inc/widgets/slider.php';
require get_template_directory() . '/inc/widgets/cat-posts.php';
require get_template_directory() . '/inc/widgets/list-posts.php';
require get_template_directory() . '/inc/widgets/post-grid.php';
require get_template_directory() . '/inc/widgets/tiles.php';
require get_template_directory() . '/inc/widgets/featured-category.php';