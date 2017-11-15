
<?php session_start();?>
<?php require '../inc/config.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>



<?php


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
$_SESSION['email']=$row['userEmail'];
$_SESSION['userName']=$row['userName'];  
$_SESSION['firstimelogin']=$row['firstLogin'];   
$count=mysqli_num_rows($result);
if($count==1)
{
    
    if($row['userStatus']=="Y")
				{
					if($row['userPass']==($mypassword))
					{
                        
                        
                    if ($row['userType']=="D")
                    { 
                        
                        if($row['firstLogin']=="0"){
                            
                                $_SESSION['userName']=$row['userName']; 
                              header ("location: ../donor_base/base_forms_firstlogin.php"); 
                            
                            
                        }else{

                                       header ("location: ../donor_base/base_pages_profile_donors.php"); }
                                        
                    }
                    else if ($row['userType']=="O")
                    { 
                        
                          if($row['firstLogin']=="0"){
                            
                              header ("location: ../org_base/base_pages_general_fistlogin.php"); 
                            
                            
                        }else{
                              
                                       $_SESSION['role']=$row['userType'];

                                       header ("location: ../org_base/base_pages_profile_org_debut.php"); }


                    }
                    }else{
                        
                        $error="<div class='alert alert-error text-center animated fadeInDown'>
                            <button class='close' data-dismiss='alert'>&times;</button>
                            Email and password doesn`t match.
                        </div>";
                        
                    }
        
        
        
        
        
                } else {

                    $error="<div class='alert alert-error text-center animated fadeInDown'>
                                        <button class='close' data-dismiss='alert'>&times;</button>
                                        Account not verfied. Check your email.
                                    </div>";
        
    }
}
else
{
$error="<div class='alert alert-error text-center animated fadeInDown'>
                            <button class='close' data-dismiss='alert'>&times;</button>
                            Account Does not exists. Register <a href='signup.php'>here<a>.
                        </div>";
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
                        if($_SERVER["REQUEST_METHOD"] == "POST")
{
                        	echo $error; }	?>
           
                        <!-- Login Form -->
                        <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-login form-horizontal push-30-t" method="post">
       
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="email" id="login-username" name="txtemail" required>
                                            <label for="login-username">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="password" id="login-password" name="txtupass" required>
                                            <label for="login-password">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label class="css-input switch switch-sm switch-primary">
                                    <input type="checkbox" id="login-remember-me" name="login-remember-me" ><span></span> Remember Me?
                                </label>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="font-s13 text-right push-5-t">
                                            <a href="fpass.php">Forgot Password?</a>
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