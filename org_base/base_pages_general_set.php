<?php session_start()?>
<?php require '../inc/config_dashboard_org.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">

        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>dashboard</li>
                <li><a class="link-effect" href="">General settings</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->
<!-- END Page Header -->
<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "ummah";
    $prefix = "";
    $database=mysqli_connect($hostname,$user,$password,$database);
?>

    <?php

 //echo $_SESSION['userName'];
        ini_set("display_errors",1);
        if(isset($_POST['SubmitButton'])){
        
        $orgnick= $_SESSION['userName'];
        $userID = $_SESSION['userid'];
        $org_ID = $_SESSION['orgID'];    
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

     
        
            
        $sql1="UPDATE org_profile SET org_fullname='$org_name',org_description='$org_desc',org_contacperson='$org_contact',org_year='$org_year',org_postcode='$org_postcode',org_city='$org_city',org_state='$org_state',org_tel='$org_tel',org_type='$org_type',org_avatar='$NewImageName'
        WHERE org_proid = '$org_ID'";

            $sql2=" UPDATE avatar_user SET user_avatar='$NewImageName' WHERE UserName = '$orgnick'";
            mysqli_query($database,$sql2)or die(mysqli_error($database));
            
            
            $result = mysqli_query($database,"SELECT * FROM um_users WHERE userName = '$orgnick'");
             
        if( mysqli_num_rows($result) > 0) {
            mysqli_query($database,$sql1)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        }
        else{
            mysqli_query($database,$sql1)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        } 
    }    
?>

        
        <!-- Page Content -->
        <div class="content">
            <?php


$con= new mysqli('localhost','root','','ummah');

    
    
$org_ID = $_SESSION['orgID']; 
 
$sql44="SELECT * FROM org_profile WHERE org_proID='$org_ID'";
    
    
$result=mysqli_query($con,$sql44);


    
while($row = mysqli_fetch_array($result))
{
    ?>
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
                                                <input class="form-control" required type="text" id="simple-firstname" name="org_fullname" placeholder="Please enter your Organization name" value="<?php echo $row['org_fullname'];?>">
                                                <label for="simple-firstname">Organization Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-material">
                                                <input class="form-control" required type="text" id="simple-email" name="org_description" placeholder="Please enter your organization short description" value="<?php echo $row['org_description'];?>">
                                                <label for="simple-email">Organization description</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-material">
                                                <input class="form-control" required type="text" id="simple-email" name="org_type" placeholder="Please enter your organization type" value="<?php echo $row['org_type'];?>">
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
                                                <input class="form-control" required type="text" id="simple-firstname" name="org_address" placeholder="Please enter your Organization address" value="<?php echo $row['org_address'];?>">
                                                <label for="simple-firstname">Address</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-4 col-sm-offset-2">
                                            <div class="form-material">
                                                <input class="form-control" required type="text" id="simple-firstname" name="org_city" placeholder="Please enter your city" value="<?php echo $row['org_city'];?>">
                                                <label for="simple-firstname">City</label>
                                            </div>
                                        </div>




                                        <div class="col-sm-4">
                                            <div class="form-material">
                                                <input class="form-control" required type="text" id="simple-firstname" name="org_postcode" placeholder="Please enter your postcode" value="<?php echo $row['org_postcode'];?>">
                                                <label for="simple-firstname">Postcode</label>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                           <div class="form-material">
                                                <input class="form-control" required type="text" id="simple-firstname" name="org_state" placeholder="Please enter your postcode" value="<?php echo $row['org_state'];?>">
                                                <label for="simple-firstname">State</label>
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
                                                <input class="form-control" required type="number" id="simple-city" name="org_tel" placeholder="Enter your phone number" value="<?php echo $row['org_tel'];?>">
                                                <label for="simple-city">Telephone Number</label>
                                                <div class="help-block text-right">EG: 60127899080(include 6)</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-material">
                                                <input class="form-control" required type="text" id="simple-city" name="org_contact" placeholder="Enter your organization contact person" value="<?php echo $row['org_contacperson'];?>">
                                                <label for="simple-city">Contact person name</label>
                                                <div class="help-block text-right"></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-material">
                                                <input class="form-control" required type="number" id="simple-city" name="org_year" placeholder="Enter your organization established year " value="<?php echo $row['org_year'];?>">
                                                <label for="simple-city">Established year</label>
                                                <div class="help-block text-right"></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-material">


                                                <input type="file" id="example-file-input" name="ImageFile" >
                                                <img class="img-avatar"src="../userfiles/avatars/<?php echo $row['org_avatar'];?>">
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
                                        <button href="javascript:;" class="wizard-finish btn btn-primary" name="SubmitButton" type="submit" style="display: inline-block;"><i class="fa fa-check-circle-o" value="Upload"></i> Submit</button>
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
        <?php 
}
?>
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