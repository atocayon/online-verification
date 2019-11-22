$(document).ready(function() {
  // Verification by Name
  $("#mobile-byName_submit").click(function(event) {
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
        beforeSend: function() {
          $(".loading").show();
          $(".backdrop").show();
        },
        success: function(data) {
          if (data.record["response"] == "null") {
            $("#mobile-no_data").show();
            $("#mobile-default").hide();
            $("#mobile-empty_field").hide();
            $(".loading").hide();
            $("#modal").show();
            $(".close").show();
            $("#byName_fname").css("border","1px solid #eceff1");
            $("#byName_lname").css("border","1px solid #eceff1");
            $("#byName_bday").css("border", "1px solid #eceff1");
          } else {
            $("#mobile-no_data").hide();
            $("#mobile-default").hide();
            $("#mobile-empty_field").hide();
            $(".loading").hide();
            $(".alert-container").show();
            $("#byName_fname").css("border","1px solid #eceff1");
            $("#byName_lname").css("border","1px solid #eceff1");
            $("#byName_bday").css("border", "1px solid #eceff1");

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

            $("#mobile_res").prepend(tbl);
            console.log(data["record"][1]["name"]);
            $("#name").html(data["record"][1]["name"]);
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      $("#byName_fname").css("border","1px solid red");
      $("#byName_lname").css("border","1px solid red");
      $("#byName_bday").css("border", "1px solid red");
    }
  });
  // End Verification By Name

  // Verification by Cert number
  $("#mobile-byCert_submit").click(function(event) {
    event.preventDefault();
    if ($("#byCert_certnum").val() !== "") {
      $.ajax({
        url: baseURL + "index.php/nmp/search_byCertNum/",
        type: "POST",
        dataType: "json",
        data: { certnum: $("#byCert_certnum").val() },
        beforeSend: function() {
          $(".loading").show();
          $(".backdrop").show();
        },
        success: function(data) {
          if (data.record["response"] == "null") {
            $("#byCert-mobile-no_data").show();
            $("#byCert-mobile-default").hide();
            $("#byCert-mobile-empty_field").hide();
            $(".loading").hide();
            $("#modal").show();
            $(".close").show();
            $("#byCert_certnum").css("border","1px solid #eceff1");
          } else {
            $("#byCert-mobile-no_data").hide();
            $("#byCert-mobile-default").hide();
            $("#byCert-mobile-empty_field").hide();
            $(".loading").hide();
            $(".alert-container").show();
            $("#byCert_certnum").css("border","1px solid #eceff1");

            var tbl = "";
            for (var i = 0; i < data["record"].length; i++) {
              tbl += "<tr>";
              tbl +=
                "<td><label>" + data["record"][i]["name"] + "</label></td>";
              tbl +=
                "<td><label>" +
                data["record"][i]["module"] +
                " - " +
                data["record"][i]["duration"] +
                "</label></td>";
              tbl +=
                "<td><label>" + data["record"][i]["cert_num"] + "</label></td>";
              tbl += "</tr>";
            }

            $("#byCert_mobile_res").prepend(tbl);
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      $("#byCert_certnum").css("border","1px solid red");
    }
  });
  // End Verification by Cert number

  $("#mobile-byPDC_submit").click(function(event) {
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
        beforeSend: function() {
          $(".loading").show();
          $(".backdrop").show();
        },
        success: function(data) {
          if (data.record["response"] == "null") {
            $("#mobile-no_data").show();
            $("#mobile-default").hide();
            $("#mobile-empty_field").hide();
            $(".loading").hide();
            $("#modal").show();
            $(".close").show();
            $("#byPDC_module").css("border", "1px solid #eceff1");
            $("#byPDC_fname").css("border", "1px solid #eceff1");
            $("#byPDC_lname").css("border", "1px solid #eceff1");
            $("#byPDC_bday").css("border", "1px solid #eceff1");
          } else {
            $("#mobile-no_data").hide();
            $("#mobile-default").hide();
            $("#mobile-empty_field").hide();
            $(".loading").hide();
            $(".alert-container").show();
            $("#byPDC_module").css("border", "1px solid #eceff1");
            $("#byPDC_fname").css("border", "1px solid #eceff1");
            $("#byPDC_lname").css("border", "1px solid #eceff1");
            $("#byPDC_bday").css("border", "1px solid #eceff1");

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

            $("#mobile_res").prepend(tbl);
            $("#name").html(data["record"][1]["name"]);
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      $("#byPDC_module").css("border", "1px solid red");
      $("#byPDC_fname").css("border", "1px solid red");
      $("#byPDC_lname").css("border", "1px solid red");
      $("#byPDC_bday").css("border", "1px solid red");
    }
  });
});
