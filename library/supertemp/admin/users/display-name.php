<?php

// Hide Display name & Nickname field on profile page.
// =============================================================
  if (!function_exists('supertemp_show_user_profile')) :
    function supertemp_show_user_profile($user) { ?>

      <style>
        
        .user-display-name-wrap { display: none !important; }


        [for="first_name"]:after,
        [for="last_name"]:after {
          content: ' *';
          color: red;
        }
      </style>

    <?php }

    add_action( 'show_user_profile', 'supertemp_show_user_profile' );
    add_action( 'edit_user_profile', 'supertemp_show_user_profile' );
    add_action( 'user_new_form', 'supertemp_show_user_profile' );
  endif;



// Fix first last on profile saves.
// =============================================================
  if (!function_exists('supertemp_save_profile_fields')) :
    function supertemp_save_profile_fields($user_id) {

      // Can user edit?
      if (!current_user_can('edit_user', $user_id)) return false;

      $display_name = '';
      $first = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
      $last = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';

      if ($first && $last)
        $display_name = $first.' '.$last;
      elseif (isset($_POST['user_login']))
        $display_name = $_POST['user_login'];
        
      $_POST['display_name'] = $display_name;

      wp_update_user( array(
        'ID' => $user_id,
        'display_name' => $display_name
      ));
    }
    add_action( 'personal_options_update', 'supertemp_save_profile_fields' );
    add_action( 'edit_user_profile_update', 'supertemp_save_profile_fields' );
  endif;



// Require first last on register.
// =============================================================
  if (!function_exists('supertemp_name_required')) :
    function supertemp_name_required($errors, $sanitized_user_login, $user_email) {

      if (!isset($_POST['first_name']) && !isset($_POST['last_name']))
        $errors->add('fullname_error', __( '<strong>ERROR</strong>: Need <strong>first</strong> and <strong>last</strong> name.', 'supertemp'));

      else if (!isset($_POST['first_name']))
        $errors->add('first_name_error', __( '<strong>ERROR</strong>: Need <strong>first</strong> name.', 'supertemp'));

      else if (!isset($_POST['last_name']))
        $errors->add('last_name_error', __( '<strong>ERROR</strong>: Need <strong>last</strong> name.', 'supertemp'));

        return $errors;
    }

    add_filter( 'registration_errors', 'supertemp_name_required', 10, 3 );
  endif;


// Fix first last on register.
// =============================================================
  if (!function_exists('supertemp_register_display_name')) :
    function supertemp_register_display_name($user_id) {

      $data = get_userdata($user_id);
      $display_name = '';
      $first = trim($data->first_name);
      $last = trim($data->last_name);

      if ($first && $last)
        $display_name = $first.' '.$last;
      elseif (isset($data->user_login))
        $display_name = $data->user_login;
       
      wp_update_user( array(
        'ID' => $user_id,
        'display_name' => $display_name
      )) ;
    }
    add_action("user_register", "supertemp_register_display_name");
  endif;



// Settings Page
// =============================================================
  // if (!function_exists('supertemp_settings_menu_item')) :

  //   // Menu Item
  //   function supertemp_settings_menu_item() {
  //     add_options_page('First &amp; Last Display Name', 'Display First/Last', 'manage_options', 'supertemp_settings', 'supertemp_settings_page');
  //   }
  //   add_action('admin_menu', 'supertemp_settings_menu_item', 20);

  //   // Page
  //   function supertemp_settings_page() {

  //     if (!empty($_REQUEST['updateusers']) && current_user_can("manage_options")) :
  //       global $wpdb;
  //       $user_ids = $wpdb->get_col("SELECT ID FROM $wpdb->users");
        
  //       foreach($user_ids as $user_id) {
  //         supertempfix_user_display_name($user_id);
  //         set_time_limit(30);
  //       }
          
  //       echo '<p>'.count($user_ids).' users(s) fixed.</p>';
  //     endif;

  //     echo '
  //       <p>If you just activated this theme, please click on the button below to update the display names of your existing users.</p>
  //       <p><a href="?page=supertemp_settings&updateusers=1" class="button-primary">Update Existing Users</a></p>
  //       <p><strong>WARNING:</strong> This may take a while! If you have a bunch of users or a slow server, <strong>this may hang up or cause other issues with your site</strong>. Use at your own risk.</p>  
  //     ';
  //   }
  // endif;
