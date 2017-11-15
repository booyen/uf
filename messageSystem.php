<html>
	<head></head>
	<body>
		<h1>Send Message:</h1>
		<form action='messageSystem.php' method='POST'>
		<table>
			<tbody>
				<tr>
					<td>To: </td><td><input type='text' name='to' /></td>
				</tr>
				<tr>
					<td>From: </td><td><input type='text' name='from' /></td>
				</tr>
                <tr>
					<td>subject: </td><td><input type='text' name='subject' /></td>
				</tr>
				<tr>
					<td>Message: </td><td><input type='text' name='message' /></td>
				</tr>
				<tr>
					<td></td><td><input type='submit' value='Create Task' name='sendMessage' /></td>
				</tr>
			</tbody>
		</table>
		</form>
	</body>
</html>


<?php
	$con = mysqli_connect('localhost', 'root', '', 'ummah') or die(mysql_error());
	if (isSet($_POST['sendMessage'])) {
		if (isSet($_POST['to']) && $_POST['to'] != '' && isSet($_POST['from']) && $_POST['from'] != '' && isSet($_POST['message']) && $_POST['message'] != '') {
			$to = $_POST['to'];
			$from = $_POST['from'];
            $subject = $_POST['subject'];
			$message = $_POST['message'];
			$q = mysqli_query($con, "INSERT INTO `messages` VALUES ('', '$to', '$from', '$subject','$message')") or die(mysql_error());
			if ($q) {
				echo 'Message sent.';
			}else
				echo 'Failed to send message.';
		}
	}
?>


<h1>My Messages:</h1>
<table>
	<tbody>
		<?php
			$user = 'asd'; //$user = $_SESSION['username'];
			$qu = mysqli_query($con, "SELECT * FROM `messages` WHERE `receiver`='$user'");
			if (mysqli_num_rows($qu) > 0) {
				while ($row = mysqli_fetch_array($qu)) {
					echo '<tr><td>'.$row["sender"].'</td><td>'.$row["message"].'</td></tr>';
				}
			}
		?>
	</tbody>
</table>