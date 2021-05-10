<?php

  function twentytwenty_child_css() {
    $directory_uri = esc_url( get_stylesheet_directory_uri() );

    wp_deregister_style( 'styles-child' );
    wp_deregister_style( 'wp-block-library' );
    wp_deregister_style( 'twentytwenty-print-style' );

    wp_register_style( 'main-style-child', $directory_uri . '/build/css/style.css', array(),time() );
    wp_enqueue_style( 'main-style-child' );

    wp_register_style( 'lu_animate', $directory_uri. '/assets/css/animate.css', array(), time());
    wp_enqueue_style( 'lu_animate' );

    wp_register_style( 'lu_bulma',  $directory_uri. '/assets/css/bulma/css/bulma.min.css');
    wp_enqueue_style( 'lu_bulma' );

    wp_register_style( 'lu_font_awesome', $directory_uri. '/assets/css/font-awesome.min.css');
    wp_enqueue_style( 'lu_font_awesome' );

  }

  add_action( 'wp_enqueue_scripts', 'twentytwenty_child_css', 1001 );

  function load_js () {
    wp_enqueue_script('custom', esc_url( get_stylesheet_directory_uri() ) 
    . '/assets/js/app.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('matter_js', esc_url( get_stylesheet_directory_uri() ) 
    . '/assets/js/matter-0.5.0.min.js', '1.0.0', true);
  }
  
  add_action('wp_enqueue_scripts', 'load_js');