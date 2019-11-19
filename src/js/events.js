$(document).ready(function() {
  if ($(window).width() < 1050 && page === '1' || $(window).width() < 1050 && page === '2' || $(window).width() < 1050 && page === '3') {
    $("#navbar-mobile").show();
    $("#navbar-web").hide();
  }else{
    $("#navbar-web").show();
    $("#navbar-mobile").hide();
  }

  $("#searhAgain").click(function() {
    window.location.reload(true);
  });

  $("#site_logo").click(function() {
    $("#forms-page").hide();
    $(".more-info-page").hide();
    $("#dropdown-content").hide();
    $(".home-page").show();

  });

  $("#close-modal").click(function() {
    window.location.reload(true);
  });

  $(".info").click(function(){
    $(".home-page").hide();
    $("#form-cert").hide();
    $("#form-enrollees").hide();
    $("#forms-page").hide();
    $("#form-name").hide();
    $(".more-info-page").show();
  });

  $(".training_schedule").click(function(){
    $(".home-page").hide();
    $("#form-cert").hide();
    $("#form-enrollees").hide();
    $("#forms-page").hide();
    $("#form-name").hide();
    $("#dropdown-content").hide();
    $(".more-info-page").show();
  });
});
