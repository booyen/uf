<?php
    include_once("includes/config.php");

    if (isset($_GET['OrG8923778898700-hasd879-cxzc']))
    {
        $firstname = $_GET['OrG8923778898700-hasd879-cxzc'];
        $sql = "SELECT * FROM um_users WHERE userName='$firstname'";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            
            if($row = $result->fetch_assoc()) {
                echo '<h1>'.$row["userName"]."'s Profile</h1>";
                echo '<table>';
                echo '<tr><td>ID:</td><td>'.$row["userID"].'</td></tr>';
                echo '<tr><td>Avatar:</td><td><img src="'.$row["UserEmail"].'" width="100px" /></td></tr>';
                echo '<tr><td>Firstname:</td><td>'.$row["firstname"].'</td></tr>';
                echo '<tr><td>Lastname:</td><td>'.$row["lastname"].'</td></tr>';
                echo '<tr><td>Country:</td><td>'.$row["country"].'</td></tr>';
            }
            echo '</table>';
        }
        else {
           echo "0 results";
        }
    }
    else {

        echo '<h2>All our members:</h2>';

        $sql = "SELECT * FROM um_users";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
   
            while($row = $result->fetch_assoc()) {
                
                echo '<hr />';
                echo '<table>';
                echo '<tr><td>ID:</td><td>'.$row["id"].'</td></tr>';
                echo '<tr><td>Avatar:</td><td><img src="'.$row["avatar"].'" width="100px" /></td></tr>';
                echo '<tr><td>Firstname:</td><td>'.$row["firstname"].'</td></tr>';
                echo '<tr><td>Lastname:</td><td>'.$row["lastname"].'</td></tr>';
                echo '<tr><td>Country:</td><td>'.$row["country"].'</td></tr>';
                echo '</table>';
                
            }
        }
        else {
           echo "0 results";
        }
    }
    
    include_once("includes/menu.php");
?>