$(document).ready(function() {
  // if ($(window).width() < 1050 && page === '1' || $(window).width() < 1050 && page === '2' || $(window).width() < 1050 && page === '3') {
  //   $("#navbar-mobile").show();
  //   $("#navbar-web").hide();
  // }else{
  //   $("#navbar-web").show();
  //   $("#navbar-mobile").hide();
  // }
  var base_url = window.location.origin;
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

  // $("#btn-alert-modal").click(function(){
  //   if ($(window).width() < 1050 && page === '1' ) {
  //     $("#modal").show();
  //     $(".close").show();
  //     $(".alert-container").hide();
  //   }else if ($(window).width() < 1050 && page === '2' || $(window).width() < 1050 && page === '3') {
  //     $("#modal").show();
  //     $(".close").show();
  //     $("#byCertResult").show();
  //     $(".alert-container").hide();
  //     $("#mobile-table").hide();
  //     // $("#user-avatar").hide();
  //   }else{
  //     $("#webView-footer").show();
  //     $(".alert-container").hide();
  //     $("#backdrop").hide();
  //     $("body").css("overflow","auto");
  //   }
  //
  // });

  // if (page === '1') {
  //   $("#home").hide();
  //   $("#options").hide();
  //   $("#form-cert").hide();
  //   $("#form-enrollees").hide();
  //   $("#byCert").hide();
  //   $("#forms-page").show();
  // }
  //
  // if (page === '2') {
  //   $("#home").hide();
  //   $("#options").hide();
  //   $("#form-name").hide();
  //   $("#form-enrollees").hide();
  //   $("#byNameAndByEnrollees").hide();
  //   $("#byCerts_records_tbl").show();
  //   $("#forms-page").show();
  //
  //   if ($(window).width() < 1050) {
  //     $("#byCert").hide();
  //   }else{
  //     $("#byCert").show();
  //   }
  // }
  //
  // if (page === '3') {
  //   $("#home").hide();
  //   $("#options").hide();
  //   $("#form-name").hide();
  //   $("#form-cert").hide();
  //   $("#byNameAndByEnrollees").hide();
  //   $("#byCerts_records_tbl").show();
  //   $("#forms-page").show();
  //
  //   if ($(window).width() < 1050) {
  //     $("#byCert").hide();
  //   }else{
  //     $("#byCert").show();
  //   }
  // }

  $("#byName_bday").mask("9999/99/99", {placeholder: 'YYYY/MM/DD' });
  $("#byPDC_bday").mask("9999/99/99", {placeholder: 'YYYY/MM/DD'});
  $("#byCert_bday").mask("9999/99/99", {placeholder: 'YYYY/MM/DD'});
  $("#reservation_mobileNum").mask("+639-9999-999-99", {placeholder: '+639-xxxx-xxx-xx'});
  $("#reservation_srnNum").mask("9999999999", {placeholder: 'XXXXXXXXXX'});

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


    // $("#byName_fname").keyup(function(){
    //   $("#byName_fname").css("border", "1px solid #E0E0E0");
    //   $("#byName_lname").css("border", "1px solid #E0E0E0");
    //   $("#byName_bday").css("border", "1px solid #E0E0E0");
    // });
    //
    // $("#byCert_certnum").keyup(function(){
    //   $("#byCert_certnum").css("border", "1px solid #E0E0E0");
    //   $("#byCert_fname").css("border", "1px solid #E0E0E0");
    //   $("#byCert_lname").css("border", "1px solid #E0E0E0");
    // });
    //
    // $("#byPDC_fname").keyup(function(){
    //   $("#byPDC_module").css("border", "1px solid #E0E0E0");
    //   $("#byPDC_fname").css("border", "1px solid #E0E0E0");
    //   $("#byPDC_lname").css("border", "1px solid #E0E0E0");
    //   $("#byPDC_bday").css("border", "1px solid #E0E0E0");
    // });





  $("#btn-admin-btnLogin").click(function(){

    if ($("#admin-uname").val() !== "" && $("#admin-password").val()) {
      $.ajax({
        url: base_url+"/online-verification/nmp/login",
        type: "POST",
        dataType: "json",
        data: {
          uname: $("#admin-uname").val(),
          pword: $("#admin-password").val()
        },
        success: function(data){
          window.location.replace(base_url+"/online-verification/nmp/admin");
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


  $("#btn-viewInfoReservation").click(function(){
    $(".backdrop").show();
    $(".modalViewApplicant-container").show();

    $.ajax({
      url: baseURL+"nmp/applicantReservation",
      type: "POST",
      dataType: "json",
      data: {
        applicantID: $(".applicant-id").val()
      },
      success: function(data){
        console.log(data.record[0]);
        $("#applicant-name").text(data.record[0]["name"]);
        $("#applicant-address").text(data.record[0]["address"]);
        $("#applicant-email").text(data.record[0]["email"]);
        $("#applicant-mobileNo").text(data.record[0]["mobileNo"]);
        $("#applicant-module").text(data.record[0]["module"]);
        $("#applicant-schedule").text(data.record[0]["dateStart"]+" - to - "+data.record[0]["dateEnd"]);

      },
      error: function(err){
        alert(err);
      }
    });
  });

  // $("#modal-close").click(function(){
  //   // console.log("shshhss");
  //   $(".backdrop").hide();
  //   $(".modalViewApplicant-container").hide();
  // });


  $('[data-toggle="tooltip"]').tooltip();

  $("#btn-verifyByName").click(function(){
    $("#btn-verifyByName").hide();
    $("#btn-verifyByCerticateNumber").hide();
    $("#btn-verifyEnrolleesOnPDC").hide();
    $("#btn-courseReservation").hide();
    $("#verifyByCerticateNumber").hide();
    $("#verifyByPDCenrollees").hide();
    $("#verifyByName").show();
    $("#home-page").css("background", "rgba(255,255,255, 1)");

  });

  $("#btn-verifyByCerticateNumber").click(function(){
    $("#btn-verifyByName").hide();
    $("#btn-verifyByCerticateNumber").hide();
    $("#btn-verifyEnrolleesOnPDC").hide();
    $("#btn-courseReservation").hide();
    $("#verifyByName").hide();
    $("#verifyByPDCenrollees").hide();
    $("#verifyByCerticateNumber").show();
      $("#home-page").css("background", "rgba(255,255,255, 1)");
  });

  $("#btn-verifyEnrolleesOnPDC").click(function(){
    $("#btn-verifyByName").hide();
    $("#btn-verifyByCerticateNumber").hide();
    $("#btn-verifyEnrolleesOnPDC").hide();
    $("#btn-courseReservation").hide();
    $("#verifyByName").hide();
    $("#verifyByCerticateNumber").hide();
    $("#verifyByPDCenrollees").show();
      $("#home-page").css("background", "rgba(255,255,255, 1)");
  });

  $(".btn-goBack").click(function(){
    // $("#btn-verifyByName").show();
    // $("#btn-verifyByCerticateNumber").show();
    // $("#btn-verifyEnrolleesOnPDC").show();
    // $("#btn-courseReservation").show();
    // $("#verifyByCerticateNumber").hide();
    // $("#verifyByName").hide();
    // $("#verifyByPDCenrollees").hide();
    //   $("#home-page").css("background", "rgba(255,255,255, 0.9)");
    //
    // $(".error-fname").hide();
    // $(".error-lname").hide();
    // $(".error-bday").hide();
    // $(".error-certnum").hide();
    // $(".error-PDCmodule").hide();
    //
    // $(".error-fname").text('Required');
    // $(".error-lname").text('Required');
    // $(".error-bday").text('Required');
    // $(".error-certnum").text('Required');
    // $(".error-PDCmodule").text('Required');
    //
    // $("#byName_fname").css("border-bottom", "1px solid #E0E0E0");
    // $("#byName_fname").css("border-left", "1px solid #fff");
    // $("#byName_fname").css("border-right", "1px solid #fff");
    // $("#byName_fname").css("border-top", "1px solid #fff");
    // $("#byName_fname").val('');
    //
    // $("#byName_lname").css("border-bottom", "1px solid #E0E0E0");
    // $("#byName_lname").css("border-left", "1px solid #fff");
    // $("#byName_lname").css("border-right", "1px solid #fff");
    // $("#byName_lname").css("border-top", "1px solid #fff");
    // $("#byName_lname").val('');
    //
    // $("#byName_bday").css("border-bottom", "1px solid #E0E0E0");
    // $("#byName_bday").css("border-left", "1px solid #fff");
    // $("#byName_bday").css("border-right", "1px solid #fff");
    // $("#byName_bday").css("border-top", "1px solid #fff");
    // $("#byName_bday").val('');
    //
    // $("#byCert_certnum").css("border-bottom", "1px solid #E0E0E0");
    // $("#byCert_certnum").css("border-left", "1px solid #fff");
    // $("#byCert_certnum").css("border-right", "1px solid #fff");
    // $("#byCert_certnum").css("border-top", "1px solid #fff");
    // $("#byCert_certnum").val('');
    //
    // $("#byCert_fname").css("border-bottom", "1px solid #E0E0E0");
    // $("#byCert_fname").css("border-left", "1px solid #fff");
    // $("#byCert_fname").css("border-right", "1px solid #fff");
    // $("#byCert_fname").css("border-top", "1px solid #fff");
    // $("#byCert_fname").val('');
    //
    // $("#byCert_lname").css("border-bottom", "1px solid #E0E0E0");
    // $("#byCert_lname").css("border-left", "1px solid #fff");
    // $("#byCert_lname").css("border-right", "1px solid #fff");
    // $("#byCert_lname").css("border-top", "1px solid #fff");
    // $("#byCert_lname").val('');
    //
    // $("#byCert_bday").css("border-bottom", "1px solid #E0E0E0");
    // $("#byCert_bday").css("border-left", "1px solid #fff");
    // $("#byCert_bday").css("border-right", "1px solid #fff");
    // $("#byCert_bday").css("border-top", "1px solid #fff");
    // $("#byCert_bday").val('');
    //
    // $("#byPDC_module").css("border", "1px solid #E0E0E0");
    // $("#byPDC_module").val('');
    //
    // $("#byPDC_fname").css("border-bottom", "1px solid #E0E0E0");
    // $("#byPDC_fname").css("border-left", "1px solid #fff");
    // $("#byPDC_fname").css("border-right", "1px solid #fff");
    // $("#byPDC_fname").css("border-top", "1px solid #fff");
    // $("#byPDC_fname").val('');
    //
    // $("#byPDC_lname").css("border-bottom", "1px solid #E0E0E0");
    // $("#byPDC_lname").css("border-left", "1px solid #fff");
    // $("#byPDC_lname").css("border-right", "1px solid #fff");
    // $("#byPDC_lname").css("border-top", "1px solid #fff");
    // $("#byPDC_lname").val('');
    //
    // $("#byPDC_bday").css("border-bottom", "1px solid #E0E0E0");
    // $("#byPDC_bday").css("border-left", "1px solid #fff");
    // $("#byPDC_bday").css("border-right", "1px solid #fff");
    // $("#byPDC_bday").css("border-top", "1px solid #fff");
    // $("#byPDC_bday").val('');
    window.location.replace(base_url+"/online-verification")
  });



});
