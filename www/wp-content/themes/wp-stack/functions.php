<?php
function wp_add_scripts()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/main.min.css', [], wp_get_theme()->version);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/main.min.js', [], wp_get_theme()->version, true);
}

add_action('wp_enqueue_scripts', 'wp_add_scripts', 20, 1);

