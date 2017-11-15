<?php session_start();?>


<?php require '../inc/config_dashboard_donors.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>



<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                 <small></small>
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>donor dashboard</li>
                <li><a class="link-effect" href="">Voluteer settings</a></li>
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

$state = $_POST['state']; 
$userID = $_SESSION['userid'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO volunteer_log (userID, state) VALUES ('$userID', '$state');";



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
                    <div class="col-lg-12 text-center font-w300 push-30">
                        <h1 class="font-w300">Enter your Volunteering preferences</h1>
                        <p>There are so many ways to contribute, you're sure to find the right role.</p>
                    </div>
                    <div class="col-xs-12 col-md-offset-3 text-center">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <div class="form-material ">
                                    <?php
                               // include ("connect.php");

                                $db = new mysqli("localhost", "root", "", "ummah");
                                ?>

                                        <select required class="form-control" id="contact2-subject" name="state" size="1">
                                <option value = "">Please select</option>
                                             <option value = "KL">Kuala Lumpur</option>
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
                                        <div class="help-block text-right">Choose a state where your want to volunteer </div>
                                </div>
                            </div>
                        

                        </div>
                   
                 
                    </div>



                   



                    <div class="col-xs-12 text-center">
                        <button href="javascript:;" id="myWish" class="btn btn-success" name="SubmitButton" type="submit"> Submit</button>
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
<?php require '../inc/views/template_footer_end.php'; ?>
