<?php
/**
 *
 * Front Page
 *
 * @package TheVoice
 */

get_header();


    $thevoice_default = thevoice_get_default_theme_options();
    $twp_thevoice_home_sections_1 = get_theme_mod( 'twp_thevoice_home_sections_1', json_encode( $thevoice_default['twp_thevoice_home_sections_1'] ) );
    $paged_active = false;

    if ( !is_paged() ) {
        $paged_active = true;
    }

    $twp_thevoice_home_sections_1 = json_decode( $twp_thevoice_home_sections_1 );
    $repeat_times = 1;

    foreach ( $twp_thevoice_home_sections_1 as $thevoice_home_section ) {

        $home_section_type = isset( $thevoice_home_section->home_section_type ) ? $thevoice_home_section->home_section_type : '';

        switch ($home_section_type) {

            case 'main-banner':

                $ed_slider_blocks = isset( $thevoice_home_section->section_ed ) ? $thevoice_home_section->section_ed : '';
                if ( $ed_slider_blocks == 'yes' && $paged_active ) {
                    thevoice_main_banner( $thevoice_home_section, $repeat_times );
                }

            break;

            case 'slider-blocks':

                $ed_slider_blocks = isset( $thevoice_home_section->section_ed ) ? $thevoice_home_section->section_ed : '';
                if ( $ed_slider_blocks == 'yes' && $paged_active ) {
                    thevoice_slider_blocks( $thevoice_home_section, $repeat_times );
                }

            break;

            case 'latest-posts-blocks':

                $ed_latest_posts_blocks = isset( $thevoice_home_section->section_ed ) ? $thevoice_home_section->section_ed : '';
                if ( $ed_latest_posts_blocks == 'yes' ) {
                    thevoice_latest_blocks( $thevoice_home_section, $repeat_times );
                }

            break;

            case 'carousel-blocks':

                $ed_carousel_blocks = isset( $thevoice_home_section->section_ed ) ? $thevoice_home_section->section_ed : '';
                if ( $ed_carousel_blocks == 'yes' && $paged_active ) {
                    thevoice_carousel_posts( $thevoice_home_section, $repeat_times );
                }

            break;

            case 'tiles-blocks':

                $ed_tiles_block = isset( $thevoice_home_section->section_ed ) ? $thevoice_home_section->section_ed : '';
                if ( $ed_tiles_block == 'yes' && $paged_active ) {
                    thevoice_tiles_block_section( $thevoice_home_section, $repeat_times );
                }

            break;

            case 'banner-blocks-1':

                $ed_banner_blocks_1 = isset( $thevoice_home_section->section_ed ) ? $thevoice_home_section->section_ed : '';
                if ( $ed_banner_blocks_1 == 'yes' && $paged_active ) {
                    thevoice_banner_block_1_section( $thevoice_home_section, $repeat_times );
                }

            break;

            case 'advertise-blocks':

                $ed_advertise_blocks = isset( $thevoice_home_section->section_ed ) ? $thevoice_home_section->section_ed : '';
                if ( $ed_advertise_blocks == 'yes' && $paged_active ) {
                    thevoice_advertise_block( $thevoice_home_section, $repeat_times );
                }
                
            break;

            case 'home-widget-area':

                $ed_home_widget_area = isset( $thevoice_home_section->section_ed ) ? $thevoice_home_section->section_ed : '';
                if ( $ed_home_widget_area == 'yes' && $paged_active ) {
                    thevoice_case_home_widget_area_block( $thevoice_home_section, $repeat_times );
                }
                
            break;

            default:

            break;

        }

        $repeat_times++;
    }

get_footer();
