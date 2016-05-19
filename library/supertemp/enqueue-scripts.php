<?php
/**
 * Enqueue all styles and scripts
 */

if ( ! function_exists( 'supertemp_scripts' ) ) :

	function supertemp_scripts() {

    wp_enqueue_script( 'copy-to-clipboard', get_template_directory_uri() . '/assets/javascript/vendor/zero-clipboard/ZeroClipboard.js', array('jquery'), '2.0.0', true );

    // wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/javascript/supertemp/app.js', array('jquery'), '1.0.0', true );
	}

	add_action( 'wp_enqueue_scripts', 'supertemp_scripts' );
endif;

?>
