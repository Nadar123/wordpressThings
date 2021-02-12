<?php
  /* Template Name: Homepage Template */
  $lastposts = get_field('lastposts');

  get_header();
?>
 <div id="test" class="columns">
    <div class="column is-6">
      <?php if ( is_active_sidebar( 'new-widget-area' ) ) : ?>
        <div id="secondary-sidebar" class="new-widget-area">
        <?php dynamic_sidebar( 'new-widget-area' ); ?>
        </div>
      <?php endif; ?>
    </div>
    <hr>
    <div class="column is-6">
      <div class="short-code">
        <?php do_shortcode($lastposts); ?>
      </div>
    </div>
  </div>

<form 
  action="<?php the_permalink();?>" 
  method="post" class="js-form" 
  name="form-submit-na" 
  novalidate="novalidate">
  <div class="inner-form">
    <div class="field name-field">
      <div class="control inner-control">
      <label for="first_name">First Name*</label>
        <input class="input is-info" type="text" name="first_name" id="first_name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
      </div>
      <div class="control inner-control">
      <label for="last_name">Last Name*</label>
        <input class="input is-info" type="text" name="last_name" id="last_name">
      </div>
    </div>
    <div class="field">
      <div class="control">
      <label for="email">Email*</label>
        <input class="input is-info" type="email" name="email" id="email">
      </div>
    </div>
    <div class="field">
      <div class="control">
        <label for="message">Message</label>
        <textarea class="textarea is-info" name="message" id="message"></textarea>
      </div>
    </div>

    <div class="control">
      <button class="button is-primary submit-btn" type="submit" disabled=""> Submit</button>
    </div>
  </div>
  <div class="msg-area"></div>
</form>


<form 
  action="<?php the_permalink();?>" 
  method="post" 
  class="js-form" 
  name="form-test">
  <div class="form-inner">
    <div class="input-wrapper">
      <label for="full_name"> full Name</label>
      <input type="text" name="full_name" id="full_name">
   
    </div>
    <div class="input-wrapper">
      <label for="phone">Phone</label>
      <input type="tel" name="phone" id="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
    </div>
    <div class="input-wrapper">
      <label for="email">Email</label>
      <input type="email" name="email" id="email">
    </div>
    <div class="input-wrapper">
      <label for="">your Best Food</label>
      <select name="best_food" id="best_food">
        <option value="Pizza"></option>
        <option value="Pizza_2">Pizza 2</option>
        <option value="Pizza_3">Pizza 3</option>
        <option value="Pizza_4">Pizza 4</option>
      </select>
    </div>
    <div class="input-wrapper">
      <p>Please select your gender:</p>
      <div class="inner">
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
      </div>

      <div class="inner">
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
      </div>
      <div class="inner">
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label> 
      </div>
    </div>
    <div class="input-wrapper">
    <label for="text">write your comment</label>
    <textarea name="text" id="text" cols="30" rows="10" ></textarea>
    </div>
    <div class="input-wrapper">
      <button type="submit"> Submit</button>
    </div>
    <div class="msg-form-full-name"></div>
    <div class="msg-form-phone"></div>
    <div class="msg-form-email"></div>
    <div class="msg-form-gender"></div>
  </div>
</form>

<div id="test" class="columns">
  <div class="column is-12">
    <div class="content">
        <?php if(have_rows('content')) :?>

          <?php while( have_rows('content') ): the_row(); ?>

            <?php if(get_row_layout() === 'nadar section' ):
              $cols = get_sub_field('rpt'); 
              ?>
            
      
              <?php foreach($cols as $col): ?>
                <h3><?php echo $col['title'] ?></h3>
                <p><?php echo $col['text'] ?></p>
                <?php endforeach; ?>

            <?php endif; ?>
          <?php endwhile; ?>

        <?php endif; ?>
    </div>
  </div>
</div>

<div class="posts">
  <?php 
    $homeposts = new WP_Query(array(
      'post_per_page' => 3,

    ));
    while($homeposts->have_posts()): $homeposts->the_post() 
    ?>
    <div class="wrapper-post">
      <h2><?php the_title(); ?></h2>
        <div class="img">
          <?php the_post_thumbnail(); ?>
        </div>
      <p><?php the_content() ?></p>
    </div>

  <?php endwhile; ?>

  <div class="events-pagination">
    <?php previous_post_link('%link', 'קודם', false ); ?>
    <?php next_post_link( '%link', 'הבא', false ); ?>
  </div>
</div>
<?php get_footer(); ?>
