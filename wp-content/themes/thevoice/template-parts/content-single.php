<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage TheVoice
 * @since 1.0.0
 */

$thevoice_default = thevoice_get_default_theme_options();
$thevoice_post_layout = esc_html( get_post_meta( get_the_ID(), 'thevoice_post_layout', true ) );
$thevoice_ed_feature_image = esc_html( get_post_meta( get_the_ID(), 'thevoice_ed_feature_image', true ) );

if( is_page() ){

	$thevoice_post_layout = get_post_meta(get_the_ID(), 'thevoice_page_layout', true);
	
}
if( $thevoice_post_layout == '' || $thevoice_post_layout == 'global-layout' ){
    
    $thevoice_post_layout = get_theme_mod( 'thevoice_single_post_layout',$thevoice_default['thevoice_single_post_layout'] );

}
	
	thevoice_disable_post_views();
thevoice_disable_post_like_dislike();

$thevoice_ed_post_views = esc_html( get_post_meta( get_the_ID(), 'thevoice_ed_post_views', true ) );
$thevoice_ed_post_read_time = esc_html( get_post_meta( get_the_ID(), 'thevoice_ed_post_read_time', true ) );
$thevoice_ed_post_author_box = esc_html( get_post_meta( get_the_ID(), 'thevoice_ed_post_author_box', true ) );
$thevoice_ed_post_social_share = esc_html( get_post_meta( get_the_ID(), 'thevoice_ed_post_social_share', true ) );
$thevoice_ed_post_reaction = esc_html( get_post_meta( get_the_ID(), 'thevoice_ed_post_reaction', true ) );

if( $thevoice_ed_post_read_time ){ thevoice_disable_post_read_time(); }
if( $thevoice_ed_post_author_box ){ thevoice_disable_post_author_box(); }
if( $thevoice_ed_post_reaction ){ thevoice_disable_post_reaction(); }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

	<?php

	if( empty( $thevoice_ed_feature_image ) && $thevoice_post_layout != 'layout-2' ){ ?>

		<div class="post-thumbnail">

			<?php thevoice_post_thumbnail(); ?>
			
		</div>

	<?php
	}

	if ( is_singular() && $thevoice_post_layout != 'layout-2' ) { ?>

		<header class="entry-header">

			<?php
			if ( 'post' === get_post_type() ) { ?>

				<div class="entry-meta">

					<?php thevoice_entry_footer( $cats = true, $tags = false, $edits = false, $text = false, $icon = false ); ?>

				</div>

			<?php  } ?>

			<h1 class="entry-title entry-title-large">

	            <?php the_title(); ?>

	        </h1>

		</header>

	<?php }

	if ( $thevoice_post_layout != 'layout-2' && is_single() && 'post' === get_post_type() ) { ?>

		<div class="entry-meta">

			<?php
			thevoice_posted_by();
			if( !$thevoice_ed_post_views ){ thevoice_post_view_count(); }
			?>

		</div>

	<?php  } ?>
	
	<div class="post-content-wrap">

		<?php if( is_singular() && empty( $thevoice_ed_post_social_share ) && class_exists( 'Booster_Extension_Class' ) && 'post' === get_post_type() ){ ?>

			<div class="post-content-share">
				<?php echo do_shortcode('[booster-extension-ss layout="layout-1" status="enable"]'); ?>
			</div>

		<?php } ?>

		<div class="post-content">

			<div class="entry-content">

				<?php

				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'thevoice' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				if( !class_exists('Booster_Extension_Class') || is_page() ):

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'thevoice'),
                        'after' => '</div>',
                    ));

                endif; ?>

			</div>

			<?php
			if ( is_singular() && 'post' === get_post_type() ) { ?>

				<div class="entry-footer">

                    <div class="entry-meta">
                         <?php thevoice_post_like_dislike(); ?>
                    </div>

                    <div class="entry-meta">
                        <?php thevoice_entry_footer( $cats = false, $tags = true, $edits = true ); ?>
                    </div>

				</div>

			<?php } ?>

		</div>

	</div>

</article>