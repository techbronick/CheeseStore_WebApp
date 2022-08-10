$(document).ready(function(){
  $("div#uglyajaxsearch input").keyup(function(){
    var search = $("div#uglyajaxsearch input").val().trim();
    if (search != "")
    {
      $.get("getSurname_service_ugly.php?surname="+search,function(resultsText){
          results = resultsText.split(",");
          // there'll be an extra empty element in results because
          // of the trailing comma. So kill the last element in the
          // array.
          results.pop();
          // now build the results div
          $("div#uglyajaxsearch div.results").empty();
          for (var i = 0; i < results.length; i++)
          {
            var result = $('<div class="result">'+results[i]+'</div>');
            result.click(function(){
              $("div#uglyajaxsearch div.results").hide();
              $("input[name=searchname]").val($(this).text());
              $("form").get(0).submit();
            });
            $("div#uglyajaxsearch div.results").append(result);
          }
          if (results.length == 0)
          {
            $("div#uglyajaxsearch div.results").hide();
          }
          else {
            $("div#uglyajaxsearch div.results").show();
          }
      });
    }
    else // if search IS empty
    {
      $("div#uglyajaxsearch div.results").hide();
    }
  });
  $("div#niceajaxsearch input").keyup(function(){
    var search = $("div#niceajaxsearch input").val().trim();
    if (search != "")
    {
      $.get("getSurname_service.php?surname="+search,function(results)
      {
          // contrast the ugly version!
          // note how we don't need to do any parsing - results will already
          // be an array!
          console.log(results);
          // build the results div
          $("div#niceajaxsearch div.results").empty();
          for (var i = 0; i < results.length; i++)
          {
            var result = $('<div class="result">'+results[i]+'</div>');
            result.click(function(){
              $("div#niceajaxsearch div.results").hide();
              $("input[name=searchname]").val($(this).text());
              $("form").get(0).submit();
            });
            $("div#niceajaxsearch div.results").append(result);
          }
          if (results.length == 0)
          {
            $("div#niceajaxsearch div.results").hide();
          }
          else {
            $("div#niceajaxsearch div.results").show();
          }
      });
    }
    else // if search IS empty
    {
      $("div#niceajaxsearch div.results").hide();
    }
  });
  $("input#ajaxsearchbutton").click(function(){
    var search = $("input[name=ajaxsearchname]").val().trim();
    $.get("getCustomersBySurname_service.php?surname="+search,function(results){
      // results will be an array of Javascript objects which precisely match
      // the Customer objects in PHP land.

      // wipe out the existing rows in the table seeing as how we're replacing them
      $("table#resultstable tbody").empty();
      // now we can iterate through results
      for (var i = 0; i < results.length; i++)
      {
        var customer = results[i];
        // build a new table row
        var newrow = $("<tr></tr>");
        // just so we can see the difference between AJAX-generated rows and
        // normal rows
        newrow.css("color","blue");
        // build the table cells
        newrow.append("<td>"+customer.givenname+"</td>");
        newrow.append("<td>"+customer.surname+"</td>");
        newrow.append("<td>"+customer.address+"</td>");
        // append the new row to the table
        $("table#resultstable tbody").append(newrow);
      }
    });
  });
});
