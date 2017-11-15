<?php require '../inc/config_dashboard_org.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/select2/select2.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/select2/select2-bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/dropzonejs/dropzone.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">

<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>




<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
         
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Dashboard</li>
                <li><a class="link-effect" href="">Run A campaign</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">


<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "ummah";
    $prefix = "";
    $database=mysqli_connect($hostname,$user,$password,$database);
?>

<?php

       
        ini_set("display_errors",1);
        if(isset($_POST['SubmitButton'])){
         $org_ID = $_SESSION['orgID']; 
        $orgnick= $_SESSION['userName'];
        $userID = $_SESSION['user'];
        $camp_title = $_POST['camp_title']; 
        $camp_desc = $_POST['camp_desc']; 
        $camp_limit = $_POST['camp_limit']; 
        $camp_startdate = $_POST['camp_startdate'];
        $camp_endate = $_POST['camp_endate'];
      //  $camp_contact = $_POST['camp_contact'];    
       // $camp_status = $_POST['camp_status'];
        $camp_location = $_POST['camp_location'];
       // $camp_img = $_POST['camp_img'];
        $camp_categories = $_POST['camp_categories'];    
            
       // session_start();
        $Destination = '../userfiles/campaignbanner';
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
     
        
       // $sql3="UPDATE um_users SET firstLogin='$firstlogin' WHERE userID = '$userID'";
        
        
        
       // $user_username=$_SESSION['userName'];
        
        $sql4="INSERT INTO campaign_info (org_proid,camp_title, camp_desc, camp_limit,
        camp_startdate,camp_endate,camp_location,camp_img,camp_categories)
        
        VALUES
        
        ( '$org_ID','$camp_title', '$camp_desc', '$camp_limit', '$camp_startdate', '$camp_endate', '$camp_location','$NewImageName','$camp_categories')";
            
            
            
        $result = mysqli_query($database,"SELECT * FROM um_users WHERE userID = '$userID'");
        
        
        
        if( mysqli_num_rows($result) > 0) {
            mysqli_query($database,$sql4)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        }
        else{
            mysqli_query($database,$sql4)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        }  
    }    
?>


<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
    <div class="col-lg-12">
        <!-- Simple Wizard (.js-wizard-simple class is initialized in js/pages/base_forms_wizard.js) -->
        <!-- For more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/ -->
        <div class="js-wizard-simple block">
            <!-- Step Tabs -->
            <ul class="nav nav-tabs nav-tabs-alt nav-justified">
                <li class="active">
                    <a href="#simple-step1" data-toggle="tab" aria-expanded="true">Start a campaign Forms</a>
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
                                    <input class="form-control" required type="text" id="simple-firstname" name="camp_title" placeholder="Please enter Campaign name">
                                    <label for="simple-firstname">Campaign name</label>
                                </div>
                            </div>
                        </div>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-2">
                                                <div class="form-material">
                                                    <select class="form-control" id="material-select" name="camp_categories" size="1">
                                                        <option>...</option>
                                                        <option value="1">Volunteer</option>
                                                        <option value="2">Logistic</option>
                                                        <option value="3">Emergency Relief</option>
                                                    </select>
                                                    <label for="material-select">Type of campaign</label>
                                                </div>
                                        
                                            </div>
                                    
                                
                            
                        </div>
                        <div class="form-group">
                        
                                           
                                            <div class="col-md-8 col-sm-offset-2">
                                                <div class="input-daterange input-group" data-date-format="dd-mm-yyyy">
                                                    <input class="form-control" type="text" id="example-daterange1" name="camp_startdate" placeholder="From">
                                                    <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                                    <input class="form-control" type="text" id="example-daterange2" name="camp_endate" placeholder="To">
                                                </div>
                                                <div class="help-block text-right">Choose campaign start date and end date</div>
                                            </div>
                           
                                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material">
                                    <input class="form-control" required type="text" id="simple-firstname" name="camp_limit" placeholder="Please enter Campaign name">
                                    <label for="simple-firstname">Amount of funds required (RM)</label>
                                </div>
                                <div class="help-block text-right">Enter Funds Amount required!. Else Leave blank</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material">
                                    <input class="form-control" required type="text" id="simple-firstname" name="camp_location" placeholder="Please enter Campaign name">
                                    <label for="simple-firstname">Venue of Event</label>
                                </div>
                            </div>
                        </div>
                            
            
                            
                            
                            
                        <div class="form-group">
                            
                                <div class="form-material">
                                    <div class="col-xs-8 col-sm-offset-2">
                                                <div class="form-material">
                                                    <textarea class="form-control" id="material-textarea-large" name="camp_desc" rows="2" placeholder="Add your campaign description to attract donors"></textarea>
                                                    <label for="material-textarea-large">Campaign Description</label>
                                                </div>
                                         <div class="help-block text-right">Enter Your campaign description,Contact person and what your campaign goals</div>
                                            </div>
                                  
                                </div>
                            
                        </div>
                         <div class="form-group">
                            
                                <div class="form-material">
                                    <div class="col-xs-8 col-sm-offset-2">
                                                <div class="form-material">
                                                  <input type="file" id="example-file-input" name="ImageFile">

                                                    <label for="material-textarea-large">Campaign Banner</label>
                                                </div>
                                        <div class="help-block text-right">Upload your campaign banner if have any</div>
                                            </div>
                                  
                                </div>
                            
                        </div>
                    </div>
                    <!-- END Step 1 -->

                 

                    
                </div>
                <!-- END Steps Content -->

                <!-- Steps Navigation -->
                <div class="block-content block-content-mini block-content-full border-t">
                    <div class="row">
                        <div class="col-xs-6">
                            <p>If you already update, details will appears automatically </p>
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
 
    
   
    
    
</div>
<?php require '../inc/views/base_footer.php'; ?>
<?php require '../inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/dropzonejs/dropzone.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_forms_pickers_more.js"></script>
<script>
    jQuery(function(){
        // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
        App.initHelpers(['datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);
    });
</script>

<?php require '../inc/views/template_footer_end.php'; ?>