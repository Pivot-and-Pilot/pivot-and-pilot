$('#portfolio-menu-toggle').on('click',function(){
  $(this).toggleClass('state-active');
  $(this).parent().toggleClass('state-hidden');
});

$('#player').on('click', function(e){
  $(this).removeClass('state-active');
});

$('.play_video').on('click', function(e){
  e.preventDefault();
  e.stopPropagation();
  $('#player').addClass('state-active');
  $('#player iframe').attr('src', $(this).data('embedId'));
});



(function(){

    const f = document.getElementsByClassName('branding-font-image');

    for(var i = 0; i < f.length; i++){

        f[i].classList.add('state-hidden');

    }

    window.addEventListener('scroll', function(){

        for(var i = 0; i < f.length; i++){

            if(f[i].getBoundingClientRect().top < this.innerHeight){

                f[i].classList.remove('state-hidden');

            } else {

                f[i].classList.add('state-hidden');

            }

        }

    });

})();