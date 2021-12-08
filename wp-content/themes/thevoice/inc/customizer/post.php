<?php
/**
* Posts Settings.
*
* @package TheVoice
*/

$thevoice_default = thevoice_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'posts_settings',
	array(
	'title'      => esc_html__( 'Article Meta Settings', 'thevoice' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('ed_post_date',
    array(
        'default' => $thevoice_default['ed_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'thevoice'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_category',
    array(
        'default' => $thevoice_default['ed_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'thevoice'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_tags',
    array(
        'default' => $thevoice_default['ed_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'thevoice'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_views',
    array(
        'default' => $thevoice_default['ed_post_views'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_views',
    array(
        'label' => esc_html__('Enable Posts Views', 'thevoice'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);


// Enable Disable Post.
$wp_customize->add_setting('post_date_format',
    array(
        'default' => $thevoice_default['post_date_format'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_select',
    )
);
$wp_customize->add_control('post_date_format',
    array(
        'label' => esc_html__('Posted Date Format', 'thevoice'),
        'section' => 'posts_settings',
        'type' => 'select',
        'choices'               => array(
            'default' => esc_html__( 'Apply Default Format', 'thevoice' ),
            'time-ago' => esc_html__( 'Apply Time Age Format', 'thevoice' ),
            ),
        )
);

// Enable Disable Post.
$wp_customize->add_setting('post_video_aspect_ration',
    array(
        'default' => $thevoice_default['post_video_aspect_ration'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_select',
    )
);
$wp_customize->add_control('post_video_aspect_ration',
    array(
        'label' => esc_html__('Global Video Aspect Ratio', 'thevoice'),
        'section' => 'posts_settings',
        'type' => 'select',
        'choices'               => array(
            'default' => esc_html__( 'Default', 'thevoice' ),
            'square' => esc_html__( 'Square', 'thevoice' ),
            'portrait' => esc_html__( 'Portrait', 'thevoice' ),
            'landscape' => esc_html__( 'Landscape', 'thevoice' ),
            ),
        )
);


$wp_customize->add_setting('ed_autoplay',
    array(
        'default' => $thevoice_default['ed_autoplay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_select',
    )
);
$wp_customize->add_control('ed_autoplay',
    array(
        'label' => esc_html__('Global Video Autoplay', 'thevoice'),
        'section' => 'posts_settings',
        'type' => 'select',
        'choices'               => array(
            'autoplay-enable' => esc_html__( 'Autoplay Enable', 'thevoice' ),
            'autoplay-disable' => esc_html__( 'Autoplay Disable', 'thevoice' ),
            ),
        )
);