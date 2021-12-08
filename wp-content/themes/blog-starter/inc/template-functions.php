<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blog Starter
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blog_starter_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	$classes[] = 'preloader-wrapper';
	$get_border_box_shadow = get_theme_mod( 'border_box_shadow_show_hide', true );

	if (false == $get_border_box_shadow) {
		$classes[] = 'border_and_box_shadow_hide';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'blog_starter_body_classes' );
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function blog_starter_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blog_starter_pingback_header' );


if ( ! function_exists( 'blog_starter_comment_list' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since Shape 1.0
	 */
	function blog_starter_comment_list( $comment, $args, $depth ) {

		extract( $args, EXTR_SKIP );

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>
  <<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		<?php if ( 'div' == $args['style'] ) : ?>
  <div id="div-comment-<?php comment_ID(); ?>" class="comment-body review-list">
	<?php endif; ?>
	<div class="single-comment">
		<div class="commenter-image">
			<?php
			if ( 0 != $args['avatar_size'] ) {
				echo get_avatar( $comment, $args['avatar_size'] );}
			?>
		</div>
		<div class="commnenter-details">
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'blog-starter' ); ?></em>
			<br />
		<?php endif; ?>
			<div class="comment-meta">
				<h4><?php printf( wp_kses_post( '%s', 'blog-starter' ), sprintf( '%s', get_comment_author_link() ) ); ?></h4>
				<div class="comment-time">
					<p>
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php
								echo esc_html(get_comment_date() . ' ');
								echo esc_html(get_comment_time());
							?>
						</time>
					</p>
				</div>
			</div>

				<?php comment_text(); ?>
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						)
					)
				);
				?>
		</div>
	</div>
		<?php if ( 'div' == $args['style'] ) : ?>
  </div>
			<?php
  endif;

	}
endif; // ends check for blog_starter_comment_list()

/**
 * Excerpt Length
 */

function blog_starter_get_excerpt($limit, $source = null){
    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    return $excerpt;
}

/**
 * blog_starter Breadcrumbs
 */
if (!function_exists('blog_starter_bredcrumbs')) {
	function blog_starter_bredcrumbs(){
		?>
		<nav>
            <div class="breadcrumb">
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
                ?>
            </div>
        </nav>
		<?php
	}
}
/**
 * Author VCard
 */
function blog_starter_author_vcard(){
	?>
	<div class="author-vcard">
		<div class="author-vcard__image">
			<?php
			echo get_avatar( get_the_author_meta( 'ID' ), 100, '', '', null );
			?>
		</div>
		<div class="author-vcard__about">
			<h4><?php echo esc_html(get_the_author_meta( 'nickname' )); ?></h4>
			<p><?php echo wp_kses_post(get_the_author_meta( 'description' )); ?></p>
			<p><?php
			$userpost_count = count_user_posts( get_the_author_meta( 'ID' ), 'post', false );
			if ($userpost_count > 1) {
				$numberingtext = 'posts';
			}else{
				$numberingtext = 'post';
			}
			$userposts = esc_html__( 'the user has only %1$s %2$s', 'blog-starter' );
			printf( $userposts , $userpost_count, $numberingtext );
			 ?></p>
		</div>
	</div>
	<?php
	return;
}

/**
 * Adding Getting Started Page in admin menu
 */
function blog_starter_admin_notice() {
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'blog-starter-update-notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();


        if ( is_network_admin() ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        } ?>
        <div class="welcome-message notice notice-info">
            <div class="notice-wrapper">
                <div class="notice-text">
                    <h3><?php esc_html_e( 'Congratulations!', 'blog-starter' ); ?></h3>
                    <p><?php printf( __( '%1$s is now installed and ready to use. Click below to see theme documentation, plugins to install and other details to get started.', 'blog-starter' ), esc_html( $name ) ) ; ?></p>
                    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=blog-starter-getting-started' ) ); ?>" class="button button-primary" style="text-decoration: none;"><?php esc_html_e( 'Go to the getting started.', 'blog-starter' ); ?></a>
                    <a href="<?php echo esc_url( 'https://theimran.com/blog-starter-pro-and-free-wordpress-theme-documentation/' ); ?>" class="button button-primary" target="_blank" style="text-decoration: none;"><?php esc_html_e( 'Watch Video Tutorial About Customizing Pro Version. ', 'blog-starter' ); ?></a></p>
                    <p class="dismiss-link"><strong><a href="?blog-starter-update-notice=1"><?php esc_html_e( 'Dismiss','blog-starter' ); ?></a></strong></p>
                </div>
            </div>
        </div>
    <?php
}

