<?php
  // If a feature image is set, get the id, so it can be injected as a css background property
  if ( has_post_thumbnail( $post->ID ) ) :

    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hero' );
    $image = $image[0];

    $meta_key = THEME_KEY_PREFIX.'_video_url';
    $meta_value = get_post_meta($post->ID, $meta_key, true);
    $video = new SupertempVideoUrlParser($meta_value, true);

    echo '<figure id="hero" class="hero" role="banner" style="background-image: url(\'' . $image .  '\')" >';
      
      echo get_the_post_thumbnail( 'river', array('class' => 'hero') ); ?>
      
      <?php if (!$video->get_error()) : ?>

        <a href="#" class="play-button">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 116 116" style="enable-background:new 0 0 116 116;" xml:space="preserve">
            <style type="text/css">
              .st0 { fill: #ffffff; }
            </style>
            <g>
              <g>
                <path class="st0" d="M58,0C26,0,0,26,0,58c0,32,26,58,58,58c32,0,58-26,58-58C116,26,90,0,58,0z M41,83V34l49,24.5L41,83z"/>
              </g>
            </g>
          </svg>
        </a>
        
        <div class="video"></div>
        <script>
          window.supertemp_video = <?= json_encode($video); ?>;
        </script>

      <?php endif; ?>

    <?php echo '</figure>';

  else :

    echo '<figure id="hero" class="no-image-set" classrole="banner"></figure>';

  endif;
?>
