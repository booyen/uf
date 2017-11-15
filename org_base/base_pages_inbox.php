  
   <style type="text/css">
.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	border-radius: 8px;
	font-size: 12px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 396px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 12px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
</style>
    <!-- END Stylesheets -->
<?php 
session_start();    

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ummah";
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>

<?php require '../inc/config_dashboard_org.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>

 <?php    
if(isset($_POST['SubmitMessage'])){ //check if form was submitted
 


if(isset($_POST['SubmitMessage'])){ //check if form was submitted

$receiver = $_POST['typeahead'];
$sender = $_SESSION['userName'];
$subject = $_POST['subject'];
$message = $_POST['message'];
// Create connection

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO messages (receiver,sender,subject,message) VALUES ('$receiver', '$sender', '$subject', '$message');";



if (mysqli_multi_query($conn, $sql)) {
    ?>

       <div class="alert alert-success text-center" role="alert">

         Your Message send successfully!
    </div>
<?php
  
    
  // echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




    

} 
    
    } 

?>
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

            </div>
            <!-- END Collapsible Inbox Navigation -->
        </div>
        <div class="col-sm-7 col-lg-9">
            <!-- Message List -->
            <div class="block">
  
                <div class="block-content">
                    <!-- Messages Options -->
               
                    <!-- END Messages Options -->

                    <!-- Messages & Checkable Table (.js-table-checkable class is initialized in App() -> uiHelperTableToolsCheckable()) -->
                    <div class="pull-r-l">
                        <table class="js-table-checkable table table-hover table-vcenter">
                            <tbody>
                                <?php
                                
           
			$usereceive = $_SESSION['userName'];
                    
			$qu = mysqli_query($conn, "SELECT * FROM messages WHERE receiver='$usereceive'");
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
                                            <?php echo $row["sender"]
                                                   ?>
                                        </td>
                                        <td>
                                            <a class="font-w600" data-toggle="modal" data-target="#modal-message" href="#" data-id="<?php echo $row['id']; ?>" id="getUser">
                                                <?php echo $row["subject"]  ?>
                                            </a>
                                            <div class="text-muted push-5-t"></div>
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
                        <form class="form-horizontal push-10-t push-10" action="" method="post" onsubmit="return true;">
                            
                            <div class="form-group">
                                
                                <div class="col-xs-12">
                                    <div class=" form-material input-group">
                                         <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Send Message to?">
  
                                        <label for="message-email">Receiver name</label>
                                        <span class="input-group-addon"><i class="si si-envelope-open"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating input-group">
                                        <input class="form-control" type="text" id="message-subject" name="subject">
                                        <label for="message-subject">Subject</label>
                                        <span class="input-group-addon"><i class="si si-book-open"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating">
                                        <textarea class="form-control" id="message-msg" name="message" rows="6"></textarea>
                                        <label for="message-msg">Message</label>
                                    </div>
                                    <div class="help-block text-right">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-sm btn-success" value="Submit" name="SubmitMessage"type="submit"><i class="fa fa-send push-5-r"></i> Send Message</button>
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
                        <form class="form-horizontal push-10-t push-10" action="" method="post" onsubmit="return false;">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating input-group">
                                        <input class="form-control" type="text" id="messagel" name="receiver">
                                        <label for="message-email">Receiver name</label>
                                        <span class="input-group-addon"><i class="si si-envelope-open"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating input-group">
                                        <input class="form-control" type="text" id="message-subject" name="subject">
                                        <label for="message-subject">Subject</label>
                                        <span class="input-group-addon"><i class="si si-book-open"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating">
                                        <textarea class="form-control" id="message-msg" name="message" rows="6"></textarea>
                                        <label for="message-msg">Message</label>
                                    </div>
                                    <div class="help-block text-right">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-sm btn-success"  name="SubmitMessage"type="submit"><i class="fa fa-send push-5-r"></i> Send Message</button>
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
    <script src="../search/typeahead.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!-- Page JS Code -->


    <script>
        jQuery(function() {
            // Init page helpers (Table Tools helper + Easy Pie Chart plugin)
            App.initHelpers(['table-tools', 'easy-pie-chart']);
        });
    </script>

    <?php require '../inc/views/template_footer_end.php'; ?>
   <script>
$(document).ready(function(){
	
	$(document).on('click', '#getUser', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: 'getuser.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
		
	});
	
});

</script>
  <script src="../search/typeahead.min.js"></script>
   <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'.../search/search.php?key=%QUERY',
        limit : 10
    });
});
    </script>