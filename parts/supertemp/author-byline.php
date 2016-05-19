<div class="row collapse byline-wrapper">

  <?php $auth_id = get_the_author_meta( 'ID' ); ?>

  <div class="small-12 columns">

    <figure class="thumbnail hide-for-small">
      <?php echo get_avatar( $auth_id, 120); ?>
    </figure>
    
    <div class="details">

      <h5 class="name">By: <strong><?= get_the_author(); ?></strong></h5>

      <ul class="inline-list contact-links">

        <li class="email"><a href="mailto: <?php the_author_meta( 'user_email'); ?>">Email</a></li>

        <?php if (get_the_author_meta( 'twitter_url')) : ?>
        <li class="twitter"><a href="<?php the_author_meta( 'twitter_url'); ?>" target="_new">Twitter</a></li>
        <?php endif; ?>

        <?php if (get_the_author_meta( 'facebook_url')) : ?>
        <li class="facebook"><a href="<?php the_author_meta( 'facebook_url'); ?>" target="_new">Facebook</a></li>
        <?php endif; ?>

        <?php if (get_the_author_meta( 'google_url')) : ?>
        <li class="google"><a href="<?php the_author_meta( 'google_url'); ?>" target="_new">Google+</a></li>
        <?php endif; ?>

      </ul>

    </div><!-- /.details -->

  </div><!-- /.small-12.columns -->

</div><!-- /.row.collapse.byline-wrapper -->