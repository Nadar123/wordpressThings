<?php
add_action('wp_ajax_nopriv_register_ajax_form', 'register_ajax_form');
add_action('wp_ajax_register_ajax_form', 'register_ajax_form');

function register_ajax_form() {
$response = array('success' => false, 'msg' => array());

  if( ! empty( $_POST['first_name'] ) && ! empty( $_POST['email'] ) && ! empty( $_POST['password'] ) &&! empty( $_POST['confirm_password'] ) ){
    if( is_email( $_POST['email'] ) ){
      if($_POST['password'] === $_POST['confirm_password']){
        $user_email_arry = explode('@',$_POST['email']);
        $register_args = array(
        'user_login'       => reset($user_email_arry),
        'first_name'       => $_POST['first_name'],
        'last_name'        => $_POST['last_name'],
        'user_email'       => $_POST['email'],
        'user_pass'        => $_POST['password'],
        );
        $user = wp_insert_user($register_args);
        if( ! is_wp_error( $user ) ){
          $response['success'] = true;
          $response['redirect'] = get_the_permalink( get_field('profile_page','options') );
          $response['msg'][] = "Thank you Plz wait..."; 
          $login_args = array(
            'user_login' => $register_args['user_email'],
            'user_password' => $register_args['user_pass']
          );
          $user = wp_signon($login_args);
        } else {
          $response['msg'][] = $user->get_error_message();
        }
      } else{
        $response['msg'][] = "הסיסמאות לא שוות";
      }
    } else{
      $response['msg'][] = "דואר אלקטרוני לא תקין";
    }
  }else{
    $response['msg'][] = "ישנתם שדות חובה שנשארו ריקים";
  }
  wp_send_json($response);
}