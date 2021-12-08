<?php
/**
 * Latest Posts
 *
 * @package TheVoice
 */
if( !function_exists('thevoice_latest_blocks') ):
    
    function thevoice_latest_blocks($thevoice_home_section, $repeat_times){

        global $post;
        $thevoice_default = thevoice_get_default_theme_options();
        $sidebar = esc_attr( get_theme_mod( 'global_sidebar_layout', $thevoice_default['global_sidebar_layout'] ) );
        

        if( is_single() || is_page() ){

            $thevoice_post_sidebar = esc_attr( get_post_meta( $post->ID, 'thevoice_post_sidebar_option', true ) );
            if( $thevoice_post_sidebar == 'global-sidebar' || empty( $thevoice_post_sidebar ) ){

                $sidebar = $sidebar;
            }else{
                $sidebar = $thevoice_post_sidebar;
            }

        }

        $thevoice_archive_layout = esc_attr( get_theme_mod( 'thevoice_archive_layout', $thevoice_default['thevoice_archive_layout'] ) ); ?>

        <div id="block-<?php echo esc_attr( $repeat_times ); ?>" class="theme-block theme-block-archive">
            <div class="wrapper">
                <div class="column-row">

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            
                            <?php
                            if( !is_front_page() ) {
                                thevoice_breadcrumb();
                            }

                            if( have_posts() ): ?>

                                <div class="article-wraper archive-layout <?php echo 'archive-layout-' . esc_attr( $thevoice_archive_layout ); ?>">
                                    <?php while (have_posts()) :
                                        the_post();

                                        if( !is_page() ){

                                            if( get_post_format() == 'video' ){

                                                $video_autoplay = esc_attr( get_post_meta(get_the_ID(), 'twp_video_autoplay', true) );
                                                if( $video_autoplay == '' || $video_autoplay == 'global' ){

                                                    $video_autoplay = isset($thevoice_home_section->section_video_autoplay) ? $thevoice_home_section->section_video_autoplay : '';
                                                    if( $video_autoplay == '' || $video_autoplay == 'global' ){
                                                        $video_autoplay = get_theme_mod( 'ed_autoplay', $thevoice_default['ed_autoplay'] );
                                                    }

                                                }

                                                $ratio_value = get_post_meta( get_the_ID(), 'twp_aspect_ratio', true );
                                                if( $ratio_value == '' || $ratio_value == 'global' ){
                                                    
                                                    $ratio_value = isset( $thevoice_home_section->section_video_ratio ) ? $thevoice_home_section->section_video_ratio : '';

                                                    if( $ratio_value == '' || $ratio_value == 'global' ){
                                                        $ratio_value = get_theme_mod( 'post_video_aspect_ration', $thevoice_default['post_video_aspect_ration'] );
                                                    }

                                                }

                                                thevoice_video_content_render( $class1 = 'post', $class2 = 'video-id', $class3 = 'video-main-wraper', $ratio_value, $video_autoplay );
                                                
                                            }else{

                                                get_template_part( 'template-parts/content', get_post_format() );

                                            }
                                            
                                        }else{
                                            get_template_part('template-parts/content', 'single');
                                        }


                                    endwhile; ?>
                                </div>

                                <?php if( !is_page() ): do_action('thevoice_archive_pagination'); endif;

                            else :

                                get_template_part('template-parts/content', 'none');

                            endif; ?>
                        </main><!-- #main -->
                    </div>

                    <?php if( $sidebar != 'no-sidebar' ){

                        get_sidebar();
                        
                    } ?>

                </div>
            </div>
        </div>

    <?php
    }
    
endif;
