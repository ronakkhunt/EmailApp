<?php

$uname = htmlentities($_POST['username']);
$passwd = htmlentities($_POST['password']);

echo $uname;
include('connect.php');

$q="select * from email_login where email='$uname' and password='$passwd'";
$r = mysql_query($q);
$n = mysql_num_rows($r);
$a = mysql_fetch_array($r);

$uid = $a[0];
echo $n;
session_start();
if($n != 1)
{
	
	//header('Location:index.php');
}
else
{
$_SESSION['username']=$uname;
$_SESSION['uid'] =$uid;
header('Location:main.php');

}

?>
