// jQuery(window).on('load',function($){
//   handleRegisterFormSubmit();
// });



// function handleRegisterFormSubmit(){
//   jQuery(document).on('submit','.js-register-form',function(e){
//     e.preventDefault();
//     let $form = jQuery(this);
//     let data  = new FormData($form[0]);
//     data.append('action','register_ajax_form');

//     jQuery.ajax({
//       url  : site_settings.ajaxurl,
//       data : data,
//       type : 'POST',
//       processData: false,
//       contentType: false,
//       success : function( response ){
//         if( response.success ){
//           if( response.msg ){
//             $form.find('.msg-form-first-name').html('<span>' + response.msg + '</span>');
//           }
//           if(response.redirect){
//             setTimeout(() => {
//               window.location.assign(response.redirect);
//             }, 300);
//           }
//         } else{
//           alert('Error');
//         }
//       }
//     });
//   });
// }

jQuery(window).on('load',function($){
  handleRegisterContactForm();
});


/*login form*/
function handleRegisterFromSubmit( form, data ){
  
  data.append('action','register_ajax_form');
  data.append('page_id', site_settings.page_id );

  disableRegisterForm(true);
  jQuery.ajax({
    url  : site_settings.ajaxurl,
    data : data,
    type : 'POST',
    processData: false,
    contentType: false,
    success : function( response ){
      enableRegisterForm();

      cleanRegisterFormMessages(form);

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

function cleanRegisterFormMessages(form){
  form.find('.msg-area').html('');
}

function disableRegisterForm( loading = false ){
  console.log(loading);
  const $button =  jQuery("form[name='form-submit-rg'] .button");
  console.log($button);
  $button.attr('disabled' ,'disabled');
  if( loading ){
    $button.addClass('is-loading');
  }
}

function enableRegisterForm(){
  const $button =  jQuery("form[name='form-submit-rg'] .button");
  $button.removeClass('is-loading');
  $button.removeAttr('disabled');
}

function handleRegisterContactForm () {
  jQuery("form[name='form-submit-rg']:not(.form-valid)").validate({
    onkeyup: function(input){
      let enableCount = 0;
      let checkInputs = 
        ['first_name', 'last_name', 'email', 'password', 'confirm_password'];
      jQuery("form[name='form-submit-rg'] input").each(function(){
        const $currentInput = jQuery(this);
        if( checkInputs.includes( $currentInput.attr('name') ) && $currentInput.val().length > 0 ){
          enableCount++;
        }
      });
      if( enableCount == checkInputs.length ){
        enableRegisterForm();
      } else{
        disableRegisterForm();
      }
    },
    rules: {
      first_name: {required: true},
      last_name: {required: true },
      email: {required: true, email: true},
      password: {required: true},
      confirm_password: {required: true}

    },
    messages: {
      first_name: "Please enter first name",
      last_name: "Please enter last name",
      email: "Please enter a vaild mail",
      password: "Password in not vaild",
      confirm_password:"passwords are not equal"
    },

    submitHandler: function(form) {
      let $form = jQuery(form);
      let data = new FormData($form[0]);
      handleRegisterFromSubmit($form,data);
    }
  });
};