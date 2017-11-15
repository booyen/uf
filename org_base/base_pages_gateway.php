<?php require '../inc/config_dashboard_org.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_head.php'; ?>

<?php
   // session_start();
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "ummah";
    $prefix = "";
    $database=mysqli_connect($hostname,$user,$password,$database);
?>
<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>dashboard</li>
                <li><a class="link-effect" href="">gateway Settings</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->
<?php

 //echo $_SESSION['userName'];
        ini_set("display_errors",1);
        if(isset($_POST['SubmitButton'])){
        
        $orgnick= $_SESSION['userName'];
        $userID = $_SESSION['user'];
        $org_ID = $_SESSION['orgID']; 
      //  $senangpay_gate = $_POST['senang_gate']; 
       // $paypal_gate = $_POST['paypal_gate'];
            
        $bankname1 = $_POST['bankname1'];
        $bankacc1 = $_POST['bankacc1'];
            
            
        $bankname2 = $_POST['bankname2'];
        $bankacc2 = $_POST['bankacc2'];
            
            
        $receipent1 = $_POST['receipent1'];
        $receipent2 = $_POST['receipent2'];
         
      
    
    
        $sql3=" INSERT INTO payment_gateway (org_proid,bank_1,account_1,receipent_1,bank_2,account_2,receipent_2) 
        
        VALUES ('$org_ID','$bankname1','$bankacc1','$receipent1','$bankname2','$bankacc2','$receipent2')";
       
        $result = mysqli_query($database,"SELECT * FROM org_profile WHERE org_proID = '$org_ID'");
        
        if( mysqli_num_rows($result) > 0) {
            mysqli_query($database,$sql3)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        }
        else{
            mysqli_query($database,$sql)or die(mysqli_error($database));
           // header("location:../update-bio-after-registration.php?user_username=$org_username&current_user=$org_username");
        } 
    }    
?>


<?php

$org_ID = $_SESSION['orgID']; 
 if(isset($_POST['SubmitButtonsenang'])){

$merchantid = $_POST['merchant_id'];
$secretkey = $_POST['secretkey'];
//$orgID = $_POST['org_id'];


$sql = "INSERT INTO senangpay_data (org_proid,merchant_id, secret_key, gateway_status)
VALUES ('$org_ID','$merchantid', '$secretkey', '1')";

if ($conn->query($sql) === TRUE) {
  //  echo "New record created successfully";
} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
<!-- Page Content -->
<div class="content">

   <div class="row">
        <div class="block">
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            
                                        </li>
                                    </ul>
                                    <h3 class="block-title">Manual bank Settings</h3>
                                </div>
                                <div class="block-content block-content-narrow">
                                    <form action="" method="post" >
                                        
                                        <div class="form-group">
                                            <label for="example-nf-password">Bank Account #1</label>
                                            <input  style="margin-top:8px" class="form-control" type="text" id="example-nf-password" name="bankname1" placeholder="Enter  Bank Name">
                                            
                                            <input  style="margin-top:8px"  class="form-control" type="text" id="example-nf-password" name="bankacc1" placeholder="Enter your organization bank account number">
                                            
                                             <input style="margin-top:8px"  class="form-control" type="text" id="example-nf-password" name="receipent1" placeholder="Enter your Receipent/organization name as Bank Stated">
                                        </div>
                                         <div class="form-group">
                                            <label for="example-nf-password">Bank Account #2</label>
                                            <input style="margin-top:8px"  class="form-control" type="text" id="example-nf-password" name="bankname2" placeholder="Enter  Bank Name">
                                             
                                            <input style="margin-top:8px"  class="form-control" type="text" id="example-nf-password" name="bankacc2" placeholder="Enter your organization bank account number">
                                             
                                            <input style="margin-top:8px"  class="form-control" type="text" id="example-nf-password" name="receipent2" placeholder="Enter your Receipent/organization name as Bank Stated">

                                        </div>
                                      
                                        <div class="form-group text-right">
                                            <button class="btn btn-sm btn-primary" type="submit" name="SubmitButton">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
    
    <div class="row">
        <div class="block">
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            
                                        </li>
                                    </ul>
                                    <h3 class="block-title">SenangPay Gateway Settings</h3>
                                </div>
                                <div class="block-content block-content-narrow">
                                    <form action="" method="post" >
                                        
                                        <div class="form-group">
                                            <label for="example-nf-password">Senang Pay integration</label>
                                            <input  style="margin-top:8px" class="form-control" type="text" id="example-nf-password" name="merchant_id" placeholder="Enter  Merchant id">
                                            
                                            <input  style="margin-top:8px"  class="form-control" type="text" id="example-nf-password" name="secretkey" placeholder="Enter your secret key">
                                            
                                           
                                        </div>
                                        
                                      
                                        <div class="form-group text-right">
                                            <button class="btn btn-sm btn-primary" type="submit" name="SubmitButtonsenang">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
</div>
<!-- END Page Content -->

<?php require '../inc/views/base_footer.php'; ?>
<?php require '../inc/views/template_footer_start.php'; ?>
<?php require '../inc/views/template_footer_end.php'; ?>