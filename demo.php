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
</head>

<body>
<div id="main">

  <form name="form1" id="form1" method="post" action="results.php">
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
<p>&nbsp; </p>
</div>
</body>
</html>