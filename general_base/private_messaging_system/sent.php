<?php
session_start();
$user = $_SESSION['username'];
    
include 'db.php';
    
//This checks to see if a user is logged in or not by seeing if the sessioned username varialble exists.
//You could change this check to however you want to validate your members, this is just how I did it.
if(!$user)
	{
	echo "<br><p>Blah blah you arent logged in and stuff, you should do that or something</p><br>";
	}

else
	{
	//Query the database to see how many messages the logged in user has, then do a little math
	//Find the percentage that your inbox is full (message count divided by 50)
	//50 messages maximum, you can change that
	$sql = mysql_query ("SELECT pm_count FROM users WHERE username='$user'");
	$row = mysql_fetch_array ($sql);
	$pm_count = $row['pm_count'];
	
	//This is the math to figure out the percentage.
	//The message could divided by 50 then multiplied by 100 so we dont have a number less than 1
	$percent = $pm_count/'50';
	$percent = $percent * '100';
	
	//Next we come out of PHP and show some HTML, the inbox fullness, the messages we have sent that werent recieved or deleted yet
	?>
        <br>
        <center>
        <b><p><a href="inbox.php">Inbox</a> | <a href="compose.php">Compose</a> | <a href="sent.php">Sentbox</a></b>
        <b><p><?php echo "$pm_count"." of 50 Total  |  "."$percent"."% full"; ?></p></b>
        </center>
        <br>
        
        <?php
        //Get all message that are sent by the logged in user, and that have the recieved field set to zero, meaning they have not been recieved, once read the view message page sets the recieved field for the message to 1
        $query = "SELECT * FROM messages WHERE sender='$user' AND recieved='0'";
        $sqlinbox = mysql_query($query);
        
        //If there is a MySQL error we need to display the error because something has gone horribly wrong on the server.
        if(!$sqlinbox)
            {
            ?>
            <p><?php print '$query: '.$query.mysql_error();?></p>
            <?php
            }
        
        //If all messages sent by the user were recieved or deleted, then jsut say that there are no messages not recieved  
        elseif (!mysql_num_rows($sqlinbox) )
            {
            ?>
            <p><b>You have no un-recieved messages to display</b></p>
            <?php
            }
        
        //If there are messages that have not been recieved yet we need to display those messages to the user
        else
            {
            //Lets make a table for the messages to go in, to keep things organised and such
            ?>
            <table width="80%" border="0">
              <tr>
                  <td width="" valign="top"><p><b><u>Subject</u></b></p></td>
                  <td width="120px" valign="top"><p><b><u>Sender</u></b></p></td>  
              </tr>
            <?php
            //This is a while loop that goes through the array while there are still things in it, getting the subject and reciever and displaying them
            while($inbox = mysql_fetch_array($sqlinbox))
                {
                $reciever = $inbox['reciever'];
                $subject = $inbox['subject'];
                ?>
                <tr>
                  <td width="" valign="top"><p><?php echo "$subject"; ?></p></td>
                  <td width="120px" valign="top"><p><?php echo "$reciever"; ?></p></td>  
                </tr>
                <?php
                }
            echo "</table>";
            }
        }    
    ?>