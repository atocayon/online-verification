$(document).ready(function(){

  $("#byName_submit").click(function(event){
    event.preventDefault();
    console.log(baseURL);
    var fname = $('#byName_fname').val();
    var lname = $('#byName_lname').val();
    console.log(fname);
    console.log(lname);
    $.ajax({
      url: baseURL+"index.php/nmp/search_byName",
      type: "POST",
      dataType: "text",
      data:{
        'fname': $('#byName_fname').val(),
        'lname': $('#byName_lname').val(),
        'bday': $('#byName_bday').val()
      },
      success: function(data){
        console.log("success");
      },
      error: function(){
        console.log("error");
      }
    });
  });

});
