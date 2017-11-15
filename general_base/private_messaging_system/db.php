<?php
// Configure the Variables Below
$dbhost = 'the host that your MySQL database is on';
$dbusername = 'the username you use to access the MySQL database';
$dbpasswd = 'the password for the user to access the MySQL database';
$database_name = 'the name of the database';

// Database Stuff
$connection = mysql_connect("$dbhost","$dbusername","$dbpasswd") 
	or die ("Couldn't connect to server.");
	
$db = mysql_select_db("$database_name", $connection)
	or die("Couldn't select database.");
?>