
<?php session_start();?>
<?php require '../inc/config_dashboard_donors.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/slick/slick.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/slick/slick-theme.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/magnific-popup/magnific-popup.min.css">

<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>


 <?php   

$donor=$_SESSION['user'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ummah";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//$orgnick= $_SESSION['userName'];

$sql="SELECT * FROM donor_info WHERE userID='$donor'";


$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

$count=mysqli_num_rows($result);


$_SESSION ['donor_tel']= $row['donor_tel'];
$_SESSION ['donor_name']= $row['donor_name'];
$donorname= $_SESSION ['donor_name'];
$donor_tel = $_SESSION['donor_tel'];
//$_SESSION['orgID']=$row['org_proid'];

//echo $_SESSION['orgID'];

echo $_SESSION['userName'];
?>
<!-- Page Header -->
<!-- FAQ -->
<div class="content content-boxed">
    <div class="row font-s13">
        <div class="col-lg-12">
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-question"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title"></h3>
                </div>
                <div class="block-content block-content-full text-center">
                    <h3 class="font-w300 text-black push-30-t push-30">Already sign for volunteer service? If not, Click <a href="base_forms_vol_set.php">here</a></h3>
                </div>
                
            </div>
            
        </div>
        
       
         <div class="col-lg-4">
          <div class="block block-themed">
                                <div class="block-header bg-flat">
                                    <ul class="block-options">
                                        
                                    </ul>
                                    <h3 class="block-title">Love Organization</h3>
                                </div>
                                <div class="block-content">
                                    <p>not Much</p>
                                </div>
                            </div>
            
        </div>
        <div class="col-lg-8">
        
      <div class="block block-themed">
                                <div class="block-header bg-modern">
                                    <ul class="block-options">
                                   
                                    </ul>
                                    <h3 class="block-title">News and Annoucement</h3>
                                </div>
                                <div class="block-content">
                                    <p>Not Much</p>
                                </div>
                            </div>
        
        </div>
    </div>
</div>
<!-- END FAQ -->
<!-- END Page Header -->

<!-- Stats -->

<!-- END Stats -->

<!-- Page Content -->
<div class="content content-boxed">

</div>
<!-- END Page Content -->

<?php require '../inc/views/base_footer.php'; ?>
<?php require '../inc/views/template_footer_start.php'; ?>
<!-- Page Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/slick/slick.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/magnific-popup/magnific-popup.min.js"></script>

<!-- Page JS Code -->
<script>
    jQuery(function() {
        // Init page helpers (Slick Slider + Magnific Popup plugins)
        App.initHelpers(['slick', 'magnific-popup']);
    });

</script>


<?php require '../inc/views/template_footer_end.php'; ?>
