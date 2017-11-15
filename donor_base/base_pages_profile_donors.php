<?php require '../inc/config_dashboard_donors.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/slick/slick.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/slick/slick-theme.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/magnific-popup/magnific-popup.min.css">

<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>

<!-- Page Header -->
<!-- FAQ -->
<div class="content content-boxed">
    <div class="row font-s13">
        <div class="col-lg-9">
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
        
        <div class="col-lg-3">
                            <a class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-success">
                                    <div class="h1 font-w700 text-white">$0</div>
                                    <div class="h5 text-white-op text-uppercase push-5-t">donation given this month</div>
                                </div>
                                <div class="block-content block-content-full block-content-mini">
                                    <i class=" text-danger"></i> Donate now
                                </div>
                            </a>
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
