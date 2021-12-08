<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog Starter
 */
?>

</div><!-- #content -->

<?php

$getfooter_column = get_theme_mod( 'footer_column', 'four' );
$footerlayout = 'four';
if ('four' === $getfooter_column) {
	$footerlayout = 'four';
}elseif ('two' === $getfooter_column) {
	$footerlayout = 'two';
}
get_template_part( 'template-parts/footer/footer', $footerlayout );

?>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 align-self-center">
					<div class="site-info text-center">
						<?php
						echo wp_kses_post( get_theme_mod('copyright_text', __( 'Copyright © 2021 All Rights Reserved.', 'blog-starter' )) );
						esc_html_e('Powered by', 'blog-starter'); ?> <a href="<?php echo esc_url('https://adazing.com');?>"><?php esc_html_e( 'Adazing', 'blog-starter' );?></a>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
	<div class="scrooltotop">
		<a href="#" class="fa fa-angle-up"></a>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
