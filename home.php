<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="container row collapse river" data-equalizer>

	<?php get_template_part( 'parts/check-if-sidebar-exist' ); ?>

	<?php if ( have_posts() ) : ?>

		<?php do_action( 'foundationpress_before_content' ); ?>
	
		<?php $post_index = 0; ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php set_query_var( 'post_index', $post_index ); ?>
			<?php get_template_part( 'templates/content/content', 'teaser' ); ?>
			<?php $post_index++; ?>

		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'templates/content/content', 'none' ); ?>

		<?php do_action( 'foundationpress_before_pagination' ); ?>

	<?php endif;?>



	<?php if ( function_exists( 'supertemp_pagination' ) ) { supertemp_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
		</nav>
	<?php } ?>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
