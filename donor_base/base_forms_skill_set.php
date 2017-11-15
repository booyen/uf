<?php session_start();?>

<?php require '../inc/config_dashboard_donors.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/select2/select2.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/select2/select2-bootstrap.min.css">

<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>

<!-- Page Header -->
<link rel="stylesheet" href="../assets/js/core/bootstrap.min.js">
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Skill Set <small></small>
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Donors Dashboard</li>
                <li><a class="link-effect" href="">Skill settings</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">

 <?php    
if(isset($_POST['SubmitButton'])){ //check if form was submitted
 

 



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ummah";



if(isset($_POST['SubmitButton'])){ //check if form was submitted

$skill = $_POST['skill']; 
$userID = $_SESSION['userid'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO skill_log (userID, skill_name) VALUES ('$userID', '$skill');";



if (mysqli_multi_query($conn, $sql)) {
    ?>

       <div class="alert alert-success text-center" role="alert">

         Your volunteer preferences has been updated successfully!
    </div>
<?php
  
    
  // echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


    

} 
    
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
                    <div class="col-lg-12 text-center font-w300">
                        <h1 class="font-w300">Please Select your Job sector or Related Skill</h1>
                        <p>We Just need to know what do for living</p>
                    </div>
                    <div class="col-xs-8 col-lg-offset-4 text-center">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <div class="form-material ">
                                    <?php
                               // include ("connect.php");

                              //  $db = new mysqli("localhost", "root", "", "ummah");
                                ?>

                                        <select required class="form-control" id="contact2-subject" name="skill" size="1">
                                <option value = "">Please select</option>
                                  <option value = "ENG">Engineering</option>
                                <?php
                              //  $stmt = $db->prepare("SELECT idjob_sector,job_name FROM job_sector");
                               // $stmt->execute();
                              //  $stmt->bind_result($id,$name);
                              
                              //  while ($stmt->fetch()){
                              //      echo "<option value='$id'>$name</option>";
                             //   }
                              //  $stmt->close();
                                ?>
                                </select>
                                        <label for="contact2-subject"></label>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <button href="javascript:;" id="myWish" class="btn btn-success" name="SubmitButton" type="submit"> Submit Skill</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- END Mega Form -->
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

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-validation/additional-methods.min.js"></script>

<!-- Page JS Code -->
<script>
    jQuery(function() {
        // Init page helpers (Select2 plugin)
        App.initHelpers('select2');
    });

</script>
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_forms_validation.js"></script>

<?php require '../inc/views/template_footer_end.php'; ?>
