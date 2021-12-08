	<header id="masthead" class="site-header header-one" style="background-image: url(<?php echo esc_url( get_header_image());?>);">
		<?php
		$gettopbar	= get_theme_mod( 'topbar_section_on_off', false );
		if (true == $gettopbar) :
		 ?>
		<div class="site-topbar-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="topbar-search-form">
							<?php get_search_form(); ?>
						</div>
					</div>
					<div class="col-sm-8 text-right">
						<div class="social-link-top">
						<?php blog_starter_social_activity();?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="logo-area site-header">
		<div class="container">
			<div class="row justify-content-start">
				<div class="col-md-12 text-center">
					<div class="site-branding">
						<?php
						if ( has_custom_logo() ) :
							the_custom_logo();
						endif;
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php

						$blog_starter_description = get_bloginfo( 'description', 'display' );
						if ( $blog_starter_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo esc_html( $blog_starter_description ); /* WPCS: xss ok. */ ?></p>
							<?php
						endif;
						?>
					</div><!-- .site-branding -->
				</div>
			</div>
		</div>
		</div>
		<div id="mainmenu" class="menu-area">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-sm-12 text-center">
						<div class="cssmenu" id="cssmenu">
							<?php
							if (has_nav_menu('main-menu')) :
								wp_nav_menu(array(
									'theme_location'	=>	'main-menu',
									'container'			=>	'ul',
								));
							endif;
							?>
	                    </div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->