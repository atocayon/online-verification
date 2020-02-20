$(document).ready(function() {
  var base_url = window.location.origin;
  console.log(base_url);
  // Verification By Name
  $("#byName_submit").click(function(event) {
    // console.log("By Name Button Click");
    event.preventDefault();
    if ($("#byName_fname").val() === "") {
      $("#byName_fname").css("border", "1px solid red");
      $(".error-fname").show();
    }

    if ($("#byName_fname").val() !== "") {
      $("#byName_fname").css("border", "1px solid #E0E0E0");
      $(".error-fname").hide();
    }

    if ($("#byName_lname").val() === "") {
      $("#byName_lname").css("border", "1px solid red");
      $(".error-lname").show();
    }

    if ($("#byName_lname").val() !== "") {
      $("#byName_lname").css("border", "1px solid #E0E0E0");
      $(".error-lname").hide();
    }

    if ($("#byName_fname").val() !== "" && $("#byName_lname").val() !== "") {

      $.ajax({
        url: base_url+"/online-verification/nmp/search_byName/",
        type: "POST",
        dataType: "json",
        data: {
          fname: $("#byName_fname").val(),
          lname: $("#byName_lname").val(),
          bday: $("#byName_bday").val()
        },
        beforeSend: function() {
          // $(".loading").show();
          // $(".backdrop").show();
          // $("body").css("overflow","hidden");
          $(".verify-icon").hide();
          $(".spinner-icon").show();
          $("#alert-modal").modal('show');
        },
        success: function(data) {
          if (data.record["response"] == "null") {
            console.log(data.record["response"]);
            // $("#no_data").show();
            // $("#default").hide();
            // $("#empty_field").hide();
            // $(".loading").hide();
            // $(".backdrop").hide();
            $(".error-fname").show();
            $(".error-lname").show();
            $(".error-bday").show();
            $(".error-fname").text('Unknown');
            $(".error-lname").text('Unknown');
            $(".error-bday").text('Unknown');

            $("#byName_fname").css("border", "1px solid red");
            $("#byName_lname").css("border", "1px solid red");
            $("#byName_bday").css("border", "1px solid red");
            $('.toast').toast('show');
            $(".verify-icon").show();
            $(".spinner-icon").hide();
            // $("body").css("overflow","auto");

          } else {
            // console.log(data.record["response"]);
            // $("#no_data").hide();
            // $("#default").hide();
            // $("#empty_field").hide();
            // $("#byName_submit").hide();
            $(".error-fname").hide();
            $(".error-lname").hide();
            $(".error-bday").hide();
            $(".error-certnum").hide();
            $(".error-PDCmodule").hide();
            $("#byName_fname").css("border-bottom", "1px solid #E0E0E0");
            $("#byName_fname").css("border-left", "1px solid #fff");
            $("#byName_fname").css("border-right", "1px solid #fff");
            $("#byName_fname").css("border-top", "1px solid #fff");

            $("#byName_lname").css("border-bottom", "1px solid #E0E0E0");
            $("#byName_lname").css("border-left", "1px solid #fff");
            $("#byName_lname").css("border-right", "1px solid #fff");
            $("#byName_lname").css("border-top", "1px solid #fff");

            $("#byName_bday").css("border-bottom", "1px solid #E0E0E0");
            $("#byName_bday").css("border-left", "1px solid #fff");
            $("#byName_bday").css("border-right", "1px solid #fff");
            $("#byName_bday").css("border-top", "1px solid #fff");

            $("#records_tbl").show();
            $("#byCerts_records_tbl").hide();
            $(".verify-icon").show();
            $(".spinner-icon").hide();
            // $(".loading").hide();
            // $("#searchAgain_byName").show();
            // $(".alert-container").show();
            // $("body").css("overflow","hidden");
            var tbl = "";
            for (var i = 0; i < data["record"].length; i++) {
              tbl += "<tr>";
              tbl +=
                "<td><label>" + data["record"][i]["module"] + "</label></td>";
              tbl +=
                "<td><label>" + data["record"][i]["duration"] + "</label></td>";
              tbl +=
                "<td><label>" + data["record"][i]["cert_num"] + "</label></td>";
              tbl += "</tr>";
            }

            $("#tbl_data").prepend(tbl);
            $("#name").html("<i class='fas fa-user'></i> &nbsp;"+data["record"][0]["name"]);
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + JSON.stringify(error));
        }
      });
    } else {
      $("#byName_fname").css("border", "1px solid red");
      $("#byName_lname").css("border", "1px solid red");
      $("#byName_bday").css("border", "1px solid red");
      $(".error-fname").show();
      $(".error-lname").show();
      $(".error-bday").show();
      // $("#empty_field").show();
      // $("#default").hide();
      // $("#no_data").hide();

      // console.log("Web interface - By Name");
    }
  });

  // End Verification by name

  // Verification by Certificate number
  $("#byCert_submit").click(function(event) {
    // console.log("By cert num click");
    event.preventDefault();
    if ($("#byCert_certnum").val() !== "" && $("#byCert_fname").val() !== "" && $("#byCert_lname").val() !== "" && $("#byCert_bday").val() !== "") {
      $.ajax({
        url: base_url+ "/online-verification/nmp/search_byCertNum/",
        type: "POST",
        dataType: "json",
        data: { certnum: $("#byCert_certnum").val(), fname: $("#byCert_fname").val(), lname: $("#byCert_lname").val(), bday: $("#byCert_bday").val() },
        beforeSend: function() {
          // $(".loading").show();
          // $(".backdrop").show();
          // $("body").css("overflow","hidden");
          $(".verify-icon").hide();
          $(".spinner-icon").show();
          $("#alert-modal").modal('show');
        },
        success: function(data) {
          if (data.record["response"] == "null") {
            // $("#byCert_no_data").show();
            // $("#byCert_default").hide();
            // $("#byCert_empty_field").hide();
            // $(".loading").hide();
            // $(".backdrop").hide();
            $(".error-fname").show();
            $(".error-lname").show();
            $(".error-bday").show();
            $(".error-certnum").show();
            $(".error-fname").text('Unknown');
            $(".error-lname").text('Unknown');
            $(".error-bday").text('Unknown');
            $(".error-certnum").text('Unknown');
            $("#byCert_certnum").css("border", "1px solid red");
            $("#byCert_fname").css("border", "1px solid red");
            $("#byCert_lname").css("border", "1px solid red");
            $("#byCert_bday").css("border", "1px solid red");
            $(".verify-icon").show();
            $(".spinner-icon").hide();
            // $("body").css("overflow","auto");
          } else {
          //   $("#byCert_no_data").hide();
          //   $("#byCert_default").hide();
          //   $("#byCert_empty_field").hide();
          //   $("#byCert_submit").hide();
          //   $(".loading").hide();
          //   $(".alert-container").show();
          //   $("#byCert_certnum").css("border", "1px solid #eceff1");
          //   $("body").css("overflow","hidden");
          // $("#searhAgain_byCert").show();
          $(".error-fname").hide();
          $(".error-lname").hide();
          $(".error-bday").hide();
          $(".error-certnum").hide();
          $("#byCert_certnum").css("border-bottom", "1px solid #E0E0E0");
          $("#byCert_certnum").css("border-left", "1px solid #fff");
          $("#byCert_certnum").css("border-right", "1px solid #fff");
          $("#byCert_certnum").css("border-top", "1px solid #fff");
          $("#byCert_fname").css("border-bottom", "1px solid #E0E0E0");
          $("#byCert_fname").css("border-left", "1px solid #fff");
          $("#byCert_fname").css("border-right", "1px solid #fff");
          $("#byCert_fname").css("border-top", "1px solid #fff");
          $("#byCert_lname").css("border-bottom", "1px solid #E0E0E0");
          $("#byCert_lname").css("border-left", "1px solid #fff");
          $("#byCert_lname").css("border-right", "1px solid #fff");
          $("#byCert_lname").css("border-top", "1px solid #fff");
          $("#byCert_bday").css("border-bottom", "1px solid #E0E0E0");
          $("#byCert_bday").css("border-left", "1px solid #fff");
          $("#byCert_bday").css("border-right", "1px solid #fff");
          $("#byCert_bday").css("border-top", "1px solid #fff");
          $("#records_tbl").hide();
            // $('#modal').modal('show');
          $("#byCerts_records_tbl").show();
          $(".verify-icon").show();
          $(".spinner-icon").hide();
            var tbl = "";
            for (var i = 0; i < data["record"].length; i++) {
              tbl += "<tr>";
              tbl +=
                "<td><label>" +data["record"][i]["module"]+ "</label></td>";
              tbl +=
                "<td><label>" + data["record"][i]["duration"] + "</label></td>";
              tbl += "</tr>";
            }

            $("#byCert_tbl_data").prepend(tbl);
            $("#name").html("<i class='fas fa-user'></i> &nbsp;"+data["record"][0]["name"]);
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      // $("#byCert_default").hide();
      // $("#byCert_no_data").hide();
      $("#byCert_certnum").css("border", "1px solid red");
      $("#byCert_fname").css("border", "1px solid red");
      $("#byCert_lname").css("border", "1px solid red");
      $("#byCert_bday").css("border", "1px solid red");
      $(".error-fname").show();
      $(".error-lname").show();
      $(".error-bday").show();
      $(".error-certnum").show();
      // $("#byCert_empty_field").show();
      // console.log("Web interface - By Cert num");
    }
  });
  // End Verification by Certificate number

  // Verification by PDC
  $("#byPDC_submit").click(function(event) {
    // console.log("By PDC Enrollment click");
    event.preventDefault();

    if (
      $("#byPDC_module").val() !== "" &&
      $("#byPDC_fname").val() !== "" &&
      $("#byPDC_lname").val() !== ""
    ) {
      $.ajax({
        url: base_url+"/online-verification/nmp/search_byPDC/",
        type: "POST",
        dataType: "json",
        data: {
          module: $("#byPDC_module").val(),
          fname: $("#byPDC_fname").val(),
          lname: $("#byPDC_lname").val(),
          bday: $("#byPDC_bday").val()
        },
        beforeSend: function() {
          // $(".loading").show();
          // $(".backdrop").show();
          // $("body").css("overflow","hidden");
          $(".verify-icon").hide();
          $(".spinner-icon").show();
          $("#alert-modal").modal('show');
        },
        success: function(data) {
          if (data.record["response"] == "null") {
            // $("#byCert_no_data").show();
            // $("#byCert_default").hide();
            // $("#byCert_empty_field").hide();
            // $(".loading").hide();
            // $(".backdrop").hide();
            $(".error-fname").show();
            $(".error-lname").show();
            $(".error-bday").show();
            $(".error-PDCmodule").show();
            $(".error-fname").text('Unknown');
            $(".error-lname").text('Unknown');
            $(".error-bday").text('Unknown');
            $(".error-PDCmodule").text('Unknown');
            $("#byPDC_module").css("border", "1px solid red");
            $("#byPDC_fname").css("border", "1px solid red");
            $("#byPDC_lname").css("border", "1px solid red");
            $("#byPDC_bday").css("border", "1px solid red");
            $(".verify-icon").show();
            $(".spinner-icon").hide();
            // $("body").css("overflow","auto");
          } else {
            // $("#byCert_no_data").hide();
            // $("#byCert_default").hide();
            // $("#byCert_empty_field").hide();
            // $("#byPDC_submit").hide();
            // $(".loading").hide();
            // $(".alert-container").show();
            $(".error-fname").hide();
            $(".error-lname").hide();
            $(".error-bday").hide();
            $(".error-PDCmodule").hide();
            $("#byPDC_module").css("border", "1px solid #E0E0E0");
            $("#byPDC_fname").css("border-bottom", "1px solid #E0E0E0");
            $("#byPDC_fname").css("border-left", "1px solid #fff");
            $("#byPDC_fname").css("border-right", "1px solid #fff");
            $("#byPDC_fname").css("border-top", "1px solid #fff");
            $("#byPDC_lname").css("border-bottom", "1px solid #E0E0E0");
            $("#byPDC_lname").css("border-left", "1px solid #fff");
            $("#byPDC_lname").css("border-right", "1px solid #fff");
            $("#byPDC_lname").css("border-top", "1px solid #fff");
            $("#byPDC_bday").css("border-bottom", "1px solid #E0E0E0");
            $("#byPDC_bday").css("border-left", "1px solid #fff");
            $("#byPDC_bday").css("border-right", "1px solid #fff");
            $("#byPDC_bday").css("border-top", "1px solid #fff");

            $("#records_tbl").hide();
              $('#modal').modal('show');
            $("#byCerts_records_tbl").show();
            $(".verify-icon").show();
            $(".spinner-icon").hide();
            // $("body").css("overflow","hidden");
            //   $("#searhAgain_byPDC").show();

              var tbl = "";
              for (var i = 0; i < data["record"].length; i++) {
                tbl += "<tr>";
                tbl +=
                  "<td><label>" +data["record"][i]["module"]+ "</label></td>";
                tbl +=
                  "<td><label>" + data["record"][i]["duration"] + "</label></td>";
                tbl += "</tr>";
              }

              $("#byCert_tbl_data").prepend(tbl);
              $("#name").html("<i class='fas fa-user'></i> &nbsp;"+ data["record"][0]["name"]);
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      // $("#byCert_default").hide();
      //   $("#byCert_no_data").hide();
      // $("#byCert_empty_field").show();
      $("#byPDC_module").css("border", "1px solid red");
      $("#byPDC_fname").css("border", "1px solid red");
      $("#byPDC_lname").css("border", "1px solid red");
      $("#byPDC_bday").css("border", "1px solid red");
      $(".error-fname").show();
      $(".error-lname").show();
      $(".error-bday").show();
      $(".error-PDCmodule").show();
      //console.log("Web interface - By PDC enrollment");
    }
  });
  // End Verification by PDC
});
// End Document
