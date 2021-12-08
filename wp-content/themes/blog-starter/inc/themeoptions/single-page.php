<?php
$wp_customize->add_section(
	'post_details',
	array(
		'priority'       => 1,
		'panel'          => 'blog-starter',
		'title'          => __( 'Single Post Page', 'blog-starter' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'single_page_sidebar',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blog_starter_sanitize_select',
		'default'     => 'right',
	)
);
$wp_customize->add_control(
	'single_page_sidebar',
	array(
		'label'       => __( 'Single Post Sidebar', 'blog-starter' ),
		'section'     => 'post_details',
		'type'        => 'select',
		'choices'  => array(
			'left'  => __( 'Left Sidebar', 'blog-starter' ),
			'right' => __( 'Right Sidebar', 'blog-starter' ),
			'no' => __( 'No Sidebar', 'blog-starter' ),
		),
	)
);
$wp_customize->add_setting(
	'post_navigation_show',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blog_starter_sanitize_checkbox',
		'default'     => true,
	)
);
$wp_customize->add_control(
	'post_navigation_show',
	array(
		'label'       => __( 'Post Navigation Show', 'blog-starter' ),
		'section'     => 'post_details',
		'type'        => 'checkbox',
	)
);

