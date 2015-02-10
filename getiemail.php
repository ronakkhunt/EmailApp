<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");
include('connect.php');

$uid = $_SESSION['uid'];

$q = "select * from ie".$uid;
$r = mysql_query($q);

$data = "[";
while ($row = mysql_fetch_array($r)) {
    
	if ($data != "[") {$data .= ",";}
    $data .= '{"from":"'  . $row[0] . '",';
    $data .= '"subject":"'   . $row[1]        . '",';
	$data .= '"date":"Jan 1",';
    $data .= '"body":"'. $row[2]     . '"}'; 
}

$data.=']';


	




echo $data;







?>
