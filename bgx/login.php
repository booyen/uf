<?php

session_start();

if(!empty($_POST['username']) && !empty($_POST['password']))
{
	require("dbc.php");
	
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	
	$query = mysql_query("SELECT `id`,`password` FROM `users` WHERE `username`='".$username."'");
	$numrow = mysql_num_rows($query);

	if($numrow != 0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$dbId = $row["id"];
			$dbPass = $row["password"];
		}
		
		if(md5($password) == $dbPass)
		{
			$_SESSION['id'] = $dbId;
			header("location: index.php");
		}
		else
		{
			header("location: index.php?error=Incorrect Password!");
		}
	}
	else
	{
		header("location: index.php?error=That User Doesn't Exist!");
	}
}
else
{
	header("location: index.php?error=Please enter a username and a password!");
}

?>