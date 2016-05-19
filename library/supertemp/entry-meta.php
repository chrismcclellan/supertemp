<?php
/**
 * Entry meta information for posts
 */

// Meta detail - timestamp only (for use on archive/blog pages)
if ( ! function_exists( 'supertemp_blog_entry_meta' ) ) :
  function supertemp_blog_entry_meta() { ?>
    <time class="updated" datetime="<?= get_the_time( 'c' ); ?>">
      <span class="month"><?= get_the_date('M'); ?></span>
      <span class="day"><?= get_the_date('d'); ?></span>
      <?php if (get_the_date('Y') !== date('Y')) : ?>
        <span class="year"><?= get_the_date('Y'); ?></span>
      <?php endif; ?>
    </time>
  <?php }
endif;

// Meta includes timestamp and post author
if ( ! function_exists( 'supertemp_single_entry_meta')) :

	function supertemp_single_entry_meta() {

    global $post;
  
    ?>
    <ul class="inline-list left">

      <li class="on">
        On: <strong>
          <time class="updated" datetime="<?= get_the_time( 'c' ); ?>">
            <span class="show-for-medium-up"><?= get_the_date('M'); ?> <?= get_the_date('d'); ?>, <?= get_the_date('Y'); ?></span>
            <span class="show-for-small-only"><?= get_the_date('m'); ?>/<?= get_the_date('d'); ?>/<?= get_the_date('y'); ?></span>
          </time>
        </strong>
      </li>
      
      <?php
        $key = 'interviewee';
        $meta_key = implode('_', array(THEME_KEY_PREFIX, $key));
        $of = get_post_meta($post->ID, $meta_key, true);
        if ($of && has_post_format('video')) :
      ?>
        <li class="of">
          Of: <strong><?= $of; ?></strong>
        </li>
      <?php endif; ?>
      
      <li class="by show-for-medium-up">
        By: <strong><?= get_the_author(); ?></strong>
      </li>

    </ul>
    <?php

  }

endif;

?>