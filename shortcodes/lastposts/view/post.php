<section class="post-section">
  <?php if( ! empty( $args['title'] ) ):?>
    <div class="customizable-post-section">
      <h3 class="last-posts-title">
        <?php echo $args['title']; ?>
      </h3>
    </div>
  <?php endif;?>
<div class="last-posts">
  <?php foreach( $args['posts'] as $post_item ) : ?>
    <div class='post-wrapper'>
      <div class="post-img-wrap">
        <?php echo get_the_post_thumbnail($post_item->ID); ?>
      </div>
      <div class="content">
        <h3> <?php echo $post_item->post_title;?> </h3>
        <p><?php echo wp_trim_words($post_item->post_content, 25);?></p>
        <div class="read-link">
          <a href="<?php echo get_the_permalink($post_item); ?>"> 
          <span class="read-more-link">
            <?php _e( 'read more', 'formwithniv' )?>

          </span>
          <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div>

  <?php endforeach; ?>
</div>
</section>