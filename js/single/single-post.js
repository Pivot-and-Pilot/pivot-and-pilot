$('#related-blog-posts').slick({
  arrows: false,
  centerMode: true,
  centerPadding: '11.25px',
  infinite: true,
  initialSlide: 1,
  mobileFirst: true,
  responsive: [
  {
    breakpoint: 767,
    settings: {
      adaptiveHeight: false,
      centerPadding: '30px',
      slidesToShow: 2,
    }
  },
  {
    breakpoint: 1024,
    settings: {
      adaptiveHeight: false,
      centerPadding: '60px',
      slidesToShow: 2
    }
  },
  {
    breakpoint: 1199,
    settings: {
      adaptiveHeight: false,
      centerPadding: '60px',
      slidesToShow: 3
    }
  }
  ]
});

$("#entry-blog-content blockquote").each(function(index) {
    const default_twitter_url = 'https://twitter.com/intent/tweet?url=';
    const tiny_url = $('#entry-blog-content').data('tinyUrl');
    const current_url = encodeURIComponent(tiny_url);
    var str = $(this).children().first().text();
    str = str.slice(0, 140 - current_url.length);
    if(140 - current_url.length < str.length){
      str = str + '...';
    }
    str = encodeURIComponent(str);

    // str = str.replace(/\s/g, "%20")
    const href_str = default_twitter_url + current_url + "&text=" + str;
    const $link = $('<a>', {href: href_str, class: 'tweet', target: '_blank'});
    $(this).append($link);
  });

$('.toggle_mc_form').on('click', function(){
  $('#form-newsletter').toggleClass('state-active');
});

$(window).on('load', function(){
  if($(this).outerWidth() > 1024){
    $('#entry-share-icons').removeClass('state-hidden');
  }
})