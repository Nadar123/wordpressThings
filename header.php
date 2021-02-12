<?php
    $header_logo = get_field( 'header_logo', 'option' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> -->
    <?php wp_head();?>
</head>
<body <?php echo body_class(); ?>>

 <header id="header" role="banner" class="fixed">
    <div class="container">
      <div class="columns">
        <div class="column is-12 is-mobile">
          <div class="menu-wrap-bar desktop_only">
            <div class="logo-mb">
              <a href="<?php echo home_url(); ?>" role="logo">
                <?php if($header_logo) :?>
                  <img 
                    src="<?php echo $header_logo; ?>" 
                    alt="logo">
                <?php endif; ?>    
              </a>
            </div>
            <div class="top-menu-section">
             <div class="logo">
              <a href="<?php echo home_url(); ?>" role="logo">
                <?php if($header_logo) :?>
                  <img 
                    src="<?//php echo $header_logo; ?>" 
                    alt="logo">
                <?php endif; ?>  
                Logo  
              </a>
            </div>
            <ul class="list-wrapper">
              <li class="items"> <a class="link" href="#">Solutions<i class="fas fa-chevron-down"></i> </a> 
              </li>

              <li class="items"> <a class="link" href="">Pricing<i class="fas fa-chevron-down"></i></a> 
              </li>
              <li class="items"> <a class="link" href="">Use cases<i class="fas fa-chevron-down"></i></a> 
              </li>
              <li class="items"> <a class="link" href="">Resources<i class="fas fa-chevron-down"></i></a>
              </li>
            </ul>  
            <div class="login-section">
              <?php if( is_user_logged_in() ): ?>
              <a href="<?php echo wp_logout_url( get_home_url() );?>">Logout</a>
              <?php else:?>
                <a href="/login">Login</a> /
                <a href="/login">resigter</a>
              <?php endif;?>
            </div>     
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-menu-wrppaer">
      <div id="toggle">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
      </div>
  
      <div id="menu">
        <div class="mb-top-menu">
          <ul class="mb-list-wrapper">
            <li class="items"> <a class="link" href="#">Solutions<i class="fas fa-chevron-down"></i> </a> 
            </li>

            <li class="items"> <a class="link" href="">Pricing<i class="fas fa-chevron-down"></i></a> 
            </li>
            <li class="items"> <a class="link" href="">Use cases<i class="fas fa-chevron-down"></i></a> 
            </li>
            <li class="items"> <a class="link" href="">Resources<i class="fas fa-chevron-down"></i></a>
            </li>
            <li>
              <div class="mb-login-section">
                <?php if( is_user_logged_in() ): ?>
                  <a href="<?php echo wp_logout_url( get_home_url() );?>">Logout</a>
                <?php else:?>
                  <a href="/login">Login</a> /
                  <a href="/login">resigter</a>
                <?php endif;?>
              </div> 
            </li>
          </ul> 
        </div>
      
      </div>
  </div>
  </header>