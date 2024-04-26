$(document).ready(function () {
  console.log("jquary ok");  
  
  uri=window.location.href;
  e=uri.split("=");
  console.log("URI: "+uri+"hasilnya: "+e[1])

  if(e[1]=="user"){
    $("#summary, #chart, #user_add").hide();
  }
$(".datatable-dropdown").append("<button type=button class=\"btn btn-success float-start me-2\"><i class=\"fa-solid fa-square-plus fa-beat-fade me-2\"></i>Data</button");
$(".datatable-dropdown button").click(function () { 
  $("#user_list").hide();
  $("#user_add").show();
});

});