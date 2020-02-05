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
  });

  $("#btn-submit-reservation").click(function(event){
    event.preventDefault();
    // $("#reservation_fname").val();
    // $("#reservation_mname").val();
    // $("#reservation_lname").val();
    // $("#reservation_email").val();
    if ($("#reservation_fname").val() === "") {
      $("#reservation_fname").css("border","1px solid red");
      $("#reserve-fname").show();
    }else{
      $("#reservation_fname").css("border","1px solid #E0E0E0");
      $("#reserve-fname").hide();
    }

    if ($("#reservation_mname").val() === "") {
      $("#reservation_mname").css("border","1px solid red");
      $("#reserve-mname").show();
    }else{
      $("#reservation_mname").css("border","1px solid #E0E0E0");
      $("#reserve-mname").hide();
    }

    if ($("#reservation_lname").val() === "") {
      $("#reservation_lname").css("border","1px solid red");
      $("#reserve-lname").show();
    }else{
      $("#reservation_lname").css("border","1px solid #E0E0E0");
      $("#reserve-lname").hide();
    }

    if ($("#reservation_email").val() === "") {
      $("#reservation_email").css("border","1px solid red");
      $("#reserve-email").show();
    }else{
      $("#reservation_email").css("border","1px solid #E0E0E0");
      $("#reserve-email").hide();
    }


    if ($("#reservation_fname").val() === "" && $("#reservation_mname").val() === "" && $("#reservation_lname").val() === "" && $("#reservation_email").val() === "") {
      $("#reservation_fname").css("border","1px solid red");
      $("#reservation_mname").css("border","1px solid red");
      $("#reservation_lname").css("border","1px solid red");
      $("#reservation_email").css("border","1px solid red");

      $("#reserve-fname").show();
      $("#reserve-mname").show();
      $("#reserve-lname").show();
      $("#reserve-email").show();
    }

    if ($("#reservation_fname").val() !== "" && $("#reservation_mname").val() !== "" && $("#reservation_lname").val() !== "" && $("#reservation_email").val() !== "") {
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
