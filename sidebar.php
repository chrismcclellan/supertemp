<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<aside id="sidebar" class="small-12 large-4 columns" data-equalizer-watch>
  <div id="sidebar-slider">
  	<?php do_action( 'foundationpress_before_sidebar' ); ?>
  	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
  	<?php do_action( 'foundationpress_after_sidebar' ); ?>
  </div>
  <br class="clear" />
</aside>
