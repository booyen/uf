<?php
		 
	require_once 'dbconfigpdo.php';
	
	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
        
        
		$query = "SELECT * FROM messages WHERE id=:id ";
        
        
        $stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':id'=>$id));
     
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
			
	
            ?>
			
		<div>
         <div class="block-content">
             <p>From : <?php 
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ummah";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
                                    $usersender = $row['sender'] ;
                                    $qu1 = mysqli_query($conn, "SELECT * FROM um_users WHERE userID='$usersender'");
                                    if (mysqli_num_rows($qu1) > 0) {
                                        while ($row2 = mysqli_fetch_array($qu1)) {
                    
                                                echo $row2["userName"]; }}?></p> <br> 
             <p><b> <?php echo $subject; ?> </b></p> <br> 
             <p><?php echo $message; ?></p>
                       
                        </div>
        
		
			
			
	
			
			
	
			
		</div>
			
		<?php				
	
  
    }

?>