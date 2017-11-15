<?php require '../inc/config_dashboard_org.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>



<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "ummah";
    $prefix = "";
    $database=mysqli_connect($hostname,$user,$password,$database);
?>
<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-8">
           
        </div>
        <div class="col-sm-4 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>dashboard</li>
                <li><a class="link-effect" href="">verification</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->
<?php

// echo $_SESSION['userName'];
//echo $_SESSION['orgID'];
        ini_set("display_errors",1);
        if(isset($_POST['SubmitButton'])){
        
        $orgnick= $_SESSION['userName'];
        $userID = $_SESSION['user'];
        $org_ID = $_SESSION['orgID']; 
        $org_regnum = $_POST['org_regnum']; 
      
      
       // session_start();
        $Destination = '../userfiles/doc';
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
     
      
        
    
            
      //  $sql1="UPDATE um_users SET firstLogin='$firstlogin' WHERE userID = '$userID'";
        
        
        
       // $orgID=$_SESSION['orgID'];
       
        $sql="INSERT INTO veri_request (org_proid, doc_link, org_regnum) VALUES ('$org_ID', '$NewImageName', '$org_regnum')";
            
        //$sql3=" INSERT INTO avatar_user (userName,user_avatar) VALUES ('$orgnick','$NewImageName')";
            
      //  mysqli_query($database,$sql1)or die(mysqli_error($database));
       // mysqli_query($database,$sql2)or die(mysqli_error($database));
        //mysqli_query($database,$sql3)or die(mysqli_error($database));
      
        
           $result = mysqli_query($database,"SELECT * FROM org_profile WHERE org_proid = '$org_ID'");
       if( mysqli_num_rows($result) > 0) {
           
            mysqli_query($database,$sql)or die(mysqli_error($database));
  
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        }
        else{
          
            mysqli_query($database,$sql)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        } 
    }    
?>
<!-- Page Content -->
<div class="content content-narrow">
  
    <!-- Wizards with Validation -->
   
    <div class="row">
       
        <div class="col-lg-12">
            <!-- Validation Wizard (.js-wizard-validation class is initialized in js/pages/base_forms_wizard.js) -->
            <!-- For more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/ -->
            <div class="js-wizard-validation block">
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-alt nav-justified">
                    <li class="active">
                        <a class="inactive" href="#validation-step1" data-toggle="tab">Organization Verification</a>
                    </li>
                    <li>
                        <a class="inactive" href="#validation-step2" data-toggle="tab">Documentation</a>
                    </li>
                   
                    <li>
                        <a class="inactive" href="#validation-step3" data-toggle="tab">Finish</a>
                    </li>
                </ul>
                <!-- END Step Tabs -->

                <!-- Form -->
                <!-- jQuery Validation (.js-form2 class is initialized in js/pages/base_forms_wizard.js) -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-form2 form-horizontal" action="" method="post" enctype="multipart/form-data" id="UploadForm">
                    <!-- Steps Content -->
                    <div class="block-content tab-content">
                        <!-- Step 1 -->
                        <div class="tab-pane fade fade-right in  active" id="validation-step1">
                            <div class="form-group">
                                  <div class="bg-image" style="background-image: url('../assets/img/photos/photo25.jpg');">
                                <div class="bg-black-op">
                                    <div class="block block-themed block-transparent">
                                        <div class="block-header">
                                            <ul class="block-options">
                                                
                                            </ul>
                                           
                                        </div>
                                        <div class="block-content block-content-full text-right">
                                            <img src="../assets/img/logo/logosmall-1.png"> 
                                             
                                        </div>
                                        <div class="block-content block-content-full text-right text-white">
                                            <span>UmmahFund verification systems</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               <div class="col-lg-12 text-left font-w300">
                                 
                        <h1 class="font-w300">Verification is Important</h1>
                        <p>To be able to use the donation and campaign, organization must verify their exixtence</p>
                                   <h4 >Click next to verify</h4>
                    </div>
                            </div>
                           
                        </div>
                        <!-- END Step 1 -->

                        <!-- Step documentation -->
                        <div class="tab-pane fade fade-right push-30-t push-50" id="validation-step2">
                                       <div class="col-lg-12 text-center font-w300 push-30">
                                 
                        <h1 class="font-w300 text-center">Verification is Important</h1>
                        <p>Organization are required To Provide 3 kind Of documents For the verification Purpose
                            To look More on what your organization to prepare for verification process, Look <a href="#">Here</a>.
                                If problem exists, Please dont heasisate to contact our Customer service <a href="#">Here</a></p>
                                
                    </div>
                           
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material">
                                       
                                        
                                          <input class="form-control" type="file" id="validation-city" name="ImageFile" required>
                                        <label for="validation-city">Organization Registration Certification</label>
                                    </div>
                                    <div class="help-block text-right">Your Organization certificate Copies,scanned </div>
                                </div>
                            </div>
                      
                      
                          <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                             <div class="form-material">
                                     <input class="form-control"  required type="text" id="simple-city" name="org_regnum" placeholder="Enter your Oraganization Certificate registration number">
                                    <label for="simple-city">Registration Number</label>
                                    <div class="help-block text-right"></div>
                                  
                                </div>
                                 <div class="help-block text-right">Your Organization registration number as on Certificate issued by Goverment</div>
                            </div>
                        </div>
                        </div>
                        <!-- END Step documentation -->

                        <!-- Step Terms and disclaimer -->
                        <div class="tab-pane fade fade-right push-30-t push-50" id="validation-step3">
                                             <div class="col-lg-12 text-center font-w300 push-30">
                                 
                        <h1 class="font-w300 text-center">Verification Takes time</h1>
                                                   <h1 class="font-w300 text-center">Up to 7 working days</h1>
                        <p>Our systems is Try to ensure the integrity of its user by examine the to request to open donation.
                            <br>Read more about that 
                            <a href="#">here</a>
                                                 </p>
                                                  <p>Require to read the aggrement & terms Carefully to avoid future distruption . 
                                                 </p>
                                
                    </div>
                                                    
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2 text-center">
                                    <label class="css-input switch switch-sm switch-primary" for="validation-terms">
                                        <input type="checkbox" id="validation-terms" name="validation-terms"><span></span> Agree with the <a data-toggle="modal" data-target="#modal-terms" href="#">terms and Condition (Verfication Process & Dispute)</a>
                                    </label>
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
                                <button class="wizard-prev btn btn-warning" type="button"><i class="fa fa-arrow-circle-o-left"></i> Previous</button>
                            </div>
                            <div class="col-xs-6 text-right">
                                <button class="wizard-next btn btn-success" type="button">Next <i class="fa fa-arrow-circle-o-right"></i></button>
                                <button class="wizard-finish btn btn-primary"  value="Upload"  name="SubmitButton" type="submit"><i class="fa fa-check-circle-o"></i> Submit</button>
                            </div>
                        </div>
                    </div>
                    <!-- END Steps Navigation -->
                </form>
                <!-- END Form -->
            </div>
            <!-- END Validation Wizard Wizard -->
        </div>
    </div>
    <!-- END Wizards with Validation -->
</div>
<!-- END Page Content -->

<?php require '../inc/views/base_footer.php'; ?>

<!-- Terms Modal -->
<div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Terms &amp; Conditions</h3>
                </div>
                <div class="block-content">
                    <?php echo $one->get_text('small', 5); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> I agree</button>
            </div>
        </div>
    </div>
</div>
<!-- END Terms Modal -->

<?php require '../inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_forms_wizard.js"></script>

<?php require '../inc/views/template_footer_end.php'; ?>