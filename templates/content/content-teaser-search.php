<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser clearfix'); ?>>

	<div class="row">
			
		<?php if (has_post_thumbnail()) : ?>
		<div class="small-12 medium-4 columns">
			<div class="row thumbnail-wrapper">
				<div class="small-12 columns">
					<figure class="thumbnail" style="background-image: url('<?= $thumb_url; ?>');">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'river' ); ?>
						</a>
					</figure>
				</div>
			</div>
		</div><!-- /.small-4.columns -->
	  <?php endif; ?>

		<?php if (has_post_thumbnail()) : ?>
		<div class="small-12 medium-8 columns end">
		<?php else : ?>
		<div class="small-12 columns end">
		<?php endif; ?>

			<div class="row post-title-wrapper">
				<div class="small-12 columns">
					<header>
						<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</header>
				</div>
			</div>
			
			<div class="row excerpt-wrapper">
				<div class="small-12 columns">
					<div class="entry-content">
						<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
					</div>
				</div>
			</div>

		</div><!-- /.small-8.columns -->
	</div><!-- /.row.collapse -->

	<br class="clear" />

</article>
