<?php

// Actions, Filters
add_action ( 'wp_enqueue_scripts', 'add_theme_scripts' );

// Add scripts to WordPress
function add_theme_scripts () {
    wp_enqueue_script ( 'd3-ease', get_template_directory_uri () . '/js/d3-ease.min.js', null, 1.0, true);
    wp_enqueue_script ( 'letters', get_template_directory_uri () . '/js/letters.js', array ( 'd3-ease' ), 1.0, true);
    wp_enqueue_script ( 'site-js', get_template_directory_uri () . '/js/site.js', array ( 'jquery', 'd3-ease', 'letters' ), 1.0, true);
}
?>
