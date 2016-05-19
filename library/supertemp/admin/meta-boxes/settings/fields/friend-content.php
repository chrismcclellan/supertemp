<?php $fields['friend_content'] = function() { ?>
  
  <?php
    global $post;
    $key = 'friend_content';
    $meta_key = implode('_', array(THEME_KEY_PREFIX, $key));
    $meta_value = get_post_meta($post->ID, $meta_key, true);
  ?>

  <div class="misc-pub-section">

    <input
      type="checkbox"
      name="<?= THEME_KEY_PREFIX ?>[<?= $key ?>]"
      id="<?= $meta_key; ?>"
      value="true"
      <?= (($meta_value) ? 'checked' : '') ?>
    >

    <label for="<?= $meta_key; ?>">Friend Contributor</label>

  </div>

<?php } ?>
