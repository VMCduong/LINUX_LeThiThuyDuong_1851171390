<?php
/**
* Footer Settings.
*
* @package TheVoice
*/

$thevoice_default = thevoice_get_default_theme_options();
$thevoice_post_category_list = thevoice_post_category_list();

$wp_customize->add_section( 'footer_settings',
	array(
	'title'      => esc_html__( 'Footer Settings', 'thevoice' ),
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	'priority'  => 95,
	)
);


$wp_customize->add_setting( 'footer_column_layout',
	array(
	'default'           => $thevoice_default['footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( 'footer_column_layout',
	array(
	'label'       => esc_html__( 'Top Footer Column Layout', 'thevoice' ),
	'section'     => 'footer_settings',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'thevoice' ),
		'2' => esc_html__( 'Two Column', 'thevoice' ),
		'3' => esc_html__( 'Three Column', 'thevoice' ),
	    ),
	)
);

$wp_customize->add_setting( 'footer_copyright_text',
	array(
	'default'           => $thevoice_default['footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'thevoice' ),
	'section'  => 'footer_settings',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('ed_scroll_top_button',
    array(
        'default' => $thevoice_default['ed_scroll_top_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);

$wp_customize->add_control('ed_scroll_top_button',
    array(
        'label' => esc_html__('Enable Scroll to Top Button', 'thevoice'),
        'section' => 'footer_settings',
        'type' => 'checkbox',
    )
);