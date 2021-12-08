<?php
/**
* Body Classes.
*
* @package TheVoice
*/
 
 if (!function_exists('thevoice_body_classes')) :

    function thevoice_body_classes($classes) {

        $thevoice_default = thevoice_get_default_theme_options();
        global $post;

        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( !is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'no-sidebar';
        }
        
        if ( is_active_sidebar( 'sidebar-1' ) ) {

            $global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$thevoice_default['global_sidebar_layout'] ) );

            if( is_single() || is_page() ){

                $thevoice_post_sidebar = esc_html( get_post_meta( $post->ID, 'thevoice_post_sidebar_option', true ) );

                if( $thevoice_post_sidebar == 'global-sidebar' || empty( $thevoice_post_sidebar ) ){

                    if( class_exists('WooCommerce') && ( is_cart() || is_checkout() ) ){
                        
                        $classes[] = 'no-sidebar';

                    }else{

                        $classes[] = esc_attr( $global_sidebar_layout );

                    }

                }else{

                    if( class_exists('WooCommerce') && ( is_cart() || is_checkout() ) ){
                        
                        $classes[] = 'no-sidebar';

                    }else{

                        $classes[] = esc_attr( $thevoice_post_sidebar );

                    }
                }
                
            }elseif( is_404() ){

                $classes[] = 'no-sidebar';

            }else{
                
                $classes[] = esc_attr( $global_sidebar_layout );
            }

        }

        if( is_page() ){

            $thevoice_header_trending_page = get_theme_mod( 'thevoice_header_trending_page' );
            $thevoice_header_popular_page = get_theme_mod( 'thevoice_header_popular_page' );

            if( $thevoice_header_trending_page == $post->ID || $thevoice_header_popular_page == $post->ID ){

                $thevoice_archive_layout = get_theme_mod( 'thevoice_archive_layout',$thevoice_default['thevoice_archive_layout'] );
                $ed_image_content_inverse = get_theme_mod( 'ed_image_content_inverse',$thevoice_default['ed_image_content_inverse'] );
                if( $thevoice_archive_layout == 'default' && $ed_image_content_inverse ){

                    $classes[] = 'twp-archive-alternative';

                }

                $classes[] = 'twp-archive-'.esc_attr( $thevoice_archive_layout );
                
            }

        }

        if( is_singular('post') ){

            $thevoice_post_layout = esc_html( get_post_meta( $post->ID, 'thevoice_post_layout', true ) );

            if( $thevoice_post_layout == '' || $thevoice_post_layout == 'global-layout' ){
                
                $thevoice_post_layout = get_theme_mod( 'thevoice_single_post_layout',$thevoice_default['thevoice_archive_layout'] );

            }

            $classes[] = 'twp-single-'.esc_attr( $thevoice_post_layout );

            if( $thevoice_post_layout == 'layout-2' ){
                
                $thevoice_header_overlay = esc_html( get_post_meta( $post->ID, 'thevoice_header_overlay', true ) );

                if( $thevoice_header_overlay == '' || $thevoice_header_overlay == 'global-layout' ){

                    $thevoice_post_layout2 = get_theme_mod( 'thevoice_single_post_layout',$thevoice_default['thevoice_archive_layout'] );

                    if( $thevoice_post_layout2 == 'layout-2' ){

                        $ed_header_overlay = esc_html( get_post_meta( $post->ID, 'ed_header_overlay', true ) );
                        if( $ed_header_overlay == '' || $ed_header_overlay == 'global-layout' ){
                            
                            $ed_header_overlay = get_theme_mod( 'ed_header_overlay',$thevoice_default['ed_header_overlay'] );
                        }

                    }else{

                        $ed_header_overlay = false;

                    }

                }else{

                    $ed_header_overlay = true;

                }
                if( $ed_header_overlay ){

                    $classes[] = 'twp-single-header-overlay';

                }

            }

        }

        if( is_singular('page') ){

            $thevoice_page_layout = get_post_meta( $post->ID, 'thevoice_page_layout', true );

            if( $thevoice_page_layout == ''  ){
                
                $thevoice_page_layout = 'layout-1';

            }

            $classes[] = 'theme-single-'.esc_attr( $thevoice_page_layout );

            if( $thevoice_page_layout == 'layout-2' ){
                
                $thevoice_ed_header_overlay = get_post_meta( $post->ID, 'thevoice_ed_header_overlay', true );
                if( $thevoice_ed_header_overlay ){
                    $classes[] = 'theme-single-header-overlay';
                }

            }

        }

        if( is_archive() || is_home() || is_search() ){

            $thevoice_archive_layout = get_theme_mod( 'thevoice_archive_layout',$thevoice_default['thevoice_archive_layout'] );
            $ed_image_content_inverse = get_theme_mod( 'ed_image_content_inverse',$thevoice_default['ed_image_content_inverse'] );
            if( $thevoice_archive_layout == 'default' && $ed_image_content_inverse ){

                $classes[] = 'twp-archive-alternative';

            }

            $classes[] = 'twp-archive-'.esc_attr( $thevoice_archive_layout );
            
        }

        if( is_singular('post') ){

            $thevoice_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'thevoice_ed_post_reaction', true ) );
            if( $thevoice_ed_post_reaction ){
                $classes[] = 'hide-comment-rating';
            }

        }

        $ed_fullwidth_layout = get_theme_mod( 'ed_fullwidth_layout',$thevoice_default['ed_fullwidth_layout'] );

        if( $ed_fullwidth_layout != 'default' && !empty( $ed_fullwidth_layout ) ){
            $classes[] = 'theme-'.esc_attr( $ed_fullwidth_layout ).'-layout';
        }

        return $classes;
    }

endif;

add_filter('body_class', 'thevoice_body_classes');