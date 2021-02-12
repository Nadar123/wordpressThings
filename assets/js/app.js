jQuery(window).on('load',function($){
  handleContactForm();
  handleLoginContactForm();
  // getPostsFromApi();
  getPostsFromApiPhp();
});
/*contact form*/
function handleFromSubmit( form, data ){
  
  data.append('action','handle_ajax_form');
  data.append('page_id', site_settings.page_id );

  disableForm(true);
  jQuery.ajax({
    url  : site_settings.ajaxurl,
    data : data,
    type : 'POST',
    processData: false,
    contentType: false,
    success : function( response ){
      enableForm();

      cleanFormMessages(form);

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

function cleanFormMessages(form){
  form.find('.msg-area').html('');
}

function disableForm( loading = false ){
  console.log(loading);
  const $button =  jQuery("form[name='form-submit-na'] .button");
  console.log($button);
  $button.attr('disabled' ,'disabled');
  if( loading ){
    $button.addClass('is-loading');
  }
}

function enableForm(){
  const $button =  jQuery("form[name='form-submit-na'] .button");
  $button.removeClass('is-loading');
  $button.removeAttr('disabled');
}

function handleContactForm () {
  jQuery("form[name='form-submit-na']:not(.form-valid)").validate({
    onkeyup: function(input){
      let enableCount = 0;
      let checkInputs = ['first_name', 'last_name', 'email'];
      jQuery("form[name='form-submit-na'] input").each(function(){
        const $currentInput = jQuery(this);
        if( checkInputs.includes( $currentInput.attr('name') ) && $currentInput.val().length > 0 ){
          enableCount++;
        }
      });
      if( enableCount == checkInputs.length ){
        enableForm();
      } else{
        disableForm();
      }
    },
    rules: {
      first_name: "required",
      last_name: "required",
      email: {required: true, email: true},
    },
    messages: {
      first_name: "Please enter a first name",
      last_name: "Please enter your last name",
      email: "Please enter a valid email address",
    },

    submitHandler: function(form) {
      let $form = jQuery(form);
      let data = new FormData($form[0]);
      handleFromSubmit($form,data);
    }
  });
};

 /*progress bar*/
function initSlider(){
  jQuery('.main-dashboard').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: false,
    asNavFor: '.dashboard-years',
  });
  jQuery('.dashboard-years').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    centerMode: true,
    vertical: true,
    focusOnSelect: true,
    asNavFor: '.main-dashboard'
  });
}

function initProgressBars(){
  jQuery('.circle-item').each(function(i,v){
    var val = parseInt(jQuery(this).attr('data-current'));
    var $circle = jQuery(this).find('svg .bar-circle');
    var r = $circle.attr('r');
    var c = Math.PI*(r*2);
    var maxValue = parseInt(jQuery(this).attr('data-max'));

    if (val < 0) { val = 0;}
    if (val > maxValue) { val = maxValue;}
    
    var pct = ((maxValue-val)/maxValue)*c;
    
    $circle.css({ strokeDashoffset: pct});
    
    jQuery(this).find('.count-circle').attr('data-pct',val);
  });
}
/*menu*/
jQuery("#toggle").click(function() {
  jQuery(this).toggleClass("on");
  jQuery("#menu").slideToggle("slow");
});

// jQuery('#toggle, #menu').click(function () {
//     if(jQuery('#toggle').is(':visible')){
//     jQuery('#toggle').fadeOut(function () {
//         jQuery('.mb-top-menu').toggle('slide', {
//             direction: 'left'
//         }, 1000);
//     });
//     }
//     else{
//         jQuery('.mb-top-menu').toggle('slide', {
//             direction: 'left'
//         }, 1000, function(){ jQuery('#toggle').fadeIn();});
//     }
// });
/*post from api*/

function getPostsFromApi() {
  if( jQuery('body').hasClass('home') ){
   jQuery.ajax({
    url  : 'https://jsonplaceholder.typicode.com/posts',
    type : 'GET',
    processData: false,
    contentType: false,
    success : function( response ){
      console.log(response);
      if( response && response.length > 0 ){
        const $postWrapper = jQuery('<div id="post-wrapper"></div>');
        jQuery.each(response, function(i,v){
          const $itemWrapper = jQuery('<div class="post-item"></div>');

          $itemWrapper.append('<div class="title">'+ v.title +'</div>');
          $itemWrapper.append('<div class="body">'+ v.body +'</div>');

          $postWrapper.append($itemWrapper);
        });
        jQuery('body').append($postWrapper);
      }
    }
   });
  }
}

/*api with php*/
function getPostsFromApiPhp() {
  if( jQuery('body').hasClass('home') ){
   jQuery.ajax({
    url  : site_settings.ajaxurl,
    data : {
      action: 'get_posts_from_api'
    },
    type : 'POST',
    success : function( response ){
      console.log(response);
      if( response && response.length > 0 ){
        const $postWrapper = jQuery('<div id="post-wrapper"></div>');
        jQuery.each(response, function(i,v){
          const $itemWrapper = jQuery('<div class="post-item"></div>');
          
          $itemWrapper.append('<div class="title">'+ v.title +'</div>');
          $itemWrapper.append('<div class="body">'+ v.body +'</div>');

          $postWrapper.append($itemWrapper);
        });
        jQuery('body').append($postWrapper);
      }
    }
   });
  }
}