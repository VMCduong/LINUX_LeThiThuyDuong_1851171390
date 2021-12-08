<?php
/**
 * Free Vs Pro Panel.
 *
 * @package blog_starter
 */
?>
<!-- Free Vs Pro panel -->
<div id="free-pro-panel" class="panel-left">
	<div class="panel-aside">               		
		<img src="<?php echo esc_url( get_template_directory_uri() . '/inc/getting-started/images/free-vs-pro.jpg' ); ?>" alt="<?php esc_attr_e( 'Free vs Pro', 'blog-starter' ); ?>"/>
		<a class="button button-primary" href="<?php echo esc_url( 'https://theimran.com/themes/wordpress-theme/blog-starter-pro-personal-blog-wordpress-theme/' ); ?>" title="<?php esc_attr_e( 'View Premium Version', 'blog-starter' ); ?>" target="_blank">
            <?php esc_html_e( 'View Pro', 'blog-starter' ); ?>
        </a>
	</div><!-- .panel-aside -->
</div>