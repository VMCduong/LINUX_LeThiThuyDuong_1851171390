<?php
$wp_customize->add_section(
	'footer_options',
	array(
		'priority'       => 10,
		'panel'          => 'blog-starter',
		'title'          => __( 'Footer Options', 'blog-starter' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'footer_column',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blog_starter_sanitize_radio',
		'default'     => 'four',
	)
);
$wp_customize->add_control(
	'footer_column',
	array(
		'label'       => __( 'Footer Column', 'blog-starter' ),
		'section'     => 'footer_options',
		'type'        => 'radio',
		'choices' => array(
			'two' => __( '2 Column', 'blog-starter' ),
			'three' => __( '3 Column', 'blog-starter' ),
			'four' => __( '4 Column', 'blog-starter' ),
		),
	)
);



$wp_customize->add_section(
	'footer_content',
	array(
		'panel'          => 'blog-starter',
		'title'          => __( 'Copyright', 'blog-starter' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'copyright_text',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'wp_kses_post',
		'default'     =>  __( 'Copyright © 2021 All Rights Reserved.', 'blog-starter' ),
	)
);
// Control: Name.
$wp_customize->add_control(
	'copyright_text',
	array(
		'label'       => __( 'Copyright Text', 'blog-starter' ),
		'section'     => 'footer_content',
		'type'        => 'textarea',
	)
);



