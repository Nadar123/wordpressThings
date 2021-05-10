<?php 
$hero_background     = get_field('hero_background');
$main_title          = get_field('main_title');
$sub_title           = get_field('sub_title');

?>
 <section class="top-section background-top" style="background-image: url(<?php echo $hero_background['url']; ?>)">
    <div class="columns">
      <div class="column is-12">
        <div class="life-content">
          <h1 class="title"><?php echo $main_title; ?></h1>
          <h3 class="sub-title"><?php echo $sub_title; ?></h3>
        </div>
      </div>
  </section>