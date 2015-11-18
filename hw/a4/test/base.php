<?php
session_start();

$dbhost = "oniddb.cws.oregonstate.edu"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "yooso-db"; // the name of the database that you are going to use for this project
$dbuser = "yooso-db"; // the username that you created, or were given, to access your database
$dbpass = "XXXXXXXXXXXXXX"; // the password that you created, or were given, to access your database
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>