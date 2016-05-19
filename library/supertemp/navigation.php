<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

register_nav_menus(array(
  'footer' => 'Footer'
));


/**
 * Footer
 */
if ( ! function_exists( 'supertemp_footer' ) ) {
  function supertemp_footer() {
      wp_nav_menu(array(
          'container' => false,                           // Remove nav container
          'container_class' => '',                        // Class of container
          'menu' => '',                                   // Menu name
          'menu_class' => 'footer-menu inline-list right',  // Adding custom nav class
          'theme_location' => 'footer',                   // Where it's located in the theme
          'before' => '',                                 // Before each link <a>
          'after' => '',                                  // After each link </a>
          'link_before' => '',                            // Before each link text
          'link_after' => '',                             // After each link text
          'depth' => 1,                                   // Limit the depth of the nav
          'fallback_cb' => false,                         // Fallback function (see below)
          'walker' => new Foundationpress_Top_Bar_Walker(),
      ));
  }
}

?>
