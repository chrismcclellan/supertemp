<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

do_action( 'foundationpress_before_searchform' ); ?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="row collapse">
		<?php do_action( 'foundationpress_searchform_top' ); ?>
		<div class="large-8 columns search-field">
			<input type="text" value="<?= get_query_var( 's', ''); ?>" name="s" id="s" placeholder="<?php esc_attr_e( 'Search...', 'foundationpress' ); ?>">
		</div>
		<?php do_action( 'foundationpress_searchform_before_search_button' ); ?>
		<div class="large-4 columns search-button">
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>" class="prefix button">
		</div>
		<?php do_action( 'foundationpress_searchform_after_search_button' ); ?>
	</div>
</form>
<?php do_action( 'foundationpress_after_searchform' ); ?>
