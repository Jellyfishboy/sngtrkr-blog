# General sitewide settings and stuff
$(document).ready ->
  
  $("img").each ->
    $(this).removeAttr "width"
    $(this).removeAttr "height"

  count = 2
  total = $("article").data("pcount")
  a_year = $("#sub_title").data("year")
  s_query = $("#sub_title").data("search")
  $(window).scroll ->
    if $(window).scrollTop() is $(document).height() - $(window).height()
      if count > total
        return false
      else
        loadArticle count, a_year, s_query
      count++
  # Remove img width and height from http://wpwizard.net/jquery/remove-img-height-and-width-with-jquery/	
  loadArticle = (pageNumber, year, query) ->
    if not year? and not query?
      $.ajax
        url: "http://localhost:8888/wp-admin/admin-ajax.php"
        type: "POST"
        data: "action=infinite_scroll&page_no=" + pageNumber + "&loop_file=loop"
        success: (html) ->
          $(".blog_loop").append html # This will be the div where our content will be loaded
    else if year?
      $.ajax
        url: "http://localhost:8888/wp-admin/admin-ajax.php"
        type: "POST"
        data: "action=infinite_scroll&page_no=" + pageNumber + "&loop_file=loop&archive_year=" + year
        success: (html) ->
          $(".blog_loop").append html # This will be the div where our content will be loaded
    else if query?
      $.ajax
        url: "http://localhost:8888/wp-admin/admin-ajax.php"
        type: "POST"
        data: "action=infinite_scroll&page_no=" + pageNumber + "&loop_file=loop&search_query=" + query
        success: (html) ->
          $(".blog_loop").append html # This will be the div where our content will be loaded
    false
#    var top = $('#menu_bar').offset().top - parseFloat($('#menu_bar').css('marginTop').replace(/auto/, 0));
# $(window).scroll(function (event) {
#   // what the y position of the scroll is
#   var y = $(this).scrollTop();

#   // whether that's below the form
#   if (y >= top) {
#     // if so, ad the fixed class
#     $('#menu_bar').addClass('fixed');
#   } else {
#     // otherwise remove it
#     $('#menu_bar').removeClass('fixed');
#   }
# });