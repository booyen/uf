<?php 
session_start();
require("dbc.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Allow Users To Have Their Own Background Image</title>
<script type="text/javascript" src="jquery.js"></script>
</head>

<body>
<?php if(!isset($_SESSION['id'])){ ?>
<form action="login.php" method="POST">
	Username: <input type="text" name="username" /><br />
    Password: <input type="password" name="password" /><br />
    <input type="submit" value="Login">
</form>
<?php if(isset($_GET['error'])) echo $_GET['error']; }?>
<?php 
if(isset($_SESSION['id']))
{
	//Get data from database
	$id = mysql_real_escape_string($_SESSION['id']);
	$query = mysql_query("SELECT `username`,`bgimage` FROM `users` WHERE `id`='".$id."'");
	while($row = mysql_fetch_assoc($query))
	{
		$username = $row['username'];
		$bgImage = $row['bgimage'];
	}
	
	//Show logged in as, and logout link
	echo "Logged in as: ".$username." || <a href='logout.php'>Logout</a><br /><br />";
	
	//Check if the user has a background set
	if($bgImage != "n/a")
	{
		echo "
			<script type='text/javascript'>
				$('body').css('background-image','url(\"userbackgrounds/".$bgImage."\")');
			</script>
		";
	}
	
	//Get any uploads
	echo "<strong><u>My Current Uploads</u></strong><br />";
	$idLength = strlen($id);
	$count = 0;
	foreach(scandir("userbackgrounds") as $image)
	{
		$a = substr($image,0,$idLength);
		if($a == $id)
		{
			echo "<a href='index.php?changeBackground=".$image."'>".$image."</a> - <a href='index.php?deleteImage=".$image."'>Delete</a><br />";
			$count++;
		}
	}
	if($count == 0)
	{
		echo "You no have images uploaded";
	}
	elseif($bgImage != "n/a")
	{
		echo "<a href='index.php?resetBg'>Reset Background</a>";
	}
	
	//Create the upload form
	echo "
		<br /><br /><strong><u>Upload An Image</u></strong>
		<form action='index.php?uploadImage' method='POST' enctype='multipart/form-data'>
			<input type='file' name='file'><br />
			<strong>OR</strong><br />
			URL Of Image: <input type='text' size='50' name='imageURL'><br />
			Enter A New Name: <input type='text' name='imageURLname'><br />
			<input type='submit' value='Upload'>
		</form>
	";
	
	if(isset($_GET['uploadImage']))
	{
		if($_FILES['file']['size'] != 0 && !empty($_POST['imageURL']))
		{
			echo "Cannot upload and select a URL at the same time";
		}
		else
		{
			if($_FILES['file']['size'] != 0)
			{
				$imageName = str_replace(" ","",$_FILES['file']['name']);
				move_uploaded_file($_FILES['file']['tmp_name'],"userbackgrounds/".$id."-".$imageName);
				header("location: index.php");
			}
			elseif(!empty($_POST['imageURL']))
			{
				$rawImage = file_get_contents(mysql_real_escape_string($_POST['imageURL']));
				$imageName = str_replace(" ","",$_POST['imageURLname']);
				file_put_contents("userbackgrounds/".$id."-".mysql_real_escape_string($imageName).".jpg",$rawImage);
				header("location: index.php");
			}
			else
			{
				echo "Error!";
			}
		}
	}
	
	//Change background image
	if(isset($_GET['changeBackground']))
	{
		$imageNew = mysql_real_escape_string($_GET['changeBackground']);
		mysql_query("UPDATE `users` SET `bgimage`='".$imageNew."' WHERE `id`='".$id."'");
		header("location: index.php");
	}
	
	//Reset background image
	if(isset($_GET['resetBg']))
	{
		mysql_query("UPDATE `users` SET `bgimage`='n/a' WHERE `id`='".$id."'");
		header("location: index.php");
	}
	
	//Delete an image
	if(isset($_GET['deleteImage']))
	{
		$deletedImage = mysql_real_escape_string($_GET['deleteImage']);
		
		unlink("userbackgrounds/".$deletedImage);
		
		if($bgImage == $deletedImage)
		{
			header("location: index.php?resetBg");
		}
		else
		{
			header("location: index.php");
		}
	}
}
?>
</body>
</html>