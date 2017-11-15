<?php require_once('config/main.php'); 
$query=mysql_query("select * from um_users");
?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data User ( <?php echo mysql_num_rows($query); ?> total user)</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    <?php if (isset($_SESSION['username'])): ?>
   
    <?php endif; ?>
    <br>
		<table class="table table-bordered" id="tabel">
		<thead>
			 <tr>
		    <th>NO</th>
		    <th>User Name</th>
			<th>User Email</th>
			<th>User Status</th>
		    <th>User Type</th>
		    <?php if (isset($_SESSION['username'])): ?>
		    <th></th>
			<?php endif; ?>
		  </tr>
		</thead>
		<tbody>
			<?php
		  $no=1;
		  while($q=mysql_fetch_array($query)){
		  ?>
		  <tr>
		    <td><?php echo $no++; ?></td> 
           
		    <td><?php echo $q['userName']?></td>
			<td><?php echo $q['userEmail']?></td>
			<td><?php echo $q['userStatus']?></td>
		    <td><?php echo $q['userType']?></td>
		    <?php if (isset($_SESSION['username'])): ?>
		    <td>
		    	
		    	<a class="btn btn-danger" onclick="return confirm('Do you want to remove user?')" href="hapus.php?hapus=<?php echo $_GET['page']; ?>&id=<?php echo $q['userID']; ?>">Remove User</a>
		    </td>
			<?php endif; ?>
		  </tr>
		  <?php
		  }
		  ?>
		</tbody>
		</table>
	</div>
</div>

<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 <script type="text/javascript">
	 $(document).ready(function() {
	 	$('#tabel').dataTable({
	          "bPaginate": true,
	          "bLengthChange": true,
	          "bFilter": true,
	          "bSort": true,
	          "bInfo": true,
	          "bAutoWidth": true
	    });
	 });
</script>