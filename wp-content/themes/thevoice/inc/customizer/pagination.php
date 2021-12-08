<?php
/**
 * Pagination Settings
 *
 * @package TheVoice
 */

$thevoice_default = thevoice_get_default_theme_options();

// Pagination Section.
$wp_customize->add_section( 'thevoice_pagination_section',
	array(
	'title'      => esc_html__( 'Pagination Settings', 'thevoice' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'		 => 'theme_option_panel',
	)
);

// Pagination Layout Settings
$wp_customize->add_setting( 'thevoice_pagination_layout',
	array(
	'default'           => $thevoice_default['thevoice_pagination_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'thevoice_pagination_layout',
	array(
	'label'       => esc_html__( 'Pagination Method', 'thevoice' ),
	'section'     => 'thevoice_pagination_section',
	'type'        => 'select',
	'choices'     => array(
		'next-prev' => esc_html__('Next/Previous Method','thevoice'),
		'numeric' => esc_html__('Numeric Method','thevoice'),
		'load-more' => esc_html__('Ajax Load More Button','thevoice'),
		'auto-load' => esc_html__('Ajax Auto Load','thevoice'),
	),
	)
);