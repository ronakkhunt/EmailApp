<?php

$uname = htmlentities($_POST['username']);
$passwd = htmlentities($_POST['password']);


include('connect.php');
include('create.php');
$q="insert into email_login values('$n','$uname','$passwd')";
mysql_query($q);

header('Location:index.php');
?>
