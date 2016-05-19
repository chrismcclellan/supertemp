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

	<?php $thumb = has_post_thumbnail(); ?>

	<?php if (get_query_var('post_index') === 0) : ?>
		<?php get_template_part( 'parts/supertemp/featured-image' ); ?>
	<?php endif; ?>
	<figure class="post-thumb <?php if (!$thumb) { ?>no-image-set<?php } ?>">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'river', array('class' => 'thumb-river') ); ?>
		</a>
	</figure>
	
	<div class="post-content">
		
		<header>
			<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>

		<div class="entry-content">
			<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
		</div>

		<footer>
			<?php supertemp_blog_entry_meta(); ?>
			<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
		</footer>
	</div>

	<br class="clear" />

</article>
