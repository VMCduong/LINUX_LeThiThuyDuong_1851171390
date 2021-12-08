<header id="masthead" class="site-header header-three" style="background-image: url(<?php echo esc_url( get_header_image());?>);">
		<div class="logo-area">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-md-3 order-md-2 align-self-center order-lg-0 col-lg-3">
					<div class="today-date">
						<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo wp_kses_post(date('D jS M Y')); ?>
					</div>
				</div>
				<div class="col-md-6 align-self-center order-md-1 order-lg-1 col-lg-6 text-center">
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
				<div class="col-md-3 align-self-center order-md-3 order-lg-3 col-lg-3 text-right header-three-search">
					<div class="social-link-top">
					<?php blog_starter_social_activity();?>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div id="mainmenu" class="menu-area">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-9 align-self-center text-center">
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
					<div class="col-lg-3 align-self-center">
						<?php echo get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->