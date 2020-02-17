$(document).ready(function(){

  $("#reservation_fname").keyup(function(event){
    event.preventDefault();
    $("#error-message").hide();
    $("#reserve-fname").hide();
    $("#reserve-mname").hide();
    $("#reserve-lname").hide();
    $("#reserve-email").hide();
    $("#reservation_fname").css("border","1px solid #E0E0E0");
    $("#reservation_mname").css("border","1px solid #E0E0E0");
    $("#reservation_lname").css("border","1px solid #E0E0E0");
    $("#reservation_email").css("border","1px solid #E0E0E0");
    $("#reservation_add").css("border","1px solid #E0E0E0");
    $("#reservation_mobileNum").css("border","1px solid #E0E0E0");
    $("#reservation_srnNum").css("border","1px solid #E0E0E0");
  });

  $("#btn-submit-reservation").click(function(event){
    event.preventDefault();
    // $("#reservation_fname").val();
    // $("#reservation_mname").val();
    // $("#reservation_lname").val();
    // $("#reservation_email").val();

    console.log("click");
    if ($("#reservation_fname").val() === "") {
      $("#reservation_fname").css("border","1px solid red");
      $("#reserve-fname").show();
    }

    if ($("#reservation_fname").val() !== ""){
      $("#reservation_fname").css("border","1px solid #E0E0E0");
      $("#reserve-fname").hide();
    }

    if ($("#reservation_mname").val() === "") {
      $("#reservation_mname").css("border","1px solid red");
      $("#reserve-mname").show();
    }

    if ($("#reservation_mname").val() !== ""){
      $("#reservation_mname").css("border","1px solid #E0E0E0");
      $("#reserve-mname").hide();
    }

    if ($("#reservation_lname").val() === "") {
      $("#reservation_lname").css("border","1px solid red");
      $("#reserve-lname").show();
    }

    if ($("#reservation_lname").val() !== ""){
      $("#reservation_lname").css("border","1px solid #E0E0E0");
      $("#reserve-lname").hide();
    }

    if ($("#reservation_email").val() === "") {
      $("#reservation_email").css("border","1px solid red");
      $("#reserve-email").show();
    }

    if ($("#reservation_email").val() !== ""){
      $("#reservation_email").css("border","1px solid #E0E0E0");
      $("#reserve-email").hide();
    }

    if ($("#reservation_add").val() === "") {
      $("#reservation_add").css("border","1px solid red");
      $("#reserve-add").show();
    }

    if ($("#reservation_add").val() !== "") {
      $("#reservation_add").css("border","1px solid #E0E0E0");
      $("#reserve-add").hide();
    }

    if ($("#reservation_mobileNum").val() === "") {
      $("#reservation_mobileNum").css("border","1px solid red");
      $("#reserve-mobileNum").show();
    }

    if ($("#reservation_mobileNum").val() !== "") {
      $("#reservation_mobileNum").css("border","1px solid #E0E0E0");
      $("#reserve-mobileNum").hide();
    }

    // if ($("#reservation_srnNum").val() === "") {
    //   $("#reservation_srnNum").css("border","1px solid red");
    //   $("#reserve-srnNum").show();
    // }
    //
    // if ($("#reservation_srnNum").val() !== "") {
    //   $("#reservation_srnNum").css("border","1px solid #E0E0E0");
    //   $("#reserve-srnNum").hide();
    // }

    console.log("SRN: "+$("#reservation_srnNum").val());



    if ($("#reservation_fname").val() === "" && $("#reservation_mname").val() === "" && $("#reservation_lname").val() === "" && $("#reservation_email").val() === "" && $("#reservation_add").val() === "" && $("#reservation_mobileNum").val() === "") {
      $("#reservation_fname").css("border","1px solid red");
      $("#reservation_mname").css("border","1px solid red");
      $("#reservation_lname").css("border","1px solid red");
      $("#reservation_email").css("border","1px solid red");
      $("#reservation_add").css("border","1px solid red");
      $("#reservation_mobileNum").css("border","1px solid red");
      // $("#reservation_srnNum").css("border","1px solid red");

      $("#reserve-fname").show();
      $("#reserve-mname").show();
      $("#reserve-lname").show();
      $("#reserve-email").show();
      $("#reserve-add").show();
      $("#reserve-mobileNum").show();
      // $("#reserve-srnNum").show();
    }

    if ($("#reservation_fname").val() !== "" && $("#reservation_mname").val() !== "" && $("#reservation_lname").val() !== "" && $("#reservation_email").val() !== "" && $("#reservation_add").val() !== "" && $("#reservation_mobileNum").val() !== "" ) {
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
          email: $("#reservation_email").val(),
          address: $("#reservation_add").val(),
          mobileNum: $("#reservation_mobileNum").val(),
          srnNum: $("#reservation_srnNum").val()
        },
        beforeSend: function(){
          $(".loading").show();
          $(".backdrop").show();
          $("body").css("overflow","hidden");
          $("#error-message").hide();
        },
        success: function(data){
          console.log(data.record);
          if (data.record["response"] === "null") {
            $("#error-message").show();
            $(".backdrop").hide();
            $("body").css("overflow","auto");
            $(".loading").hide();
            $(".alert-reservation-container").hide();
            $("#reservation_fname").css("border","1px solid red");
            $("#reservation_mname").css("border","1px solid red");
            $("#reservation_lname").css("border","1px solid red");
            $("#reservation_email").css("border","1px solid red");
            $("#reservation_add").css("border","1px solid red");
            $("#reservation_mobileNum").css("border","1px solid red");
            $("#reservation_srnNum").css("border","1px solid red");
          }

          if (data.record['response'] === "success") {
            $("#error-message").hide();
            $(".loading").hide();
            $(".backdrop").hide();
            $("#success-message").show();
            $("#reservation_fname").css("border","1px solid green");
            $("#reservation_mname").css("border","1px solid green");
            $("#reservation_lname").css("border","1px solid green");
            $("#reservation_email").css("border","1px solid green");
            $("#reservation_add").css("border","1px solid green");
            $("#reservation_mobileNum").css("border","1px solid green");
            $("#reservation_srnNum").css("border","1px solid green");
          }

          if (data.record["response"] === "failed") {
            console.log("Error");
            alert("error");
          }

        },
        error: function(err){
          alert(err);
        }
      });
    }

  });
});
