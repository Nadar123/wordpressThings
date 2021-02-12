<?php


function na_lastposts ($atts) {

  $args = array(
    'numberposts' => isset( $atts['numberposts'] ) ? $atts['numberposts'] : 3
  );
  $posts = get_posts($args);
  $title = isset( $atts['title'] ) ? $atts['title'] : '';

  get_template_part( N_SHORTCODES_PART_PATH . 'lastposts/view/post', null,
  array( 'posts' => $posts, 'title' => $title ) );

}

add_shortcode( 'lastposts', 'na_lastposts' );

