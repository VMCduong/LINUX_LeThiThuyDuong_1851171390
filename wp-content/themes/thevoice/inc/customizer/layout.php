<?php
/**
* Layouts Settings.
*
* @package TheVoice
*/

$thevoice_default = thevoice_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'layout_setting',
	array(
	'title'      => esc_html__( 'Archive Settings', 'thevoice' ),
	'priority'   => 60,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'ed_fullwidth_layout',
    array(
    'default'           => $thevoice_default['ed_fullwidth_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'thevoice_sanitize_layout_option',
    )
);
$wp_customize->add_control( 'ed_fullwidth_layout',
    array(
    'label'       => esc_html__( 'Enable Wider Width Layout', 'thevoice' ),
    'section'     => 'layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'default' => esc_html__( 'Default Layout', 'thevoice' ),
        'boxed'  => esc_html__( 'Boxed Layout', 'thevoice' ),
        'widerwidth'    => esc_html__( 'Wider Width Layout', 'thevoice' ),
        ),
    )
);


$wp_customize->add_setting( 'global_sidebar_layout',
	array(
	'default'           => $thevoice_default['global_sidebar_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'thevoice_sanitize_sidebar_option',
	)
);
$wp_customize->add_control( 'global_sidebar_layout',
	array(
	'label'       => esc_html__( 'Global Sidebar Layout', 'thevoice' ),
	'section'     => 'layout_setting',
	'type'        => 'select',
	'choices'     => array(
		'right-sidebar' => esc_html__( 'Right Sidebar', 'thevoice' ),
		'left-sidebar'  => esc_html__( 'Left Sidebar', 'thevoice' ),
		'no-sidebar'    => esc_html__( 'No Sidebar', 'thevoice' ),
	    ),
	)
);

// Archive Layout.
$wp_customize->add_setting(
    'thevoice_archive_layout',
    array(
        'default' 			=> $thevoice_default['thevoice_archive_layout'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_archive_layout'
    )
);
$wp_customize->add_control(
    new TheVoice_Custom_Radio_Image_Control(
        $wp_customize,
        'thevoice_archive_layout',
        array(
            'settings'      => 'thevoice_archive_layout',
            'section'       => 'layout_setting',
            'label'         => esc_html__( 'Archive Layout', 'thevoice' ),
            'choices'       => array(
            	'default'  => get_template_directory_uri() . '/assets/images/Layout-style-1.png',
                'full'  => get_template_directory_uri() . '/assets/images/Layout-style-2.png',
                'grid'  => get_template_directory_uri() . '/assets/images/Layout-style-3.png',
                'masonry'  => get_template_directory_uri() . '/assets/images/Layout-style-4.png',
            )
        )
    )
);


$wp_customize->add_setting('ed_image_content_inverse',
    array(
        'default' => $thevoice_default['ed_image_content_inverse'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_image_content_inverse',
    array(
        'label' => esc_html__('Inverse Image with Content', 'thevoice'),
        'section' => 'layout_setting',
        'type' => 'checkbox',
        'active_callback' => 'thevoice_header_archive_layout_ac',
    )
);

