<?php  
/* Template Name: progress Template */

get_header();
?>

<div class="body-container columns is-mobile">
  <div class="column is-9 main-dashboard">
  <?php get_template_part('./template-parts/circle'); ?>
  </div>
  <div class="column is-3 dashboard-years">
 <?php get_template_part('./template-parts/progress-bar'); ?>
  </div>
</div>

<?php get_footer();?>