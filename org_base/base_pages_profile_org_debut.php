
<?php session_start();?>

<?php require '../inc/config_dashboard_org.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>

 <?php   

 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ummah";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$orgnick= $_SESSION['userName'];

$sql="SELECT * FROM org_profile WHERE org_username='$orgnick'";


$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

$count=mysqli_num_rows($result);


$avatar= $row['org_avatar'];
$_SESSION['orgID']=$row['org_proid'];

//echo $_SESSION['orgID'];
?>


<!-- Page Header -->
<div class="content bg-image" style="background-image: url('<?php echo $one->assets_folder; ?>/img/photos/photo333@2x.jpg');">
    <div class="push-50-t push-15 clearfix">
        <div class="push-15-r pull-left animated fadeIn">
            <img class="img-avatar "src="../userfiles/avatars/<?php echo $avatar; ?>">
        </div>
        <h1 class="h2 text-white push-5-t animated zoomIn">UmmahFund Charity</h1>
        <h2 class="h5 text-white-op animated zoomIn">Orphanage,Animal shelter</h2>
    </div>
</div>
<!-- END Page Header -->



<!-- Page Content -->
<div class="content content-boxed">
    <div class="row">
        <div class="col-sm-7 col-lg-12">
            <!-- Timeline -->
            <div class="block">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title"><i class="fa fa-newspaper-o"></i> Developer words</h3>
                </div>
                <div class="block-content">
                    <ul class="list list-timeline pull-t">
                   
                </div>
            </div>
            <!-- END Timeline -->
        </div>
        <div class="col-sm-5 col-lg-4">
          

      

          
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require '../inc/views/base_footer.php'; ?>
<?php require '../inc/views/template_footer_start.php'; ?>
<?php require '../inc/views/template_footer_end.php'; ?>