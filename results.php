<?php
@(include 'header.php');

if(!empty($_POST)):
if(isset($_POST['county']) && $_POST['county'] != ''):
/****************
Sanitize the data
***************/
$safeCounty = (int)$_POST['county'];
/**************
Connect to db
**************/
@(include 'class.db.php') or die('db class not found');
@(include 'config.php') or die('configuration file not found');
$db = new db;

$db->connectdb($host, $user, $pass, $database);
/*****/
if(isset($_POST['year']) && $_POST['year'] != ''):


/****************
Sanitize the data
***************/
$safeYear = (int)$_POST['year'];

/*************/

$query = $db->query("SELECT * FROM fl_counties WHERE id = '$safeCounty'");
if(mysql_num_rows($query) != 1):
echo 'No information found. Please go back.';

else:
$d = $db->fetch_array($query);

echo '<h3>'.$safeYear.' population estimate for '.$d['county'].'</h3>';
echo '<p>'.$d[$safeYear].'</p>';
endif;//rows == 1
else:
//Give all years for one county

$query = $db->query("SELECT * FROM fl_counties WHERE id = '$safeCounty'");
if(mysql_num_rows($query) != 1):
echo 'No information found. Please go back.';

else:
$d = $db->fetch_array($query);
echo '<h3>Multi year population estimate for '.$d['county'].'</h3>';
for($x=2000;$x<2006;$x++):
echo '<p>'.$x.' &raquo; '.$d[$x].'</p>
';
endfor;
endif;//rows == 1

endif;//year not sent
else:
echo 'County information not received<br />';

endif;//county not sent

else:
echo 'No data was received';
endif;

@(include 'footer.php');
?>