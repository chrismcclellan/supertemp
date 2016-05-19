<?php


// Remove admin color schemes
// ==========================================================
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

// Author social links
// ==========================================================
if (!function_exists('supertemp_author_social')) :

  function supertemp_author_social( $contact_methods ) {
    $contact_methods['twitter_url'] = 'Twitter URL';
    $contact_methods['facebook_url'] = 'Facebook URL';
    $contact_methods['google_url'] = 'Google URL';
    return $contact_methods;
  }

  add_filter( 'user_contactmethods', 'supertemp_author_social', 10, 1);

endif;