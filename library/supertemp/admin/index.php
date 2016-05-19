<?php

  // Show font-end admin bar
  require_once('show-admin-bar.php');

  // Users
  require_once('users/index.php');

  // Shortcodes
  require_once('shortcodes/index.php');

  // Metaboxes
  require_once('meta-boxes/index.php');


  // Post list columns

    // Hide the comments column
    require_once('hide-comments-column.php');

    // Feature image column
    require_once("featured-image-column/index.php");

?>