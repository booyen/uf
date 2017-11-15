<?php require '../inc/config.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>

<!-- Maintenance Content -->
<div class="content bg-white text-center  overflow-hidden">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="font-s64 text-gray push-30-t push-50">
                <i class="">Which one are you?</i>
            </div>
            <h1 class="h2 font-w400 push-15 animated fadeInLeftBig">
                
                <button class="btn btn-minw btn-square btn-primary btn btn-lg" type="button ">Donor</button>
                
                <button class="btn btn-minw btn-square btn-success btn btn-lg" type="button">Organization</button></h1>
            
            <h4 class="h6 font-w300 text-dark-op push-50 animated fadeInRightBig">Why i`m seeing this? Click <a href="#">here</a> for more</h4>
        </div>
    </div>
</div>
<!-- END Maintenance Content -->

<!-- Maintenance Footer -->
<div class="pulldown push-10-t text-center animated fadeInUp">
    <small class="text-muted font-w600"><span class="js-year-copy"></span> &copy; <?php echo $one->name . ' ' . $one->version; ?></small>
</div>
<!-- END Maintenance Footer -->

<?php require '../inc/views/template_footer_start.php'; ?>
<?php require '../inc/views/template_footer_end.php'; ?>