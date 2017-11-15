<?php  session_start();
?>
<?php require '../inc/config.php'; require '../inc/frontend_config.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_header_dashboard_frontend_firstlogin.php'; ?>


<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "ummah";
    $prefix = "";
    $database=mysqli_connect($hostname,$user,$password,$database);
?>


<!-- END Page Header -->
<?php

      //  echo $_SESSION['userName'];
        ini_set("display_errors",1);
        if(isset($_POST['SubmitButton'])){
        
        $donornick= $_SESSION['userName'];
        $userID = $_SESSION['user'];
        $donor_name = $_POST['donor_name']; 
        $donor_gender = $_POST['donor_gender']; 
        $donor_city = $_POST['donor_city'];
        $donor_tel = $_POST['donor_tel'];
      
        $firstlogin = "1";
      
       // session_start();
        $Destination = '../userfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.jpg';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
       // $user_firstname=$_REQUEST['user_firstname'];
       // $user_lastname=$_REQUEST['user_lastname'];
       // $user_email=$_REQUEST['user_email'];
      //  $user_password=$_REQUEST['user_password'];
     
     //   $result = mysqli_query($database,"SELECT * FROM um_users WHERE userName = '$orgnick'");
            
        $sql1="UPDATE um_users SET firstLogin='$firstlogin' WHERE userID = '$userID'";
        
        
        
       // $user_username=$_SESSION['userName'];
        
        $sql2="INSERT INTO donor_info (userID,donor_name,donor_gender,donor_city,donor_tel,donor_avatar) VALUES ('$userID', '$donor_name','$donor_gender','$donor_city','$donor_tel','$NewImageName')";
            
        $sql3=" INSERT INTO avatar_user (userID,user_avatar) VALUES ('$userID','$NewImageName')";
            
        mysqli_query($database,$sql1)or die(mysqli_error($database));
        mysqli_query($database,$sql2)or die(mysqli_error($database));
        mysqli_query($database,$sql3)or die(mysqli_error($database));
      
        
      /*  if( mysqli_num_rows($result) > 0) {
            mysqli_query($database,$sql3)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        }
        else{
            mysqli_query($database,$sql)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        } */ 
    }    
?>

<div class="col-xs-12 text-center font-w700 text-info push-30 push-30-t">
 <h1> Almost there!. We just need an information to setup your account</h1>
   
</div>
<!-- Page Content -->
<div class="content">
    
    <div class="col-lg-12">
        
        <!-- Simple Wizard (.js-wizard-simple class is initialized in js/pages/base_forms_wizard.js) -->
        <!-- For more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/ -->
        <div class="js-wizard-simple block">
            <!-- Step Tabs -->
            <ul class="nav nav-tabs nav-tabs-alt nav-justified">
                <li class="active">
                    <a href="#simple-step1" data-toggle="tab" aria-expanded="true">1.Basic information</a>
                </li>
               
                <li class="">
                    <a href="#simple-step3" data-toggle="tab" aria-expanded="false">2.Misc & contact</a>
                </li>
            </ul>
            <!-- END Step Tabs -->

            <!-- Form -->
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" id="UploadForm" autocomplete="off">
                <!-- Steps Content -->
                <div class="block-content tab-content">
                    <!-- Step 1 -->
                    <div class="tab-pane fade push-30-t push-50 active in" id="simple-step1">
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material">
                                    <input class="form-control" required type="text" id="simple-firstname" name="donor_name" placeholder="Please enter your full name">
                                    <label for="simple-firstname">Your name</label>
                                </div>
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material">
                            <select required class="form-control" id="contact2-subject" name="donor_gender" size="1">
                            <option value = "Male">Male</option>
                                <option value = "Female">Female</option></select>
                                    <label for="simple-email">Your gender</label>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                             <div class="form-material">
                                     <input class="form-control"  required type="text" id="simple-city" name="donor_city" placeholder="Enter your city">
                                    <label for="simple-city">City Where your live</label>
                                    <div class="help-block text-right"></div>
                                  
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <!-- END Step 1 -->

                   

                    <!-- Step 3 -->
                    <div class="tab-pane fade push-30-t push-50 " id="simple-step3">
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material">
                                    <input class="form-control"  required type="number" id="simple-city" name="donor_tel" placeholder="Enter your phone number">
                                    <label for="simple-city">Telephone Number</label>
                                    <div class="help-block text-right">EG: 60127899080(include 6)</div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                             <div class="form-material">
                                     
                                              
                                    <input type="file" id="example-file-input" name="ImageFile">
                                          
                                 <label for="simple-city">Your Profile picture</label>
                                    <div class="help-block text-right"></div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Step 3 -->
                </div>
                <!-- END Steps Content -->

                <!-- Steps Navigation -->
                <div class="block-content block-content-mini block-content-full border-t">
                    <div class="row">
                        <div class="col-xs-6">
                            <p> </p>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button class="wizard-next btn btn-success disabled" type="button" style="display: none;">Next <i class="fa fa-arrow-circle-o-right"></i></button>
                            <button href="javascript:;"  class="wizard-finish btn btn-primary" name="SubmitButton" type="submit" style="display: inline-block;"><i class="fa fa-check-circle-o" value="Upload"></i> Submit</button>
                        </div>
                    </div>
                </div>
                <!-- END Steps Navigation -->
            </form>
            <!-- END Form -->
        </div>
        <!-- END Simple Wizard -->
    </div>
</div>
<!-- END Page Content -->
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);

</script>

<?php require '../inc/views/base_footer.php'; ?>
<?php require '../inc/views/template_footer_start.php'; ?>
<?php require '../inc/views/template_footer_end.php'; ?>