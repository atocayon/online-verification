$(document).ready(function() {
  var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
   var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
   $("html, body").css({"width":w,"height":h});

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



  $("#byName_bday").mask("9999/99/99", {placeholder: 'YYYY/MM/DD' });
  $("#byPDC_bday").mask("9999/99/99", {placeholder: 'YYYY/MM/DD'});
  $("#byCert_bday").mask("9999/99/99", {placeholder: 'YYYY/MM/DD'});
  $("#reservation_mobileNum").mask("+639-9999-999-99", {placeholder: '+639-xxxx-xxx-xx'});
  $("#reservation_srnNum").mask("9999999999", {placeholder: 'XXXXXXXXXX'});

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
      $(".error").show();
      $(".error").text("Required");
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

  $("#btn-courseReservation").click(function(){
    $("#btn-verifyByName").hide();
    $("#btn-verifyByCerticateNumber").hide();
    $("#btn-verifyEnrolleesOnPDC").hide();
    $("#btn-courseReservation").hide();
    $("#verifyByName").hide();
    $("#verifyByCerticateNumber").hide();
    $("#verifyByPDCenrollees").hide();
    $("#coursesOffered").show();
      $("#home-page").css("background", "rgba(255,255,255, 1)");
  });

  $("#close").click(function(){
    window.location.replace(base_url+"/online-verification");
  });

  $(".close-modal").click(function(){
    window.location.replace(base_url+"/online-verification");
  });

  $(".btn-goBack").click(function(){

    window.location.replace(base_url+"/online-verification");
  });

  $("#btn-confirm").click(function(){
    $("#alert-modal").modal('hide');
    $('#modal').modal('show');
  });

  $(".btn-category").click(function(){
    var value = $(this).attr("value");
    console.log(value);

    $("#modalCourses").modal('show');

    $.ajax({
      url: base_url+"/online-verification/nmp/getOfferedCourses",
      type: "POST",
      dataType: "json",
      data: {
        categoryID: value
      },
      success: function(data){
        console.log(data);
        var tbl = "";
        for(var i = 0; i < data["record"].length; i++){
          tbl += "<tr>";
          tbl +=
            "<td><label><a href='"+base_url+"/online-verification/?code="+data["record"][i]["moduleCode"]+"&dateStart="+data["record"][i]["dateStart"]+"&dateEnd="+data["record"][i]["dateEnd"]+"&description="+data["record"][i]["discription"]+"'>"+data["record"][i]["discription"]+ "</a></label></td>";
          tbl +=
            "<td><label>" +data["record"][i]["dateStart"] + " to " + data["record"][i]["dateEnd"] + "</label></td>";
          tbl +=
            "<td><label>None</label></td>";
          tbl += "</tr>";
        }
        $("#tbl-coursesOffered").prepend(tbl);

        category(value);

      },
      error: function(err){
        alert(err);
      }
    });

  });

  function category(value){
    $.ajax({
      url: base_url+"/online-verification/nmp/category",
      type: "POST",
      dataType: "json",
      data: {
        categoryID: value
      },
      success: function(data){
        $("#category").text(data["record"][0]["category"]);
        console.log(JSON.stringify(data["record"][0]["category"]));
      },
      error: function(err){
        alert(err);
      }

    });
  }

  $('#btn-confirm-reservationModal').click(function(){
      window.location.replace(base_url+"/online-verification");
  });





});
