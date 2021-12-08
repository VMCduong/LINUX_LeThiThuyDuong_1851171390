<?php
$wp_customize->add_section(
	'featured_section',
	array(
		'priority'       => 1,
		'panel'          => 'blog-starter',
		'title'          => __( 'Featured Section', 'blog-starter' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'featured_section_on_off',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blog_starter_sanitize_checkbox',
		'default'     => false,
	)
);
$wp_customize->add_control(
	'featured_section_on_off',
	array(
		'label'       => __( 'Featured Section On//Off', 'blog-starter' ),
		'section'     => 'featured_section',
		'type'        => 'checkbox',
	)
);

