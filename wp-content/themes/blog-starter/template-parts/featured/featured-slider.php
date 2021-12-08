<?php 
/**
 * The template for displaying featured slider. 
 *  @package Blog Starter
 */
$args = array(
	'posts_per_page' => 5,
	'post_type'	=>	array('post'),
);
$featured_post = new WP_Query($args);
if ($featured_post->have_posts()):

?>
<section class="featured-slider-area">
	<div class="featured-slider__active owl-carousel">
		<?php while ($featured_post->have_posts()) :
			$featured_post->the_post();
			$has_post_thumbnail = ' no-post-thumbnail';
			if (has_post_thumbnail()) {
				$has_post_thumbnail = ' has-post-thumbnail';
			}
			?>
		<div class="featured-slider__single-item">

			<div class="featured-slider__thumbnail<?php echo esc_attr($has_post_thumbnail);?>">
				<?php the_post_thumbnail('blog-starter-thumbnail-featured'); ?>
			</div>
			<div class="featured-slider__content">
				<div class="container">
					<div class="featured-slider__category">
						<?php blog_starter_categories(); ?>
					</div>
					<div class="featured-slider__title">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</div>
					<div class="featured-slider__excerpt">
						<p><?php echo esc_html(  blog_starter_get_excerpt(300) ); ?></p>
					</div>
					<div class="featured-slider__post-meta">
						<?php blog_starter_posted_by(true);?>
						<?php blog_starter_posted_on();?>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</section>
<?php endif; wp_reset_postdata(); ?>