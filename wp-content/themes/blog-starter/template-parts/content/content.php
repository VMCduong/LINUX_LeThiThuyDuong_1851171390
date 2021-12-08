<?php
/**
 * Template part for displaying posts
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
			<?php blog_starter_post_thumbnail();?>
		</div>
		<div class="blog-starter-standard-post__blog-meta">
			<?php
			blog_starter_categories();
			blog_starter_posted_by(true);
			blog_starter_posted_on();
			?>
		</div>
		<div class="blog-starter-standard-post__post-title">
			<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
		</div>
		<div class="blog-starter-standard-post__excerpt">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
