<?php $fields['interviewer'] = function() { ?>
  
  <?php
    global $post;
    $key = 'interviewer';
    $meta_key = implode('_', array(THEME_KEY_PREFIX, $key));
    $meta_value = get_post_meta($post->ID, $meta_key, true);
  ?>

  <div class="misc-pub-section">

    <label for="<?= $meta_key; ?>">Interviewer</label>

    <br />

    <input
      type="text"
      name="<?= THEME_KEY_PREFIX ?>[<?= $key ?>]"
      id="<?= $meta_key; ?>"
      value="<?= $meta_value; ?>"
      placeholder=""
      style="width: 100%;"
    >

  </div>

<?php } ?>
