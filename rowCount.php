<?php

if(!empty($_POST)):
if(isset($_POST['growth']) && $_POST['growth'] != ''):
/****************
Sanitize the data
***************/
$safeGrowth = (int)$_POST['growth'];
/**************
Connect to db
**************/
@(include 'class.db.php') or die('db class not found');
@(include 'config.php') or die('configuration file not found');
$db = new db;

$db->connectdb($host, $user, $pass, $database);
/********/

$query = $db->query("SELECT county FROM fl_counties WHERE growth >= '$safeGrowth'");
$rows = mysql_num_rows($query);
if($rows == 0):
echo 'No information found. Please go back.';

else:
echo $rows.' counties with growth greater than '.$safeGrowth.'%';

endif;//rows > 0



else:
echo 'Growth information not received<br />';

endif;//county not sent

else:
echo 'No data was received';
endif;


?>