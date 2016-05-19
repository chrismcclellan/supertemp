<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">
	<div class="small-12 columns" role="main">
		
		<!-- Search results query -->
		<div class="row collapse search-query-wrapper">
			<div class="small-12">
				<h2><?php _e( 'You searched for' ); ?> <span><?php echo get_search_query(); ?></span></h2>
			</div>
		</div>
		
		<!-- Content -->
		<div class="row content-wrapper">
			<div class="small-12 columns">
				<?php if (have_posts()) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'templates/content/content', 'teaser-search' ); ?>
					<?php endwhile; ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif;?>
			</div>
		</div>

		<!--  Pagination -->
		<div class="row collapse pagination-wrapper">
			<div class="small-12 columns">
				<?php if ( function_exists( 'supertemp_pagination' ) ) { supertemp_pagination(); } else if ( is_paged() ) { ?>
					<nav id="post-nav">
						<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
						<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
					</nav>
				<?php } ?>
			</div>
		</div>

	</div><!-- /.small-12.columns -->
</div><!-- /.row -->
<?php get_footer(); ?>
