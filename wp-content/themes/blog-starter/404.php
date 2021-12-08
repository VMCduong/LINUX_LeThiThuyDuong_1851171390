<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blog Starter
 */
get_header();
/**
 * Blog Page Sidebar Control
 */
$getblogsidebar = get_theme_mod( 'blog_page_sidebar', 'right' );
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
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="<?php echo esc_attr( $blogcontent );?>">
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'blog-starter' ); ?></h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'blog-starter' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</div>
				<?php if ($sidebarshow === true) :?>
                        <div class="<?php echo esc_attr( $blogsidebar );?>">
                            <?php get_sidebar(); ?>
                        </div>
                    <?php endif; ?>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
