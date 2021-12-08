<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blog Starter
 */
get_header();
?>
	<section id="primary" class="content-area archive-page-section">
		<main id="main" class="site-main">
			<div class="container">
                <?php
                do_action('blog_starter_start_sidebar_wrapper');
                if ( have_posts() ) :
                   ?>
                   <header class="archive-page-header">
                        <h1 class="page-title">
                            <?php
                            /* translators: %s: search query. */
                            printf( esc_html__( 'Search Results for: %s', 'blog-starter' ), '<span>' . get_search_query() . '</span>' );
                            ?>
                        </h1>
                    </header><!-- .page-header -->
                    <?php
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
                        
                            get_template_part('template-parts/content/content', 'search');
                        
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
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php get_footer(); ?>
