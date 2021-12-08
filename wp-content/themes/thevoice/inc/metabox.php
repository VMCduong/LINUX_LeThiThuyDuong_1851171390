<?php
/**
* Sidebar Metabox.
*
* @package TheVoice
*/
 
add_action( 'add_meta_boxes', 'thevoice_metabox' );

if( ! function_exists( 'thevoice_metabox' ) ):


    function  thevoice_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'thevoice' ),
            'thevoice_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'thevoice' ),
            'thevoice_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$thevoice_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'thevoice' ),
    'layout-2' => esc_html__( 'Banner Layout', 'thevoice' ),
);

$thevoice_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'thevoice' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'thevoice' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'thevoice' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'thevoice' ),
                ),
);

$thevoice_post_layout_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'thevoice' ),
    'layout-1' => esc_html__( 'Simple Layout', 'thevoice' ),
    'layout-2' => esc_html__( 'Banner Layout', 'thevoice' ),
);

$thevoice_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'thevoice' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'thevoice' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'thevoice_post_metafield_callback' ) ):
    
    function thevoice_post_metafield_callback() {
        global $post, $thevoice_post_sidebar_fields, $thevoice_post_layout_options,  $thevoice_page_layout_options, $thevoice_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'thevoice_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-general" class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('General Settings', 'thevoice'); ?>

                        </a>
                    </li>

                    <li>
                        <a id="metabox-navbar-appearance" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'thevoice'); ?>

                        </a>
                    </li>

                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'thevoice'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','thevoice'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $thevoice_post_sidebar = esc_html( get_post_meta( $post->ID, 'thevoice_post_sidebar_option', true ) ); 
                            if( $thevoice_post_sidebar == '' ){ $thevoice_post_sidebar = 'global-sidebar'; }

                            foreach ( $thevoice_post_sidebar_fields as $thevoice_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="thevoice_post_sidebar_option" value="<?php echo esc_attr( $thevoice_post_sidebar_field['value'] ); ?>" <?php if( $thevoice_post_sidebar_field['value'] == $thevoice_post_sidebar ){ echo "checked='checked'";} if( empty( $thevoice_post_sidebar ) && $thevoice_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $thevoice_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Appearance Layout','thevoice'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $thevoice_page_layout = esc_html( get_post_meta( $post->ID, 'thevoice_page_layout', true ) ); 
                                if( $thevoice_page_layout == '' ){ $thevoice_page_layout = 'layout-1'; }

                                foreach ( $thevoice_page_layout_options as $key => $thevoice_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="thevoice_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $thevoice_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $thevoice_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','thevoice'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $thevoice_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'thevoice_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="thevoice-header-overlay" name="thevoice_ed_header_overlay" value="1" <?php if( $thevoice_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="thevoice-header-overlay"><?php esc_html_e( 'Enable Header Overlay','thevoice' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Appearance Layout','thevoice'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $thevoice_post_layout = esc_html( get_post_meta( $post->ID, 'thevoice_post_layout', true ) ); 
                                if( $thevoice_post_layout == '' ){ $thevoice_post_layout = 'global-layout'; }

                                foreach ( $thevoice_post_layout_options as $key => $thevoice_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="thevoice_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $thevoice_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $thevoice_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','thevoice'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $thevoice_header_overlay = esc_html( get_post_meta( $post->ID, 'thevoice_header_overlay', true ) ); 
                                if( $thevoice_header_overlay == '' ){ $thevoice_header_overlay = 'global-layout'; }

                                foreach ( $thevoice_header_overlay_options as $key => $thevoice_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="thevoice_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $thevoice_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $thevoice_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Feature Image Setting','thevoice'); ?></h3>

                        <div class="metabox-opt-wrap theme-checkbox-wrap">

                            <?php
                            $thevoice_ed_feature_image = esc_html( get_post_meta( $post->ID, 'thevoice_ed_feature_image', true ) ); ?>

                            <input type="checkbox" id="thevoice-ed-feature-image" name="thevoice_ed_feature_image" value="1" <?php if( $thevoice_ed_feature_image ){ echo "checked='checked'";} ?>/>

                            <label for="thevoice-ed-feature-image"><?php esc_html_e( 'Disable Feature Image','thevoice' ); ?></label>


                        </div>

                    </div>

                     <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Navigation Setting','thevoice'); ?></h3>

                        <?php $twp_disable_ajax_load_next_post = esc_attr( get_post_meta($post->ID, 'twp_disable_ajax_load_next_post', true) ); ?>
                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php esc_html_e( 'Navigation Type','thevoice' ); ?></b></label>

                            <select name="twp_disable_ajax_load_next_post">

                                <option <?php if( $twp_disable_ajax_load_next_post == '' || $twp_disable_ajax_load_next_post == 'global-layout' ){ echo 'selected'; } ?> value="global-layout"><?php esc_html_e('Global Layout','thevoice'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'no-navigation' ){ echo 'selected'; } ?> value="no-navigation"><?php esc_html_e('Disable Navigation','thevoice'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'norma-navigation' ){ echo 'selected'; } ?> value="norma-navigation"><?php esc_html_e('Next Previous Navigation','thevoice'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'ajax-next-post-load' ){ echo 'selected'; } ?> value="ajax-next-post-load"><?php esc_html_e('Ajax Load Next 3 Posts Contents','thevoice'); ?></option>

                            </select>

                        </div>
                    </div>

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Video Aspect Ration Setting','thevoice'); ?></h3>

                        <?php $twp_aspect_ratio = esc_attr( get_post_meta($post->ID, 'twp_aspect_ratio', true) ); ?>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php esc_html_e( 'Video Aspect Ratio','thevoice' ); ?></b></label>

                            <select name="twp_aspect_ratio">

                                <option <?php if( $twp_aspect_ratio == '' || $twp_aspect_ratio == 'global' ){ echo 'selected'; } ?> value="global"><?php esc_html_e('Global','thevoice'); ?></option>

                                <option <?php if( $twp_aspect_ratio == '' || $twp_aspect_ratio == 'default' ){ echo 'selected'; } ?> value="default"><?php esc_html_e('Default','thevoice'); ?></option>

                                <option <?php if( $twp_aspect_ratio == 'square' ){ echo 'selected'; } ?> value="square"><?php esc_html_e('Square','thevoice'); ?></option>

                                <option <?php if( $twp_aspect_ratio == 'portrait' ){ echo 'selected'; } ?> value="portrait"><?php esc_html_e('Portrait','thevoice'); ?></option>

                                <option <?php if( $twp_aspect_ratio == 'landscape' ){ echo 'selected'; } ?> value="landscape"><?php esc_html_e('Landscape','thevoice'); ?></option>

                            </select>

                        </div>

                    </div>

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Video Autoplay','thevoice'); ?></h3>

                        <?php $twp_video_autoplay = esc_attr( get_post_meta($post->ID, 'twp_video_autoplay', true) ); ?>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php esc_html_e( 'Video Autoplay','thevoice' ); ?></b></label>

                            <select name="twp_video_autoplay">

                                <option <?php if( $twp_video_autoplay == '' || $twp_video_autoplay == 'global' ){ echo 'selected'; } ?> value="global"><?php esc_html_e('Global','thevoice'); ?></option>

                                <option <?php if( $twp_video_autoplay == 'autoplay-enable' ){ echo 'selected'; } ?> value="autoplay-enable"><?php esc_html_e('Enable Autoplay','thevoice'); ?></option>

                                <option <?php if( $twp_video_autoplay == 'autoplay-disable' ){ echo 'selected'; } ?> value="autoplay-disable"><?php esc_html_e('Disable Autoplay','thevoice'); ?></option>


                            </select>

                        </div>

                    </div>

                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $thevoice_ed_post_views = esc_html( get_post_meta( $post->ID, 'thevoice_ed_post_views', true ) );
                    $thevoice_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'thevoice_ed_post_read_time', true ) );
                    $thevoice_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'thevoice_ed_post_like_dislike', true ) );
                    $thevoice_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'thevoice_ed_post_author_box', true ) );
                    $thevoice_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'thevoice_ed_post_social_share', true ) );
                    $thevoice_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'thevoice_ed_post_reaction', true ) );
                    $thevoice_ed_post_rating = esc_html( get_post_meta( $post->ID, 'thevoice_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','thevoice'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="thevoice-ed-post-views" name="thevoice_ed_post_views" value="1" <?php if( $thevoice_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="thevoice-ed-post-views"><?php esc_html_e( 'Disable Post Views','thevoice' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="thevoice-ed-post-read-time" name="thevoice_ed_post_read_time" value="1" <?php if( $thevoice_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="thevoice-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','thevoice' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="thevoice-ed-post-like-dislike" name="thevoice_ed_post_like_dislike" value="1" <?php if( $thevoice_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="thevoice-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','thevoice' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="thevoice-ed-post-author-box" name="thevoice_ed_post_author_box" value="1" <?php if( $thevoice_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="thevoice-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','thevoice' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="thevoice-ed-post-social-share" name="thevoice_ed_post_social_share" value="1" <?php if( $thevoice_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="thevoice-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','thevoice' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="thevoice-ed-post-reaction" name="thevoice_ed_post_reaction" value="1" <?php if( $thevoice_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="thevoice-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','thevoice' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="thevoice-ed-post-rating" name="thevoice_ed_post_rating" value="1" <?php if( $thevoice_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="thevoice-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','thevoice' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'thevoice_save_post_meta' );

if( ! function_exists( 'thevoice_save_post_meta' ) ):

    function thevoice_save_post_meta( $post_id ) {

        global $post, $thevoice_post_sidebar_fields, $thevoice_post_layout_options, $thevoice_header_overlay_options,  $thevoice_page_layout_options;

        if ( !isset( $_POST[ 'thevoice_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['thevoice_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $thevoice_post_sidebar_fields as $thevoice_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'thevoice_post_sidebar_option', true ) ); 
                $new = isset( $_POST['thevoice_post_sidebar_option'] ) ? thevoice_sanitize_sidebar_option_meta( wp_unslash( $_POST['thevoice_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'thevoice_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'thevoice_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? thevoice_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $thevoice_post_layout_options as $thevoice_post_layout_option ) {  
            
            $thevoice_post_layout_old = esc_html( get_post_meta( $post_id, 'thevoice_post_layout', true ) ); 
            $thevoice_post_layout_new = isset( $_POST['thevoice_post_layout'] ) ? thevoice_sanitize_post_layout_option_meta( wp_unslash( $_POST['thevoice_post_layout'] ) ) : '';

            if ( $thevoice_post_layout_new && $thevoice_post_layout_new != $thevoice_post_layout_old ){

                update_post_meta ( $post_id, 'thevoice_post_layout', $thevoice_post_layout_new );

            }elseif( '' == $thevoice_post_layout_new && $thevoice_post_layout_old ) {

                delete_post_meta( $post_id,'thevoice_post_layout', $thevoice_post_layout_old );

            }
            
        }



        foreach ( $thevoice_header_overlay_options as $thevoice_header_overlay_option ) {  
            
            $thevoice_header_overlay_old = esc_html( get_post_meta( $post_id, 'thevoice_header_overlay', true ) ); 
            $thevoice_header_overlay_new = isset( $_POST['thevoice_header_overlay'] ) ? thevoice_sanitize_header_overlay_option_meta( wp_unslash( $_POST['thevoice_header_overlay'] ) ) : '';

            if ( $thevoice_header_overlay_new && $thevoice_header_overlay_new != $thevoice_header_overlay_old ){

                update_post_meta ( $post_id, 'thevoice_header_overlay', $thevoice_header_overlay_new );

            }elseif( '' == $thevoice_header_overlay_new && $thevoice_header_overlay_old ) {

                delete_post_meta( $post_id,'thevoice_header_overlay', $thevoice_header_overlay_old );

            }
            
        }



        $thevoice_ed_feature_image_old = esc_html( get_post_meta( $post_id, 'thevoice_ed_feature_image', true ) ); 
        $thevoice_ed_feature_image_new = isset( $_POST['thevoice_ed_feature_image'] ) ? absint( wp_unslash( $_POST['thevoice_ed_feature_image'] ) ) : '';

        if ( $thevoice_ed_feature_image_new && $thevoice_ed_feature_image_new != $thevoice_ed_feature_image_old ){

            update_post_meta ( $post_id, 'thevoice_ed_feature_image', $thevoice_ed_feature_image_new );

        }elseif( '' == $thevoice_ed_feature_image_new && $thevoice_ed_feature_image_old ) {

            delete_post_meta( $post_id,'thevoice_ed_feature_image', $thevoice_ed_feature_image_old );

        }



        $thevoice_ed_post_views_old = esc_html( get_post_meta( $post_id, 'thevoice_ed_post_views', true ) ); 
        $thevoice_ed_post_views_new = isset( $_POST['thevoice_ed_post_views'] ) ? absint( wp_unslash( $_POST['thevoice_ed_post_views'] ) ) : '';

        if ( $thevoice_ed_post_views_new && $thevoice_ed_post_views_new != $thevoice_ed_post_views_old ){

            update_post_meta ( $post_id, 'thevoice_ed_post_views', $thevoice_ed_post_views_new );

        }elseif( '' == $thevoice_ed_post_views_new && $thevoice_ed_post_views_old ) {

            delete_post_meta( $post_id,'thevoice_ed_post_views', $thevoice_ed_post_views_old );

        }



        $thevoice_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'thevoice_ed_post_read_time', true ) ); 
        $thevoice_ed_post_read_time_new = isset( $_POST['thevoice_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['thevoice_ed_post_read_time'] ) ) : '';

        if ( $thevoice_ed_post_read_time_new && $thevoice_ed_post_read_time_new != $thevoice_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'thevoice_ed_post_read_time', $thevoice_ed_post_read_time_new );

        }elseif( '' == $thevoice_ed_post_read_time_new && $thevoice_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'thevoice_ed_post_read_time', $thevoice_ed_post_read_time_old );

        }



        $thevoice_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'thevoice_ed_post_like_dislike', true ) ); 
        $thevoice_ed_post_like_dislike_new = isset( $_POST['thevoice_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['thevoice_ed_post_like_dislike'] ) ) : '';

        if ( $thevoice_ed_post_like_dislike_new && $thevoice_ed_post_like_dislike_new != $thevoice_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'thevoice_ed_post_like_dislike', $thevoice_ed_post_like_dislike_new );

        }elseif( '' == $thevoice_ed_post_like_dislike_new && $thevoice_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'thevoice_ed_post_like_dislike', $thevoice_ed_post_like_dislike_old );

        }



        $thevoice_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'thevoice_ed_post_author_box', true ) ); 
        $thevoice_ed_post_author_box_new = isset( $_POST['thevoice_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['thevoice_ed_post_author_box'] ) ) : '';

        if ( $thevoice_ed_post_author_box_new && $thevoice_ed_post_author_box_new != $thevoice_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'thevoice_ed_post_author_box', $thevoice_ed_post_author_box_new );

        }elseif( '' == $thevoice_ed_post_author_box_new && $thevoice_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'thevoice_ed_post_author_box', $thevoice_ed_post_author_box_old );

        }



        $thevoice_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'thevoice_ed_post_social_share', true ) ); 
        $thevoice_ed_post_social_share_new = isset( $_POST['thevoice_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['thevoice_ed_post_social_share'] ) ) : '';

        if ( $thevoice_ed_post_social_share_new && $thevoice_ed_post_social_share_new != $thevoice_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'thevoice_ed_post_social_share', $thevoice_ed_post_social_share_new );

        }elseif( '' == $thevoice_ed_post_social_share_new && $thevoice_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'thevoice_ed_post_social_share', $thevoice_ed_post_social_share_old );

        }



        $thevoice_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'thevoice_ed_post_reaction', true ) ); 
        $thevoice_ed_post_reaction_new = isset( $_POST['thevoice_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['thevoice_ed_post_reaction'] ) ) : '';

        if ( $thevoice_ed_post_reaction_new && $thevoice_ed_post_reaction_new != $thevoice_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'thevoice_ed_post_reaction', $thevoice_ed_post_reaction_new );

        }elseif( '' == $thevoice_ed_post_reaction_new && $thevoice_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'thevoice_ed_post_reaction', $thevoice_ed_post_reaction_old );

        }



        $thevoice_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'thevoice_ed_post_rating', true ) ); 
        $thevoice_ed_post_rating_new = isset( $_POST['thevoice_ed_post_rating'] ) ? absint( wp_unslash( $_POST['thevoice_ed_post_rating'] ) ) : '';

        if ( $thevoice_ed_post_rating_new && $thevoice_ed_post_rating_new != $thevoice_ed_post_rating_old ){

            update_post_meta ( $post_id, 'thevoice_ed_post_rating', $thevoice_ed_post_rating_new );

        }elseif( '' == $thevoice_ed_post_rating_new && $thevoice_ed_post_rating_old ) {

            delete_post_meta( $post_id,'thevoice_ed_post_rating', $thevoice_ed_post_rating_old );

        }

        foreach ( $thevoice_page_layout_options as $thevoice_post_layout_option ) {  
        
            $thevoice_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'thevoice_page_layout', true ) ); 
            $thevoice_page_layout_new = isset( $_POST['thevoice_page_layout'] ) ? thevoice_sanitize_post_layout_option_meta( wp_unslash( $_POST['thevoice_page_layout'] ) ) : '';

            if ( $thevoice_page_layout_new && $thevoice_page_layout_new != $thevoice_page_layout_old ){

                update_post_meta ( $post_id, 'thevoice_page_layout', $thevoice_page_layout_new );

            }elseif( '' == $thevoice_page_layout_new && $thevoice_page_layout_old ) {

                delete_post_meta( $post_id,'thevoice_page_layout', $thevoice_page_layout_old );

            }
            
        }

        $thevoice_ed_header_overlay_old = absint( get_post_meta( $post_id, 'thevoice_ed_header_overlay', true ) ); 
        $thevoice_ed_header_overlay_new = isset( $_POST['thevoice_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['thevoice_ed_header_overlay'] ) ) : '';

        if ( $thevoice_ed_header_overlay_new && $thevoice_ed_header_overlay_new != $thevoice_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'thevoice_ed_header_overlay', $thevoice_ed_header_overlay_new );

        }elseif( '' == $thevoice_ed_header_overlay_new && $thevoice_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'thevoice_ed_header_overlay', $thevoice_ed_header_overlay_old );

        }

        $twp_aspect_ratio_old = esc_attr( get_post_meta( $post_id, 'twp_aspect_ratio', true ) );

        $twp_aspect_ratio_new = '';
        if( isset( $_POST['twp_aspect_ratio'] ) ){

            $twp_aspect_ratio_new = isset( $_POST['twp_aspect_ratio'] ) ? sanitize_text_field( wp_unslash( $_POST['twp_aspect_ratio'] ) ) : '';

        }

        if( $twp_aspect_ratio_new && $twp_aspect_ratio_new != $twp_aspect_ratio_old ){

            update_post_meta ( $post_id, 'twp_aspect_ratio', $twp_aspect_ratio_new );

        }elseif( '' == $twp_aspect_ratio_new && $twp_aspect_ratio_old ) {

            delete_post_meta( $post_id,'twp_aspect_ratio', $twp_aspect_ratio_old );

        }

        $twp_video_autoplay_old = esc_attr( get_post_meta( $post_id, 'twp_video_autoplay', true ) );

        $twp_video_autoplay_new = '';
        if( isset( $_POST['twp_video_autoplay'] ) ){

            $twp_video_autoplay_new = isset( $_POST['twp_video_autoplay'] ) ? sanitize_text_field( wp_unslash( $_POST['twp_video_autoplay'] ) ) : '';

        }

        if( $twp_video_autoplay_new && $twp_video_autoplay_new != $twp_video_autoplay_old ){

            update_post_meta ( $post_id, 'twp_video_autoplay', $twp_video_autoplay_new );

        }elseif( '' == $twp_video_autoplay_new && $twp_video_autoplay_old ) {

            delete_post_meta( $post_id,'twp_video_autoplay', $twp_video_autoplay_old );

        }
        
    }

endif;   