<?php

class db {

function connectdb($host, $user, $pass, $db)
{

mysql_connect($host, $user, $pass);
    mysql_select_db($db) or die("Cannot connect");
}//end of connect

    function query($query, $debug=FALSE) {
    $debug = 'jkbDebug';
    if($debug=='jkbDebug')
    {
    $query = mysql_query($query) or die(mysql_error());
    }
    else
    {
   $query = mysql_query($query) or die("Query error");
   }
    return $query;
    }

    function fetch_array($query) {
     
    $query = mysql_fetch_array($query);
   
    return $query;
    }
	
    function fetch_assoc_array($query) {
     
    $query = mysql_fetch_assoc($query);
   
    return $query;
    }	

    function fetch_row($query) {

    $query = mysql_fetch_row($query) or die("FetchRow error");
    return $query;
    }

    function close() {
    
    mysql_close() or die("Close error");
    }
    
/***************
Jack added this
for extra protection
**************/
function quoteSmart($value)
{
   // Stripslashes
   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
      
   }

       //$value = "'" . mysql_real_escape_string($value) . "'";
$value = mysql_real_escape_string($value);
   return $value;
}

function cleanseInput($ar, $type='post')
{
if(!is_array($ar))
{
 return FALSE;
}
if(empty($ar))
{
 return FALSE;
}
foreach($ar as $key=>$val)
{
if($type != 'post')
{
unset($_GET[$key]);
$_GET[$key] = $this->quoteSmart($val);
}//get
else
{
unset($_POST[$key]);
$_POST[$key] = $this->quoteSmart($val);
}//post

}//foreach ar
}//end of cleanseInput()

}


?>