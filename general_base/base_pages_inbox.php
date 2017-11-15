<?php 
session_start();    

$userID = $_SESSION['userid'];
$con= new mysqli('localhost','root','','ummah');



?>
<?php require '../inc/config.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>

<!-- Page Content -->
<div class="content">
    <div class="row">
        <div class="col-sm-5 col-lg-3">

            <!-- Collapsible Inbox Navigation (using Bootstrap collapse functionality) -->
            <button class="btn btn-block btn-primary visible-xs push" data-toggle="collapse" data-target="#inbox-nav" type="button">Navigation</button>
            <div class="collapse navbar-collapse remove-padding" id="inbox-nav">
                <!-- Inbox Menu -->
                <div class="block">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button data-toggle="modal" data-target="#modal-compose" type="button"><i class="fa fa-pencil"></i> New Message</button>
                            </li>
                        </ul>

                        <h3 class="block-title">Inbox</h3>
                    </div>
                    <div class="block-content">
                        <ul class="nav nav-pills nav-stacked push">
                            <li class="active">
                                <a href="base_pages_inbox.php">
                                    <span class="badge pull-right"></span><i class="fa fa-fw fa-inbox push-5-r"></i> Inbox
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- END Inbox Menu -->

                <!-- Friends -->
                <div class="block">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button"><i class="si si-settings"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Friends</h3>
                    </div>
                    <div class="block-content">
                        <ul class="nav-users push">
                            <li>
                                <a href="base_pages_profile.php">
                                    <?php $one->get_avatar('', 'female'); ?>
                                    <i class="fa fa-circle text-success"></i>
                                    <?php $one->get_name('female'); echo "\n"; ?>
                                    <div class="font-w400 text-muted"><small>Web Designer</small></div>
                                </a>
                            </li>
                            <li>
                                <a href="base_pages_profile.php">
                                    <?php $one->get_avatar('', 'male'); ?>
                                    <i class="fa fa-circle text-success"></i>
                                    <?php $one->get_name('male'); echo "\n"; ?>
                                    <div class="font-w400 text-muted"><small>Graphic Designer</small></div>
                                </a>
                            </li>
                            <li>
                                <a href="base_pages_profile.php">
                                    <?php $one->get_avatar('', 'female'); ?>
                                    <i class="fa fa-circle text-warning"></i>
                                    <?php $one->get_name('female'); echo "\n"; ?>
                                    <div class="font-w400 text-muted"><small>Photographer</small></div>
                                </a>
                            </li>
                            <li>
                                <a href="base_pages_profile.php">
                                    <?php $one->get_avatar('', 'male'); ?>
                                    <i class="fa fa-circle text-warning"></i>
                                    <?php $one->get_name('male'); echo "\n"; ?>
                                    <div class="font-w400 text-muted"><small>Copywriter</small></div>
                                </a>
                            </li>
                            <li>
                                <a href="base_pages_profile.php">
                                    <?php $one->get_avatar('', 'male'); ?>
                                    <i class="fa fa-circle text-danger"></i>
                                    <?php $one->get_name('male'); echo "\n"; ?>
                                    <div class="font-w400 text-muted"><small>UI Designer</small></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END Friends -->

                <!-- Account -->
                <div class="block">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button"><i class="si si-settings"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Account</h3>
                    </div>
                    <div class="block-content text-center">
                        <!-- Easy Pie Chart (.js-pie-chart class is initialized in App() -> uiHelperEasyPieChart()) -->
                        <!-- For more info and examples you can check out http://rendro.github.io/easy-pie-chart/ -->
                        <div class="js-pie-chart pie-chart push" data-percent="35" data-line-width="3" data-size="100" data-bar-color="#abe37d" data-track-color="#eeeeee" data-scale-color="#dddddd">
                            <span>
                                <?php $one->get_avatar(); ?>
                            </span>
                        </div>
                        <a class="block block-bordered block-link-hover3" href="javascript:void(0)">
                            <table class="block-table text-center">
                                <tbody>
                                    <tr>
                                        <td class="border-r" style="width: 50%;">
                                            <div class="push-30 push-30-t">
                                                <i class="si si-like fa-3x"></i>
                                            </div>
                                        </td>
                                        <td style="width: 50%;">
                                            <div class="h2 font-w700"><span class="h2 text-muted">+</span> 2.5TB</div>
                                            <div class="h5 text-muted text-uppercase push-5-t">Upgrade Now</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </a>
                    </div>
                </div>
                <!-- END Account -->
            </div>
            <!-- END Collapsible Inbox Navigation -->
        </div>
        <div class="col-sm-7 col-lg-9">
            <!-- Message List -->
            <div class="block">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                        <li>
                            <button class="js-tooltip" title="Previous 15 Messages" type="button" data-toggle="block-option"><i class="si si-arrow-left"></i></button>
                        </li>
                        <li>
                            <button class="js-tooltip" title="Next 15 Messages" type="button" data-toggle="block-option"><i class="si si-arrow-right"></i></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                        </li>
                    </ul>
                    <div class="block-title text-normal">
                        <strong>15-30</strong> <span class="font-w400">from</span> <strong>700</strong>
                    </div>
                </div>
                <div class="block-content">
                    <!-- Messages Options -->
                    <div class="push">
                        <button class="btn btn-default pull-right" type="button"><i class="fa fa-times text-danger push-5-l push-5-r"></i> <span class="hidden-xs">Delete</span></button>
                        <div class="btn-group">
                            <button class="btn btn-default" type="button"><i class="fa fa-archive text-primary push-5-l push-5-r"></i> <span class="hidden-xs">Archive</span></button>
                            <button class="btn btn-default" type="button"><i class="fa fa-star text-warning push-5-l push-5-r"></i> <span class="hidden-xs">Star</span></button>
                        </div>
                    </div>
                    <!-- END Messages Options -->

                    <!-- Messages & Checkable Table (.js-table-checkable class is initialized in App() -> uiHelperTableToolsCheckable()) -->
                    <div class="pull-r-l">
                        <table class="js-table-checkable table table-hover table-vcenter">
                            <tbody>
                                <?php
                                
           
			$user = $_SESSION['userName'];
			$qu = mysqli_query($con, "SELECT * FROM `messages` WHERE `receiver`='$user'");
			if (mysqli_num_rows($qu) > 0) {
				while ($row = mysqli_fetch_array($qu)) {
                    
                    ?>


                                    <tr>

                                        <td class="text-center" style="width: 70px;">
                                            <label class="css-input css-checkbox css-checkbox-primary">
                                            <input type="checkbox"><span></span>
                                        </label>
                                        </td>
                                        <td class="hidden-xs font-w600" style="width: 140px;">
                                            <?php echo $row["sender"] ?>
                                        </td>
                                        <td>
                                            <a class="font-w600" data-toggle="modal" data-target="#modal-message" href="#" data-id="<?php echo $row['id']; ?>" id="getUser">
                                                <?php echo $row["subject"] ?>
                                            </a>
                                            <div class="text-muted push-5-t"></div>
                                        </td>
                                        <td class="visible-lg text-muted" style="width: 80px;">
                                            <i class="fa fa-paperclip"> 
                                    </td>
                                    <td class="visible-lg text-muted" style="width: 120px;">
                                        <em>2 min ago</em>
                                    </td>
                                </tr>
            <?php                 
                        		}
			}
		?>     
                            </tbody>
                        </table>
                    </div>
                    <!-- END Messages -->
                </div>
            </div>
            <!-- END Message List -->
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require '../inc/views/base_footer.php'; ?>

