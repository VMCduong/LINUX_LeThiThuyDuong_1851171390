<?php
/**
 * Header Theme options
 */
$wp_customize->add_section(
	'header_options',
	array(
		'priority'       => 1,
		'panel'          => 'blog-starter',
		'title'          => __( 'Header Options', 'blog-starter' ),
		'capability'     => 'edit_theme_options',
	)
);

$wp_customize->add_setting(
	'sticky_header',
	array(
		'default' => false,
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blog_starter_sanitize_checkbox'
	)
);

$wp_customize->add_control(
	'sticky_header',
	array(
		'label'       => __( 'Sticky Header On//Off', 'blog-starter' ),
		'section'     => 'header_options',
		'type'        => 'checkbox',
	)
);

/**
 * Banner Section
 */
$wp_customize->add_section(
	'banner_customize',
	array(
		'priority'       => 1,
		'panel'          => 'blog-starter',
		'title'          => __( 'Banner Settings', 'blog-starter' ),
		'description'	 => __('Here all options will work only banner section.', 'blog-starter'),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'header_height',
	array(
		'default' => 120,
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blog_starter_sanitize_number_absint',
	)
);
$wp_customize->add_control(
	'banner_height',
	array(
		'label'       => __( 'Header Height', 'blog-starter' ),
		'section'     => 'banner_customize',
		'type'        => 'number',
	)
);