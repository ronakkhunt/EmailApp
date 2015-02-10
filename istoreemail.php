<?php
session_start();
$uid = htmlentities($_POST['uid']);
$to = htmlentities($_POST['to']);
$sub = htmlentities($_POST['sub']);
$body = htmlentities($_POST['body']);


include('connect.php');

$q="insert into se".$uid." values('$to','$sub','$body')";
$r = mysql_query($q);

$q = "select uid from email_login where email='$to'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
$uid = $a[0];


$to = $_SESSION['username'];
$q="insert into ie".$uid." values('$to','$sub','$body')";
$r = mysql_query($q);
header('Location:main.php');




?>