<!-- Compose Modal -->
<div class="modal fade" id="modal-compose" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-success">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                            </li>
                                            </ul>
                                            <h3 class="block-title"><i class="fa fa-pencil"></i> New Message</h3>
                    </div>
                    <div class="block-content">
                        <form class="form-horizontal push-10-t push-10" action="base_pages_inbox.php" method="post" onsubmit="return false;">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating input-group">
                                        <input class="form-control" type="email" id="message-email" name="message-email">
                                        <label for="message-email">Receiver name</label>
                                        <span class="input-group-addon"><i class="si si-envelope-open"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating input-group">
                                        <input class="form-control" type="text" id="message-subject" name="message-subject">
                                        <label for="message-subject">Subject</label>
                                        <span class="input-group-addon"><i class="si si-book-open"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating">
                                        <textarea class="form-control" id="message-msg" name="message-msg" rows="6"></textarea>
                                        <label for="message-msg">Message</label>
                                    </div>
                                    <div class="help-block text-right">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-send push-5-r"></i> Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Compose Modal -->

<!-- Composereply Modal -->
<div class="modal fade" id="modal-composereply" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-success">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                            </li>
                                            </ul>
                                            <h3 class="block-title"><i class="fa fa-pencil"></i> New Message</h3>
                    </div>
                    <div class="block-content">
                        <form class="form-horizontal push-10-t push-10" action="base_pages_inbox.php" method="post" onsubmit="return false;">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating input-group">
                                        <input class="form-control" type="email" id="message-email" name="message-email">
                                        <label for="message-email">Receiver name</label>
                                        <span class="input-group-addon"><i class="si si-envelope-open"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating input-group">
                                        <input class="form-control" type="text" id="message-subject" name="message-subject">
                                        <label for="message-subject">Subject</label>
                                        <span class="input-group-addon"><i class="si si-book-open"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating">
                                        <textarea class="form-control" id="message-msg" name="message-msg" rows="6"></textarea>
                                        <label for="message-msg">Message</label>
                                    </div>
                                    <div class="help-block text-right">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-send push-5-r"></i> Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Composereply Modal -->
    <!-- Message Modal -->
    <div class="modal fade" id="modal-message" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout">


            <div class="modal-content">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-toggle="modal" data-target="#modal-composereply" data-dismiss="modal" data-placement="left" title="Reply" type="button"><i class="si si-action-undo"></i></button>
                            </li>
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>


                        <h3 class="block-title"></h3>
                    </div>
                    <div class="block-content block-content-full bg-image text-center" style="background-image: url('<?php echo $one->assets_folder; ?>/img/photos/photo7.jpg');">

                    </div>
                    <div class="block-content block-content-full block-content-mini bg-gray-lighter">
                        <span class="font-s13 text-muted pull-right"><em>2 min ago</em></span>

                    </div>
                    <div class="block-content  push ">
                        <!-- content will be load here -->
                        <div id="dynamic-content">


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- END Message Modal -->

    <?php require '../inc/views/template_footer_start.php'; ?>

    <!-- Page JS Plugins -->
    <script src="<?php echo $one->assets_folder; ?>/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>

    <!-- Page JS Code -->
    <script>
        jQuery(function() {
            // Init page helpers (Table Tools helper + Easy Pie Chart plugin)
            App.initHelpers(['table-tools', 'easy-pie-chart']);
        });
    </script>

    <?php require '../inc/views/template_footer_end.php'; ?>
    <script>
        $(document).ready(function() {

            $(document).on('click', '#getUser', function(e) {

                e.preventDefault();

                var uid = $(this).data('id'); // it will get id of clicked row

                $('#dynamic-content').html(''); // leave it blank before ajax call
                $('#modal-loader').show(); // load ajax loader

                $.ajax({
                        url: 'getuser.php',
                        type: 'POST',
                        data: 'id=' + uid,
                        dataType: 'html'
                    })
                    .done(function(data) {
                        console.log(data);
                        $('#dynamic-content').html('');
                        $('#dynamic-content').html(data); // load response 
                        $('#modal-loader').hide(); // hide ajax loader	
                    })
                    .fail(function() {
                        $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                        $('#modal-loader').hide();
                    });

            });

        });
    </script>