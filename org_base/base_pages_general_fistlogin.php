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

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
           
        </div>
        <div class="col-sm-5 text-right hidden-xs">
          
        </div>
    </div>
</div>
<!-- END Page Header -->
<!-- END Page Header -->
<?php

 echo $_SESSION['userName'];
        ini_set("display_errors",1);
        if(isset($_POST['SubmitButton'])){
        
        $orgnick= $_SESSION['userName'];
        $userID = $_SESSION['user'];
        $org_name = $_POST['org_fullname']; 
        $org_desc = $_POST['org_description']; 
        $org_contact = $_POST['org_contact'];
        $org_year = $_POST['org_year'];
        $org_address = $_POST['org_address']; 
        $org_city = $_POST['org_city']; 
        $org_postcode = $_POST['org_postcode']; 
        $org_state = $_POST['org_state']; 
        $org_tel = $_POST['org_tel'];
        $org_type =  $_POST['org_type'];
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
        
        $sql2="INSERT INTO org_profile (userID, org_fullname, org_username, org_description,org_contacperson,org_year,org_postcode,org_address,org_city,org_state,org_tel,org_type,org_avatar) VALUES ('$userID', '$org_name', '$orgnick','$org_desc', '$org_contact', '$org_year', '$org_postcode', '$org_address', '$org_city', '$org_state',  '$org_tel','$org_type','$NewImageName')";
            
        $sql3=" INSERT INTO avatar_user (userID,user_avatar) VALUES ('$userID','$NewImageName')";
            
        mysqli_query($database,$sql1)or die(mysqli_error($database));
        mysqli_query($database,$sql2)or die(mysqli_error($database));
        mysqli_query($database,$sql3)or die(mysqli_error($database));
        
             $url='../org_base/base_pages_profile_org_debut.php';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
            
        // header("location:../org_base/base_pages_profile_org_debut.php");
    /*    if( mysqli_num_rows() > 0) {
           mysqli_query($database,$sql3)or die(mysqli_error($database));
           
        }
        else{
        //    mysqli_query($database,$sql)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        }  */
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
                    <a href="#simple-step1" data-toggle="tab" aria-expanded="true">Organizational information</a>
                </li>
                <li class="">
                    <a href="#simple-step2" data-toggle="tab" aria-expanded="false">Address details</a>
                </li>
                <li class="">
                    <a href="#simple-step3" data-toggle="tab" aria-expanded="false">Misc & contact</a>
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
                                    <input class="form-control" required type="text" id="simple-firstname" name="org_fullname" placeholder="Please enter your Organization name">
                                    <label for="simple-firstname">Organization Name</label>
                                </div>
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material">
                                    <input class="form-control"  required type="text" id="simple-email" name="org_description" placeholder="Please enter your organization short description">
                                    <label for="simple-email">Organization description</label>
                                </div>
                            </div>
                        </div>
                     
                         <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material">
                                    <input class="form-control"  required type="text" id="simple-email" name="org_type" placeholder="Please enter your organization type">
                                    <label for="simple-email">Organization Type</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Step 1 -->

                    <!-- Step 2 -->
                    <div class="tab-pane fade push-30-t push-50" id="simple-step2">
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material">
                                    <input class="form-control" required type="text" id="simple-firstname" name="org_address" placeholder="Please enter your Organization address">
                                    <label for="simple-firstname">Address</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <div class="form-material">
                                    <input class="form-control" required type="text" id="simple-firstname" name="org_city" placeholder="Please enter your city">
                                    <label for="simple-firstname">City</label>
                                </div>
                            </div>




                            <div class="col-sm-4">
                                <div class="form-material">
                                    <input class="form-control"  required type="text" id="simple-firstname" name="org_postcode" placeholder="Please enter your postcode">
                                    <label for="simple-firstname">Postcode</label>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material ">
                                    <?php
                               // include ("connect.php");

                                $db = new mysqli("localhost", "root", "", "ummah");
                                ?>

                                        <select required class="form-control" id="contact2-subject" name="org_state" size="1">
                                <option value = "">Please select</option>
                                <?php
                                $stmt = $db->prepare("SELECT idgeo_location,country FROM mygeo_location");
                                $stmt->execute();
                                $stmt->bind_result($id,$name);
                              
                                while ($stmt->fetch()){
                                    echo "<option value='$id'>$name</option>";
                                }
                                $stmt->close();
                                ?>
                                </select>
                                        <label for="contact2-subject">Choose a state</label>
                                        <div class="help-block text-right">Choose a state where your organization is based </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END Step 2 -->

                    <!-- Step 3 -->
                    <div class="tab-pane fade push-30-t push-50 " id="simple-step3">
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material">
                                    <input class="form-control"  required type="number" id="simple-city" name="org_tel" placeholder="Enter your phone number">
                                    <label for="simple-city">Telephone Number</label>
                                    <div class="help-block text-right">EG: 60127899080(include 6)</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material">
                                     <input class="form-control"  required type="text" id="simple-city" name="org_contact" placeholder="Enter your phone number">
                                    <label for="simple-city">Contact person name</label>
                                    <div class="help-block text-right"></div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                             <div class="form-material">
                                     <input class="form-control"  required type="number" id="simple-city" name="org_year" placeholder="Enter your phone number">
                                    <label for="simple-city">Established year</label>
                                    <div class="help-block text-right"></div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                             <div class="form-material">
                                     
                                              
                                                <input type="file" id="example-file-input" name="ImageFile">
                                          
                                 <label for="simple-city">Oraganization logo/avatar</label>
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