<?php

  if (get_post_meta($post->ID, implode('_', array(THEME_KEY_PREFIX, 'friend_content')))) :
    echo '<div class="friend-banner">';
      echo '<div class="row">';
        echo '<div class="small-12 columns">';
          echo '<p>Friend of the site</p>';
        echo '</div>';
      echo '</div>';
    echo '</div>';
  endif;

?>
