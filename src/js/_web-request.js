$(document).ready(function() {
  // Verification By Name
  $("#byName_submit").click(function(event) {
    // console.log("By Name Button Click");
    event.preventDefault();
    if ($("#byName_fname").val() !== "" && $("#byName_lname").val() !== "") {
      $.ajax({
        url: baseURL + "index.php/nmp/search_byName/",
        type: "POST",
        dataType: "json",
        data: {
          fname: $("#byName_fname").val(),
          lname: $("#byName_lname").val(),
          bday: $("#byName_bday").val()
        },
        success: function(data) {
          if (data.record["response"] == "null") {
            $("#no_data").show();
            $("#default").hide();
            $("#empty_field").hide();
          } else {
            $("#no_data").hide();
            $("#default").hide();
            $("#empty_field").hide();
            $("#byName_submit").hide();
            $("#searhAgain").show();
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
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
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
    if ($("#byCert_certnum").val() !== "") {
      $.ajax({
        url: baseURL + "index.php/nmp/search_byCertNum/",
        type: "POST",
        dataType: "json",
        data: { certnum: $("#byCert_certnum").val() },
        success: function(data) {
          if (data.record["response"] == "null") {
            $("#no_data").show();
            $("#default").hide();
            $("#empty_field").hide();
          } else {
            $("#no_data").hide();
            $("#default").hide();
            $("#empty_field").hide();
            $("#byCert_submit").hide();
            $("#searhAgain").show();

            var tbl = "";
            for (var i = 0; i < data["record"].length; i++) {
              tbl += "<tr>";
              tbl +=
                "<td><label>" + data["record"][i]["module"] + "</label></td>";
              tbl +=
                "<td><label>" + data["record"][i]["fname"] + "</label></td>";
              tbl +=
                "<td><label>" + data["record"][i]["cdate"] + "</label></td>";
              tbl += "</tr>";
            }

            $("#tbl_data").prepend(tbl);
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      $("#empty_field").show();
      $("#default").hide();
      $("#no_data").hide();
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
        url: baseURL + "index.php/nmp/search_byPDC/",
        type: "POST",
        dataType: "json",
        data: {
          module: $("#byPDC_module").val(),
          fname: $("#byPDC_fname").val(),
          lname: $("#byPDC_lname").val(),
          bday: $("#byPDC_bday").val()
        },
        success: function(data) {
          if (data.record["response"] == "null") {
            $("#no_data").show();
            $("#default").hide();
            $("#empty_field").hide();
          } else {
            $("#no_data").hide();
            $("#default").hide();
            $("#empty_field").hide();
            $("#byPDC_submit").hide();
            $("#searhAgain").show();

            var tbl = "";
            for (var i = 0; i < data["record"].length; i++) {
              tbl += "<tr>";
              tbl +=
                "<td><label>" + data["record"][i]["module"] + "</label></td>";
              tbl +=
                "<td><label>" + data["record"][i]["fname"] + "</label></td>";
              tbl +=
                "<td><label>" + data["record"][i]["cdate"] + "</label></td>";
              tbl += "</tr>";
            }

            $("#tbl_data").prepend(tbl);
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      $("#empty_field").show();
      $("#default").hide();
      $("#no_data").hide();
      console.log("Web interface - By PDC enrollment");
    }
  });
  // End Verification by PDC
});
// End Document
