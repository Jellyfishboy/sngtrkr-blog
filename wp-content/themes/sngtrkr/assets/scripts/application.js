// Generated by CoffeeScript 1.6.3
(function() {
  $(document).ready(function() {
    var a_year, count, loadArticle, p_author, s_query, total;
    $("img").each(function() {
      $(this).removeAttr("width");
      return $(this).removeAttr("height");
    });
    count = 2;
    total = $("article").data("pcount");
    a_year = $("#sub_title").data("year");
    s_query = $("#sub_title").data("search");
    p_author = $("#sub_title").data("author");
    $(window).scroll(function() {
      if ($(window).scrollTop() === $(document).height() - $(window).height()) {
        if (count > total) {
          return false;
        } else {
          loadArticle(count, a_year, s_query, p_author);
        }
        return count++;
      }
    });
    return loadArticle = function(pageNumber, year, query, author) {
      if ((year == null) && (query == null) && (author == null)) {
        $.ajax({
          url: "http://localhost:8888/wp-admin/admin-ajax.php",
          type: "POST",
          data: "action=infinite_scroll&page_no=" + pageNumber + "&loop_file=loop",
          success: function(html) {
            return $(".blog_loop").append(html);
          }
        });
      } else if (year != null) {
        $.ajax({
          url: "http://localhost:8888/wp-admin/admin-ajax.php",
          type: "POST",
          data: "action=infinite_scroll&page_no=" + pageNumber + "&loop_file=loop&archive_year=" + year,
          success: function(html) {
            return $(".blog_loop").append(html);
          }
        });
      } else if (query != null) {
        $.ajax({
          url: "http://localhost:8888/wp-admin/admin-ajax.php",
          type: "POST",
          data: "action=infinite_scroll&page_no=" + pageNumber + "&loop_file=loop&search_query=" + query,
          success: function(html) {
            return $(".blog_loop").append(html);
          }
        });
      } else if (author != null) {
        $.ajax({
          url: "http://localhost:8888/wp-admin/admin-ajax.php",
          type: "POST",
          data: "action=infinite_scroll&page_no=" + pageNumber + "&loop_file=loop&author=" + author,
          success: function(html) {
            return $(".blog_loop").append(html);
          }
        });
      }
      return false;
    };
  });

}).call(this);
