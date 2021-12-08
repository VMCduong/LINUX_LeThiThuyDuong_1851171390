<?php
/**
 * TheVoice Dynamic Styles
 *
 * @package TheVoice
 */

function thevoice_dynamic_css()
{

    $thevoice_default = thevoice_get_default_theme_options();
    $twp_thevoice_home_sections_1 = get_theme_mod('twp_thevoice_home_sections_1', json_encode($thevoice_default['twp_thevoice_home_sections_1']));
    $twp_thevoice_home_sections_1 = json_decode($twp_thevoice_home_sections_1);


    echo "<style type='text/css' media='all'>"; ?>

    <?php

    $repeat_times = 1;

    foreach ($twp_thevoice_home_sections_1 as $thevoice_home_section) {

        $section_background_color = esc_url(isset($thevoice_home_section->background_color) ? $thevoice_home_section->background_color : '');

        if ($section_background_color) { ?>

            #block-<?php echo $repeat_times; ?> {
            background-color: <?php echo esc_url($section_background_color); ?>;
            margin-bottom: 4rem;
            padding-top: 4rem;
            }

            #block-<?php echo $repeat_times; ?> .block-title-wrapper .block-title::after{
            border-left-color: <?php echo esc_url($section_background_color); ?>;
            }

            <?php
        }

        $background_image = esc_url(isset($thevoice_home_section->background_image) ? $thevoice_home_section->background_image : '');

        if ($background_image) {

            $bg_image_size = isset($thevoice_home_section->bg_image_size) ? $thevoice_home_section->bg_image_size : 'auto';
            $background_image_repeat = isset($thevoice_home_section->background_image_repeat) ? $thevoice_home_section->background_image_repeat : 'yes';
            $background_image_scroll = isset($thevoice_home_section->background_image_scroll) ? $thevoice_home_section->background_image_scroll : 'yes';

            if ($background_image_repeat == 'yes' || $background_image_repeat == '') {
                $background_image_repeat = 'repeat';
            } else {
                $background_image_repeat = 'no-repeat';
            }

            if ($background_image_scroll == 'yes' || $background_image_scroll == '') {
                $background_image_scroll = 'scroll';
            } else {
                $background_image_scroll = 'fixed';
            } ?>

            #block-<?php echo $repeat_times; ?> {
            background-image: url(<?php echo esc_url($background_image); ?> );
            background-size: <?php echo esc_attr($bg_image_size); ?>;
            background-repeat: <?php echo esc_attr($background_image_repeat); ?>;
            background-attachment: <?php echo esc_attr($background_image_scroll); ?>;
            margin-bottom: 4rem;
            padding-top: 4rem;
            }

            <?php
        }

        $repeat_times++;
    } ?>

    <?php echo "</style>";
}

add_action('wp_head', 'thevoice_dynamic_css', 100);