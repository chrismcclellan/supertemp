<?php

// User fields visibility
// =============================================================
  if (!function_exists('supertemp_user_settings_visibility')) :
    function supertemp_user_settings_visibility($user) { ?>

      <style>
        .user-rich-editing-wrap,
        .user-comment-shortcuts-wrap,
        .user-admin-bar-front-wrap,
        .user-nickname-wrap,
        .user-user-login-wrap { display: none !important; }
      </style>

    <?php }

    add_action( 'show_user_profile', 'supertemp_user_settings_visibility' );
    add_action( 'edit_user_profile', 'supertemp_user_settings_visibility' );
    add_action( 'user_new_form', 'supertemp_user_settings_visibility' );
  endif;

?>