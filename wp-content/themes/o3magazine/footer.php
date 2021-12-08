<?php

/**

 * The template for displaying the footer

 *

 * Contains the closing of the "site-content" div and all content after.

 *

 * @package WordPress

 * @subpackage o3magazine

 * @since o3magazine 1.0

 */

?>



<!-- Old Footer Start -->

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="site-info">
			<?php
				/**
				 * Fires before the o3magazine footer text for footer customization.
				 *
				 * @since o3magazine 1.0
				 */
				//do_action( 'o3magazine_credits' );
			?>
			<?php //printf( __( 'Theme: o3magazine', 'o3magazine' )); ?>
			<?php printf( __("Theme by <a href='http://www.o3magazine.com/' title='o3magazine' target='_blank'>o3magazine</a>"));?>
		</div> 
	</footer>

<?php wp_footer(); ?>

</body>

</html>

