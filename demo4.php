<?php


for($x=5;$x<55;$x=$x+5):
$growthList .= '<option value="'.$x.'">Greater than '.$x.'% increase</option>
';
endfor;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Florida Counties</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="formstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>



</head>

<body>
<div id="main">

  <form name="countyForm" id="countyForm" method="post" action="results3.php">
    <fieldset><legend>Florida Counties</legend>
    <p>Step 1: Choose population growth target<br />
      <select name="growth" id="growth">
        <option value="">Choose one</option>
		
	  <?=$growthList?>
    </select>
  </p>
  
 
    <input type="submit" name="Submit" value="Get Details &gt;" />
</fieldset></form>
<div id="loading">
<img src="loading4.gif" border="0" />
</div>
</div>
<script>
// prepare the form when the DOM is ready 
$(document).ready(function() { 

$('form#countyForm fieldset').append('<div id="targetDiv"></div>').find('select#growth').change(function(){
$.ajax({
   type: "POST",
   url: "rowCount.php",
   data: "growth="+this.value,
   success: function(msg){
$('div#targetDiv').html(' ').append('<p>'+msg+'</p>');
   }
 });
});

   
}); 
 
 $("#loading img").ajaxStart(function(){
   $(this).show();
 }).ajaxStop(function(){
   $(this).hide();
 });
</script>
</body>
</html>