<?php
$wp_customize->add_setting(
	'base_color',
	array(
		'default'   => '#f39745',
		'transport' => 'refresh',
		'sanitize_callback'       => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'base_color',
		array(
			'section' => 'colors',
			'label'   => __( 'Primary Color', 'blog-starter' ),
		)
	)
);
