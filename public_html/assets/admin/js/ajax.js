$(document).ready(function() {
  $('.delete_customer').click(function() {
    var title = $(this).attr("title");

    bootbox.dialog({
      title: title,
      message: $('.card-body').html(),

    });
  });
});