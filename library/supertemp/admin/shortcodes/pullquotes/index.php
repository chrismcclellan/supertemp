<?php


add_shortcode( 'pullquote', 'supertemp_pullquotes' );
function supertemp_pullquotes( $atts, $content = null ) {

    $a = shortcode_atts( array(
        'align'     => 'left', // (Required) Align pullquote to the left, right, or full (for width:100%). Default left.
        'cite'      => null, // (Optional) Add the name/source of the quote
        'cite_link' => null, // (Optional) Add a link to the cited source, must be http or https link
        'class'     => null, // (Optional) Add additional classes to the div.pullquote object
        'size'      => null, // (Optional) Define the size (small|medium|large|x-large)
    ), $atts );


    // Pullquote alignment (left, right, or full)
    $alignments = array('left', 'right', 'full');
    $alignment = 'pull-'.$alignments[0];
    if ($a['align'] && in_array($a['align'], $alignments)) {
        $alignment = 'pull-'.$a['align'];
    }

    // Check for classes
    $classes = null;
    if ( isset($a['class']) && strlen($a['class']) > 0 && preg_match('/[a-zA-Z0-9_ -]*/', $a['class']) ):
        $classes = strip_tags($classes);
        $classes = esc_attr($a['class']);
        $classes = ' '.preg_replace('/[^a-z0-9_ -]+/i', '', $classes);
    endif;

    // Check for size
    $sizes = array('default', 'small', 'medium', 'large', 'x-large');
    $size = 'size-'.$sizes[0];
    if ( isset($a['size']) && in_array($a['size'], $sizes)):
        $size = 'size-'.$a['size'];
    endif;

    // Check for cite
    $cite_text = null;
    if ( isset($a['cite']) && strlen($a['cite']) > 1 ):
        $cite_text = '<span itemprop="name fn">'.strip_tags( $a['cite'] ).'</span>';
    endif;

    // Check for cite link
    $cite_link = null;
    $cite_attribute = null;
    $cite_link_with_text = null;
    if ( isset($a['cite_link']) && strlen($a['cite_link']) > 1 && preg_match("/(http|https)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/", $a['cite_link']) ) {
        $cite_link = $a['cite_link'];
        $cite_attribute = ' cite="'.$cite_link.'"';
        $cite_link_with_text = '<a href="'.$a['cite_link'].'" class="url" target="_blank" itemprop="url">'.$cite_text.'</a>';
    }

    // Create footer
    $cite_footer = null;
    if ($cite_link && $cite_text):
        $cite_footer = '<footer itemscope itemtype="http://schema.org/Person"><cite>'.$cite_link_with_text.'</cite></footer>';
    elseif ($cite_text):
        $cite_footer = '<footer itemscope itemtype="http://schema.org/Person"><cite>'.$cite_text.'</cite></footer>';
    endif;

    return '<div class="pullquote '.$size.' '.$alignment.' '.$classes.'"><blockquote'.$cite_attribute.'><p>'.do_shortcode($content).'</p>'.$cite_footer.'</blockquote></div>';
}


add_action( 'init', 'supertemp_pullquotes_buttons' );
function supertemp_pullquotes_buttons() {
    add_filter("mce_external_plugins", "supertemp_pullquotes_add_buttons");
    add_filter('mce_buttons', 'supertemp_pullquotes_register_buttons');
}


function supertemp_pullquotes_add_buttons($array) {
    $array['supertemp_pullquotes'] = get_template_directory_uri() . '/assets/javascript/supertemp/shortcodes/pullquotes/pullquotes.js';
    return $array;
}


function supertemp_pullquotes_register_buttons($buttons) {
    array_push( $buttons, 'pullquote-menu' );
    return $buttons;
}
