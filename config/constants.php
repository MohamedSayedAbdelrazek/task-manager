<?php
session_start();


define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','task-manager');
define('SITEURL', 'http://localhost/task-manager/');

//connect with DB
$conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
$db_select=mysqli_select_db($conn,DB_NAME)or die(mysqli_error());
?>