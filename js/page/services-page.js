jQuery(document).ready(function($){

  (function howWeDoItToggle () {
    $('.how-we-do-it-title').on('click', (e) => {
        $($(e.target).siblings()).toggle();
        $($(e.target).children().children()[1]).toggle();
    })
  })();

  (function rellax () {
    if ($(window).width() > 768) {
        var rellax = new Rellax('.rellax', {
            center: true,
        });   
    }
  })();

})