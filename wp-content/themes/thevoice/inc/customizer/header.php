<?php
/**
* Header Options.
*
* @package TheVoice
*/

$thevoice_default = thevoice_get_default_theme_options();
$thevoice_page_lists = thevoice_page_lists();
$thevoice_post_category_list = thevoice_post_category_list();

// Header Advertise Area Section.
$wp_customize->add_section( 'main_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'thevoice' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
	)
);

// Enable Disable Search.
$wp_customize->add_setting('ed_header_search',
    array(
        'default' => $thevoice_default['ed_header_search'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_search',
    array(
        'label' => esc_html__('Enable Search', 'thevoice'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);

// Enable Disable Search.
$wp_customize->add_setting('ed_header_responsive_menu',
    array(
        'default' => $thevoice_default['ed_header_responsive_menu'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_responsive_menu',
    array(
        'label' => esc_html__('Display Off-canvas Menu on Desktop View', 'thevoice'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_header_ad',
    array(
        'default' => $thevoice_default['ed_header_ad'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_ad',
    array(
        'label' => esc_html__('Enable Top Advertisement Area', 'thevoice'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('header_ad_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'header_ad_image',
        array(
            'label'      => esc_html__( 'Top Header AD Image', 'thevoice' ),
            'section'    => 'main_header_setting',
            'active_callback' => 'thevoice_header_ad_ac',
        )
    )
);

$wp_customize->add_setting('ed_header_link',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('ed_header_link',
    array(
        'label' => esc_html__('AD Image Link', 'thevoice'),
        'section' => 'main_header_setting',
        'type' => 'text',
        'active_callback' => 'thevoice_header_ad_ac',
    )
);

// Archive Layout.
$wp_customize->add_setting(
    'thevoice_header_bg_size',
    array(
        'default'           => $thevoice_default['thevoice_header_bg_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control('thevoice_header_bg_size',
        array(
            'type'       => 'select',
            'section'       => 'header_image',
            'label'         => esc_html__( 'Header BG Size', 'thevoice' ),
            'choices'       => array(
                '1'  => esc_html__( 'Small', 'thevoice' ),
                '2'  => esc_html__( 'Medium', 'thevoice' ),
                '3'  => esc_html__( 'Large', 'thevoice' ),
            )
        )
);

$wp_customize->add_setting('ed_header_bg_fixed',
    array(
        'default' => $thevoice_default['ed_header_bg_fixed'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_bg_fixed',
    array(
        'label' => esc_html__('Enable Fixed BG', 'thevoice'),
        'section' => 'header_image',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_header_bg_overlay',
    array(
        'default' => $thevoice_default['ed_header_bg_overlay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_bg_overlay',
    array(
        'label' => esc_html__('Enable BG Overlay', 'thevoice'),
        'section' => 'header_image',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting(
    'thevoice_tags_search',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new TheVoice_Separator(
        $wp_customize,
        'thevoice_tags_search',
        array(
            'settings'      => 'thevoice_tags_search',
            'section'       => 'main_header_setting',
            'label'         => esc_html__( 'Popup Search Settings', 'thevoice' ),
        )
    )
);

$wp_customize->add_setting('ed_header_search_recent_posts',
    array(
        'default' => $thevoice_default['ed_header_search_recent_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_search_recent_posts',
    array(
        'label' => esc_html__('Enable Recent Posts on Search Area', 'thevoice'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);
$wp_customize->add_setting( 'recent_post_title_search',
    array(
    'default'           => $thevoice_default['recent_post_title_search'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'recent_post_title_search',
    array(
    'label'    => esc_html__( 'Related Posts Section Title', 'thevoice' ),
    'section'  => 'main_header_setting',
    'type'     => 'text',
    )
);
$wp_customize->add_setting('ed_header_search_top_category',
    array(
        'default' => $thevoice_default['ed_header_search_top_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_search_top_category',
    array(
        'label' => esc_html__('Enable Top Category on Search Area', 'thevoice'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);
$wp_customize->add_setting( 'top_category_title_search',
    array(
    'default'           => $thevoice_default['top_category_title_search'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'top_category_title_search',
    array(
    'label'    => esc_html__( 'Top Category Section Title', 'thevoice' ),
    'section'  => 'main_header_setting',
    'type'     => 'text',
    )
);

// Ticker Section
$wp_customize->add_section( 'header_ticker_section',
    array(
    'title'      => esc_html__( 'Breaking News Ticker', 'thevoice' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    )
);

$wp_customize->add_setting('ed_header_ticker_posts',
    array(
        'default' => $thevoice_default['ed_header_ticker_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_ticker_posts',
    array(
        'label' => esc_html__('Enable Ticker Posts', 'thevoice'),
        'section' => 'header_ticker_section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'ed_header_ticker_posts_title',
    array(
    'default'           => $thevoice_default['ed_header_ticker_posts_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'ed_header_ticker_posts_title',
    array(
    'label'       => esc_html__( 'Ticker Section Title', 'thevoice' ),
    'section'     => 'header_ticker_section',
    'type'        => 'text',
    )
);


$wp_customize->add_setting( 'thevoice_header_ticker_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'thevoice_sanitize_select',
    )
);
$wp_customize->add_control( 'thevoice_header_ticker_cat',
    array(
    'label'       => esc_html__( 'Ticker Posts Category', 'thevoice' ),
    'section'     => 'header_ticker_section',
    'type'        => 'select',
    'choices'     => $thevoice_post_category_list,
    )
);

$wp_customize->add_setting('ed_ticker_slider_autoplay',
    array(
        'default' => $thevoice_default['ed_ticker_slider_autoplay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_ticker_slider_autoplay',
    array(
        'label' => esc_html__('Enable Ticker Posts Autoplay', 'thevoice'),
        'section' => 'header_ticker_section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_ticker_slider_wide_layout',
    array(
        'default' => $thevoice_default['ed_ticker_slider_wide_layout'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_ticker_slider_wide_layout',
    array(
        'label' => esc_html__('Enable Ticker Wide Layout', 'thevoice'),
        'section' => 'header_ticker_section',
        'type' => 'checkbox',
    )
);

// Trending Tags Section
$wp_customize->add_section( 'header_tags_section',
    array(
    'title'      => esc_html__( 'Trending Tags Settings', 'thevoice' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    )
);
$wp_customize->add_setting('ed_header_tags',
    array(
        'default' => $thevoice_default['ed_header_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_tags',
    array(
        'label' => esc_html__('Enable Tags', 'thevoice'),
        'section' => 'header_tags_section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_tags_wide_layout',
    array(
        'default' => $thevoice_default['ed_tags_wide_layout'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_tags_wide_layout',
    array(
        'label' => esc_html__('Enable Tags Wide Layout', 'thevoice'),
        'section' => 'header_tags_section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_header_tags_title',
    array(
        'default' => $thevoice_default['ed_header_tags_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('ed_header_tags_title',
    array(
        'label' => esc_html__('Tags Title', 'thevoice'),
        'section' => 'header_tags_section',
        'type' => 'text',
    )
);

$wp_customize->add_setting('ed_header_tags_count',
    array(
        'default' => $thevoice_default['ed_header_tags_count'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('ed_header_tags_count',
    array(
        'label' => esc_html__('Tags To Show', 'thevoice'),
        'section' => 'header_tags_section',
        'type' => 'number',
    )
);

// Trending News Section
$wp_customize->add_section( 'header_news_section',
    array(
    'title'      => esc_html__( 'Trending News Settings', 'thevoice' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    )
);

$wp_customize->add_setting('ed_header_trending_news',
    array(
        'default' => $thevoice_default['ed_header_trending_news'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'thevoice_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_trending_news',
    array(
        'label' => esc_html__('Enable Trending News', 'thevoice'),
        'section' => 'header_news_section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'ed_header_trending_posts_title',
    array(
    'default'           => $thevoice_default['ed_header_trending_posts_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'ed_header_trending_posts_title',
    array(
    'label'       => esc_html__( 'Trending News Title', 'thevoice' ),
    'section'     => 'header_news_section',
    'type'        => 'text',
    )
);


$wp_customize->add_setting( 'thevoice_header_trending_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'thevoice_sanitize_select',
    )
);
$wp_customize->add_control( 'thevoice_header_trending_cat',
    array(
    'label'       => esc_html__( 'Trending News Posts Category', 'thevoice' ),
    'section'     => 'header_news_section',
    'type'        => 'select',
    'choices'     => $thevoice_post_category_list,
    )
);