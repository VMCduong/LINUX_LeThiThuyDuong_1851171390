<?php
/**
 * Homepage Main Widget Area
 *
 * @package TheVoice
 */

if( !function_exists('thevoice_case_home_widget_area_block') ):

    function thevoice_case_home_widget_area_block($thevoice_home_section, $repeat_times){

        if ( ! is_active_sidebar( 'thevoice-home-main-widget-area' ) && ! is_active_sidebar( 'thevoice-home-sidebar-widget-area' ) ) {
            return;
        }
        $ed_home_widget_area = isset( $thevoice_home_section->section_ed ) ? $thevoice_home_section->section_ed : '';
        $enable_sidebar = isset( $thevoice_home_section->enable_sidebar ) ? $thevoice_home_section->enable_sidebar : '';

        $class = 'homewidget-sidebar-disable';
        if( $enable_sidebar == 'yes' && is_active_sidebar( 'thevoice-home-main-widget-area' ) ){
            $class = 'homewidget-sidebar-enable';
        } ?>

        <div id="block-<?php echo esc_attr( $repeat_times ); ?>" class="theme-block theme-block-widgetarea <?php echo $class; ?>">
            <div class="wrapper">
                <div class="column-row">

                    <?php
                    if( is_active_sidebar( 'thevoice-home-main-widget-area' ) ){ ?>

                        <div id="widget-primary" class="widget-content-area">

                            <?php dynamic_sidebar( 'thevoice-home-main-widget-area' ); ?>

                        </div>

                    <?php }
                    
                    if( $enable_sidebar == 'yes' && is_active_sidebar( 'thevoice-home-main-widget-area' ) ){ ?>

                        <div class="custom-widget-area">

                            <?php dynamic_sidebar( 'thevoice-home-sidebar-widget-area' ); ?>

                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>

    <?php
    }

endif;