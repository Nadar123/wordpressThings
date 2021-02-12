<?php
class Widget_Nadar_Image extends WP_Widget {
//widget constructor function

function __construct() {

  $widget_options = array (
   'classname' => 'nadar_image_widget',
   'description' => 'Add a call to action box with your own text and link.'
  );
 
  parent::__construct( 'nadar_image_widget', 'Nadar Image', $widget_options );

 }
 function widget( $args, $instance ) {
  include('inc/widget-main.php');
 } 
}

//function to register the widget
function register_nadar_image_widget() {
  register_widget( 'Widget_Nadar_Image' );
 }
 add_action( 'widgets_init', 'register_nadar_image_widget' );
 