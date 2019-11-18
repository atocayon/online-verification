$(document).ready(function() {
  if ($(window).width() < 1050 && page === '1' || $(window).width() < 1050 && page === '2' || $(window).width() < 1050 && page === '3') {
    $("#navbar-mobile").show();
    $("#navbar-web").hide();
  }else{
    $("#navbar-web").show();
    $("#navbar-mobile").hide();
  }

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

  $(".info").click(function(){
    $(".home-page").hide();
    $(".more-info-page").show();
  });
});
