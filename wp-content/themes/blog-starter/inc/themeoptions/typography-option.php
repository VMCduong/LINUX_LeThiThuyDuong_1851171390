<?php

$font_choices = array(
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto+Slab:wght@100;200;300;400;500;600;700;800;900' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
		'Poppins:400,500,600,700,800,900' => 'Poppins',
		'Fraunces:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900' => 'Fraunces',
		'Merriweather:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900' => 'Merriweather',
		'Noto+Sans+TC:wght@300;400;500;700;900' => 'Noto Sans TC',
		'Hind:wght@300;400;500;600;700' => 'Hind',
		'Asap:wght@400;500;600;700' => 'Asap',
		'Sriracha' => 'Sriracha',
		'Yusei+Magic' => 'Yusei Magic',
		'Lexend+Mega' => 'Lexend Mega',
		'Big+Shoulders+Display:wght@100;300;400;500;600;700;800;900' => 'Big Shoulders Display',
		'Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900' => 'Nunito',
		'Noto+Serif:ital,wght@0,400;0,700;1,400;1,700' => 'Noto Serif',
		'Fira+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,800;1,900' => 'Fira Sans',
		'Akaya+Telivigala' => 'Akaya Telivigala',
		'Oi' => 'Oi',
	);
$wp_customize->add_section(
	'typhograpy',
	array(
		'priority'       => 6,
		'panel'          => 'blog-starter',
		'title'          => __( 'Typhograpy', 'blog-starter' ),
		'capability'     => 'edit_theme_options',
	)
);

$wp_customize->add_setting(
	'blog_starter_body_fonts',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'blog_starter_sanitize_fonts',
		'default'  => 'Roboto+Slab:wght@100;200;300;400;500;600;700;800;900',
	)
);

$wp_customize->add_control(
	'blog_starter_body_fonts',
	array(
		'type' => 'select',
		'label' => __('Body Font Family', 'blog-starter'),
		'section' => 'typhograpy',
		'choices' => $font_choices
	)
);
$wp_customize->add_setting(
	'blog_starter_body_fonts_size',
	array(
		'transport' => 'refresh',
		'default' => 15,
		'sanitize_callback' => 'blog_starter_sanitize_number_absint',
	)
);
$wp_customize->add_control(
	'blog_starter_body_fonts_size',
	array(
		'type' => 'number',
		'label' => __('Body Font Size', 'blog-starter'),
		'section' => 'typhograpy',
	)
);
$wp_customize->add_setting(
	'blog_starter_body_fonts_weight',
	array(
		'transport' => 'refresh',
		'default' => 400,
		'sanitize_callback' => 'blog_starter_sanitize_number_absint',
	)
);
$wp_customize->add_control(
	'blog_starter_body_fonts_weight',
	array(
		'type' => 'select',
		'label' => __('Body Font Weight', 'blog-starter'),
		'section' => 'typhograpy',
		'choices' => array(
			'100' => __( '100', 'blog-starter' ),
			'200' => __( '200', 'blog-starter' ),
			'300' => __( '300', 'blog-starter' ),
			'400' => __( '400', 'blog-starter' ),
			'500' => __( '500', 'blog-starter' ),
			'600' => __( '600', 'blog-starter' ),
			'700' => __( '700', 'blog-starter' ),
			'800' => __( '800', 'blog-starter' ),
			'900' => __( '900', 'blog-starter' ),
			'1100' => __( '1100', 'blog-starter' ),
		),
	)
);
$wp_customize->add_setting(
	'blog_starter_body_fonts_line_height',
	array(
		'transport' => 'refresh',
		'default' => 28,
		'sanitize_callback' => 'blog_starter_sanitize_number_absint',
	)
);
$wp_customize->add_control(
	'blog_starter_body_fonts_line_height',
	array(
		'type' => 'number',
		'label' => __('Body Line Height', 'blog-starter'),
		'section' => 'typhograpy',
	)
);
