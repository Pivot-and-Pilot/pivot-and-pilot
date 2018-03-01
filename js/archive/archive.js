// ----------------------------------------- SETUP PAGINATION IF JAVASCRIPT ENABLED && PAGINATION ENABLED

// if($('.page-numbers').length > 0){
//   $('.page-numbers').addClass('state-hidden');
//   $('.page-numbers.next')
//     .eq(0)
//     .clone()
//     .removeClass('next')
//     .addClass('prev')
//     .css('display', 'none')
//     .appendTo('.nav-links')

  $('#archive-portfolio').data('tagId', 0);
// }

// ----------------------------------------- DATA HANDLER

var currCategory;

function populate_clients(data){
  
  const post_data = data.post_data;
  const $cloneArray = [];
  var newCategory = data.post_meta.category;  

  for(var i = 0; i < post_data.length; i++){

    $clone = $('.post-portfolio')
      .eq(0)
      .clone()

    $clone
      .find('a')
      .attr('href', post_data[i].permalink);
      
    $clone
      .find('img')
      .attr('src', post_data[i].thumbnail);

    $clone
      .find('h2')
      .html(post_data[i].title)

    $clone
      .find('h3 > p')
      .html(post_data[i].excerpt)

    $clone
      .find('.post-meta > p')
      .empty();

    for(var j = 0; j < post_data[i].terms.length; j++){
      $clone
        .find('.post-meta > p')
        .append($('<span>').html(post_data[i].terms[j]))
    }

    $cloneArray.push($clone);

  }

  // $('.post-portfolio').addClass('state-hidden');

  // $('body')
    // .animate( 500, 'swing', function(){

      if($(window).width() < 768){
        $('#post-portfolio-container')
          .css({'min-height': $('#post-portfolio-container').find(">:first-child").outerHeight() * $cloneArray.length});
        if(currCategory != newCategory || currCategory == 0) {
          $('#post-portfolio-container').empty(); 
          currCategory = newCategory;          
        }
      } else {
        $('#post-portfolio-container')
          .css({'min-height': $('#post-portfolio-container').find(">:first-child").outerHeight() * Math.ceil($cloneArray.length / 2)})
        if(currCategory != newCategory || currCategory == 0) {
          $('#post-portfolio-container').empty(); 
          currCategory = newCategory;
        }
      }

      setTimeout(function(){
        for(var i = 0; i<$cloneArray.length; i++){
          setTimeout(function(index){
            $('#post-portfolio-container').append($cloneArray[index]);
          }.bind(this, i), i*250)
        }
      },500)

    // });


  // Calculate page numbers
  const curpage = data.post_meta.paged;
  const maxpage = data.post_meta.total_pages;

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
  // $('.nav-links').append(new_page_nums);

  // Hide or show previous and next links
  // if(curpage < maxpage){
  //   $('.page-numbers.next').css('display', 'inline-block');
  // } else {
  //   $('.page-numbers.next').css('display', 'none');
  // }

  // if(curpage > 1){
  //   $('.page-numbers.prev').css('display', 'inline-block');
  // } else {
  //   $('.page-numbers.prev').css('display', 'none');
  // }
 
}

// ----------------------------------------- FILTER EVENT HANDLERS


$('.filter_clients').on('click', function(e){
  e.preventDefault(); 

  const that = this;

  $('#curpage').html(1);
  const isServices = $(this).parent().parent().hasClass('dropdown-services');
  const isIndustries = $(this).parent().parent().hasClass('dropdown-industries');
  
  $(this).parent().siblings().removeClass('state-active');
  $(this).parent().addClass('state-active');

  if (isServices) {
    $('.dropdown-industries > li').removeClass('state-active');
  } else if (isIndustries) {
    $('.dropdown-services > li').removeClass('state-active');    
  }

  $('#current-term-description').addClass('state-hidden');
  setTimeout(function(){
    $('#current-term-description > p').html($(that).parent().find('.term-description').text());
    $('#current-term-description').css('height', $('#current-term-description > p').outerHeight())
    $('#current-term-description').removeClass('state-hidden');
  }, 500);

  var postOffset = $('.post-portfolio').length;  
  var query_url = '?category=' + $(this).data('tagId');

  $('#archive-portfolio').data('tagId', $(this).data('tagId'));

  if($(this).hasClass('post_tag')){
    query_url = query_url + '&taxonomy=post_tag';
  }

  $.ajax({
    url: '../wp-json/posts/v1/clients' + query_url + '&post_offset=' + postOffset,
    success: _.debounce(populate_clients, 250),
    error: function(){}
  });

});

