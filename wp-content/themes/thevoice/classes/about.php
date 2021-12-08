<?php

/**
 * TheVoice About Page
 * @package TheVoice
 *
*/

if( !class_exists('TheVoice_About_page') ):

	class TheVoice_About_page{

		function __construct(){

			add_action('admin_menu', array($this, 'thevoice_backend_menu'),999);

		}

		// Add Backend Menu
        function thevoice_backend_menu(){

            add_theme_page(esc_html__( 'TheVoice Options','thevoice' ), esc_html__( 'TheVoice Options','thevoice' ), 'activate_plugins', 'thevoice-about', array($this, 'thevoice_main_page'));

        }

        // Settings Form
        function thevoice_main_page(){

            require get_template_directory() . '/classes/about-render.php';

        }

	}

	new TheVoice_About_page();

endif;