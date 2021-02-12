<?php
  get_template_part('functions/enqueue');
  get_template_part('functions/child_helper');
  get_template_part('functions/ajax');
  get_template_part('functions/widget');
  get_template_part( '/shortcodes/init');

  include('template-parts/auth-form.php');


  function get_json_data(){
    $data = json_decode(file_get_contents( get_stylesheet_directory() . '/assets/data.json' ));
    return ! empty( $data ) ? $data->data : array();
  }