<?php
$wp_customize->add_section(
	'prealoader_section',
	array(
		'priority'       => 1,
		'panel'          => 'blog-starter',
		'title'          => __( 'Prealoader', 'blog-starter' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'prealoader_on_off',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blog_starter_sanitize_checkbox',
		'default'     => false,
	)
);
$wp_customize->add_control(
	'prealoader_on_off',
	array(
		'label'       => __( 'Prealoader ON//OFF', 'blog-starter' ),
		'section'     => 'prealoader_section',
		'type'        => 'checkbox',
	)
);
$wp_customize->add_setting(
	'prealoader_image',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blog_starter_sanitize_image',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'prealoader_image',
		array(
			'label'      => __( 'Upload Prealoader Image', 'blog-starter' ),
			'section'    => 'prealoader_section',
			'settings'   => 'prealoader_image',
		)
	)
);