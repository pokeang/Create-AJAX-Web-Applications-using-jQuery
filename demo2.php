<?php
error_reporting(E_ALL);

$yearList = '';
$countyList = '';


include 'class.db.php';
include 'config.php';
$db = new db;

$db->connectdb($host, $user, $pass, $database);

$query = $db->query("SELECT id,county FROM fl_counties");
while($data = $db->fetch_array($query)):
$countyList .= '<option value="'.$data['id'].'">'.$data['county'].'</option>
';
endwhile;

for($x=2000;$x<2006;$x++):
$yearList .= '<option value="'.$x.'">'.$x.'</option>
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
<script type="text/javascript" src="jquery.form.js"></script>

</head>


<body>
<div id="main">

  <form action="results2.php" method="post" name="countyForm" id="countyForm">
    <fieldset><legend>Florida Counties</legend>
    <p>Step 1: Choose county (required)<br />
      <select name="county" id="county">
        <option value="">Choose one</option>
	  <?=$countyList?>
    </select>
  </p>
  <p>Step 2: Choose year<br />
      <select name="year" id="year">
        <option value="">Choose all years</option>
	  <?=$yearList?>
    </select>
  </p>
  <input type="submit" name="Submit" value="Get Population Data &gt;" />
</fieldset></form>
<div id="loading">
<img src="loading4.gif" border="0" />
</div>
<div id="targetDiv"></div>
</div>
<script>
// prepare the form when the DOM is ready 
$(document).ready(function() { 
    var options = { 
        target:        '#targetDiv',   // target element to update 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override form form's 'method' attribute 
        //dateType:  null        // 'xml', 'script', or 'json' (see form.js for docs) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful subit 
    }; 
 
    // bind form using 'ajaxForm' 
    $('#countyForm').ajaxForm(options); 
}); 
 
// pre-submit callback 
function showRequest(formData, jqForm) { 
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
 
    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 
 var extra = [ { name: 'ajax', value: '1' }];
 $.merge( formData, extra)
   /*  alert('About to submit: \n\n' + $.param(formData));*/
 
    // here we could return false to prevent the form from being submitted 
    return true;  
} 
 
// post-submit callback 
function showResponse(responseText, statusText)  { 
   /* alert('status: ' + statusText + '\n\nresponseText: \n' + 
        responseText + '\n\nThe output div should have already been updated with the responseText.'); */
} 

 $("#loading img").ajaxStart(function(){
   $(this).show();
 }).ajaxStop(function(){
   $(this).hide();
 });
</script>
</body>
</html>