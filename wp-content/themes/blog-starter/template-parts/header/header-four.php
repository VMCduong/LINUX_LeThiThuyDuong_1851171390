<div id="mainmenu" class="header-four-menu-area menu-area sticky-top">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="row">
					<div class="col-9 col-md-12">
						<div class="site-branding-area">
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
						</div>
					</div>
					<div class="col-3 col-md-12 mobile-search-btn align-self-center lg-display-none">
						<div class="search-popup">
		                    <div>
		                    	<i class="fa fa-search"></i>
		                    </div>
		                </div>
					</div>
				</div>
			</div>
			<div class="col-md-9 text-right col-custom-menu align-self-center">
				<div class="row">
					<div class="cssmenu col-12 col-md-11" id="cssmenu">
					<?php
						if (has_nav_menu('main-menu')) :
							wp_nav_menu(array(
								'theme_location'	=>	'main-menu',
								'container'			=>	'ul',
							));
						endif;
					?>
                	</div>
	                <div class="search-menu col-1 col-md-1 align-self-center">
	                	<ul>
	                		<li class="search-form-li">
	                			<div class="search-popup">
			                    	<div><i class="fa fa-search"></i></div>
			                	</div>
			            	</li>
	            		</ul>
	                </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="searchform-area">
 	<div class="search-close">
 		<i class="fa fa-times"></i>
 	</div>
 	<div class="search-form-inner">
 	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	</div>
 </div>