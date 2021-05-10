<?php
$list_style_rpt      = get_field('list_style_rpt');
$social_life_title   = get_field('social_life_title');
$social_text_1       = get_field('social_text_1');
$social_text_2       = get_field('social_text_2');
$list_dogs           = get_field('list_dogs');


$gallery_rpt         = get_field('gallery_rpt');
?>

<section class="soical-life">
    <div class="columns">
      <div class="column is-4 content-wrapper">
        <ul class="list-style-food">
        <?php if( $list_style_rpt ) : ?>
          <?php foreach ($list_style_rpt as $item):
            $title = $item['title'];
          ?>
          <div class="title">
              <?php if( $title) : ?>
                  <li class="item"><?php echo $title; ?></li>
              <?php endif; ?>
          </div>
          <?php endforeach; ?>
        <?php endif; ?>
        </ul>

        <div class="social-life-wrapper">
          <div class="title-wrap">
            <h3 class="title"><?php echo $social_life_title; ?></h3>
          </div>
          <p class="text"><?php echo $social_text_1?></p>
          <p class="text"><?php echo $social_text_1?></p>

        </div>
        <ul class="list-dogs">
        <?php if( $list_dogs ) : ?>
          <?php foreach ($list_dogs as $item):
            $title = $item['title'];
          ?>
          <div class="title">
              <?php if( $title) : ?>
                  <li class="item"><?php echo $title; ?></li>
              <?php endif; ?>
          </div>
          <?php endforeach; ?>
        <?php endif; ?>
        </ul>

      </div>
      <div class="column is-8">
        <div class="gallery-wrapper">
        <?php if( $gallery_rpt ) : ?>
          <?php foreach ($gallery_rpt as $item_key => $item):
            $img = $item['img'];
          ?>
          <div class="gallery-inner inner-<?php echo $item_key;?>">
              <?php if( $img ) : ?>
                <img class="img" src="<?php echo $img['url'] ?>" alt="">
              <?php endif; ?>
          </div>
          <?php endforeach; ?>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </section>