(function(){

    var cIndex = 0;

    const c = document.querySelectorAll('.contact-form-container > div');
    const cButtons = document.querySelectorAll('.contact-nav > button');
    const cContainer = document.querySelector('.contact-form-container');
    const cNext = document.querySelector('.contact-arrows > .next');
    const cPrev = document.querySelector('.contact-arrows > .prev');
    const i = document.getElementById('inner-menu-toggle');
    const ii = document.getElementsByClassName('inner-menu-toggle');
    const l = document.getElementById('loader');
    const m = document.getElementById('masthead');
    const w = document.getElementById('warning');


    window.addEventListener('load', function(){

        m.classList.remove('state-hidden');

        setTimeout(function(){

            l.classList.add('state-loaded');

            setTimeout(function(){

                l.parentNode.removeChild(l);
                m.classList.add('state-expanded');

            }, 1500);


        }, 2000);

    });






    i.addEventListener('click', function(){

        if(!i.classList.toggle('state-active')){

            for(var x = 0; x < ii.length; x++){

                ii[x].classList.remove('state-active');

            }

        }

    });

    i.addEventListener('mouseenter', function(){

        if(window.outerWidth > 1024){

            this.classList.add('state-active');

            document.getElementById('masthead').classList.add('state-active');

        }

    });

    i.addEventListener('mouseleave', function(){

        if(window.outerWidth > 1024){

            this.classList.remove('state-active');

            for(var x = 0; x < ii.length; x++){

                ii[x].classList.remove('state-active');

            }

            if(window.scrollY < 110){

                m.classList.remove('state-active')

            }

        }

    });






    for(var x = 0; x < ii.length; x++){

        ii[x].addEventListener('mouseenter', function(){

            if(window.outerWidth > 1024){

                for(var y = 0; y < ii.length; y++){

                    ii[y].classList.remove('state-active');

                }                

                this.classList.add('state-active');

            }

        });

    }

    for(var x = 0; x < ii.length; x++){

        ii[x].addEventListener('click', function(e){

            e.stopPropagation();

            if(window.outerWidth < 1025){

                if(this.classList.toggle('state-active')){

                    for(var y = 0; y < ii.length; y++){

                        if(ii[y] !== this){

                            ii[y].classList.remove('state-active');

                        }

                    }

                }

            }

        });

    }



    // cNext.addEventListener('click', function(e){

    //     nextIndex = cIndex + 1;

    //     if(nextIndex !== c.length){

    //         e.preventDefault();
    //         switchContactPage(nextIndex);

    //     }

    // });


    function switchContactPage(index){

        if(unlockContainer()){

            
            
        }

    }

    function unlockContainer(){

        if(document.querySelectorAll('.service-checkbox:checked').length > 0){

            w.innerText = ""
            return true;

        } else {

            w.innerText= "Please Select At Least One Option"
            return false;

        }

    }





})();

function outputUpdate(id, val){
  const output_query = "#" + id + "-output";
  document.querySelector(output_query).value = val;
}

$('.contact-arrows > .next').on('click', function(e){

  const next_index = $('.contact-form-container > div.state-active').index() + 1;

  console.log(next_index);

  if(next_index !== 3){

    e.preventDefault();

    if($('.service-checkbox:checked').length > 0){

      if(next_index === 2){
        $(this).addClass('mail');
      }

      $('#warning').html('');

      $('.contact-arrows > .prev').removeClass('disabled');

      $('.contact-nav > button').removeClass('state-active');
      $('.contact-nav > button').eq(next_index).addClass('state-active');

      $('.contact-form-container > div').removeClass('state-active');
      $('.contact-form-container > div').eq(next_index).addClass('state-active');
      $('.contact-form-container').css('height', $('.contact-form-container > div').eq(next_index).outerHeight());

    } else {

      $('#warning').html('please select at least one option');

    }

  }

});

$('.contact-arrows > .prev').on('click', function(e){
  e.preventDefault();
  if($('.service-checkbox:checked').length > 0){

    const prev_index = $('.contact-form-container > div.state-active').index() - 1;

    if(prev_index === 0){
      $(this).addClass('disabled');
    }

    $('.contact-nav > button').removeClass('state-active');
    $('.contact-nav > button').eq(prev_index).addClass('state-active');

    $('.contact-form-container > div').removeClass('state-active');
    $('.contact-form-container > div').eq(prev_index).addClass('state-active');
    $('.contact-form-container').css('height', $('.contact-form-container > div').eq(prev_index).outerHeight());

    $('.contact-arrows > .next').removeClass('mail');

  } else {
    $('#warning').html('please select at least one option')
  }
});

$('.contact-nav > button').on('click', function(e){

  e.preventDefault();

  if($('.service-checkbox:checked').length > 0){

    $('#warning').html('');

    $('.contact-nav > button').removeClass('state-active');
    $(this).addClass('state-active');

    $('.contact-form-container > div').removeClass('state-active');
    $('.contact-form-container > div').eq($(this).index()).addClass('state-active');
    $('.contact-form-container').css('height', $('.contact-form-container > div').eq($(this).index()).outerHeight());

    if($(this).index() > 0){
      $('.contact-arrows > .prev').removeClass('disabled');
    } else {
      $('.contact-arrows > .prev').addClass('disabled');
    }

    if($(this).index() === 2){
      $('.contact-arrows > .next').addClass('mail');
    } else {
      $('.contact-arrows > .next').removeClass('mail');
    }

  } else {
    $('#warning').html('please select at least one option')
  }

});

 
document.querySelector( '.wpcf7' ).addEventListener( 'wpcf7invalid', function( event ) {
    $('.contact-form-container').css('height', $('.contact-form-container > div').eq(2).outerHeight());
}, false );

