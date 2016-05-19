<div id="share-modal" class="reveal-modal small" data-reveal aria-labelledby="post-title" aria-hidden="true" role="dialog">

  <a class="close close-reveal-modal" aria-label="Close"><i class="line-icon line-icon-office-52"></i></a>
  
  <div class="row collapse model-title-wrapper">
    <div class="small-12 columns">
      <p class="modal-title">
        <?php if (get_post_format() === 'video') : ?>
          Share this video
        <?php elseif (is_single()) : ?>
          Share this post
        <?php else: ?>
         Share this page
        <?php endif; ?>
      </p>
    </div>
  </div>
  
  <div class="row collapse feaure-image-wrapper">
    <div class="small-12 columns">
      <?php get_template_part( 'parts/supertemp/share-modal-featured-image' ); ?>
    </div>
  </div>

  <div class="row collapse post-title-wrapper">
    <div class="small-12 columns">
      <h5 class="post-title"><span><?= get_the_title(); ?></span></h5>
    </div>
  </div>

  <div class="row collapse copy-link-wrapper">
    <div class="small-10 columns">
      <input type="text" class="radius" value="<?= str_replace('http://', '', get_the_permalink()); ?>">
    </div>
    <div class="small-2 columns">
      <button id="copy-button" class="button radius postfix" data-clipboard-text="<?= get_the_permalink(); ?>" title="Click to copy me.">Copy</button>
    </div>
  </div>

  <div class="row collapse share-links-wrapper">
    <div class="small-12 columns">
      <ul class="inline-list">

        <?php

          $networks = array('twitter', 'facebook', 'googleplus');

          foreach ($networks as $network) :

            $social = SocialBuilder::$network(array(
              'url' => get_the_permalink(),
              'title' => get_the_title(),
              'via' => '_supertemp'
            ));

            echo '<li><a href="'.$social['url'].'" class="share '.$social['slug'].'" data-title="'.$social['title'].'" data-width="'.$social['width'].'" data-height="'.$social['height'].'">';
              echo '<i class="'.$social['icon'].'"></i>';
              echo '<span class="show-for-large-up">'.$social['label'].'</span>';
            echo '</a></li>';

          endforeach;
        ?>
        <li><a href="mailto:?subject=Thought you'd like this Supertemp video!&amp;body=<?= urlencode(get_the_permalink()); ?>" class="email"><i class="line-icon line-icon-chat-messages-14"></i><span class="show-for-large-up">Email</span></a></li>
      </ul>
    </div>
  </div>

</div>
