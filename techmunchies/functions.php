<?php

require_once('class-wp-bootstrap-navwalker.php');

/**
 * Estimate time required to read the article
 *
 * @return string
 */
function bm_estimated_reading_time() {

    $post = get_post();

    $words = str_word_count( strip_tags( $post->post_content ) );
    $minutes = floor( $words / 120 );
    $seconds = floor( $words % 120 / ( 120 / 60 ) );

    if ( 1 <= $minutes && $seconds >= 31 ) {
        $estimated_time = $minutes + 1 . ' minute' . ($minutes + 1 == 1 ? '' : 's');
    } elseif ( 1 <= $minutes ) {
        $estimated_time = $minutes . ' minute' . ($minutes == 1 ? '' : 's');
    } else {
        $estimated_time = $seconds . ' second' . ($seconds == 1 ? '' : 's');
    }

    return $estimated_time;

}

// Check if LIVE & Force SSL
if ( strpos ( $_SERVER [ 'REQUEST_URI' ], 'techmunchies.net' ) !== false ) {
    define ( 'FORCE_SSL_ADMIN', true );
}

// Actions, Filters
add_action ( 'wp_enqueue_scripts', 'add_theme_scripts' );

// Add scripts to WordPress
function add_theme_scripts () {
    wp_enqueue_style ( 'site-css', get_template_directory_uri () . '/style.css', null, 1.0, 'screen' );
    wp_enqueue_script ( 'site-js', get_template_directory_uri () . '/js/site.js', null, 1.0, true );
}

// Remove built-in jQuery
if ( !is_admin() ) {
  wp_deregister_script ( 'jquery' );
  wp_register_script ( 'jquery', '', '', '', true );
}

// Custom main menu
function tm_main_menu () {
  register_nav_menu ( 'main-menu', __( 'Main Menu' ) );
}
add_action( 'init', 'tm_main_menu' );

?>
