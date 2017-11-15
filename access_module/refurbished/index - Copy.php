<?php require '../inc/config.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>



<?php
session_start();

$con= new mysqli('localhost','root','','ummah');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    
$myusername1=mysqli_real_escape_string($con,$_POST['txtemail']); 
$mypassword1=mysqli_real_escape_string($con,$_POST['txtupass']); 
$mypassword=md5($mypassword1);
 
$sql="SELECT * FROM um_users WHERE userEmail='$myusername1' and userPass='$mypassword'";
    
    
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$_SESSION['userid']=$row['userID'];
$_SESSION['role']=$row['userType'];
$count=mysqli_num_rows($result);
if($count==1)
{
			if ($row['userType']=="D")
			{ 
 
                               header ("location: d_page.php"); 
                             
			}
			else if ($row['userType']=="O")
			{ 
                               $_SESSION['role']=$row['userType'];
 
                               header ("location: o_page.php"); 
                             
 
			}
}
else 
{
$error="Your Login Name or Password is invalid";
}
}
?>




    <!-- Login Content -->
    <div class="bg-white ">
        <div class="content content-boxed overflow-hidden">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <div class="push-30-t push-50 animated fadeIn">
                        <!-- Login Title -->
                        <div class="text-center">
                            <img src="../assets/img/logo/logosmall-1.png">
                            <p class="text-muted push-15-t">Login to UmmahFund</p>
                        </div>
                        <!-- END Login Title -->


                        <?php 
		if(isset($_GET['inactive']))
		{
			?>
                        <div class='alert alert-error text-center animated fadeInDown'>
                            <button class='close' data-dismiss='alert'>&times;</button>
                            Account not yet verify. Check Your email for activation code.
                        </div>
                        <?php
		}
		?>


                        <!-- Login Form -->
                        <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-login form-horizontal push-30-t" method="post">
                            <?php
        if(isset($_GET['error']))
		{
			?>
                                <div class='alert alert-success'>
                                    <button class='close' data-dismiss='alert'>&times;</button>
                                    <strong>Wrong Details!</strong>
                                </div>
                                <?php
		}
		?>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="text" id="login-username" name="txtemail">
                                            <label for="login-username">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="password" id="login-password" name="txtupass">
                                            <label for="login-password">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label class="css-input switch switch-sm switch-primary">
                                    <input type="checkbox" id="login-remember-me" name="login-remember-me"><span></span> Remember Me?
                                </label>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="font-s13 text-right push-5-t">
                                            <a href="resetpass.php">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group push-30-t">
                                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                        <button class="btn btn-sm btn-block btn-primary" type="submit" name="btn-login">Log in</button>
                                    </div>
                                </div>
                             <div class="col-md-12 text-center ">
                                          <a href="signup.php">Don`t have account? Register here</a>
                                    </div>
                                </div>
                        </form>
                        <!-- END Login Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Login Content -->

    <!-- Login Footer -->
    <div class="pulldown push-30-t text-center animated fadeInUp">
        <small class="text-muted"><span class="js-year-copy"></span> &copy; <?php echo $one->name . ' ' . $one->version; ?></small>
    </div>
    <!-- END Login Footer -->

    <?php require '../inc/views/template_footer_start.php'; ?>

    <!-- Page JS Plugins -->
    <script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="<?php echo $one->assets_folder; ?>/js/pages/base_pages_login.js"></script>

    <?php require '../inc/views/template_footer_end.php'; ?>