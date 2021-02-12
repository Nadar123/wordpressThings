<?php
add_action('wp_ajax_nopriv_handle_ajax_login_form', 'handle_ajax_login_form');

function handle_ajax_login_form(){
  $response = array('success' => false);

  $login_args = array(
    'user_login' => $_POST['email'],
    'user_password' => $_POST['password'],
    'remember' => $_POST['remember']
  );

  $user = wp_signon($login_args);

  if( ! is_wp_error( $user ) ){
    // $user = WP_User
    $response['success'] = true;
    $response['redirect'] = get_the_permalink( get_field('profile_page','options') );
    $response['msg'][] = "Thank you Plz wait..."; 
  } else{
    // $user = WP_Error
  }
  wp_send_json($response);
}