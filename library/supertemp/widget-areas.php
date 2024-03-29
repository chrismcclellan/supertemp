<?php

if ( ! function_exists( 'supertemp_sidebar_widgets' ) ) :

  function supertemp_sidebar_widgets() {
    register_sidebar(array(
      'id' => 'sidebar-widgets',
      'name' => __( 'Sidebar widgets', 'supertemp' ),
      'description' => __( 'Drag widgets to this sidebar container.', 'supertemp' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h6 class="widget-header">',
      'after_title' => '</h6>',
    ));

    // register_sidebar(array(
    //   'id' => 'footer-widgets',
    //   'name' => __( 'Footer widgets', 'supertemp' ),
    //   'description' => __( 'Drag widgets to this footer container', 'supertemp' ),
    //   'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
    //   'after_widget' => '</article>',
    //   'before_title' => '<h6>',
    //   'after_title' => '</h6>',
    // ));
  }

add_action( 'widgets_init', 'supertemp_sidebar_widgets' );
endif;
?>
