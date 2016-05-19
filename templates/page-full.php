<?php
/*
Template Name: Full Width
*/
get_header();

get_template_part( 'parts/supertemp/featured-image-single' );

?>

<div class="row">
	<div class="small-12 columns" role="main">

	<?php /* Start loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

			<!-- Share -->
			<div class="row collapse share-wrapper show-for-large-up">
				<div class="small-12 columns">
					<?php get_template_part( 'parts/supertemp/share' ); ?>
				</div>
			</div>
			
			<!-- Header -->
			<header class="row collapse post-title-wrapper">
				<div class="small-12 columns">
					<h1 class="post-title"><span><?php the_title(); ?></span></h1>
				</div>
			</header>

			<!-- Content -->
			<div class="row collapse post-content content-wrapper">
				<div class="small-12 medium-10 large-8 columns">
					<?php the_content(); ?>
				</div>
			</div>

			<!-- Share -->
			<div class="row collapse share-wrapper show-for-large-up">
				<div class="small-12 columns">
					<?php get_template_part( 'parts/supertemp/share' ); ?>
				</div>
			</div>

		</article>

		<?php get_template_part( 'parts/supertemp/share-modal' ); ?>
		
	<?php endwhile; // End the loop ?>

	</div><!-- /.small-12.columns -->
</div><!-- /.row -->

<?php get_footer(); ?>
