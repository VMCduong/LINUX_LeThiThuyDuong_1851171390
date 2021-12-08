<?php
/**
* Single Post Options.
*
* @package TheVoice
*/

$thevoice_default = thevoice_get_default_theme_options();

$wp_customize->add_section( 'single_post_setting',
	array(
	'title'      => esc_html__( 'Single Post Settings', 'thevoice' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('ed_related_post',
    array(
        'default' => $thevoice_default['ed_related_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_related_post',
    array(
        'label' => esc_html__('Enable More Stories', 'thevoice'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'related_post_title',
    array(
    'default'           => $thevoice_default['related_post_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'related_post_title',
    array(
    'label'    => esc_html__( 'More Stories Section Title', 'thevoice' ),
    'section'  => 'single_post_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('twp_navigation_type',
    array(
        'default' => $thevoice_default['twp_navigation_type'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_single_pagination_layout',
    )
);
$wp_customize->add_control('twp_navigation_type',
    array(
        'label' => esc_html__('Single Post Navigation Type', 'thevoice'),
        'section' => 'single_post_setting',
        'type' => 'select',
        'choices' => array(
                'no-navigation' => esc_html__('Disable Navigation','thevoice' ),
                'norma-navigation' => esc_html__('Next Previous Navigation','thevoice' ),
                'ajax-next-post-load' => esc_html__('Ajax Load Next 3 Posts Contents','thevoice' )
            ),
    )
);

$wp_customize->add_setting('ed_floating_next_previous_nav',
    array(
        'default' => $thevoice_default['ed_floating_next_previous_nav'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_floating_next_previous_nav',
    array(
        'label' => esc_html__('Enable Fixed Floating Next/Previous Articles', 'thevoice'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting(
    'thevoice_single_post_layout',
    array(
        'default'           => $thevoice_default['thevoice_single_post_layout'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_single_post_layout'
    )
);
$wp_customize->add_control(
    new TheVoice_Custom_Radio_Image_Control(
        $wp_customize,
        'thevoice_single_post_layout',
        array(
            'settings'      => 'thevoice_single_post_layout',
            'section'       => 'single_post_setting',
            'label'         => esc_html__( 'Global Single Post Layout', 'thevoice' ),
            'choices'       => array(
                'layout-1'  => get_template_directory_uri() . '/assets/images/Layout-style-1.png',
                'layout-2'  => get_template_directory_uri() . '/assets/images/Layout-style-2.png',
            )
        )
    )
);

$wp_customize->add_setting('ed_header_overlay',
    array(
        'default' => $thevoice_default['ed_header_overlay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_overlay',
    array(
        'label' => esc_html__('Enable Header Overlay', 'thevoice'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
        'active_callback' => 'thevoice_overlay_layout_ac',
    )
);