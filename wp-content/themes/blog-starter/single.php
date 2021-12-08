<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blog Starter
 */
get_header();

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<?php
				 do_action('blog_starter_start_sidebar_wrapper');
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', 'single' );
					// the_post_navigation();
				endwhile; // End of the loop.
				$post_navigation_show = get_theme_mod('post_navigation_show', true);
				if(true === $post_navigation_show) :
					?>
					<div class="d-flex single-post-navigation justify-content-between">
						<div class="previous-post">
							<div class="postarrow"><i class="fa fa-long-arrow-left"></i><?php echo esc_html_e( 'Previous Post', 'blog-starter' ); ?></div>
							<?php echo wp_kses_post( get_previous_post_link('%link') );?>
						</div>
						<div class="next-post">
							<div class="postarrow"><?php echo esc_html_e( 'Next Post', 'blog-starter' ); ?><i class="fa fa-long-arrow-right"></i></div>
							<?php echo wp_kses_post(get_next_post_link('%link')); ?>
						</div>
					</div>
					<?php
				endif;
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				do_action('blog_starter_end_sidebar_wrapper');
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
