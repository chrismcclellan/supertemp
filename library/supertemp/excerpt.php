<?php
/**
 * Readmore link to end of excerpts
 */

// Shortens length of auto generated excerpts
if ( ! function_exists( 'supertemp_excerpt_trim' ) ) :
  function supertemp_excerpt_length( $length ) { return 30; }
  add_filter( 'excerpt_length', 'supertemp_excerpt_length', 999 );
endif;

// Ensures excerpt always ends with a complete sentence.
if ( ! function_exists( 'supertemp_excerpt_trim' ) ) :
  function supertemp_excerpt_trim( $text ) {

    $text = (function_exists( 'wp_trim_excerpt' )) ? wp_trim_excerpt($text) : $text;

    if (!preg_match('/\./i', $text) || preg_match('/\.$/i', $text)) {
      return $text;
    }

    $new_text = explode('.', $text);
    array_pop($new_text);
    $new_text = implode('.', $new_text);
    return $new_text . '.';
  }

  remove_filter('get_the_excerpt', 'wp_trim_excerpt');
  add_filter('get_the_excerpt', 'supertemp_excerpt_trim');
endif;

// Removes [...] at end of excerpt
if ( ! function_exists( 'supertemp_excerpt_more' ) ) :
  function supertemp_excerpt_more( $more ) {
    return '';
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'fondationpress') . '</a>';
  }

  add_filter('excerpt_more', 'supertemp_excerpt_more');
endif;

?>
