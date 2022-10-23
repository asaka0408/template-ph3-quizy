'use strict'

$(function() {
  $(".sortable").sortable();
  $(".sortable").disableSelection();
  $("#submit").click(function() {
      var listIds = $(".sortable").sortable("toArray");
      $("#list-ids").val(listIds);
      $("form").submit();
  });
});


console.log('ryuichi')