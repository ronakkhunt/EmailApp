<?php

include('connect.php');


echo $uname;

$q = "select count(*) from email_login";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
$n = $a[0];

$q = "create table ie".$n."(fromname char(30), subject char(30), msgbody char(30))";
mysql_query($q);
$q = "create table se".$n."(toname char(30), subject char(30), msgbody char(30))";
mysql_query($q);



?>