add_action( 'admin_notices', 'blog_starter_admin_notice' );

if( ! function_exists( 'blog_starter_ignore_admin_notice' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function blog_starter_ignore_admin_notice() {

    /* If user clicks to ignore the notice, add that to their user meta */
    if ( isset( $_GET['blog-starter-update-notice'] ) && $_GET['blog-starter-update-notice'] = '1' ) {

        update_option( 'blog-starter-update-notice', true );
    }
}
endif;
add_action( 'admin_init', 'blog_starter_ignore_admin_notice' );

/**
 * Blog Starter Sidebar Control
 */
function blog_starter_sidebar_control_start(){
	if (is_single()) {
		$getblogsidebar = get_theme_mod( 'single_page_sidebar', 'right' );
	}else{
		$getblogsidebar = get_theme_mod( 'blog_page_sidebar', 'right' );
	}
	$blogsidebar = 'col-md-5 col-lg-4 order-1';
	$blogcontent = 'col-md-7 col-lg-8 order-0';
	$sidebarshow = true;

	if ($getblogsidebar === 'right') {
	    $blogsidebar = 'col-md-5 col-lg-4 order-1';
	    $blogcontent = 'col-md-7 col-lg-8 order-0';
	    $sidebarshow = true;
	}elseif ($getblogsidebar === 'left') {
	    $blogsidebar = 'col-md-5 col-lg-4 order-0';
	    $blogcontent = 'col-md-7 col-lg-8 order-1';
	    $sidebarshow = true;
	}elseif($getblogsidebar === 'no'){
	    $blogsidebar = 'sidebar-hide';
	    $blogcontent = 'col-md-12';
	    $sidebarshow = false;
	}else{
	    $blogsidebar = 'col-md-5 col-lg-4 order-1';
	    $blogcontent = 'col-md-7 col-lg-8 order-0';
	}
	if (is_single()) {
    	$blogcontent .= 'post-details-page';
	}
	?>
	 <div class="row">
        <div class="<?php echo esc_attr( $blogcontent );?>">

	<?php
}
add_action('blog_starter_start_sidebar_wrapper', 'blog_starter_sidebar_control_start');
function blog_starter_sidebar_control_end(){
	if (is_single()) {
		$getblogsidebar = get_theme_mod( 'single_page_sidebar', 'right' );
	}else{
		$getblogsidebar = get_theme_mod( 'blog_page_sidebar', 'right' );
	}
	$blogsidebar = 'col-md-5 col-lg-4 order-1';
	$sidebarshow = true;
	if ($getblogsidebar === 'right') {
	    $blogsidebar = 'col-md-5 col-lg-4 order-1';
	    $sidebarshow = true;
	}elseif ($getblogsidebar === 'left') {
	    $blogsidebar = 'col-md-5 col-lg-4 order-0';
	    $sidebarshow = true;
	}elseif($getblogsidebar === 'no'){
	    $blogsidebar = 'sidebar-hide';
	    $sidebarshow = false;
	}else{
	    $blogsidebar = 'col-md-5 col-lg-4 order-1';
	}

	?>
	</div>
        <?php if ($sidebarshow === true) :?>
            <div class="<?php echo esc_attr( $blogsidebar );?>">
                <?php get_sidebar(); ?>
            </div>
        <?php endif; ?>
    </div>
	<?php
}

add_action('blog_starter_end_sidebar_wrapper', 'blog_starter_sidebar_control_end');