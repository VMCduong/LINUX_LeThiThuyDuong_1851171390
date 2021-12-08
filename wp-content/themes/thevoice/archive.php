<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage TheVoice
 * @since 1.0.0
 */
get_header();

    $thevoice_default = thevoice_get_default_theme_options();
    $sidebar = esc_attr( get_theme_mod( 'global_sidebar_layout', $thevoice_default['global_sidebar_layout'] ) );
    $thevoice_archive_layout = esc_attr( get_theme_mod( 'thevoice_archive_layout', $thevoice_default['thevoice_archive_layout'] ) ); ?>

    <div class="theme-block theme-block-archive">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        
                        <?php
                        if( have_posts() ): ?>

                            <div class="article-wraper archive-layout <?php echo 'archive-layout-' . esc_attr( $thevoice_archive_layout ); ?>">

                                <?php while( have_posts() ):
                                    the_post();

                                    if( get_post_format() == 'video' ){

                                        $video_autoplay = esc_attr( get_post_meta(get_the_ID(), 'twp_video_autoplay', true) );
                                        if( $video_autoplay == '' || $video_autoplay == 'global' ){

                                            $video_autoplay = get_theme_mod( 'ed_autoplay', $thevoice_default['ed_autoplay'] );

                                        }

                                        $ratio_value = get_post_meta( get_the_ID(), 'twp_aspect_ratio', true );

                                        if( $ratio_value == '' || $ratio_value == 'global' ){
                                            $ratio_value = get_theme_mod( 'post_video_aspect_ration', $thevoice_default['post_video_aspect_ration'] );
                                        }

                                        thevoice_video_content_render( $class1 = 'post', $class2 = 'video-id', $class3 = 'video-main-wraper', $ratio_value, $video_autoplay );
                                        
                                    }else{

                                        get_template_part( 'template-parts/content', get_post_format() );

                                    }

                                endwhile; ?>

                            </div>

                            <?php do_action('thevoice_archive_pagination');

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
get_footer();
