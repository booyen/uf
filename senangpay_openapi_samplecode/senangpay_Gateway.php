<?php require '../inc/config.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>

<?php
session_start();
/**
 * This is a sample code for manual integration with senangPay
 * It is so simple that you can do it in a single file
 * Make sure that in senangPay Dashboard you have key in the return URL referring to this file for example http://myserver.com/senangpay_sample.php
 */
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
//$smerchantid = $_SESSION['senangmerchantid']; 
//$smerchantsecret= $_SESSION['senangsecret'];
$org_name = $_SESSION['org_name'];       
$donoremail = $_SESSION['email'];
$donorname  = $_SESSION['donor_name'];
$donor_tel = $_SESSION['donor_tel'];
$orgID = $_SESSION['orgID'];
$donor=$_SESSION['user'];

$urlsuccess = 'success.php';;
$urlerror = 'error.php';;
$urlfail = 'fail.php';
if($donorname==NULL){
     header("Location: $urlerror");  
}


# please fill in the required info as below
$merchant_id = $_SESSION['senangmerchantid']; 
$secretkey = $_SESSION['senangsecret'];


# this part is to process data from the form that user key in, make sure that all of the info is passed so that we can process the payment
if(isset($_POST['detail']) && isset($_POST['amount']) && isset($_POST['order_id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']))
{
    
    $amount = $_POST['amount'];
    $_SESSION['donateid'] = $_POST['order_id'];
    $donatelog = $_SESSION['donateid'];
    $sql = "INSERT INTO donate_log (org_proid, donor_id,donate_refer, donation_status,amount)
    VALUES ('$orgID','$donor','$donatelog', '0', '$amount')";

if ($conn->query($sql) === TRUE) {
    
   /// echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    # assuming all of the data passed is correct and no validation required. Preferably you will need to validate the data passed
    $hashed_string = md5($secretkey.urldecode($_POST['detail']).urldecode($_POST['amount']).urldecode($_POST['order_id']));
    
    # now we send the data to senangPay by using post method
    ?>
    <html>
   
    <body onload="document.order.submit()">
        <form name="order" method="post" action="https://app.senangpay.my/payment/<?php echo $merchant_id; ?>">
            <input type="hidden" name="detail" value="<?php echo $_POST['detail']; ?>">
            <input type="hidden" name="amount" value="<?php echo $_POST['amount']; ?>">
            <input type="hidden" name="order_id" value="<?php echo $_POST['order_id']; ?>">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
            <input type="hidden" name="phone" value="<?php echo $_POST['phone']; ?>">
            <input type="hidden" name="hash" value="<?php echo $hashed_string; ?>">
        </form>
    </body>
    </html>

    <?php
}
# this part is to process the response received from senangPay, make sure we receive all required info
else if(isset($_GET['status_id']) && isset($_GET['order_id']) && isset($_GET['msg']) && isset($_GET['transaction_id']) && isset($_GET['hash']))
{   
    
    # verify that the data was not tempered, verify the hash
    $hashed_string = md5($secretkey.urldecode($_GET['status_id']).urldecode($_GET['order_id']).urldecode($_GET['transaction_id']).urldecode($_GET['msg']));
    
    # if hash is the same then we know the data is valid
    if($hashed_string == urldecode($_GET['hash']))
    {
        # this is a simple result page showing either the payment was successful or failed. In real life you will need to process the order made by the customer
        if(urldecode($_GET['status_id']) == '1')
              header("Location: $urlsuccess");  
           // echo 'Payment was successful with message: '.urldecode($_GET['msg']);
        else
              header("Location: $urlfail");  
           // echo 'Payment failed with message: '.urldecode($_GET['msg']);
    }
    else
        echo 'Hashed value is not correct';
}
# this part is to show the form where customer can key in their information
else
{
    # by right the detail, amount and order ID must be populated by the system, in this example you can key in the value yourself
?>
    <html>
    <head>
    <title>senangPay Sample Code</title>
    </head>
    <body>
     

    

<div class="content bg-white   overflow-hidden">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <!-- Error Titles -->
         
            <h2 class="h3  text-center font-w300 push-50 animated fadeInUp">Please check and enter the amount you would like to donate</h2>
            <!-- END Error Titles -->
   
           <div class="col-lg-12">
                            <!-- Bootstrap Login -->
                            <div class="block block-themed">
                                <div class="block-header bg-primary">
                                  
                                    <h3 class="block-title">Senangpay Donation </h3>
                                </div>
                                <div class="block-content">
                                    <form class="form-horizontal push-5-t" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >
                                        <div class="form-group">
                                            <label class="col-xs-12" for="username">Username</label>
                                            <div class="col-xs-12">
                                                <input  class="form-control" type="text" name="detail" value="Donation to <?php echo $org_name; ?>" placeholder="Description of the transaction" size="30">
                                             
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-12 " for="donation id">Amount</label>
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" name="amount" value="" placeholder="Amount to Donate, for example RM10.00" size="30"  required>
                                             <div class="help-block text-right">Minimum donation is RM2.00</div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-12" for="donation id">Donation ID</label>
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" name="order_id" value="<?php echo time(); ?>" placeholder="Unique id to reference the transaction or order" size="30">
                                             
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="col-xs-12" for="login1-password">Your Name</label>
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" name="name" value="<?php echo $donorname?>" placeholder="Unique id to reference the transaction or order" size="30">
                                              
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="col-xs-12" for="login1-password">Your Email</label>
                                            <div class="col-xs-12">
                                                                    <input class="form-control" type="text" name="email" value="<?php echo $donoremail ?>" placeholder="Email of the customer" size="30">

                                              
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <label class="col-xs-12" for="login1-password">Your Tel Number</label>
                                            <div class="col-xs-12">
                                                                   <input class="form-control" type="text" name="phone" value="<?php echo $donor_tel ?>" placeholder="Contact number of customer" size="30">

                                              
                                            </div>
                                        </div>
                                    
                                        <div class="form-group text-center push-10">
                                            <div class="col-xs-12">
                                                <button class="btn btn-block btn-success push-10" name="submit"  value="submit" type="submit"></i> Donate</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Bootstrap Login -->
                        </div>
        </div>
    </div>
</div>
<!-- END Error Content -->

<!-- Error Footer -->
<div class="content pulldown text-muted text-center">
    Would you like to let us know about it?<br>
    <a class="link-effect" href="javascript:void(0)">Report it</a> or <a class="link-effect" href="base_pages_dashboard.php">Go Back to Dashboard</a>
</div>
<!-- END Error Footer -->
</body>
    </html>
<?php require '../inc/views/template_footer_start.php'; ?>
<?php require '../inc/views/template_footer_end.php'; ?>
<?php
}
?>