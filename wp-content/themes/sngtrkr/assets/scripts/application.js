// General sitewide settings and stuff

$(document).ready(function () {
	// Remove img width and height from http://wpwizard.net/jquery/remove-img-height-and-width-with-jquery/	
    $('img').each(function(){
        $(this).removeAttr('width')
        $(this).removeAttr('height');
    });
    var count = 2;
    $(window).scroll(function(){
            if  ($(window).scrollTop() == $(document).height() - $(window).height()){
               loadArticle(count);
               count++;
            }
    }); 

    function loadArticle(pageNumber){    
            $.ajax({
                url: "<?php bloginfo('wpurl') ?>/wp-admin/admin-ajax.php",
                type:'POST',
                data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=loop', 
                success: function(html){
                    $(".blog_loop").append(html);   // This will be the div where our content will be loaded
                }
            });
        return false;
    }
});
