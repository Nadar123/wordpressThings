jQuery(window).on('load',function($){
  handleLoginContactForm();
});


/*login form*/
function handleLoginFromSubmit( form, data ){
  
  data.append('action','handle_ajax_login_form');
  data.append('page_id', site_settings.page_id );

  disableLoginForm(true);
  jQuery.ajax({
    url  : site_settings.ajaxurl,
    data : data,
    type : 'POST',
    processData: false,
    contentType: false,
    success : function( response ){
      enableLoginForm();

      cleanLoginFormMessages(form);

      if( response.msg ){
        jQuery.each(response.msg, function(i,msg_item){
          form.find('.msg-area').append('<span>' + msg_item + '</span>');
        });
      }
      if( response.redirect ){
        window.location.assign( response.redirect );
      }
    }
  });
}

function cleanLoginFormMessages(form){
  form.find('.msg-area').html('');
}

function disableLoginForm( loading = false ){
  console.log(loading);
  const $button =  jQuery("form[name='form-submit-log'] .button");
  console.log($button);
  $button.attr('disabled' ,'disabled');
  if( loading ){
    $button.addClass('is-loading');
  }
}

function enableLoginForm(){
  const $button =  jQuery("form[name='form-submit-log'] .button");
  $button.removeClass('is-loading');
  $button.removeAttr('disabled');
}

function handleLoginContactForm () {
  jQuery("form[name='form-submit-log']:not(.form-valid)").validate({
    onkeyup: function(input){
      let enableCount = 0;
      let checkInputs = ['email', 'password'];
      jQuery("form[name='form-submit-log'] input").each(function(){
        const $currentInput = jQuery(this);
        if( checkInputs.includes( $currentInput.attr('name') ) && $currentInput.val().length > 0 ){
          enableCount++;
        }
      });
      if( enableCount == checkInputs.length ){
        enableLoginForm();
      } else{
        disableLoginForm();
      }
    },
    rules: {
      email: {required: true, email: true},
      password: {required: true},
    },
    messages: {
      email: "Please enter a vaild mail",
      password: "Password in not vaild",
    },

    submitHandler: function(form) {
      let $form = jQuery(form);
      let data = new FormData($form[0]);
      handleLoginFromSubmit($form,data);
    }
  });
};