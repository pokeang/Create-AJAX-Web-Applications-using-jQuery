<?php

$growthList = '';
for($x=5;$x<55;$x=$x+5){
$growthList .= '<option value="'.$x.'">Greater than '.$x.'% increase</option>
';
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Florida Counties</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="formstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="main">

  <form name="form1" id="form1" method="post" action="results3.php">
    <fieldset><legend>Florida Counties</legend>
    <p>Step 1: Choose population growth target<br />
      <select name="growth" id="growth">
        <option value="">Choose one</option>
		
	  <?php echo $growthList;?>
    </select>
  </p>
    <p>&nbsp;</p>
  <input type="submit" name="Submit" value="Get Population Data &gt;" />
</fieldset></form>
<p>&nbsp; </p>
</div>
</body>
</html>