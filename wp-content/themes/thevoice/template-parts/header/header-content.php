<?php
/**
 * Header Layout 2
 *
 * @package TheVoice
 */
$thevoice_default = thevoice_get_default_theme_options();
$thevoice_header_bg_size = get_theme_mod( 'thevoice_header_bg_size', $thevoice_default['thevoice_header_bg_size'] );
$ed_header_bg_fixed = get_theme_mod( 'ed_header_bg_fixed', $thevoice_default['ed_header_bg_fixed'] );
$ed_header_bg_overlay = get_theme_mod( 'ed_header_bg_overlay', $thevoice_default['ed_header_bg_overlay'] ); ?>

<header id="site-header" class="theme-header <?php if( $ed_header_bg_overlay ){ echo 'header-overlay-enabled'; } ?>" role="banner">
    
    <div class="header-navbar <?php if( get_header_image() ){ if( $ed_header_bg_fixed ){ echo 'data-bg-fixed'; } ?> data-bg header-bg-<?php echo esc_attr( $thevoice_header_bg_size ); ?> <?php } ?> "  <?php if( get_header_image() ){ ?> data-background="<?php echo esc_url(get_header_image()); ?>" <?php } ?>>
        <div class="wrapper header-wrapper">
            <div class="header-item header-item-left">
                <div class="header-titles">
                    <?php
                    thevoice_site_logo();
                    thevoice_site_description();
                    ?>
                </div>
            </div>

            <?php

            $ed_header_responsive_menu = get_theme_mod('ed_header_responsive_menu', $thevoice_default['ed_header_responsive_menu']); ?>

            <div class="header-item header-item-right">
                <div class="header-navigation-wrapper <?php if ($ed_header_responsive_menu) { echo 'show-hamburger-menu'; } ?> header-item-mid">
                    <div class="site-navigation">
                        <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'thevoice'); ?>" role="navigation">
                            <ul class="primary-menu theme-menu">
                                <?php
                                if( has_nav_menu('thevoice-primary-menu') ){

                                    wp_nav_menu(
                                        array(
                                            'container' => '',
                                            'items_wrap' => '%3$s',
                                            'theme_location' => 'thevoice-primary-menu',
                                            'walker' => new thevoice\TheVoice_Walkernav(),
                                        )
                                    );

                                }else{

                                    wp_list_pages(
                                        array(
                                            'match_menu_classes' => true,
                                            'show_sub_menu_icons' => true,
                                            'title_li' => false,
                                            'walker' => new TheVoice_Walker_Page(),
                                        )
                                    );

                                } ?>
                            </ul>
                        </nav>
                    </div>
                </div>

                <?php thevoice_search_offcanvas_icon_render(); ?>

            </div>
        </div>
    </div>

</header>
