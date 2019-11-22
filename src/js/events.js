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

  $("#btn-alert-modal").click(function(){

    if ($(window).width() < 1050 && page === '1' || $(window).width() < 1050 && page === '3') {
      $("#modal").show();
      $(".close").show();
      $(".alert-container").hide();
    }else if ($(window).width() < 1050 && page === '2' ) {
      $("#modal").show();
      $(".close").show();
      $("#byCertResult").show();
      $(".alert-container").hide();
      $("#mobile-table").hide();
      $("#user-avatar").hide();

    }else{
      $("#webView-footer").show();
      $(".alert-container").hide();
      $("#backdrop").hide();
    }

  });

  if (page === '1') {
    $("#home").hide();
    $("#options").hide();
    $("#form-cert").hide();
    $("#form-enrollees").hide();
    $("#byCert").hide();
    $("#forms-page").show();
  }

  if (page === '2') {
    $("#home").hide();
    $("#options").hide();
    $("#form-name").hide();
    $("#form-enrollees").hide();
    $("#byNameAndByEnrollees").hide();
    $("#byCerts_records_tbl").show();
    $("#forms-page").show();

    if ($(window).width() < 1050) {
      $("#byCert").hide();
    }else{
      $("#byCert").show();
    }
  }

  if (page === '3') {
    $("#home").hide();
    $("#options").hide();
    $("#form-name").hide();
    $("#form-cert").hide();
    $("#byCert").hide();
    $("#forms-page").show();
  }
});
