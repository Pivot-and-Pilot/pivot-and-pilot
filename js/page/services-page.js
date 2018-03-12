jQuery(document).ready(function($){

  (function howWeDoItToggle () {
		$('.how-we-do-it-title').on('click', (e) => {
      if ($(window).width() < 1050) {
        if ( $($(e.target).parent()).css('height') == '65px' ) {
          $('.how-we-do-it-single-wrap').css('max-height', '65px');
          $('.line-two').css('display', 'block');
          $($(e.target).parent()).css({
            'max-height': '2000px',
          });
          $($(e.target).children().children()[1]).css('display', 'none');
        } else {
          $($(e.target).parent()).css({
            'max-height': '65px',
          });
          $($(e.target).children().children()[1]).css('display', 'block');
        }
      }
      if ($(window).width() > 1050) {
        if ( $($(e.target).parent()).css('height') == '80px' ) {
          $('.how-we-do-it-single-wrap').css('max-height', '80px');
          $('.line-two').css('display', 'block');
          $($(e.target).parent()).css({
            'max-height': '2000px',
          });
          $($(e.target).children().children()[1]).css('display', 'none');
        } else {
          $($(e.target).parent()).css({
            'max-height': '80px',
          });
          $($(e.target).children().children()[1]).css('display', 'block');
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