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

<article id="post-<?php the_ID(); ?>" <?php post_class('index-'.get_query_var('post_index')); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<?php if (get_query_var('post_index') === 0) : ?>
			<?php get_template_part( 'parts/featured-image' ); ?>
		<?php else : ?>
			<figure>
					<?php the_post_thumbnail( 'river', array('class' => 'thumb-river') ); ?>
			</figure>
		<?php endif; ?>

	<?php endif; ?>

	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php supertemp_entry_meta(); ?>
	</header>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading...', 'foundationpress' ) ); ?>
	</div>

	<footer>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>

	<hr />

</article>
