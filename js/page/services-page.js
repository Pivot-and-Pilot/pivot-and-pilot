jQuery(document).ready(function($){

  (function howWeDoItToggle () {
		$('.how-we-do-it-title').on('click', (e) => {
      if ($(window).width() < 1050) {
        if ( $($(e.currentTarget).parent()).css('height') == '65px' ) {
          $('.how-we-do-it-single-wrap').css('max-height', '65px');
          $('.line-two').css('display', 'block');
          $($(e.currentTarget).parent()).css({
            'max-height': '2000px',
          });
          $($(e.currentTarget).children().children()[1]).css('display', 'none');
        } else {
          $($(e.currentTarget).parent()).css({
            'max-height': '65px',
          });
          $($(e.currentTarget).children().children()[1]).css('display', 'block');
        }
      }
      if ($(window).width() > 1050) {
        if ( $($(e.currentTarget).parent()).css('height') == '80px' ) {
          $('.how-we-do-it-single-wrap').css('max-height', '80px');
          $('.line-two').css('display', 'block');
          $($(e.currentTarget).parent()).css({
            'max-height': '2000px',
          });
          $($(e.currentTarget).children().children()[1]).css('display', 'none');
        } else {
          $($(e.currentTarget).parent()).css({
            'max-height': '80px',
          });
          $($(e.currentTarget).children().children()[1]).css('display', 'block');
        }
      }
    })
  })();

  (function rellax () {
    var rellax = new Rellax('.rellax', {
        center: true,
    });   
  })();

})