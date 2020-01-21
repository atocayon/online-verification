$(document).ready(function() {
  var i = 0;
  // Verification By Name
  $("#byName_submit").click(function(event) {
    // console.log("By Name Button Click");
    event.preventDefault();
    if ($("#byName_fname").val() !== "" && $("#byName_lname").val() !== "") {
      $.ajax({
        url: baseURL + "nmp/search_byName/",
        type: "POST",
        dataType: "json",
        data: {
          fname: $("#byName_fname").val(),
          lname: $("#byName_lname").val(),
          bday: $("#byName_bday").val()
        },
        beforeSend: function() {
          $(".loading").show();
          $(".backdrop").show();
          $("body").css("overflow","hidden");
        },
        success: function(data) {
          if (data.record["response"] == "null") {
            console.log(data.record["response"]);
            $("#no_data").show();
            $("#default").hide();
            $("#empty_field").hide();
            $(".loading").hide();
            $(".backdrop").hide();
            $("#byName_fname").css("border", "1px solid #eceff1");
            $("#byName_lname").css("border", "1px solid #eceff1");
            $("#byName_bday").css("border", "1px solid #eceff1");
            $("body").css("overflow","auto");

          } else {
            console.log(data.record["response"]);
            $("#no_data").hide();
            $("#default").hide();
            $("#empty_field").hide();
            $("#byName_submit").hide();
            $("#byName_fname").css("border", "1px solid #eceff1");
            $("#byName_lname").css("border", "1px solid #eceff1");
            $("#byName_bday").css("border", "1px solid #eceff1");
            $(".loading").hide();
            $("#searchAgain_byName").show();
            $(".alert-container").show();
            $("body").css("overflow","hidden");
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
      $("#empty_field").show();
      $("#default").hide();
      $("#no_data").hide();

      console.log("Web interface - By Name");
    }
  });

  // End Verification by name

  // Verification by Certificate number
  $("#byCert_submit").click(function(event) {
    // console.log("By cert num click");
    event.preventDefault();
    if ($("#byCert_certnum").val() !== "" && $("#byCert_fname").val() !== "" && $("#byCert_lname").val() !== "") {
      $.ajax({
        url: baseURL + "nmp/search_byCertNum/",
        type: "POST",
        dataType: "json",
        data: { certnum: $("#byCert_certnum").val(), fname: $("#byCert_fname").val(), lname: $("#byCert_lname").val(), bday: $("#byCert_bday").val() },
        beforeSend: function() {
          $(".loading").show();
          $(".backdrop").show();
          $("body").css("overflow","hidden");
        },
        success: function(data) {
          if (data.record["response"] == "null") {
            $("#byCert_no_data").show();
            $("#byCert_default").hide();
            $("#byCert_empty_field").hide();
            $(".loading").hide();
            $(".backdrop").hide();
            $("#byCert_certnum").css("border", "1px solid #eceff1");
            $("body").css("overflow","auto");
          } else {
            $("#byCert_no_data").hide();
            $("#byCert_default").hide();
            $("#byCert_empty_field").hide();
            $("#byCert_submit").hide();
            $(".loading").hide();
            $(".alert-container").show();
            $("#byCert_certnum").css("border", "1px solid #eceff1");
            $("body").css("overflow","hidden");
          $("#searhAgain_byCert").show();

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
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      $("#byCert_default").hide();
      $("#byCert_no_data").hide();
      $("#byCert_certnum").css("border", "1px solid red");
      $("#byCert_fname").css("border", "1px solid red");
      $("#byCert_lname").css("border", "1px solid red");
      $("#byCert_empty_field").show();
      console.log("Web interface - By Cert num");
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
        url: baseURL + "nmp/search_byPDC/",
        type: "POST",
        dataType: "json",
        data: {
          module: $("#byPDC_module").val(),
          fname: $("#byPDC_fname").val(),
          lname: $("#byPDC_lname").val(),
          bday: $("#byPDC_bday").val()
        },
        beforeSend: function() {
          $(".loading").show();
          $(".backdrop").show();
          $("body").css("overflow","hidden");
        },
        success: function(data) {
          if (data.record["response"] == "null") {
            $("#byCert_no_data").show();
            $("#byCert_default").hide();
            $("#byCert_empty_field").hide();
            $(".loading").hide();
            $(".backdrop").hide();
            $("#byPDC_module").css("border", "1px solid #eceff1");
            $("#byPDC_fname").css("border", "1px solid #eceff1");
            $("#byPDC_lname").css("border", "1px solid #eceff1");
            $("#byPDC_bday").css("border", "1px solid #eceff1");
            $("body").css("overflow","auto");
          } else {
            $("#byCert_no_data").hide();
            $("#byCert_default").hide();
            $("#byCert_empty_field").hide();
            $("#byPDC_submit").hide();
            $(".loading").hide();
            $(".alert-container").show();
            $("#byPDC_module").css("border", "1px solid #eceff1");
            $("#byPDC_fname").css("border", "1px solid #eceff1");
            $("#byPDC_lname").css("border", "1px solid #eceff1");
            $("#byPDC_bday").css("border", "1px solid #eceff1");
            $("body").css("overflow","hidden");
              $("#searhAgain_byPDC").show();

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
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      $("#byCert_default").hide();
        $("#byCert_no_data").hide();
      $("#byCert_empty_field").show();
      $("#byPDC_module").css("border", "1px solid red");
      $("#byPDC_fname").css("border", "1px solid red");
      $("#byPDC_lname").css("border", "1px solid red");
      $("#byPDC_bday").css("border", "1px solid red");
      console.log("Web interface - By PDC enrollment");
    }
  });
  // End Verification by PDC
});
// End Document
