$(document).ready(function() {
  
  //THIS IS THE ONLY NEEDED LINE
  //Just init navigate and any link without target="_blank" will become an ajax link
  $.navigate.init({
  	ajaxLinks:'a.ajax'
  });


    $('[data-toggle="tooltip"]').tooltip();
    $body = $("body");
    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); }
    });

});  
