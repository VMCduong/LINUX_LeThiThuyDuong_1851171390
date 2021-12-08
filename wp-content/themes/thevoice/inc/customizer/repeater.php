<?php
/**
* Sections Repeater Options.
*
* @package TheVoice
*/

$thevoice_post_category_list = thevoice_post_category_list();
$thevoice_defaults = thevoice_get_default_theme_options();
$home_sections = array(
        
        'main-banner' => esc_html__('Slider & Vertical Slider','thevoice'),
        'banner-blocks-1' => esc_html__('Slider & Tab Block','thevoice'),
        'latest-posts-blocks' => esc_html__('Latest Posts Block','thevoice'),
        'slider-blocks' => esc_html__('Slider Block','thevoice'),
        'tiles-blocks' => esc_html__('Tiles Block','thevoice'),
        'advertise-blocks' => esc_html__('Advertise Block','thevoice'),
        'carousel-blocks' => esc_html__('Carousel Block','thevoice'),
        'home-widget-area' => esc_html__('Widgets Area Block','thevoice'),

    );

$thevoice_video_aspect_ratio = thevoice_video_aspect_ratio();
$thevoice_video_autoplay = thevoice_video_autoplay();

// Slider Section.
$wp_customize->add_section( 'home_sections_repeater',
	array(
	'title'      => esc_html__( 'Homepage Sections', 'thevoice' ),
	'priority'   => 150,
	'capability' => 'edit_theme_options',
	)
);


// Recommended Posts Enable Disable.
$wp_customize->add_setting( 'twp_thevoice_home_sections_1', array(
    'sanitize_callback' => 'thevoice_sanitize_repeater',
    'default' => json_encode( $thevoice_defaults['twp_thevoice_home_sections_1'] ),
    // 'transport'           => 'postMessage',
));

