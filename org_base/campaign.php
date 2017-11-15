<?php session_start();?> 
<?php require '../inc/config.php'; require '../inc/frontend_config.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>


<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/magnific-popup/magnific-popup.min.css">

<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_header_dashboard_frontend.php'; ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ummah";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<?php


    if (isset($_GET['XxDerRRfdfds']))
    {
        $campid = $_GET['XxDerRRfdfds'];
        $sql = "SELECT * FROM campaign_info WHERE campaignID='$campid'";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            
            if($row = $result->fetch_assoc()) {
             //   echo '<h1>'.$row["org_fullname"]."'s Profile</h1>";
             //   echo '<table>';
             //   echo '<tr><td>ID:</td><td>'.$row["userID"].'</td></tr>';
             //   echo '<tr><td>Avatar:</td><td><img src="'.$row["UserEmail"].'" width="100px" /></td></tr>';
             //   echo '<tr><td>Firstname:</td><td>'.$row["firstname"].'</td></tr>';
              //  echo '<tr><td>Lastname:</td><td>'.$row["lastname"].'</td></tr>';
              //  echo '<tr><td>Country:</td><td>'.$row["country"].'</td></tr>';
  
              //  $avatarorg= $row['org_avatar'];
            //    $_SESSION['orgID']=$row['org_proid'];
             //   $org_prof = $_SESSION['orgID'];
             //   $_SESSION['org_name'] = $row['org_fullname'];
            //    $org_name = $_SESSION['org_name'];
             //   $_SESSION['city'] = $row['org_city'];
             //   $org_city = $_SESSION['city'];
                
               
                
                
              //  $sql22 = "SELECT * FROM veri_request WHERE org_proid='$org_prof'";
             //   $sql1 = "SELECT * FROM senangpay_data WHERE org_proid='$org_prof'";
              //  $sqlx = "SELECT * FROM org_social WHERE org_proid='$org_prof'";
                
             //   $result2 = $conn->query($sql1);
              //  $resultx = $conn->query($sqlx);
              //  $result22 = $conn->query($sql22);
                
               // $row = mysqli_fetch_assoc($result);
              //  $row1x = mysqli_fetch_assoc($resultx);
              //  $row122 = mysqli_fetch_assoc($result22);
                
                  //  echo $row['camp_desc'];
               
              //  if (!$result) {
                    ///disable senagpay gate
                //    die('Invalid query: ' . mysql_error());
               // }else{
                    
              //   $_SESSION['senangmerchantid']= $row1['merchant_id'];
                // $_SESSION['senangsecret']= $row1['secret_key'];
                 //$senangmerchant= $_SESSION['senangmerchantid'];
                // $senangsecret= $_SESSION['senangsecret'];
        
?>

<!-- Hero Content -->
<div class="bg-image" style="background-image: url('../userfiles/campaignbanner/<?php echo $row['camp_img'];?>');">
    <div class="bg-primary-op">
        <section class="content content-full content-boxed overflow-hidden">
            <!-- Section Content -->
            <div class="push-150-t push-150 text-center">
                <h1 class="text-white push-10 visibility-hidden" data-toggle="appear" data-class="animated fadeInDown"><?php echo $row['camp_title'];?></h1>
                <h2 class="h5 text-white-op visibility-hidden" data-toggle="appear" data-class="animated fadeInDown"><?php echo $row['camp_desc'];?></h2>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
</div>
<!-- END Hero Content -->

<!-- Story Content -->
<div class="bg-white ">
    <section class="content content-boxed ">
        <!-- Section Content -->
       
     <div class="table-responsive push-50 ">
                                <table class="table table-bordered table-hover">
                                   
                                    <tbody>
                                        <tr>
                                            
                                            <td>
                                                <p class="font-w600 push-10">Start Date</p>
                                                <div class="text-muted"><?php echo $row['camp_startdate'];?></div>
                                            </td>
                                           
                                            <td class="text-left">
                                            <p class="font-w600 push-10">End date</p>
                                                <div class="text-muted"><?php echo $row['camp_endate'];?></div>
                                            </td>
                                         
                                        </tr>
                                        
                                       <tr>
                                            
                                            <td>
                                                <p class="font-w600 push-10">Categories</p>
                                                <div class="text-muted"><?php echo $row['camp_categories'];?></div>
                                            </td>
                                           
                                            <td class="text-left">
                                            <p class="font-w600 push-10">Rasing To </p>
                                                <div class="text-muted">RM<?php echo $row['camp_limit'];?></div>
                                            </td>
                                         
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

    </section>
</div>
<!-- END Story Content -->


        <?php
              }
          //  echo '</table>';
        }
        else {
           echo '
            <div class="text-center" style="padding-top:100px;">
                            No such Organization is existed. Search again <a href="#">here</a> <br>
                          
                            </div>'
           
           ;
        }
    }
    else {

        
            
       
    }
    
   // include_once("includes/menu.php");
?>
    <!-- END Section Content -->

<!-- END More Stories -->

<?php require '../inc/views/frontend_footer.php'; ?>
<?php require '../inc/views/template_footer_start.php'; ?>

<!-- Page JS Code -->
<script>
    jQuery(function() {
        // Init page helpers (Appear + CountTo plugins)
        App.initHelpers(['appear', 'appear-countTo']);
    });
</script>

<?php require '../inc/views/template_footer_end.php'; ?>
<?php require '../inc/views/template_footer_end.php'; ?>