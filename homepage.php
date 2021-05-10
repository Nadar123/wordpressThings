<?php

/* Template Name: Homepage Template */

get_header();
?>

<div class="home-page" >
  <?php get_template_part('./template-parts/homepage/top-section'); ?>
  <?php get_template_part('./template-parts/homepage/soical'); ?>
  <?php get_template_part('./template-parts/homepage/lets-play'); ?>
</div>

<?php get_footer(); ?>
