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
        success: function(data) {
          if (data.record["response"] == "null") {
            $("#mobile-no_data").show();
            $("#mobile-default").hide();
            $("#mobile-empty_field").hide();
            $("#modal").show();
            $(".close").show();
            $("body").css("background-color", "rgba(0,0,0,0.7)");
            $(".nav-mobile-container ").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".verifyByName-form-container").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".header-container").css("border", "1px solid rgba(0,0,0,0.7)");
            $(".verifyByName-form-container").css("border", "1px solid rgba(0,0,0,0.7)");
          } else {
            $("#mobile-no_data").hide();
            $("#mobile-default").hide();
            $("#mobile-empty_field").hide();
            $("#modal").show();
            $(".close").show();
            $("body").css("background-color", "rgba(0,0,0,0.7)");
            $(".nav-mobile-container ").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".verifyByName-form-container").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".header-container").css("border", "1px solid rgba(0,0,0,0.7)");
            $(".verifyByName-form-container").css("border", "1px solid rgba(0,0,0,0.7)");
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

            $("#mobile_res").prepend(tbl);
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      alert("Ops, Sorry you didn't input anything...");
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
        success: function(data) {
          if (data.record["response"] == "null") {
            $("#mobile-no_data").show();
            $("#mobile-default").hide();
            $("#mobile-empty_field").hide();
            $("#modal").show();
            $(".close").show();
            $("body").css("background-color", "rgba(0,0,0,0.7)");
            $(".nav-mobile-container ").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".verifyByName-form-container").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".header-container").css("border", "1px solid rgba(0,0,0,0.7)");
            $(".verifyByName-form-container").css("border", "1px solid rgba(0,0,0,0.7)");
          } else {
            $("#mobile-no_data").hide();
            $("#mobile-default").hide();
            $("#mobile-empty_field").hide();
            $("#modal").show();
            $(".close").show();
            $("body").css("background-color", "rgba(0,0,0,0.7)");
            $(".nav-mobile-container ").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".verifyByName-form-container").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".header-container").css("border", "1px solid rgba(0,0,0,0.7)");
            $(".verifyByName-form-container").css("border", "1px solid rgba(0,0,0,0.7)");

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

            $("#mobile_res").prepend(tbl);
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      alert("Ops, Sorry you didn't input anything...");
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
        success: function(data) {
          if (data.record["response"] == "null") {
            $("#mobile-no_data").show();
            $("#mobile-default").hide();
            $("#mobile-empty_field").hide();
            $("#modal").show();
            $(".close").show();
            $("body").css("background-color", "rgba(0,0,0,0.7)");
            $(".nav-mobile-container ").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".verifyByName-form-container").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".header-container").css("border", "1px solid rgba(0,0,0,0.7)");
            $(".verifyByName-form-container").css("border", "1px solid rgba(0,0,0,0.7)");
          } else {
            $("#mobile-no_data").hide();
            $("#mobile-default").hide();
            $("#mobile-empty_field").hide();
            $("#modal").css("visibility", "visible");
            $(".close").css("visibility", "visible");
            $("body").css("background-color", "rgba(0,0,0,0.7)");
            $(".nav-mobile-container ").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".verifyByName-form-container").css({'-webkit-box-shadow' : 'none', '-moz-box-shadow' : 'none', 'box-shadow' : 'none'});
            $(".header-container").css("border", "1px solid rgba(0,0,0,0.7)");
            $(".verifyByName-form-container").css("border", "1px solid rgba(0,0,0,0.7)");

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

            $("#mobile_res").prepend(tbl);
          }
        },
        error: function(error) {
          alert("INTERNAL ERROR!" + error);
        }
      });
    } else {
      alert("Ops, Sorry you didn't input anything...");
    }
  });
});
