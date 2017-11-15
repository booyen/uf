<?php require '../inc/config.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>

<!-- Maintenance Content -->


<?php
require_once 'class.user.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('index.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];
	
	$statusY = "Y";
	$statusN = "N";
	
	$stmt = $user->runQuery("SELECT userID,userStatus FROM um_users WHERE userID=:uID AND tokenCode=:code LIMIT 1");
	$stmt->execute(array(":uID"=>$id,":code"=>$code));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() > 0)
	{
		if($row['userStatus']==$statusN)
		{
			$stmt = $user->runQuery("UPDATE um_users SET userStatus=:status WHERE userID=:uID");
			$stmt->bindparam(":status",$statusY);
			$stmt->bindparam(":uID",$id);
			$stmt->execute();	
			
			$msg = "
            
            
		  <div class='font-s64 text-gray push-150-t push-50'>
          <img src='../assets/img/logo/logosmall-1.png'>
                <h1>Your account are now verified</h1>
                <h6>You will be directed to login page shortly or click below</h6>
            </div>
             <h1 class='h3 font-w400 push-15 animated fadeInLeftBig'> Click <a href='index.php'>Here</a> to login</h1>
                
                        <script>
                        setTimeout(function(){location.href='http://localhost/uf/uf/access_module'} , 3000);
                    </script>
            
            
			       ";	
		}
		else
		{
			$msg = "
             
		         <div class='font-s64 text-gray push-150-t push-50'>
                 <img src='../assets/img/logo/logosmall-1.png'>
                <h1>Your already activate your account</h1>
                <h6>You will be directed to login page shortly or click below</h6>
            </div>
            <h1 class='h3 font-w400 push-15 animated fadeInLeftBig'> Click <a href='index.php'>Here</a> to login</h1>
                   <script>
                        setTimeout(function(){location.href='http://localhost/uf/uf/access_module'} , 5000);
                    </script>
                
            
            
			       ";
		}
	}
	else
	{
		$msg = "
        
		          <div class='font-s64 text-gray push-150-t push-50'>
                  <img src='../assets/img/logo/logosmall-1.png'>
                <h1>No account Found</h1>
            </div>
            <h1 class='h3 font-w400 push-15 animated fadeInLeftBig'> Click <a href='signup.php'>Here</a> to Register</h1>
			   ";
	}	
}

?>
<div class="content bg-white text-center  overflow-hidden">
   <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
           	<?php if(isset($msg)) { echo $msg; } ?>
        </div>
    </div> 
</div>
<!-- END Maintenance Content -->

    <!-- Maintenance Footer -->
    <div class="pulldown push-10-t text-center animated fadeInUp">
        <small class="text-muted font-w600"><span class="js-year-copy"></span> &copy; <?php echo $one->name . ' ' . $one->version; ?></small>
    </div>
    <!-- END Maintenance Footer -->

    <?php require '../inc/views/template_footer_start.php'; ?>
    <?php require '../inc/views/template_footer_end.php'; ?>


