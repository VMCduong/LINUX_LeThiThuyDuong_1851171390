<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog Starter
 */

$get_blog_layout = get_theme_mod('blog_layout', 'grid');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-starter-standard-post' ); ?>>
	<div class="blog-starter-standard-post__entry-content text-left">
		<div class="blog-starter-standard-post__thumbnail post-header">
			<?php the_post_thumbnail( 'full' );
			?> 
		</div>
		<div class="blog-starter-standard-post__blog-meta">
			<?php
			blog_starter_categories();
			blog_starter_posted_by(true);
			if ('list' === $get_blog_layout) {
				blog_starter_posted_on();
			}
			?>
		</div>
		<div class="blog-starter-standard-post__post-title">
			<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
		</div>
		<div class="blog-starter-standard-post__excerpt">
			<?php echo esc_html(blog_starter_get_excerpt(150)); ?>
		</div>
		<?php if ('list' === $get_blog_layout): ?>
			<div class="blog-starter-standard-post__readmore">
				<?php
				$get_read_more_text = get_theme_mod( 'readmore_text', __( 'Read More', 'blog-starter' ) );
				 ?>
				<a href="<?php the_permalink(); ?>"><?php echo esc_html($get_read_more_text); ?></a>
			</div>
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
