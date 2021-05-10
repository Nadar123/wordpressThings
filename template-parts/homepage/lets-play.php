<?php

$play_subtitle_text  = get_field('play_subtitle_text');
$play_title          = get_field('play_title');
$play_btn_text       = get_field('play_btn_text');
$play_btn_url        = get_field('play_btn_url');

?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/matter-js/0.8.0-alpha/matter.js"></script>
  
  <section class="lets-play">
    <div class="columns">
      <div class="column is-12">
        <div class="content-wrppaer">
          <h4 class="sub-title"><?php echo $play_subtitle_text; ?></h4>
          <h2 class="title"><?php echo $play_title; ?></h2>
          <div class="btn-wrapper">
            <a href="<?php echo $play_btn_url?>"><?php echo $play_btn_text;?></a>
          </div>
        </div>
      </div>
    </div>
  </section>
