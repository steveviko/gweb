<?php
// $mysql_hostname = "localhost";
// $mysql_user = "root";
// $mysql_password = "";
// $mysql_database = "db_shopping";
$mysql_hostname = "remotemysql.com";
$mysql_user = "vvUhx6iGfj";
$mysql_password = "f4VccaNSzz";
$mysql_database = "vvUhx6iGfj";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($bd,$mysql_database) or die("Could not select database");

?>