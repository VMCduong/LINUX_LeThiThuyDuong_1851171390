<?php
/**
 * Enqueue scripts and styles.
 */
function blog_starter_scripts() {

	wp_enqueue_style( 'blog-starter-style', get_stylesheet_uri() );
	//Fonts
	$body_font = esc_html(get_theme_mod('blog_starter_body_fonts', 'Roboto+Slab:wght@100;200;300;400;500;600;700;800;900'));
	wp_enqueue_style( 'blog-starter-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );
	$body_font_size = esc_html(get_theme_mod('blog_starter_body_fonts_size', 16));
	$body_font_weight = esc_html(get_theme_mod('blog_starter_body_fonts_weight', 400));
	$body_font_line_height = esc_html(get_theme_mod('blog_starter_body_fonts_line_height', 28));
	// var_dump($body_font);
	$body_font_pieces = explode(":", $body_font);
	// var_dump($body_font_pieces);
	//Output all the style
	$primarycolor = sanitize_hex_color(get_theme_mod( 'base_color', '#f39745' ));
	$header_height = absint( get_theme_mod( 'header_height', 120 ) / 16 );
	$data = '
	@media only screen and (min-width: 768px) {
		#cssmenu>ul>li>a:hover,#cssmenu>ul>li.current_page_item>a, #cssmenu>ul>li>a:hover:after, #cssmenu>ul>li.current-menu-item>a:hover:after, #cssmenu>ul>li.current_page_item>a:hover:after, #cssmenu ul ul li a:hover{
	    	color: '.$primarycolor.' !important;
		}
	}
	.logo-area{
		min-height: '.$header_height.'rem;
	}
	.blog-starter-credit {
	    position: absolute !important;
	    left: 50% !important;
	    visibility: visible !important;
	    width: 15px !important;
	    height: 15px !important;
	    opacity: 1 !important;
	    z-index: 1 !important;
	    top: calc(50% - 9.5px);
	}
	.blog-starter-credit span {
	    font-size: 0;
	}
	.blog-starter-credit a, .blog-starter-credit a:hover {
	    color: #f39745 ;
	    cursor: pointer ;
	    opacity: 1 ;
	}
	body.border_and_box_shadow_hide .footer-area.section-padding, body.border_and_box_shadow_hide footer#colophon, body.border_and_box_shadow_hide .widget, body.border_and_box_shadow_hide .blog-post-section article, body.border_and_box_shadow_hide .archive-page-section article, body.border_and_box_shadow_hide .menu-area, body.border_and_box_shadow_hide .site-topbar-area {
	    border: 0 !important;
	    box-shadow: none !important;
	}
	.readmore a,.btn.btn-warning, input[type="submit"], button[type="submit"], span.edit-link a, .comment-form button.btn.btn-primary, .banner-button a, table#wp-calendar #today, ul.pagination li .page-numbers, .woocommerce ul.products li.product .button:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce span.onsale, .header-three .social-link-top a:hover, .header-three-search .search-popup>div, .mini-shopping-cart-inner #minicarcount, .active-subfeatured-slider .owl-nav button.owl-next,.active-subfeatured-slider .owl-nav button.owl-prev, .featured-main-slider .owl-nav button.owl-prev, .featured-main-slider .owl-nav button.owl-next, .related-post-sldider .owl-nav button.owl-next, .related-post-sldider .owl-nav button.owl-prev, .sticky:before, .post-gallery .owl-nav button.owl-next, .post-gallery .owl-nav button.owl-prev, .scrooltotop a:hover, .blog-starter-standard-post__posted-date .posted-on a, .page-numbers li a, .page-numbers li span, .blog-starter-single-page .entry-footer a, .blog-starter-standard-post__readmore a, .single-post-navigation .postarrow{
		background-color: '.esc_attr( $primarycolor ).';
	}
	.blog-meta ul li span.fa, .static_icon a, .site-info a, #cssmenu.light ul li a:hover, .social-link-top a:hover, .footer-menu ul li a:hover, #cssmenu.light ul li a:hover:after, a:hover, a:focus, a:active, .post-title a:hover h2, .post-title a:hover h4, #cssmenu.light li.current_page_item a, li.current_page_item a, .author-social-link a, .post-title a:hover h3, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .tagcloud a:hover, .blog-starter-standard-post__categories > span.cat-links a, .page-banner-area .breadcrumb a, .blog-starter-standard-post.sticky:before, .blog-starter-standard-post__blog-meta .fa, .featured-area .blog-starter-featured-slider__post-title a:hover h2, .featured-area .blog-starter-featured-slider__categories > span.cat-links a, .comments-area ol.comment-list .single-comment .reply a:hover{
		color: '.esc_attr( $primarycolor ).';
	}
	input[type="submit"], button[type="submit"], .title-parent, blockquote{
		border-color: '.esc_attr( $primarycolor ).';
	}
	body, button, input, select, textarea {
		font-family: ' . $body_font_pieces[0] .';
		font-size: '.$body_font_size.'px;
		font-weight: '.$body_font_weight.';
		line-height: '.$body_font_line_height.'px;
	}
	';

	$stickyheader = get_theme_mod( 'sticky_header', false );
	if (true == $stickyheader) {
		$data .= '
			.menu-area.sticky-menu {
			    background: #fff;
			    position: fixed;
			    width: 100%;
			    left: 0;
			    top: 0;
			    z-index: 55;
			    transition: .6s;
			    margin: 0;
			}
			.site.boxlayout .menu-area.sticky-menu {
			    width: calc(100% - 200px);
			    left: 100px;
			}
		';
	}
	wp_add_inline_style( 'blog-starter-style', $data );
	wp_enqueue_script('masonry');
	wp_enqueue_script( 'imagesloaded.pkgd', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'blog-starter-menu', get_template_directory_uri() . '/assets/js/menu.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'blog-starter-active', get_template_directory_uri() . '/assets/js/z_active.js', array( 'jquery' ), '1.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'blog_starter_scripts' );


add_action( 'admin_enqueue_scripts', 'blog_starter_admin_enqueue_script', 10 );

function blog_starter_admin_enqueue_script(){

}