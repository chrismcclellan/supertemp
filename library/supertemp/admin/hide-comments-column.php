<?php

if (!function_exists('supertemp_hide_comments_column')) :

  function supertemp_hide_comments_column($columns) {
    unset($columns['comments']);
    return $columns;
  }
  add_filter("manage_edit-post_columns", "supertemp_hide_comments_column");
  add_filter("manage_edit-page_columns", "supertemp_hide_comments_column");
endif;