<?php
/*
Template Name: Left Sidebar
*/
get_header(); ?>

<?php get_template_part( 'parts/featured-image' ); ?>

<div class="row">
    <div class="small-12 large-8 large-push-4 columns" role="main">

        <?php do_action( 'foundationpress_before_content' ); ?>

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
                <?php do_action( 'foundationpress_page_before_entry_content' ); ?>

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
                <footer>
                    <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
                    <p><?php the_tags(); ?></p>
                </footer>
            </article>

            <?php get_template_part( 'parts/supertemp/share-modal' ); ?>

        <?php endwhile;?>

        <?php do_action( 'foundationpress_after_content' ); ?>

    </div>
    <?php get_sidebar( 'left' ); ?>
</div>
<?php get_footer(); ?>
