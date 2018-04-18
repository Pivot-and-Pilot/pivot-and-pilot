// $('#featured-case-studies').slick({
//   adaptiveHeight: true,
//   arrows: false,
//   centerMode: true,
//   centerPadding: '11.25px',
//   infinite: true,
//   initialSlide: 1,
//   mobileFirst: true,
//   responsive: [
//   {
//     breakpoint: 767,
//     settings: {
//       adaptiveHeight: false,
//       centerPadding: '60px',
//     }
//   },
//   {
//     breakpoint: 1024,
//     settings: {
//       adaptiveHeight: false,
//       arrows: false,
//       autoplay: false,
//       centerMode: false,
//       centerPadding: 0,
//       cssEase: 'linear',
//       dots: true,
//       fade: true,
//       infinite: true
//     }
//   }
//   ]
// });

function resetAccordion(){
  $('#accordion-slider > figure')
    .css('height', '')
    .attr('data-height', '')

  setTimeout(function(){
    $('#accordion-slider > figure')
      .each(function(){
        $(this).data('height', $(this).outerHeight());
        $(this).attr('data-height', $(this).outerHeight());
      })
      .css('height', Math.max.apply(Math, $('#accordion-slider > figure').map(
        function() { return $(this).outerHeight(); })
      ));
  }, 1500);

  setTimeout(function(){
    $('#accordion-slider').css('height', $('#accordion-slider > figure').eq($('#accordion-slider > figure.state-active').length - 1).data('height'));
  }, 2000);
}

$(window).on('resize', _.throttle(resetAccordion, 500));

$(document).ready(function(){
  setTimeout(function(){

    $('#accordion-slider').css('height', $('#accordion-slider > figure').eq(0).outerHeight());

    $('#accordion-slider > figure')
      .attr('data-height', function(){return $(this).outerHeight()})
      .css('height', Math.max.apply(Math, $('#accordion-slider > figure').map(
        function() { return $(this).outerHeight(); })
      ));

  }, 1000);
});

(function(){

const a_buttons = document.querySelectorAll('#accordion-slider > button');
const a_menuitems = document.querySelectorAll('#accordion-nav > menuitem');
const a_navigation = document.getElementById('accordion-nav');
const a = document.getElementById('accordion-slider');
const g = document.getElementById('gradient');
const l = document.getElementById('landing');
const s = document.querySelectorAll('#accordion-slider > figure');
const v = document.getElementById('viewwork');


// INIT SLIDER


for(var i = 0; i < s.length; i++){

  s[i].addEventListener('click', function(){

    const index = getElementIndex(this);

    changeSlider(index);

  });

}


for(var j = 0; j < a_menuitems.length; j++){

    a_menuitems[j].addEventListener('click', function(){

        const index = getElementIndex(this);

        changeSlider(index);

    });

}


for(var k = 0; k < a_buttons.length; k++){

    a_buttons[k].addEventListener('click', function(){

        if(this.classList.contains('next')){

            const nextIndex = parseInt(a.dataset.index) + 1;

            console.log(nextIndex);

            if(nextIndex < s.length){

                changeSlider(nextIndex);

            }

        } else {

            const prevIndex = parseInt(a.dataset.index) - 1;

            if(prevIndex >= 0){

                changeSlider(prevIndex);

            }

        }

    });

}


function changeSlider(index){

    a.dataset.index = index;

    a_navigation.dataset.index = index;

    a.style.height = s[index].dataset.height + "px";

    for(var j = 0; j < a_menuitems.length; j++){

        a_menuitems[j].classList.remove('state-active');

        if(j === index){

            a_menuitems[j].classList.add('state-active');

        }

    }

    for(var k = 0; k < s.length; k++){

        s[k].classList.remove('state-active');

    }

    for(var l = 0; l <= index; l++){

        s[l].classList.add('state-active');

    }
}


function getElementIndex(node) {

    var index = 0;

    while ( (node = node.previousElementSibling) ) {
        index++;
    }
    return index;}



var c_size = 0;
var c_contract_animation = null;
var c_expand_animation = null;


var c_x = 0;
var c_y = 0;


l.addEventListener('mousemove', circleMove);

function circleMove(e){

    c_x = e.pageX;
    c_y = e.pageY;

    window.requestAnimationFrame(function(){
        l.style.background = "radial-gradient(circle at " + c_x + "px " + c_y +"px, rgb(236, 235, 254) " + c_size + "%, rgb(68, 60, 255) 95%)";
    });

}



v.addEventListener('mouseenter', circleExpand);

function circleExpand(){

    window.cancelAnimationFrame(c_contract_animation);

    c_size = c_size + 2;
    l.style.background = "radial-gradient(circle at " + c_x + "px " + c_y + "px, rgb(236, 235, 254) " + c_size + "%, rgb(68, 60, 255) 95%)";

    if(c_size < 100){

        c_expand_animation = window.requestAnimationFrame(circleExpand);
            
    }

}

v.addEventListener('mouseleave', circleContract);

function circleContract(){

    window.cancelAnimationFrame(c_expand_animation);

    c_size = c_size - 2;
    l.style.background = "radial-gradient(circle at " + c_x + "px " + c_y + "px, rgb(236, 235, 254) " + c_size + "%, rgb(68, 60, 255) 95%)";

    if(c_size > 0){

        c_contract_animation = window.requestAnimationFrame(circleContract)
            
    }

}

})();


jQuery(document).ready(function($){

    (function howWeDoItToggle () {
			$('.how-we-do-it-title').on('click', (e) => {
				if ($(window).width() < 1050) {
					if ( $($(e.currentTarget).parent()).css('height') == '65px' ) {
						$('.how-we-do-it-single-wrap').css('max-height', '65px');
						$('.line-two').css('display', 'block');
						$($(e.currentTarget).parent()).css({
							'max-height': '1000px',
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
							'max-height': '1000px',
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