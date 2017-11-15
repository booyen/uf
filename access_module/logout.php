<!--
Ummah Fund platform(beta)
Type:html/php
Name: Registration  form HTML & link dengan email PHP
last update: 13/12/2016
by: shahril aidi

note: none - PHP code for logout

status: function settle, 
!-->
<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if(!$user->is_logged_in())
{
	$user->redirect('index.php');
}

if($user->is_logged_in()!="")
{
	$user->logout();	
	$user->redirect('index.php');
}
?>