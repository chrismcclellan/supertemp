<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'supertemp_theme_support' ) ) :
function supertemp_theme_support() {

	// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'hero', 1280, 720, array( 'center', 'center' ) );
	add_image_size( 'river', 640, 360, array( 'center', 'center' ) );
	add_image_size( 'sidebar', 320, 180, array( 'center', 'center' ) );

	// Add post formarts support: http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array('video'));
}

add_action( 'after_setup_theme', 'supertemp_theme_support' );
endif;
?>
