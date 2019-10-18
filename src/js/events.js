$(document).ready(function() {
  $("#searhAgain").click(function(event) {
    event.preventDefault();
    window.location.reload(true);
  });

  $("#site_logo").click(function(event) {
    event.preventDefault();
    $("#home").show();
    $("#options").show();
    $("#form-cert").hide();
    $("#form-enrollees").hide();
    $("#forms-page").hide();
    $("#form-name").hide();
  });

  $("#close-modal").click(function(event) {
    event.preventDefault();
    window.location.reload(true);
  });

});
