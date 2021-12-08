<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog Starter
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-starter-standard-post' ); ?>>
	<div class="blog-starter-standard-post__entry-content text-left">
		<div class="blog-starter-standard-post__thumbnail post-header">
			<?php blog_starter_post_thumbnail();?> 
		</div>
		<div class="blog-starter-standard-post__blog-meta">
			<?php blog_starter_categories(); ?>
			<?php blog_starter_posted_by(true);?>
			<?php blog_starter_posted_on();?>
		</div>

		<div class="blog-starter-standard-post__post-title">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="blog-starter-standard-post__full-summery text-left">
			<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blog-starter' ),
						'after'  => '</div>',
					)
				); 
			?>
		</div>
		<?php if (has_tag()): ?>
		<div class="d-flex justify-content-between blog-starter-standard-post__share-wrapper">
			<div class="blog-starter-standard-post__tags align-self-center">
				<?php blog_starter_post_tag(); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="post-author d-flex mb-5">
		<div class="author-image">
			<?php
			echo get_avatar( get_the_author_meta( 'ID' ), 200, '', '', null );
			?>
		</div>
		<div class="author-about">
			<h4><?php echo esc_html(get_the_author_meta( 'nickname' )); ?></h4>
			<p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
			<p class="author-social"><?php //minimalblogpro_author_social_link(); ?></p>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
