<?php
  // If a feature image is set, get the id, so it can be injected as a css background property
  if ( has_post_thumbnail( $post->ID ) ) :
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hero' );
    $image = $image[0];
    echo '<figure id="hero" class="hero" role="banner" style="background-image: url(\'' . $image .  '\')" >';
      echo '<a href="'. get_the_permalink() . '">';
        echo get_the_post_thumbnail( 'river', array('class' => 'hero') );
      echo '</a>';
    echo '</figure>';
  else :
    echo '<figure id="hero" class="no-image-set" classrole="banner"></figure>';
  endif;
?>
