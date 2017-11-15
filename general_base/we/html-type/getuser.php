<?php
		 
	require_once 'dbconfig.php';
	
	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
		$query = "SELECT * FROM messages WHERE id=:id";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
			
		?>
			
		<div class="table-responsive">
		
		<table class="table table-striped table-bordered">
		    <tr>
			    <th>First Name</th>
				<td><?php echo $subject; ?></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><?php echo $message; ?></td>
			</tr>
			
		</table>
			
		</div>
			
		<?php				
	}