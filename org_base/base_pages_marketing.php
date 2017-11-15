<?php require '../inc/config_dashboard_org.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>

<?php
   // session_start();
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
            <ol class="breadcrumb push-10-t">
                <li>dashboard</li>
                <li><a class="link-effect" href="">marketing</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->
<?php

 //echo $_SESSION['userName'];
        ini_set("display_errors",1);
        if(isset($_POST['SubmitButton'])){
        
        $orgnick= $_SESSION['userName'];
        $userID = $_SESSION['user'];
        $org_ID = $_SESSION['orgID']; 
        $facebook_url = $_POST['org_facebook']; 
        $youtube_url = $_POST['org_youtube'];
        $twitter_url = $_POST['org_twitter'];
        $facebook_pixel = $_POST['facebook_pixel'];
        

         
      
    
    
        $sql3=" INSERT INTO org_social (facebook_url,youtube_url,twitter_url,facebook_pixel,org_proid) 
        
        VALUES ('$facebook_url','$youtube_url','$twitter_url','$facebook_pixel','$org_ID')";
       
      
        $result = mysqli_query($database,"SELECT * FROM org_profile WHERE org_proID = '$org_ID'");
        
        if( mysqli_num_rows($result) > 0) {
            mysqli_query($database,$sql3)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        }
        else{
            mysqli_query($database,$sql)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        } 
    }    
?>
<!-- Page Content -->
<div class="content">

   <div class="row">
        <div class="block">
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            
                                        </li>
                                    </ul>
                                    <h3 class="block-title">Social Media Link & Marketing form</h3>
                                </div>
                                <div class="block-content block-content-narrow">
                                    <form action="" method="post" >
                                        <div class="form-group">
                                            <label for="example-nf-email">Facebook Page Link</label>
                                            <input class="form-control" type="text" id="example-nf-email" name="org_facebook" placeholder="Enter your organization facebook link">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-password">Youtube Channel Link</label>
                                            <input class="form-control" type="text" id="example-nf-password" name="org_youtube" placeholder="Enter your organization Youtube link">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-password">Twitter Link</label>
                                            <input class="form-control" type="text" id="example-nf-password" name="org_twitter" placeholder="Enter your organization twitter link">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-password">Facebook Pixel Code</label>
                                            <input class="form-control" type="text" id="example-nf-password" name="facebook_pixel" placeholder="Enter facebook pixel">
                                            <p class="text-right"><a href="#">Cick here to know more about facebook pixel</a></p>
                                        </div>
                                        <div class="form-group text-right">
                                            <button class="btn btn-sm btn-primary" type="submit" name="SubmitButton">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
</div>
<!-- END Page Content -->

<?php require '../inc/views/base_footer.php'; ?>
<?php require '../inc/views/template_footer_start.php'; ?>
<?php require '../inc/views/template_footer_end.php'; ?>