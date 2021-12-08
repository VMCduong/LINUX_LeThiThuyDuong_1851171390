<?php
/**
* Custom Functions.
*
* @package TheVoice
*/

if( !function_exists( 'thevoice_sanitize_layout_option' ) ) :

    // Sidebar Option Sanitize.
    function thevoice_sanitize_layout_option( $thevoice_input ){

        $thevoice_metabox_options = array( 'default','boxed','widerwidth' );
        if( in_array( $thevoice_input,$thevoice_metabox_options ) ){

            return $thevoice_input;

        }

        return;

    }

endif;

if( !function_exists( 'thevoice_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function thevoice_sanitize_sidebar_option( $thevoice_input ){

        $thevoice_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $thevoice_input,$thevoice_metabox_options ) ){

            return $thevoice_input;

        }

        return;

    }

endif;

if( !function_exists( 'thevoice_sanitize_single_pagination_layout' ) ) :

    // Sidebar Option Sanitize.
    function thevoice_sanitize_single_pagination_layout( $thevoice_input ){

        $thevoice_single_pagination = array( 'no-navigation','norma-navigation','ajax-next-post-load' );
        if( in_array( $thevoice_input,$thevoice_single_pagination ) ){

            return $thevoice_input;

        }

        return;

    }

endif;

if( !function_exists( 'thevoice_sanitize_archive_layout' ) ) :

    // Sidebar Option Sanitize.
    function thevoice_sanitize_archive_layout( $thevoice_input ){

        $thevoice_archive_option = array( 'default','full','grid','masonry' );
        if( in_array( $thevoice_input,$thevoice_archive_option ) ){

            return $thevoice_input;

        }

        return;

    }

endif;

if( !function_exists( 'thevoice_sanitize_single_post_layout' ) ) :

    // Single Layout Option Sanitize.
    function thevoice_sanitize_single_post_layout( $thevoice_input ){

        $thevoice_single_layout = array( 'layout-1','layout-2' );
        if( in_array( $thevoice_input,$thevoice_single_layout ) ){

            return $thevoice_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'thevoice_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function thevoice_sanitize_checkbox( $thevoice_checked ) {

		return ( ( isset( $thevoice_checked ) && true === $thevoice_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'thevoice_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function thevoice_sanitize_select( $thevoice_input, $thevoice_setting ) {

        // Ensure input is a slug.
        $thevoice_input = sanitize_text_field( $thevoice_input );

        // Get list of choices from the control associated with the setting.
        $choices = $thevoice_setting->manager->get_control( $thevoice_setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $thevoice_input, $choices ) ? $thevoice_input : $thevoice_setting->default );

    }

endif;

if ( ! function_exists( 'thevoice_sanitize_repeater' ) ) :
    
    /**
    * Sanitise Repeater Field
    */
    function thevoice_sanitize_repeater($input){
        $input_decoded = json_decode( $input, true );
        
        if(!empty($input_decoded)) {

            foreach ($input_decoded as $boxes => $box ){

                foreach ($box as $key => $value){

                    if( $key == 'section_ed' 
                        || $key == 'ed_tab' 
                        || $key == 'ed_arrows_carousel' 
                        || $key == 'ed_dots_carousel' 
                        || $key == 'ed_autoplay_carousel' 
                        || $key == 'ed_flip_column' 
                        || $key == 'ed_ribbon_bg'
                    ){

                        $input_decoded[$boxes][$key] = thevoice_sanitize_repeater_ed( $value );

                    }elseif( $key == 'home_section_type' ){

                        $input_decoded[$boxes][$key] = thevoice_sanitize_home_sections( $value );

                    }elseif( $key == 'ribbon_bg_color_schema' ){

                        $input_decoded[$boxes][$key] = thevoice_sanitize_ribbon_bg( $value );

                    }elseif( $key == 'category_color' ){

                        $input_decoded[$boxes][$key] = sanitize_hex_color( $value );

                    }elseif( $key == 'bg_image_size' ){

                        $input_decoded[$boxes][$key] =  thevoice_sanitize_bg_image_size( $value );

                    }elseif( $key == 'tiles_post_per_page' ){

                        $input_decoded[$boxes][$key] =  absint( $value );

                    }elseif( $key == 'advertise_image' || $key == 'advertise_link' ){

                         $input_decoded[$boxes][$key] = esc_url_raw( $value );

                    }elseif($key == 'section_category' || 
                            $key == 'section_post_slide_cat' || 
                            $key == 'section_category_1' || 
                            $key == 'section_category_2' || 
                            $key == 'section_category_3' || 
                            $key == 'section_category_4' || 
                            $key == 'category'
                        ){

                        $input_decoded[$boxes][$key] =  thevoice_sanitize_category( $value );

                    }else{

                        $input_decoded[$boxes][$key] = sanitize_text_field( $value );

                    }
                    
                }

            }
           
            return json_encode($input_decoded);

        }

        return $input;
    }
endif;

/** Sanitize Enable Disable Checkbox **/
function thevoice_sanitize_repeater_ed( $input ) {

    $valid_keys = array('yes','no');
    if ( in_array( $input , $valid_keys ) ) {
        return $input;
    }
    return '';

}

function thevoice_sanitize_home_sections( $input ) {

    $home_sections = array(

        'main-banner' => esc_html__('Slider & Vertical Slider','thevoice'),
        'banner-blocks-1' => esc_html__('Slider & Tab Block','thevoice'),
        'latest-posts-blocks' => esc_html__('Latest Posts Block','thevoice'),
        'slider-blocks' => esc_html__('Slider Block','thevoice'),
        'tiles-blocks' => esc_html__('Tiles Block','thevoice'),
        'advertise-blocks' => esc_html__('Advertise Block','thevoice'),
        'carousel-blocks' => esc_html__('Carousel Block','thevoice'),
        'home-widget-area' => esc_html__('Widgets Area Block','thevoice'),

    );
    if ( array_key_exists( $input , $home_sections ) ) {
        return $input;
    }
    return '';

}

/** Sanitize Category **/
function thevoice_sanitize_category( $input ) {

   $thevoice_post_category_list = thevoice_post_category_list();
    if ( array_key_exists( $input , $thevoice_post_category_list ) ) {
        return $input;
    }
    return '';

}

function thevoice_sanitize_bg_image_size( $input ) {

    $bg_image_size = array( 
                    'auto' => esc_html('Original','thevoice'),
                    'contain' => esc_html('Fit to Screen','thevoice'),
                    'cover' => esc_html('Fill Screen','thevoice'),
                );

    if ( array_key_exists( $input , $bg_image_size ) ) {
        return $input;
    }
    return '';

}

function thevoice_sanitize_ribbon_bg( $input ) {

    $ribbon_bg = array( 
                    '1' =>  array(
                                    'title' =>  esc_html__( 'Blue', 'thevoice' ),
                                    'color' =>  '#3061ff',
                                ),
                    '2' =>  array(
                                    'title' =>  esc_html__( 'Orange', 'thevoice' ),
                                    'color' =>  '#fa9000',
                                ),
                    '3' =>  array(
                                    'title' =>  esc_html__( 'Royal Blue', 'thevoice' ),
                                    'color' =>  '#00167a',
                                ),
                    '4' =>  array(
                                    'title' =>  esc_html__( 'Pink', 'thevoice' ),
                                    'color' =>  '#ff2d55',
                                ),
                );

    if ( array_key_exists( $input , $ribbon_bg ) ) {
        return $input;
    }
    return '';

}