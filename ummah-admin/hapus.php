<?php 
if (isset($_GET['hapus'])) {
	require "config/main.php";
	switch ($_GET['hapus']) {
		case 'data_user':
			mysql_query("DELETE FROM um_users WHERE userID=".$_GET['userID']);
			header('Location:index.php?page='.$_GET['hapus']);
           	break;
		case 'data_pembelian':
			mysql_query("DELETE FROM user WHERE userID=".$_GET['userID']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'data_teknisi':
			mysql_query("DELETE FROM teknisi1 WHERE userID=".$_GET['userID']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'spk':
			mysql_query("DELETE FROM teknisi WHERE userID=".$_GET['userID']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'admin':
			mysql_query("DELETE FROM um_users WHERE userID=".$_GET['userID']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		
		default:
			require_once("pages/404.php");
			break;
	}
}
else {
	require_once("pages/home.php");
}

 ?>