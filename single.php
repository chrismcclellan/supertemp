<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();

// Hero
if (has_post_format('video'))
	get_template_part( 'parts/supertemp/featured-image-single-video' );
else
	get_template_part( 'parts/supertemp/featured-image-single' );

// Friend Banner
get_template_part( 'parts/supertemp/friend-banner' );


$transcripts = get_post_meta(get_the_ID(), THEME_KEY_PREFIX.'_transcripts', true);

?>

<div class="row">
	<div class="small-12 columns" role="main">
			
	<!-- Before content -->
	<div class="row collapse">
		<div class="small-12 columns">
			<?php do_action( 'foundationpress_before_content' ); ?>
		</div>
	</div>

	<?php while ( have_posts() ) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<!-- Header -->
			<header class="row collapse post-title-wrapper">
				<div class="small-12 columns">
					<h1 class="post-title"><span><?php the_title(); ?></span></h1>
				</div>
			</header>

			<!-- Share -->
			<div class="row collapse share-wrapper show-for-large-up">
				<div class="small-12 columns">
					<?php get_template_part( 'parts/supertemp/share' ); ?>
				</div>
			</div>

			<!-- Deck -->
			<div class="row collapse dek-wrapper">
				<div class="small-10 large-9 columns">
					<?php the_excerpt(); ?>
				</div>
			</div>

			<!-- Meta -->
			<div class="row collapse meta-wrapper">
				<div class="small-12 columns">

					<?php supertemp_single_entry_meta(); ?>
					
					<?php if (has_post_format('video') && $transcripts) : ?>
						<ul class="inline-list right tabs" data-tab>
							<li class="article-view active">
								<a href="#panel1">
									<i class="line-icon line-icon-documents-bookmarks-01"></i>
									<span class="visible-for-large-up">Article</span>
								</a>
							</li>
							<li class="transcripts-view">
								<a href="#panel2">
									<i class="line-icon line-icon-chat-messages-03"></i>
									<span class="visible-for-large-up">Transcripts</span>
								</a>
							</li>
						</ul>
					<?php endif; ?>

				</div>
			</div>
			
			<?php if ($transcripts) : ?>
			<div class="tabs-content">
			  <div class="content active" id="panel1">
			<?php endif; ?>
			
				<!-- Post before content -->
				<div class="row collapse before-content-wrapper">
					<div class="small-12 columns">
						<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
					</div>
				</div>

				<!-- Content -->
				<div class="row collapse post-content content-wrapper">
					<div class="small-12 medium-9 large-8 columns">
						<?php the_content(); ?>
					</div>
				</div>

			<?php if ($transcripts) : ?>

				</div><!-- /.content#panel1 -->

			  <div class="content" id="panel2">
			  	<div class="row transcripts-wrapper">
						<div class="small-12 medium-10 large-8 columns">
							<?php $interviewer = get_the_author(); ?>
							<?php $interviewee = get_post_meta(get_the_ID(), THEME_KEY_PREFIX.'_interviewee', true); ?>
							<?= supertemp_parse_transcripts($transcripts, $interviewee, $interviewer); ?>
						</div>
					</div>
				</div><!-- /.content#panel2 -->

			</div><!-- /.trabs-content -->
			<?php endif; ?>

			<!-- Share -->
			<div class="row collapse share-wrapper">
				<div class="small-12 columns">
					<?php get_template_part( 'parts/supertemp/share' ); ?>
				</div>
			</div>
			
			<!-- Footer -->
			<footer class="row collapse footer-wrapper">
				<div class="small-12 columns">
					<?php get_template_part( 'parts/supertemp/author-byline' ); ?>
				</div>
			</footer>

		</article>

		<?php get_template_part( 'parts/supertemp/share-modal' ); ?>

	<?php endwhile;?>
			
	<!-- After content -->
	<div class="row collapse after-content-wrapper">
		<div class="small-12 columns">
			<?php do_action( 'foundationpress_after_content' ); ?>
		</div>
	</div>

	</div>
</div>

<?php get_footer(); ?>
