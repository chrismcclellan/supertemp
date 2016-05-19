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

<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser index-'.get_query_var('post_index')); ?>>

	<?php if (has_post_thumbnail()): ?>

		<!-- HERO / POSTER / CANOPY -->
		<?php if (get_query_var('post_index') === 0) : ?>
			<?php get_template_part( 'parts/supertemp/featured-image' ); ?>
		<?php endif; ?>

		<?php
			$thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'river', true);
			$thumb_url = $thumb_url_array[0];
		?>

		<!-- THUMBNAIL -->
		<div class="row collapse thumbnail-wrapper">
			<div class="small-12 columns">
				<figure class="thumbnail" style="background-image: url('<?= $thumb_url; ?>');">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'river' ); ?>
					</a>
				</figure>
			</div>
		</div>

	<?php endif; ?>
	
	<div class="row collapse post-title-wrapper">
		<div class="small-12 medium-10 large-8 columns">
			<header>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</header>
		</div>
	</div>

	
	<div class="row collapse excerpt-wrapper">
		<div class="small-12 columns">
			<div class="entry-content">
				<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
			</div>
		</div>
	</div>

	
	<div class="row collapse meta-wrapper">
		<div class="small-12 columns">
			<footer>
				<?php supertemp_blog_entry_meta(); ?>
				<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
			</footer>
		</div>
	</div>

	<br class="clear" />

</article>
