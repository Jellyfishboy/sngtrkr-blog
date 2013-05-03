// General sitewide settings and stuff

$(document).ready(function () {
	// Remove img width and height from http://wpwizard.net/jquery/remove-img-height-and-width-with-jquery/	
    $('img').each(function(){
        $(this).removeAttr('width')
        $(this).removeAttr('height');
    });
    var count = 2;
    var total = $('article').data("pcount");
    var a_year = $('#sub_title').data("year");  
    var s_query = $('#sub_title').data("search");
    $(window).scroll(function(){
            if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                if(count > total) {
                    return false;
                } else {
                   loadArticle(count, a_year, s_query);
                }
               count++;
            }
    }); 

    function loadArticle(pageNumber, year, query){  
            if (year == null && query == null) {
                    $.ajax({
                        url: "http://localhost:8888/wp-admin/admin-ajax.php",
                        type:'POST',
                        data: "action=infinite_scroll&page_no="+ pageNumber + "&loop_file=loop", 
                        success: function(html){
                            $(".blog_loop").append(html);   // This will be the div where our content will be loaded
                        }
                    });
                    // console.log("normal loop");
                } else if (year != null) {
                    $.ajax({
                        url: "http://localhost:8888/wp-admin/admin-ajax.php",
                        type:'POST',
                        data: "action=infinite_scroll&page_no="+ pageNumber + "&loop_file=loop&archive_year="+ year, 
                        success: function(html){
                            $(".blog_loop").append(html);   // This will be the div where our content will be loaded
                        }
                    });
                    // console.log("archive loop");
                } else if (query != null) {    
                    $.ajax({
                        url: "http://localhost:8888/wp-admin/admin-ajax.php",
                        type:'POST',
                        data: "action=infinite_scroll&page_no="+ pageNumber + "&loop_file=loop&search_query="+ query, 
                        success: function(html){
                            $(".blog_loop").append(html);   // This will be the div where our content will be loaded
                        }
                    });
                    // console.log("search loop");
                }
        return false;
    }
 //    var top = $('#menu_bar').offset().top - parseFloat($('#menu_bar').css('marginTop').replace(/auto/, 0));
	// $(window).scroll(function (event) {
	//   // what the y position of the scroll is
	//   var y = $(this).scrollTop();
	  
	//   // whether that's below the form
	//   if (y >= top) {
	//     // if so, ad the fixed class
	//     $('#menu_bar').addClass('fixed');
	//   } else {
	//     // otherwise remove it
	//     $('#menu_bar').removeClass('fixed');
	//   }
	// });
});
