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
        console.log(data["record"]["response"]);
        if (data["record"]["response"] === null || data["record"]["response"] === "null") {
          var tbl = "";
          tbl += "<tr>";
          tbl += "<td colspan='3' style='text-align:center'><label>No Data Found</label></td>";
          tbl += "</tr>";
          $("#tbl-coursesOffered").prepend(tbl);
          category(value);
        }

        if(data["record"]["response"] === undefined || data["record"]["response"] === "undefined"){
          var tbl = "";
          for(var i = 0; i < data["record"].length; i++){
              var count = data["record"][i]["count"];
            if (count === "null" || count === null) {
              count = 0;
            }else{
              count = data["record"][i]["count"];
            }

            tbl += "<tr>";
            tbl +=
              "<td><label><a href='"+base_url+"/online-verification/?code="+data["record"][i]["code"]+"&dateStart="+data["record"][i]["dateStart"]+"&dateEnd="+data["record"][i]["dateEnd"]+"&description="+data["record"][i]["description"]+"'>"+data["record"][i]["description"]+ "</a></label></td>";
            tbl +=
              "<td><label>" +data["record"][i]["dateStart"] + " to " + data["record"][i]["dateEnd"] + "</label></td>";

            tbl += "<td><label>"+count+"</label></td>";

            tbl += "</tr>";
          }
          $("#tbl-coursesOffered").prepend(tbl);

          category(value);
        }


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



  $("#module").on('change', function(){
    $.ajax({
      url: base_url+"/online-verification/nmp/selectSchedule",
      type: "POST",
      dataType: "json",
      data:{
        code: this.value
      },
      success: function(data){
        console.log(data["record"]);
        $("#schedule").show();
        $("#schedule").empty();
        for (var i = 0; i < data["record"].length; i++) {
          var code = data["record"][i]["code"];
          var start = data["record"][i]["dateStart"];
          var end = data["record"][i]["dateEnd"];

          $("#schedule").append("<option value='"+code+"'>"+start+" to "+end+"</option>");
        }
      },
      error: function(err){
        alert(JSON.parse(err));
      }
    });
  });

  $("#schedule").on('click', function(){
    $("#tbl-generateReports tbody tr").remove();
    console.log(this.value);
    $.ajax({
      url: base_url+"/online-verification/nmp/generateReports",
      type: "POST",
      dataType: "json",
      data:{
        code: this.value
      },
      success: function(data){
        console.log(data["record"]["response"]);
        $("#btn-generateReports").show();
        if (data["record"]["response"] === "null" || data["record"]["response"] === null) {
            moduleName($("#module").val());
            $("#noData").show();
        }else{
          $("#noData").hide();
          var tbl = "";
          for(var i = 0; i < data["record"].length; i++){
            tbl += "<tr>";
            tbl +=
              "<td>" + data["record"][i]["name"] + "</td>";
            tbl +=
              "<td>" + data["record"][i]["email"] + "</td>";
            tbl +=
              "<td>" + data["record"][i]["srn"] + "</td>";
            tbl +=
              "<td>" + data["record"][i]["dateStart"]+"- to -"+ data["record"][i]["dateEnd"] + "</td>";

            tbl +=
              "<td>" + data["record"][i]["dateReserve"] + "</td>";
            tbl +=
              "<td>" + data["record"][i]["status"]+ "</td>";
            tbl += "</tr>";
          }
          $("#report-title").text(data["record"][0]["descriptn"]);
          $("#tbl-generateReports").prepend(tbl);
        }
      },
      error: function(err){
        alert(err);
      }
    });
  });

  $("#close-modalCourses").click(function(){

    $("#tbl-coursesOffered tbody tr ").remove();
    $("#modalCourses").modal("hide");

  });

  function moduleName(value){
    $.ajax({
      url: base_url+"/online-verification/nmp/getModuleName",
      type: "POST",
      dataType: "json",
      data:{
        modcode: value
      },
      success: function(data){
        console.log(data["record"][0]["descriptn"]);
        $("#report-title").text(data["record"][0]["descriptn"]);
      },
      error: function(err){
        alert(err);
      }
    });
  }

  $("#print-report").click(function(){
    $("#printable_reports").print({
      // Use Global styles
      globalStyles : false,
      // Add link with attrbute media=print
      mediaPrint : false,
      //Custom stylesheet
      stylesheet : "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css",
      //Print in a hidden iframe
      iframe : false,
      // Don't print this
      noPrintSelector : ".avoid-this",
      // Add this on top
      append : "Free jQuery Plugins<br/>",
      // Add this at bottom
      prepend : "<br/>jQueryScript.net",
      // Manually add form values
      manuallyCopyFormValues: true,
      // resolves after print and restructure the code for better maintainability
      deferred: $.Deferred(),
      // timeout
      timeout: 250,
      // Custom title
      title: $("#module").val(),
      // Custom document type
      doctype: '<!doctype html>'

    });
  });


  $(".btn-viewInfoReservation").click(function(){
      console.log(this.value);

      $.ajax({
        url: base_url+"/online-verification/nmp/getApplicantInfo",
        type: "POST",
        dataType: "json",
        data:{
          id: this.value
        },
        success: function(data){
          console.log(data);
          $("#viewApplicantReservationModal").modal("show");




          $("#applicant_fullname").text(data["record"][0]["name"]);
          $("#applicant_email").text(data["record"][0]["email"]);
          $("#applicant_address").text(data["record"][0]["address"]);
          $("#applicant_mobile").text(data["record"][0]["mobileNo"]);

          if (data["record"][0]["srn"] !== "" || data["record"][0]["srn"] !== null) {
            $("#applicant_srn").text(data["record"][0]["srn"]);
          }

          if (data["record"][0]["srn"] === "" || data["record"][0]["srn"] === null) {
            $("#applicant_srn").text("N/A");
          }
        },
        error: function (err){

        }
      });
  });





});
