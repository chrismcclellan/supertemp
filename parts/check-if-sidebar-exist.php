<?php
  // Display a suitable column layout depending on whether sidebar exists
  if ( is_active_sidebar( 'sidebar-widgets' ) ) :
    echo '<div class="small-12 large-8 columns" role="main" data-equalizer-watch>';

  else :
    echo '<div class="small-12 columns" role="main">';
  endif;
?>
