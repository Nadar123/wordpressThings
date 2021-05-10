<?php
$footer_logo = get_field('footer_logo','option');
$company_address = get_field('company_address', 'option');
$social_logo_rpt = get_field('social_logo_rpt', 'option');
$greek_time_logo = get_field('greek_time_logo', 'option');
?>

  <footer class="footer">
    <div class="columns">
        <div class="column is-2">
          <div class="col-wrapper">
            <div class="logo-wrapper">
              <img src="<?php echo $footer_logo['url']; ?>" alt="">
            </div>
            <p class="adress"> <?php echo $company_address;?></p>
          </div>
        </div>
        <div class="column is-8">
          <?php get_template_part('./template-parts/footer/nav-footer'); ?>
        </div>
      
        <div class="column is-2">
          <div class="col-wrapper">
          <ul class="lsoical-icons">
          <?php if( $social_logo_rpt ) : ?>
            <?php foreach ($social_logo_rpt as $item):
              $icon = $item['icon'];
            ?>
            <div class="icon-wrapper">
              <?php if( $icon ) : ?>
                <img class="img" src="<?php echo $icon['url'] ?>" alt="">
              <?php endif; ?>          
            </div>
         
            <?php endforeach; ?>
          <?php endif; ?>
          </ul>
          <div class="greek-logo">
            <img src="<?php echo $greek_time_logo['url']?>" alt="">
          </div>
          </div>
      </div>
    </div>
  </footer>

    <?php wp_footer(); ?>
    <!-- <script 
  type="text/javascript" 
  src="https://cdnjs.cloudflare.com/ajax/libs/matter-js/0.8.0-alpha/matter.js"></script> -->
  </body>
</html> 
