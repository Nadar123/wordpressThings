<?php
  /* Template Name: Login Template */
  get_header();
?>
<div id="test" class="columns">
  <div class="column is-6">
    <h2>Login</h2>
    <form 
      action="<?php the_permalink();?>" 
      class="js-login-form 
      form-login" method="POST"
      name="form-submit-log">
      <div class="input-wrap">
      <label for="email">Email</label>

        <input type="email" name="email" id="email">
      </div>
      <div class="input-wrap">
      <label for="password">Password</label>
        <input type="password" name="password" id="password">
      </div>
      <div class="remember">
        <label for="remember"> Remember me</label>
        <input type="checkbox" name="remember" id="remember">
      </div>
      <div class="input-wrap">
      <button class="button is-primary submit-btn" type="submit" disabled=""> Login </button>
      </div>
      <div class="msg-area"></div>
    </form>
  </div>
  <div class="column is-6">
      <h2>Register </h2>
      <form 
      action="<?php the_permalink();?>" 
      class="js-register-form form-register" 
      method="POST" 
      novalidate
      name="form-submit-rg">
        <div class="input-wrap">
          <label for="first_name">first name</label>
          <input type="text" name="first_name" id="first_name">
        </div>
        <div class="input-wrap">
          <label for="last_name">last name</label>
          <input type="text" name="last_name" id="last_name">
        </div>
        <div class="input-wrap">
        <label for="email">Email</label>

          <input type="email" name="email" id="email">
        </div>
        <div class="input-wrap">
        <label for="password">Password</label>
          <input type="password" name="password" id="password">
        </div>
        <div class="input-wrap">
        <label for="confirm_password">Password</label>
          <input type="password" name="confirm_password" id="confirm_password">
        </div>
      
        <div class="input-wrap">
        <button class="button is-primary submit-btn" type="submit" disabled=""> Register </button>

        </div>
        <div class="msg-area"></div>
      </form>
  </div>
</div>

<?php get_footer(); ?>
