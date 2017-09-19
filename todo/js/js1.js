// javascript file
$(document).ready(function () {

  $("span:contains('true')").text(' Complete').addClass('glyphicon glyphicon-ok').css('color','green');
  $("span:contains('false')").text('Pending').css('color','#f0ad4e');
  $("span.true").css('color','green');



  $("span.true:contains('0000-00-00 00:00:00')").remove();
    

});