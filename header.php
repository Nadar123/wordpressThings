<?php
  $header_logo           = get_field( 'header_logo', 'option' );
  $btn_header_text  = get_field('btn_header_text', 'option');
  $btn_header_url   = get_field('btn_header_url', 'option');
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
    <?php wp_head();?>
</head>
<body <?php echo body_class(); ?>>
  <header class="header">
    <div class="menu-main">
      <div class="logo">
        <a href="<?php echo home_url(); ?>" role="logo">
          <?php if($header_logo) : ?>
            <img 
              src="<?php echo $header_logo['url']; ?>" 
              alt="logo">
          <?php endif; ?>    
        </a>
      </div>
      <nav class="nav">
          <?php if(has_nav_menu('main_menu')): ?>
            <?php wp_nav_menu([
              'theme_location'  => 'main_menu',
              'menu_class'      => 'list-items header_menu_class',
              'container'       => '',
              'depth'           => 0
            ]) ?>
        <?php endif; ?>
        <div class="header-button">
          <a class="join-link"href="<?php echo $btn_header_url; ?>">
            <?php echo $btn_header_text; ?>
          </a>
        </div>
      </nav>
    </div>
  </header>

