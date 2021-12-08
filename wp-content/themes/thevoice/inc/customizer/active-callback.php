<?php
/**
 * TheVoice Customizer Active Callback Functions
 *
 * @package TheVoice
 */

function thevoice_header_archive_layout_ac( $control ){

    $thevoice_archive_layout = $control->manager->get_setting( 'thevoice_archive_layout' )->value();
    if( $thevoice_archive_layout == 'default' ){

        return true;
        
    }
    
    return false;
}

function thevoice_overlay_layout_ac( $control ){

    $thevoice_single_post_layout = $control->manager->get_setting( 'thevoice_single_post_layout' )->value();
    if( $thevoice_single_post_layout == 'layout-2' ){

        return true;
        
    }
    
    return false;
}

function thevoice_header_ad_ac( $control ){

    $ed_header_ad = $control->manager->get_setting( 'ed_header_ad' )->value();
    if( $ed_header_ad ){

        return true;
        
    }
    
    return false;
}