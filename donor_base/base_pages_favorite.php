<?php require '../inc/config_dashboard_donors.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>

<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/datatables/jquery.dataTables.min.css">
<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Dashboard</li>
                <li><a class="link-effect" href="">Favorite organization</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
   <!-- Dynamic Table Full Pagination -->
  
     
        <div class="block-content">
       <div class="col-sm-6 col-lg-3">
                            <a class="block block-link-hover2" href="javascript:void(0)">
                                <div class="block-content block-content-full text-center bg-image" style="background-image: url('../assets/img/photos/photo16.jpg');">
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="../assets/img/avatars/avatar4.jpg" alt="">
                                </div>
                                <div class="block-content block-content-full text-center">
                                    <div class="font-w600 push-5">Tiffany Kim</div>
                                    <div class="text-muted">Copywriter</div>
                                </div>
                            </a>
                        </div>
        </div>
   
    
    
    
    
  
 
</div>
<!-- END Page Content -->


<?php require '../inc/views/base_footer.php'; ?>
<?php require '../inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/datatables/jquery.dataTables.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_tables_datatables.js"></script>

<?php require '../inc/views/template_footer_end.php'; ?>