$wp_customize->add_control(  new TheVoice_Repeater_Controler( $wp_customize, 'twp_thevoice_home_sections_1', 
    array(
        'section' => 'home_sections_repeater',
        'settings' => 'twp_thevoice_home_sections_1',
        'thevoice_box_label' => esc_html__('New Section','thevoice'),
        'thevoice_box_add_control' => esc_html__('Add New Section','thevoice'),
        'thevoice_box_add_button' => false,
    ),
        array(
            'section_ed' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Section', 'thevoice' ),
                'class'       => 'home-section-ed'
            ),
            'home_section_type' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Section Type', 'thevoice' ),
                'options'     => $home_sections,
                'class'       => 'home-section-type'
            ),
            'home_section_title' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs carousel-blocks-fields tiles-blocks-fields'
            ),
            'section_slide_category' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Slider Post Category', 'thevoice' ),
                'options'     => $thevoice_post_category_list,
                'class'       => 'home-repeater-fields-hs'
            ),
            'section_category' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category', 'thevoice' ),
                'options'     => $thevoice_post_category_list,
                'class'       => 'home-repeater-fields-hs tiles-blocks-fields carousel-blocks-fields slider-blocks-fields'
            ),
            'ed_wide_layout' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Wide Layout', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs'
            ),
             'tiles_post_per_page' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Posts Per Page', 'thevoice' ),
                'options'     => array( 
                    '5' => 5,
                    '10' => 10,
                ),
                'class'       => 'home-repeater-fields-hs tiles-blocks-fields'
            ),
             'home_section_title_1' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Slider Area Title', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'section_post_slide_cat' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Slider Post Category', 'thevoice' ),
                'options'     => $thevoice_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            
            'advertise_image' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Advertise Image', 'thevoice' ),
                'description' => esc_html__( 'Recommended Image Size is 970x250 PX.', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs advertise-blocks-fields'
            ),
            'advertise_link' => array(
                'type'        => 'link',
                'label'       => esc_html__( 'Advertise Image Link', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs advertise-blocks-fields'
            ),
            'enable_wide_layout' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Wide Layout', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs main-banner-fields tiles-blocks-fields banner-blocks-1-fields slider-blocks-fields carousel-blocks-fields'
            ),
            'ed_arrows_carousel' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Arrows', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs carousel-blocks-fields banner-blocks-1-fields main-banner-fields'
            ),
            'ed_dots_carousel' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Dot', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs carousel-blocks-fields banner-blocks-1-fields main-banner-fields'
            ),
            'ed_autoplay_carousel' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Autoplay', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs carousel-blocks-fields slider-blocks-fields banner-blocks-1-fields main-banner-fields'
            ),
            'home_section_title_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Tab Area Title', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields'
            ),
            'home_section_title_3' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Vertical Slide Title', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs main-banner-fields'
            ),
            'ed_tab' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Tab', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs ed-tabs-ac banner-blocks-1-fields'
            ),
            'cat_title_1' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title One', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs '
            ),
            'section_category_1' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category One', 'thevoice' ),
                'options'     => $thevoice_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields'
            ),
            'cat_title_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title Two', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs '
            ),
            'section_category_2' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category Two', 'thevoice' ),
                'options'     => $thevoice_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-block-1-tab-ac banner-blocks-1-fields'
            ),
            'cat_title_3' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title Three', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs '
            ),
            'section_category_3' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category Three', 'thevoice' ),
                'options'     => $thevoice_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-block-1-tab-ac banner-blocks-1-fields'
            ),
            'section_category_4' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category Four', 'thevoice' ),
                'options'     => $thevoice_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-block-1-tab-ac banner-blocks-1-fields'
            ),
            'section_vertical_slide_category' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Vertical Slider Post Category', 'thevoice' ),
                'options'     => $thevoice_post_category_list,
                'class'       => 'home-repeater-fields-hs main-banner-fields'
            ),
            'section_video_ratio' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Video Aspect Ratio', 'thevoice' ),
                'options'     => $thevoice_video_aspect_ratio,
                'class'       => 'home-repeater-fields-hs latest-posts-blocks-fields'
            ),
            'section_video_autoplay' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Video Autoplay', 'thevoice' ),
                'options'     => $thevoice_video_autoplay,
                'class'       => 'home-repeater-fields-hs latest-posts-blocks-fields'
            ),
            'ed_flip_column' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Flip Column Right to Left', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields'
            ),
            'background_color' => array(
                'type'        => 'colorpicker',
                'label'       => esc_html__( 'Background Color', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields slider-blocks-fields'
            ),
            'background_image' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Background Image', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'bg_image_size' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Background Image Size', 'thevoice' ),
                'options'     => array( 
                    'auto' => esc_html('Original','thevoice'),
                    'contain' => esc_html('Fit to Screen','thevoice'),
                    'cover' => esc_html('Fill Screen','thevoice'),
                ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'background_image_repeat' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Repeat Background Image', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'background_image_scroll' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Scroll with Page', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'enable_sidebar' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Sidebar', 'thevoice' ),
                'description'       => esc_html__( 'Please add widget into "Homepage Sidebar Widget Area" for sidebar content.', 'thevoice' ),
                'class'       => 'home-repeater-fields-hs home-widget-area-fields'
            ),
    )
));

// Info.
$wp_customize->add_setting(
    'thevoice_notiece_info',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new TheVoice_Info_Notiece_Control( 
        $wp_customize,
        'thevoice_notiece_info',
        array(
            'settings' => 'thevoice_notiece_info',
            'section'       => 'home_sections_repeater',
            'label'         => esc_html__( 'Info', 'thevoice' ),
        )
    )
);

$wp_customize->add_setting(
    'thevoice_premium_notiece',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new TheVoice_Premium_Notiece_Control( 
        $wp_customize,
        'thevoice_premium_notiece',
        array(
            'label'      => esc_html__( 'Home Page Blocks', 'thevoice' ),
            'settings' => 'thevoice_premium_notiece',
            'section'       => 'home_sections_repeater',
        )
    )
);