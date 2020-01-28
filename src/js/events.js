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


  $("#close-modal").click(function() {
    window.location.reload(true);
  });

  $(".info").click(function(){
    $("#faq-page").show();
    $(".home-page").hide();
    $("#form-cert").hide();
    $("#form-enrollees").hide();
    $(".coming_soon").hide();
    $("#forms-page").hide();
    $("#form-name").hide();
    $(".more-info-page").show();
  });

  $(".training_schedule").click(function(){
    $("#faq-page").show();
    $(".home-page").hide();
    $("#form-cert").hide();
    $("#form-enrollees").hide();
    $("#forms-page").hide();
    $("#form-name").hide();
    $("#dropdown-content").hide();
    $(".more-info-page").show();
  });

  $("#btn-alert-modal").click(function(){

    if ($(window).width() < 1050 && page === '1' ) {
      $("#modal").show();
      $(".close").show();
      $(".alert-container").hide();
    }else if ($(window).width() < 1050 && page === '2' || $(window).width() < 1050 && page === '3') {
      $("#modal").show();
      $(".close").show();
      $("#byCertResult").show();
      $(".alert-container").hide();
      $("#mobile-table").hide();
      // $("#user-avatar").hide();

    }else{
      $("#webView-footer").show();
      $(".alert-container").hide();
      $("#backdrop").hide();
      $("body").css("overflow","auto");
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
    $("#byNameAndByEnrollees").hide();
    $("#byCerts_records_tbl").show();
    $("#forms-page").show();

    if ($(window).width() < 1050) {
      $("#byCert").hide();
    }else{
      $("#byCert").show();
    }
  }

  $("#byName_bday").mask("9999/99/99", {placeholder: 'YYYY/MM/DD' });
  $("#byPDC_bday").mask("9999/99/99", {placeholder: 'YYYY/MM/DD'});
  $("#byCert_bday").mask("9999/99/99", {placeholder: 'YYYY/MM/DD'});

  $("#btn-faq").click(function(){
    $("#faq-page").show();
    $("#home").hide();
    $("#options").hide();
      $("#dropdown-content").hide();
      $(".more-info-page").hide();

  });

  $("#btnMobile-faq").click(function(){
    $("#faq-page").show();
    $("#home").hide();
    $("#options").hide();
      $("#dropdown-content").hide();
      $(".more-info-page").hide();
  });

  $("#btn-submit-reservation").click(function(){
    // $("#reservation_fname").val();
    // $("#reservation_mname").val();
    // $("#reservation_lname").val();
    // $("#reservation_email").val();
    if ($("#reservation_fname").val() === "" && $("#reservation_mname").val() === "" && $("#reservation_lname").val() === "" && $("#reservation_mname").val() === "") {
      $("#reservation_fname").css("border","1px solid red");
      $("#reservation_mname").css("border","1px solid red");
      $("#reservation_lname").css("border","1px solid red");
      $("#reservation_email").css("border","1px solid red");
    }else{
      $.ajax({
        url: baseURL+"nmp/sendReservation/",
        type: "POST",
        dataType: "json",
        data: {
          code: $("#code").val(),
          description: $("#description").val(),
          dateStart: $("#dateStart").val(),
          dateEnd: $("#dateEnd").val(),
          fname: $("#reservation_fname").val(),
          mname: $("#reservation_mname").val(),
          lname: $("#reservation_lname").val(),
          email: $("#reservation_email").val()
        },
        beforeSend: function(){
          $(".loading").show();
          $(".backdrop").show();
          $("body").css("overflow","hidden");
        },
        success: function(data){
          $(".loading").hide();
          $(".alert-reservation-container").show();
        },
        error: function(err){

        }
      });
    }
  });

  $("#btn-admin-btnLogin").click(function(){

    if ($("#admin-uname").val() !== "" && $("#admin-password").val()) {
      $.ajax({
        url: baseURL+"nmp/login",
        type: "POST",
        dataType: "json",
        data: {
          uname: $("#admin-uname").val(),
          pword: $("#admin-password").val()
        },
        success: function(data){
          window.location.replace(baseURL+"nmp/admin");
        },
        error: function(err){
          alert(err)
        }
      });
    }else{
      $("#admin-uname").css("border", "1px solid red");
      $("#admin-password").css("border", "1px solid red");
    }
  });


  $("#btn-adminHome").click(function(){
    console.log("admin home");
    $("#approved").hide();
    $("#applicants").show();
    $("#rejected").hide();
  });

  $("#btn-approvedApplicants").click(function(){
    console.log("approve applicants");
    $("#approved").show();
    $("#applicants").hide();
    $("#rejected").hide();
  });

  $("#btn-rejectedApplicants").click(function(){

    console.log("rejected applicants");
    $("#approved").hide();
    $("#applicants").hide();
    $("#rejected").show();
  });




});
