<?php

// Thumbnails to Admin Post View
if (!function_exists('supertemp_posts_columns')) :
  function supertemp_posts_columns($defaults) {
    $defaults['supertemp_post_thumbs'] = __('Thumbs');
    ?>
    <style>
      .column-supertemp_post_thumbs { width: 10%; }
      .featured-thumb { margin: 0; padding: 0; width: 100%; max-width: 100px; }
      .featured-thumb img { display: block; width: 100%; height: auto; }
    </style>
    <?php
    return $defaults;
  }
  add_filter('manage_posts_columns', 'supertemp_posts_columns', 5);
endif;

if (!function_exists('supertemp_featured_image_custom_column')) :
  function supertemp_featured_image_custom_column($column_name, $id){
    if ($column_name === 'supertemp_post_thumbs') {
      echo '<figure class="featured-thumb">';
        echo '<a href="'.get_edit_post_link().'">';
        if (has_post_thumbnail()) {
          echo the_post_thumbnail( 'sidebar' );
        } else {
          echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/images/admin-no-featured-image.gif">';
        }
        echo '</a>';
      echo '</figure>';
    }
  }
  add_action('manage_posts_custom_column', 'supertemp_featured_image_custom_column', 5, 2);
endif;

?>