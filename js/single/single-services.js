$(window).on('resize', _.throttle(function(){
  if($(this).outerWidth() > 767){
    $('#service-slider').slick('unslick');
  } else {
    if(!$('#service-slider').hasClass('slick-initialized')){
      $('#service-slider').slick({
        arrows: false,
        infinite: false,
        mobileFirst: true,
        slidesToShow: 2
      });
    }
  }
}, 100));

$(window).on('load', function(){
  if($(this).outerWidth() < 768){
    $('#service-slider').slick({
      arrows: false,
      infinite: false,
      mobileFirst: true,
      slidesToShow: 2
    });
  }
})

$('#service-overlay-slider').slick({
  adaptiveHeight: false,
  fade: true,
  infinite: false
});

$('#service-overlay-slider').on('afterChange', function (event, slick, currentSlide) {

    if($('.slick-next').hasClass('slick-disabled')) {
        $('.slick-next').addClass('toggle-benefit');
    }
    else {
        $('.slick-next').removeClass('toggle-benefit');
    }

    if($('.slick-prev').hasClass('slick-disabled')) {
        $('.slick-prev').addClass('toggle-benefit');
    }
    else {
        $('.slick-prev').removeClass('toggle-benefit');
    }  
});

$('.benefit').on('click', function(){
  $('#service-overlay-slider').slick('slickGoTo', $(this).index());
  $('#service-overlay').addClass('state-active');
});

$('#player').on('click', function(e){
  $(this).removeClass('state-active');
});

// $('.play_video').on('click', function(e){
//   e.preventDefault();
//   e.stopPropagation();
//   $('#player').addClass('state-active');
//   $('#player > iframe').attr('src', $(this).data('embedId'));
// });

$('#service-overlay').on('click', '.toggle-benefit', function(){
  $('#service-overlay').removeClass('state-active');
});

(function(){

  var current_video_index = 0;

  const iframe = document.querySelector('#player > iframe');

  const player = document.getElementById('player');
  const player_backward = document.getElementById('player_backward');
  const player_forward = document.getElementById('player_forward');
  const play_video = document.querySelectorAll('.play_video');

  for(var i = 0; i < play_video.length; i++){

    play_video[i].addEventListener('click', function(e){

      e.preventDefault();
      e.stopPropagation();

      player.classList.add('state-active'); 
      iframe.src = this.dataset.embedId;

      current_video_index = Array.prototype.indexOf.call(play_video, this);

      console.log(current_video_index);

    });

  }

  player_forward.addEventListener('click', function(e){

    e.stopPropagation();

    if( current_video_index === play_video.length - 1 ){

      current_video_index = 0;

    } else {

      current_video_index = current_video_index + 1;

    }

    iframe.src = play_video[current_video_index].dataset.embedId;

  });


  player_backward.addEventListener('click', function(e){

    e.stopPropagation();

    if( current_video_index === 0 ){

      current_video_index = play_video.length - 1;

    } else {

      current_video_index = current_video_index - 1;

    }

    iframe.src = play_video[current_video_index].dataset.embedId;

  });



})();