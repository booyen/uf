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
                <li><a class="link-effect" href="">change password</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">

    <?php    
if(isset($_POST['SubmitButton'])){ //check if form was submitted
?>
    <div class="alert alert-success text-center" role="alert">

        Your volunteer preferences has been updated successfully!
    </div>


    <?php    

}  
?>


    <!-- Mega Form -->

    <div class="block block-bordered">
        <div class="block-header bg-gray-lighter">
            <ul class="block-options">

            </ul>

        </div>
        <div class="block-content push-100">
            <form class="form-horizontal " action="" method="post">
                <div class="row ">
                    <div class="col-lg-12 text-center font-w300 push-30">
                        <h1 class="font-w300">Change Password</h1>
                        <p>Password should be change to avoid a profile manipulation</p>
                    </div>
                    <div class="col-xs-8 col-md-offset-2 text-center">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <div class="form-material ">
                                    <input class="form-control"  required type="text" id="old-Password" name="old-password" placeholder="Enter your old password">
                                    <label for="contact2-subject">Old Password</label>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <div class="form-material ">
                                   <div class="form-material ">
                                    <input class="form-control"  required type="text" id="old-Password" name="old-password" placeholder="Enter your new password">
                                </div>
                                            <label for="contact2-subject">New Password</label>
                                            <div class="help-block text-right">at least 8 char. </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <div class="form-material ">
                                    
                                </div>
                            </div>




                            <div class="col-xs-6">
                                <div class="form-material ">
                                    
                                </div>
                            </div>


                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <div class="form-material ">
                                    
                                </div>
                            </div>




                            <div class="col-xs-6">
                                <div class="form-material ">
                                    
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="col-lg-12 text-center font-w300">
                       
                        
                    </div>

                  



                    <div class="col-xs-12 text-center">
                        <button href="javascript:;" id="myWish" class="btn btn-success" name="SubmitButton" type="submit"> Submit </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- END Mega Form -->
</div>
<!-- END Page Content -->

<?php require '../inc/views/base_footer.php'; ?>
<?php require '../inc/views/template_footer_start.php'; ?>
<?php require '../inc/views/template_footer_end.php'; ?>