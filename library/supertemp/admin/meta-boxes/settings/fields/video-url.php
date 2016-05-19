<?php $fields['video_url'] = function() { ?>
  
  <?php
    global $post;
    $key = 'video_url';
    $meta_key = implode('_', array(THEME_KEY_PREFIX, $key));
    $meta_value = get_post_meta($post->ID, $meta_key, true);
  ?>

  <div class="misc-pub-section">

    <label for="<?= $meta_key; ?>">Video URL</label>

    <br />

    <input
      type="text"
      name="<?= THEME_KEY_PREFIX ?>[<?= $key ?>]"
      id="<?= $meta_key; ?>"
      value="<?= $meta_value; ?>"
      placeholder="http://youtub..."
      style="width: 100%;"
    >

  </div>

<?php } ?>
