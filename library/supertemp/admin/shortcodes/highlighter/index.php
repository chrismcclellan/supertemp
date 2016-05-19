<?php


add_shortcode( 'highlighter', 'supertemp_highlighter' );
function supertemp_highlighter( $atts, $content = null ) {
    return '<span class="highlighter">' . do_shortcode($content) . '</span>';
}


add_action( 'init', 'supertemp_highlighter_buttons' );
function supertemp_highlighter_buttons() {
    add_filter("mce_external_plugins", "supertemp_highlighter_add_buttons");
    add_filter('mce_buttons', 'supertemp_highlighter_register_buttons');
}


function supertemp_highlighter_add_buttons($array) {
    $array['supertemp_highlighter'] = get_template_directory_uri() . '/assets/javascript/supertemp/shortcodes/highlighter/highlighter.js';
    return $array;
}


function supertemp_highlighter_register_buttons($buttons) {
    array_push( $buttons, 'highlighter-menu' );
    return $buttons;
}

?>
