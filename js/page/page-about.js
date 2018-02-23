$('#about-us-slider').slick({
  arrows: false,
  autoplaySpeed: 4000,
  dots: true,
  speed: 500,
  fade: true,
  cssEase: 'linear'
});

$('#about-us-team-slider').slick({
  arrows: false,
  appendArrows: $('#about-us-menu'),
  centerMode: true,
  centerPadding: '15px',
  mobileFirst: true,
  slidesToShow: 1,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerPadding: '25vw',
        initialSlide: 1,
        infinite: true,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 900,
      settings: {
        arrows: true,
        centerPadding: '30vw',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 1200,
      settings: {
        arrows: true,
        centerPadding: '32.5vw',
        slidesToShow: 1
      }
    }
  ]
});