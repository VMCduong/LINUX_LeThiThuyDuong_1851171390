<?php
/*Blog Page Settings*/

$wp_customize->add_section(
	'blog_page_settings',
	array(
		'priority'       => 6,
		'panel'          => 'blog-starter',
		'title'          => __( 'Blog & Archive Settings', 'blog-starter' ),
		'description'    => __( 'Customize Blog & Archive Page', 'blog-starter' ),
		'capability'     => 'edit_theme_options',
	)
);

$wp_customize->add_setting(
	'blog_page_sidebar',
	array(
		'default' => 'right',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blog_starter_sanitize_select'
	)
);
$wp_customize->add_control(
	'blog_page_sidebar',
	array(
		'label'       => __( 'Blog Sidebar', 'blog-starter' ),
		'section'     => 'blog_page_settings',
		'type'        => 'select',
		'choices'  => array(
			'left'  => __( 'Left Sidebar', 'blog-starter' ),
			'right' => __( 'Right Sidebar', 'blog-starter' ),
			'no' => __( 'No Sidebar', 'blog-starter' ),
		),
	)
);

$wp_customize->add_setting(
	'blog_page_pagination',
	array(
		'default' => 'center',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blog_starter_sanitize_select'
	)
);
$wp_customize->add_control(
	'blog_page_pagination',
	array(
		'label'       => __( 'Pagination Alignment', 'blog-starter' ),
		'section'     => 'blog_page_settings',
		'type'        => 'select',
		'choices'  => array(
			'left'  => __( 'Left', 'blog-starter' ),
			'right' => __( 'Right', 'blog-starter' ),
			'center' => __( 'center', 'blog-starter' ),
		),
	)
);

$wp_customize->add_section(
	'blog_post_section',
	array(
		'priority'       => 5,
		'panel'          => 'blog-starter',
		'title'          => __( 'Blog Post Options', 'blog-starter' ),
		'description'    => __( 'Customize Blog Post Layout', 'blog-starter' ),
		'capability'     => 'edit_theme_options',
	)
);

$wp_customize->add_setting(
	'grid_column',
	array(
		'default' => 'col-sm-6',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blog_starter_sanitize_radio'
	)
);

$wp_customize->add_control(
	'grid_column',
	array(
		'label'       => __( 'Posts Column', 'blog-starter' ),
		'section'     => 'blog_post_section',
		'type'        => 'radio',
		'choices'  => array(
			'col-sm-3'  => __( '4 Colmun', 'blog-starter' ),
			'col-sm-4' => __( '3 Column', 'blog-starter' ),
			'col-sm-6' => __( '2 Column', 'blog-starter' ),
		),
	)
);
