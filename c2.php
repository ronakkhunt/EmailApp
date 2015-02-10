<?php

include('connect.php');



$q = "create table email_login(uid char(10), email char(30), password char(30))";
mysql_query($q);



?>