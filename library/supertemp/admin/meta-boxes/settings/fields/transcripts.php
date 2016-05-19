<?php $fields['transcripts'] = function() { ?>
  
  <?php
    global $post;
    $key = 'transcripts';
    $meta_key = implode('_', array(THEME_KEY_PREFIX, $key));
    $meta_value = get_post_meta($post->ID, $meta_key, true);
  ?>

  <div class="misc-pub-section">

    <label for="<?= $meta_key; ?>">Transcripts</label>

    <br />

    <textarea
      name="<?= THEME_KEY_PREFIX ?>[<?= $key ?>]"
      id="<?= $meta_key; ?>"
      placeholder="Q/A"
      style="width: 100%;"
      rows="6"
    ><?= $meta_value; ?></textarea>

  </div>

<?php } ?>
