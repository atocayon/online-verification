$(document).ready(function() {
  // Verification By Name
  $("#byName_submit").click(function(event) {
    event.preventDefault();
    console.log(baseURL);
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
          console.log("success");
          console.log(JSON.stringify(data.record));
          console.log("RESPONSE: " + JSON.stringify(data.record["response"]));
          if (data.record["response"] == "null") {
            console.log("======================ERROR======================");
            $("#no_data").show();
            $("#default").hide();
            $("#empty_field").hide();
          } else {
            $("#no_data").hide();
            $("#default").hide();
            $("#empty_field").hide();
            $("#byName_submit").hide();
            $("#byName_fname").val();
            $("#byName_lname").val();
            $("#byName_bday").val();
            $("#table-container").show();
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
          console.log("error");
          console.log(JSON.stringify(error));
          alert("INTERNAL ERROR!");
        }
      });
    } else {
      $("#empty_field").show();
      $("#default").hide();
      $("#no_data").hide();
      console.log("Error, Form is Empty");
    }
  });
  // End Verification by name

  // Verification by Certificate number
  $("#byCert_submit").click(function(event) {
    event.preventDefault();
    if ($("#byCert_certnum").val() !== "") {
      $.ajax({
        url: baseURL + "index.php/nmp/search_byCertNum/",
        type: "POST",
        dataType: "json",
        data: { certNum: $("#byCert_certnum").val() },
        success: function(data) {
          if (data.record["response"] == "null") {
            console.log("======================ERROR======================");
            $("#no_data").show();
            $("#default").hide();
            $("#empty_field").hide();
          } else {
            $("#no_data").hide();
            $("#default").hide();
            $("#empty_field").hide();
            $("#byCert_submit").hide();
            $("#byCert_certnum").val();
            $("#table-container").show();
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
          console.log("error");
          console.log(JSON.stringify(error));
          alert("INTERNAL ERROR!");
        }
      });
    } else {
      $("#empty_field").show();
      $("#default").hide();
      $("#no_data").hide();
      console.log("Error, Form is Empty");
    }
  });
  // End Verification by Certificate number

  // Verification by PDC
  $("#byPDC_submit").click(function(event) {
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
            console.log("======================ERROR======================");
            $("#no_data").show();
            $("#default").hide();
            $("#empty_field").hide();
          } else {
            $("#no_data").hide();
            $("#default").hide();
            $("#empty_field").hide();
            $("#byPDC_submit").hide();
            $("#byCert_certnum").val();
            $("#table-container").show();
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
          console.log("error");
          console.log(JSON.stringify(error));
          alert("INTERNAL ERROR!");
        }
      });
    } else {
      $("#empty_field").show();
      $("#default").hide();
      $("#no_data").hide();
      console.log("Error, Form is Empty");
    }
  });
  // End Verification by PDC

  $("#searhAgain").click(function(event) {
    window.location.reload(true);
  });

  $("#site_logo").click(function(event) {
    event.preventDefault();
    $("#home").show();
    $("#options").show();
    $("#form-cert").hide();
    $("#form-enrollees").hide();
    $("#forms-page").hide();
    $("#form-name").hide();
  });
});
