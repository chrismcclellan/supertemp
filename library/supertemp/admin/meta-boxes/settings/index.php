<?php

$fields = array();
include "fields/friend-content.php";
include "fields/video-url.php";
include "fields/interviewee.php";
// include "fields/interviewer.php";
include "fields/transcripts.php";

if (!defined('THEME_KEY_PREFIX'))
  define('THEME_KEY_PREFIX', 'supertemp');

// Include field meta box output
if ( ! function_exists('supertemp_meta_box_markup')) :

  function supertemp_meta_box_markup($post) {
    
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    global $fields;
    foreach($fields as $field) {
      $field();
    }
  }
endif;

// Add metabox k
if ( ! function_exists('add_supertemp_meta_box')) :

  function add_supertemp_meta_box() {
    
    // Unset and reset submit div so our meta boxes is below it
    // global $wp_meta_boxes;
    // unset( $wp_meta_boxes['post']['side']['core']['submitdiv'] );
    // add_meta_box( 'submitdiv', __( 'Publish' ), 'post_submit_meta_box', null, 'side', 'high' ); 

    add_meta_box("supertemp-meta-box", "Supertemp Settings", "supertemp_meta_box_markup", "post", "normal", "high", null);
  }
  
  add_action("add_meta_boxes", "add_supertemp_meta_box");

endif;


if ( ! function_exists('save_supertemp_meta_box')) :

  function save_supertemp_meta_box($postid) {

    /* check if this is an autosave */
    if (defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) return false;

    /* check if the user can edit this page */
    if (!current_user_can( 'edit_page', $postid)) return false;

    /* check if there's a post id and check if this is a post */
    /* make sure this is the same post type as above */
    if(empty($postid) || (isset($_POST['post_type']) && $_POST['post_type'] !== 'post')) return false;

    global $fields;
    $keys = array_keys($fields);

    foreach ($keys as $key) :

      $meta_key = implode('_', array(THEME_KEY_PREFIX, $key));

      if (!isset($_POST[THEME_KEY_PREFIX][$key]) || $_POST[THEME_KEY_PREFIX][$key] === '') {
        delete_post_meta($postid, $meta_key);

      } else {
        $value = $_POST[THEME_KEY_PREFIX][$key];
        $value = is_array($value) ? $value[0] : $value;
        update_post_meta($postid, $meta_key, $value);
      }

    endforeach;
  }

  add_action("save_post", "save_supertemp_meta_box");

endif;

?>