// $('.switch_taxonomy').on('click', function(e){
//   e.preventDefault();
//   $('#archive-portfolio').data('currTaxonomy', $(this).data('taxonomy'));
//   $('#archive-portfolio').attr('data-curr-taxonomy', $(this).data('taxonomy'));

//   $('#curpage').html(1);
//   $('#archive-portfolio').data('tagId', 0);

//   $('#current-term-description')
//     .css({height: 0})
//     .addClass('state-hidden');
//   $('.dropdown>:first-child').siblings().removeClass('state-active');
//   $('.dropdown>:first-child').addClass('state-active');

//   $.ajax({
//     url: '../wp-json/posts/v1/clients',
//     success: populate_clients,
//     error: function(){}
//   });
// });


// ----------------------------------------- PAGINATION EVENT HANDLERS

// $('.pagecount').click(_.throttle(function(){
//   $('.page-numbers').toggleClass('state-hidden');
// }));

// --------------------------- CHANGED PAGINATION TO ON SCROLL 
$(window).scroll(function() {

  const curpageIndex = parseInt($('#curpage').html());
  const maxpageIndex = parseInt($('#maxpage').html());
  
  var postOffset = $('.post-portfolio').length;
  var query_url = '?category=' + $('#archive-portfolio').data('tagId');
  if ($(window).scrollTop() == $(document).height() - $(window).height()) {
      if(curpageIndex < maxpageIndex){
        const nextpageIndex = curpageIndex + 1;  
        $.ajax({
          url: '../wp-json/posts/v1/clients' + query_url + '&paged=' + nextpageIndex  + '&post_offset=' + postOffset,
          success: populate_clients,
          error: function(){}
        });
    $('#curpage').html(nextpageIndex);
        
      }
  }
})

// $('.nav-links').on('click', '.page-numbers.next', function(e){
//   e.preventDefault();

//   const curpageIndex = parseInt($('#curpage').html());
//   const maxpageIndex = parseInt($('#maxpage').html());

//   var query_url = '?category=' + $('#archive-portfolio').data('tagId');

//   if($('#archive-portfolio').data("currTaxonomy") === 'post_tag' ){
//     query_url = query_url + '&taxonomy=post_tag';
//   }

//   if(curpageIndex < maxpageIndex){
//     const nextpageIndex = curpageIndex + 1;
//     $.ajax({
//       url: '../wp-json/posts/v1/clients' + query_url + '&paged=' + nextpageIndex,
//       success: populate_clients,
//       error: function(){}
//     });
//     $('#curpage').html(nextpageIndex);
//   }
// });

// $('.nav-links').on('click', '.page-numbers.prev',function(e){
//   e.preventDefault();

//   const curpageIndex = parseInt($('#curpage').html());
//   const maxpageIndex = parseInt($('#maxpage').html());

//   var query_url = '?category=' + $('#archive-portfolio').data('tagId');

//   if($('#archive-portfolio').data("currTaxonomy") === 'post_tag' ){
//     query_url = query_url + '&taxonomy=post_tag';
//   }

//   if(curpageIndex > 1){
//     const prevPageIndex = curpageIndex - 1;
//     $.ajax({
//       url: '../wp-json/posts/v1/clients' + query_url + '&paged=' + prevPageIndex,
//       success: populate_clients,
//       error: function(){}
//     });
//     $('#curpage').html(prevPageIndex);
//   }
// });

// $('.nav-links').on('click', '.page-numbers:not(.prev, .next)', function(e){

//   e.preventDefault();
//   var query_url = '?category=' + $('#archive-portfolio').data('tagId');

//   if($('#archive-portfolio').data("currTaxonomy") === 'post_tag' ){
//     query_url = query_url + '&taxonomy=post_tag';
//   }

//   const pageIndex = parseInt($(this).html());
//   $.ajax({
//     url: '../wp-json/posts/v1/clients' + query_url + '&paged=' + pageIndex,
//     success: populate_clients,
//     error: function(){}
//   });

//   $('#curpage').html(pageIndex);
// })