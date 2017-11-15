<?php
	$con = mysqli_connect('localhost', 'root', '', 'ummah') or die(mysql_error());
	if (isSet($_POST['sendMessage'])) {
		if (isSet($_POST['to']) && $_POST['to'] != '' && isSet($_POST['from']) && $_POST['from'] != '' && isSet($_POST['message']) && $_POST['message'] != '') {
			$to = $_POST['receiver'];
			$from = $_POST['sender'];
            $subject= $_POST['subject'];
			$message = $_POST['message'];
			$q = mysqli_query($con, "INSERT INTO `messages` VALUES ('', '$message', '$to', '$subject','$from')") or die(mysql_error());
			if ($q) {
				echo 'Message sent.';
			}else
				echo 'Failed to send message.';
		}
	}
?>