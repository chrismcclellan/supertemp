<?php
  // If a feature image is set, get the id, so it can be injected as a css background property
  if ( has_post_thumbnail( $post->ID ) ) :

    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hero' );
    $image = $image[0];

    echo '<figure class="hero '.(is_single() ? 'post' : 'page').'-thumb" style="background-image: url(\'' . $image .  '\')" role="banner" >';
      echo get_the_post_thumbnail( 'river', array('class' => 'hero') );
    echo '</figure>';

  else :

    echo '<figure id="hero" class="no-image-set" classrole="banner"></figure>';

  endif;
?>
