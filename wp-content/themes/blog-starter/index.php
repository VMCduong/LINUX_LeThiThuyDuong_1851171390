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
 * @package Blog Starter
 */

get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
<?php
$show_featured_section = get_theme_mod( 'featured_section_on_off', false );
if (true === $show_featured_section) :
    get_template_part('template-parts/featured/featured', 'slider');
endif;
?>
    <div class="blog-post-section">
        <div class="container">
            <?php
            do_action('blog_starter_start_sidebar_wrapper');
            if ( have_posts() ) :
                echo '<div class="row masonaryactive">';
                /* Start the Loop */
                while (have_posts()) :
                    the_post();
                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                   $grid_column = get_theme_mod( 'grid_column', 'col-sm-6' );
                    if ($grid_column === 'col-sm-6') {
                        $grid_column = 'col-lg-6 col-md-12';
                    }elseif ($grid_column === 'col-sm-4') {
                        $grid_column = 'col-sm-12 col-md-6 col-lg-4';
                    }elseif ($grid_column === 'col-sm-3') {
                        $grid_column = 'col-sm-12 col-md-6 col-lg-3';
                    }

                    echo '<div class="'.esc_attr($grid_column).' blog-grid-layout">';

                        get_template_part('template-parts/content/content', get_post_type());

                    echo '</div>';

                endwhile;

                echo '</div>';
                    $next_icon = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
                    $prev_icon = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
                    $pagination_alignment = get_theme_mod('blog_page_pagination', 'center');
                    echo '<div class="pagination-'.esc_attr($pagination_alignment).'">';
                        the_posts_pagination(
                            array(
                                'mid_size'  => 2,
                                'prev_text' => $prev_icon,
                                'next_text' => $next_icon,
                            )
                        );
                    echo '</div>';
            else :
                get_template_part('template-parts/content/content', 'none');
            endif;
            do_action('blog_starter_end_sidebar_wrapper');
            ?>
            </div> <!-- End Container -->
        </div> <!-- End Section Div -->
    </main><!-- #main -->
</div>
<?php
get_footer();