document.querySelector( '.wpcf7' ).addEventListener( 'wpcf7mailsent', function( event ) {
  
  if($('#mailchimp-checkbox').is(':checked')){
    $.ajax({
      type        : 'post',
      url         : '//pivotandpilot.us11.list-manage.com/subscribe/post-json?u=7ddaf618b12da96febfea34ac&id=a1e4c0c38e&c=?',
      data        : $('.wpcf7 > form').eq(0).serialize(),
      cache       : false,
      dataType    : 'json',
      contentType : "application/json; charset=utf-8",
      error       : function(err) { alert("Could not connect to the registration server. Please try again later."); },
      success     : function(data) {
        if (data.result != "success") {
          // TODO -- Notify clients to check their email to confirm subscription to the Mailchimp service.
            $('.contact-nav').remove();
            $('.contact-form-container').remove();
            $('.contact-arrows').remove();
            $('.wpcf7-form').remove();

            $('#contact > footer').remove();

            $('.wpcf7').addClass('form-submitted');

            const $back_text = $('<h1>').html('Thank You! Please check your email to subscribe to our newsletter.');
            const $back_button = $('<button>').addClass('alternate toggle-contact').html('Back to Site');

            $('.wpcf7').append($back_text);
            $('.wpcf7').append($back_button);
        } else {
          $('.contact-nav').remove();
          $('.contact-form-container').remove();
          $('.contact-arrows').remove();
          $('.wpcf7-form').remove();

          $('#contact > footer').remove();

          $('.wpcf7').addClass('form-submitted');

          const $back_text = $('<h1>').html('Thank You! Please check your email to subscribe to our newsletter.')
          const $back_button = $('<button>').addClass('alternate toggle-contact').html('Back to Site');

          $('.wpcf7').append($back_text);
          $('.wpcf7').append($back_button);
        }
      }
    });
  } else {
    $('.contact-nav').remove();
    $('.contact-form-container').remove();
    $('.contact-arrows').remove();
    $('.wpcf7-form').remove();

    $('#contact > footer').remove();

    $('.wpcf7').addClass('form-submitted');

    const $back_text = $('<h1>').html('Thank You! We will get back to you soon.');
    const $back_button = $('<button>').addClass('alternate toggle-contact').html('Back to Site');

    $('.wpcf7').append($back_text);
    $('.wpcf7').append($back_button);
  }

}, false );

$('.service-slider').css('display', 'none');

$('.service-checkbox').on('click',function(e){
  const index = $(this).parent().index();

  const corresponding_slider = $('.service-slider').eq(index);
  corresponding_slider.is(':visible') ? corresponding_slider.css('display','none') : corresponding_slider.css('display','inline-block');

  const corresponding_input = $(this).parent().find('input[type="hidden"]');
  corresponding_input.val() === 'false' ? corresponding_input.val('true') : corresponding_input.val('false');
})

$('#page').on('click', '.toggle-contact', function(e){
  e.preventDefault();
  $('body').toggleClass('state-locked');
  $('#contact').toggleClass('state-active');
});


var current_scroll = 0;

$(window).on('scroll', _.throttle(function(){

  const new_scroll = $(this).scrollTop();

  if($('#form-newsletter').length > 0){
    if(new_scroll + $(this).outerHeight() > $('#related-blog-posts').offset().top){
      $('#entry-share-icons').addClass('state-hidden');
      $('#toggle-mc-form').addClass('state-hidden');
      $('#mc_embed_signup').removeClass('state-active');
    } else {
      $('#toggle-mc-form').removeClass('state-hidden');
      $('#entry-share-icons').removeClass('state-hidden');
    }
  }

  // DOWNSCROLL
  if(current_scroll < new_scroll){

    if($('#portfolio-menu').length > 0){
      $('#portfolio-menu').addClass('state-hidden');
      $('#portfolio-menu-toggle').removeClass('state-active');
    }

    if(new_scroll > 110){
      $('#masthead').removeClass('state-expanded');
      if(!$('#site-navigation').hasClass('toggled')){
        $('#masthead').addClass('state-hidden');
      }
      $('#masthead').addClass('state-active');
    } else {
      $('#masthead').addClass('state-active');
    }

    if($('#form-newsletter').length > 0){
      $('#mc_embed_signup').removeClass('state-active');
    }

  // UPSCROLL
  } else {

      if(new_scroll < 110){$('#masthead').removeClass('state-active');}
      $('#masthead').removeClass('state-hidden');
      $('#masthead').addClass('state-expanded');

      if($('#form-newsletter').length > 0){
        if(new_scroll + $(this).outerHeight() < $('#related-blog-posts').offset().top){
          $('#mc_embed_signup').addClass('state-active');
        } else {
          $('#mc_embed_signup').removeClass('state-active');
        }
      }

      if($('#portfolio-menu').length > 0){
        if(new_scroll == 0){
          $('#portfolio-menu').removeClass('state-hidden');
          $('#portfolio-menu-toggle').addClass('state-active');
        }
      }

  }

  current_scroll = new_scroll;

}, 125));
