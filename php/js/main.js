$(document).ready(function(){
 
$(".button, .linke2").click(function()
{
        $('#myfond_gris').fadeIn(300);
        var iddiv = $(this).attr("iddiv");
        $('#'+iddiv).fadeIn(300);
        $('#myfond_gris').attr('opendiv',iddiv);
        return false;
});
 
$('#myfond_gris, .mymagicoverbox_fermer').click(function()
{
        var iddiv = $("#myfond_gris").attr('opendiv');
        $('#myfond_gris').fadeOut(300);
        $('#'+iddiv).fadeOut(300);
});
 
});


function favadd(id, user_id){
   document.getElementById('addfav').style['border'] = 'none';
   document.getElementById('addfav').innerHTML = 'Success!';
   document.getElementById('addfav').className = 'succfavadd';
   document.getElementById('addfav').setAttribute("onclick", "none");
   /*$.post('favadd.php', {file_id: $("#file_id").val(), user_id: $("#user_id").val()}, function(){
    alert("success");});*/


    var request = $.ajax({
  url: "favadd.php",
  method: "POST",
  data: { user_id : user_id, file_id: id },
  dataType: "html"
});
 
request.done(function( msg ) {
  console.log( msg );
  console.log( id );
});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});
}


function deletepost(id){
  var request = $.ajax({
    url: "delete.php",
    method: "POST",
    data: {file_id: id}, 
    dataType: "html"
  });

  request.done(function(msg){
    document.write( msg );
    alert("Dropped file.");
  });

  request.fail(function(jqXHR, textStatus){
    alert("Request failed: " + textStatus);
  });
}



function makepublic(id){
  var request = $.ajax({
    url: "makepublic.php",
    method: "POST",
    data: {file_id: id},
    dataType: "html"
  });

  request.done(function(msg){
    document.write( msg );
    alert("Published succesfull!");
  });

  request.fail(function(jqXHR, textStatus){
    alert("Request failed: " + textStatus);
  });
}
