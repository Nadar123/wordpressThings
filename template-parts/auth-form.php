<?php

function auth_form_register_shortcode(){
  $formhtml   = file_get_contents('auth-form-tpl.php', true);
  return $formhtml;

  $formhtml = str_replace(
    'NONCE_FIELD_PH', 
      wp_nonce_field(
        'form-auth', 
        '_wpnonce', 
        true, 
        false
      ),
    $formhtml
  );
}