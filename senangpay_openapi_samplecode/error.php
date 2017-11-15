   <?php header('Refresh: 8; URL=../donor_base/base_pages_profile_donors.php'); ?>
<?php require '../inc/config.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>

<!-- Error Content -->
<div class="content bg-white text-center pulldown overflow-hidden">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <!-- Error Titles -->
            <h2 class="h1 font-w300 text-warning animated bounceInDown">Opps.<br></h2>
            <h2 class="h4 font-w300 push-50 animated fadeInUp">We cannot process your donation. <br>
            Please Make sure you are login before donate. Contact our Custemer service id problem persist 
            <br>You now will be directed to dashboard in a few seconds</h2>
            <!-- END Error Titles -->

            <!-- Search Form -->
            <form class="form-horizontal push-50" action="base_pages_search.php" method="post">
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3">
                      
                    </div>
                </div>
            </form>
            <!-- END Search Form -->
        </div>
    </div>
</div>
<!-- END Error Content -->

<!-- Error Footer -->
<div class="content pulldown text-muted text-center">
    Got Problem? Would you like to let us know about it?<br>
    <a class="link-effect" href="javascript:void(0)">Report it</a> or <a class="link-effect" href="../donor_base/base_pages_profile_donors.php">Go Back to Dashboard</a>
</div>
<!-- END Error Footer -->

<?php require '../inc/views/template_footer_start.php'; ?>
<?php require '../inc/views/template_footer_end.php'; ?>