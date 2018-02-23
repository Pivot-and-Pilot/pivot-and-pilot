// ----------------------------------------- SETUP PAGINATION IF JAVASCRIPT ENABLED && PAGINATION ENABLED

if($('.page-numbers').length > 0){
  $('.page-numbers').addClass('state-hidden');
  $('.page-numbers.next')
    .eq(0)
    .clone()
    .removeClass('next')
    .addClass('prev')
    .css('display', 'none')
    .appendTo('.nav-links')

  $('#archive-blog').data('tagId', 0);
}


function populate_posts(data){

  const post_data = data.post_data;

  const $cloneArray = [];

  for(var i = 0; i < post_data.length; i++){

    $clone = $('.post')
      .eq(0)
      .clone();

    $clone
      .find('h3')
      .html(post_data[i].title)

    $clone
      .find('.entry-meta')
      .html(post_data[i].date);

    $clone
      .find('a.entry-permalink')
      .attr('href', post_data[i].permalink);
      
    $clone
      .find('img')
      .attr('src', post_data[i].thumbnail);

    $clone
      .find('ul')
      .empty()

    $clone
      .css('display', 'block')

    for(var j = 0; j < post_data[i].terms.length; j++){
      $clone
        .find('ul')
        .append($('<li>').html(post_data[i].terms[j]))
    }

    $cloneArray.push($clone);

  }

  $('body')
    .animate({'scrollTop': 0}, 750, 'swing', function(){
      $('#post-blog-container')
        .empty()
        .append($cloneArray);
    });

  // Calculate page numbers
  const curpage = data.post_meta.paged;
  const maxpage = data.post_meta.total_pages

  $('#maxpage').html(maxpage);

  const new_page_nums = [];

  // Refresh the pagination numbers at the bottom menu
  for(var i = 1; i <= maxpage; i++ ){
    $clone = $('.page-numbers').not('.prev, .next').eq(0).clone();
    $clone
      .removeClass('current')
      .attr('href', '')
      .html(i)

    if(curpage === i){
      $clone.addClass('current');
    }

    new_page_nums.push($clone);
  }

  $('.page-numbers').not('.prev, .next').remove();
  $('.nav-links').append(new_page_nums);

  // Hide or show previous and next links
  if(curpage < maxpage){
    $('.page-numbers.next').css('display', 'inline-block');
  } else {
    $('.page-numbers.next').css('display', 'none');
  }

  if(curpage > 1){
    $('.page-numbers.prev').css('display', 'inline-block');
  } else {
    $('.page-numbers.prev').css('display', 'none');
  }

}


$('.filter_post').on('click', function(e){

  $('#curpage').html(1);

  $(this).parent().siblings().removeClass('state-active');
  $(this).parent().addClass('state-active');
  $('#archive-blog').data('tagId', $(this).data('tagId'));

  e.preventDefault();
  $.ajax({
    url: $('#archive-blog').data('baseUrl') + 'wp-json/posts/v1/posts?blog_tag=' + $(this).data('tagId'),
    success: populate_posts,
    error: function(){}
  });

});


// ----------------------------------------- PAGINATION EVENT HANDLERS

$('.nav-links').on('click', '.page-numbers.next', function(e){
  e.preventDefault();

  const curpageIndex = parseInt($('#curpage').html());
  const maxpageIndex = parseInt($('#maxpage').html());

  var query_url = '?blog_tag=' + $('#archive-blog').data('tagId');

  if(curpageIndex < maxpageIndex){
    const nextpageIndex = curpageIndex + 1;
    $.ajax({
      url: $('#archive-blog').data('baseUrl') + 'wp-json/posts/v1/posts' + query_url + '&paged=' + nextpageIndex,
      success: populate_posts,
      error: function(){}
    });
    $('#curpage').html(nextpageIndex);
  }
});

$('.nav-links').on('click', '.page-numbers.prev',function(e){
  e.preventDefault();

  const curpageIndex = parseInt($('#curpage').html());
  const maxpageIndex = parseInt($('#maxpage').html());

  var query_url = '?blog_tag=' + $('#archive-blog').data('tagId');

  if(curpageIndex > 1){
    const prevPageIndex = curpageIndex - 1;
    $.ajax({
      url: $('#archive-blog').data('baseUrl') + 'wp-json/posts/v1/posts' + query_url + '&paged=' + prevPageIndex,
      success: populate_posts,
      error: function(){}
    });
    $('#curpage').html(curpageIndex);
  }
});

$('.nav-links').on('click', '.page-numbers:not(.prev, .next)', function(e){

  e.preventDefault();
  var query_url = '?blog_tag=' + $('#archive-blog').data('tagId');
  const pageIndex = parseInt($(this).html());
  $.ajax({
    url: $('#archive-blog').data('baseUrl') + 'wp-json/posts/v1/posts' + query_url + '&paged=' + pageIndex,
    success: populate_posts,
    error: function(){}
  });

  $('#curpage').html(pageIndex);
});

$('#blogsearch > input[type="submit"]').on('click', function(e){
  if($('#blogsearch_text').val().length == 0){
    e.preventDefault();
    $('#blogsearch').toggleClass('state-active');
  }
})

$(window).on('load', function(){
  $('#blogsearch').addClass('js-loaded');
  $('.dropdown-blog').addClass('js-loaded');
})