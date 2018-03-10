jQuery(document).ready(function($){

  (function howWeDoItToggle () {
    $('.how-we-do-it-title').on('click', (e) => {
      if ($(window).width() < 1050) {
        if ( $($(e.target).parent()).css('height') == '60px' ) {
          $($(e.target).parent()).css({
            'max-height': '2000px',
          });
          $($(e.target).children().children()[1]).toggle();
        } else {
          $($(e.target).parent()).css({
            'max-height': '60px',
          });
          $($(e.target).children().children()[1]).toggle();
        }
      }
      if ($(window).width() > 1050) {
        if ( $($(e.target).parent()).css('height') == '110px' ) {
          $($(e.target).parent()).css({
            'max-height': '2000px',
          });
          $($(e.target).children().children()[1]).toggle();
        } else {
          $($(e.target).parent()).css({
            'max-height': '110px',
          });
          $($(e.target).children().children()[1]).toggle();
        }
      }
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