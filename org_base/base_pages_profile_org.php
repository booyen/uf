<?php require '../inc/config_dashboard_org_prof.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end_frontend.php'; ?>
<?php require '../inc/views/base_head.php'; ?>

<!-- Page Content -->

<?php

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
?>



<?php


    if (isset($_GET['Uasd4453279M896bhNJndasdsM8222najGyhkbnA0092jNMqweuiHqweqweashhdj']))
    {
        $orgnick = $_GET['Uasd4453279M896bhNJndasdsM8222najGyhkbnA0092jNMqweuiHqweqweashhdj'];
        $sql = "SELECT org_profile.org_proid, org_profile.org_fullname, org_profile.org_username, 
        org_profile.org_description, org_profile.org_address,org_profile.org_avatar,org_profile.org_city,org_profile.org_contacperson,
        org_profile.org_postcode, org_profile.org_state,org_profile.org_tel, org_profile.org_year,org_profile.org_type, avg(um_rating.rating) AS rating 
        FROM org_profile LEFT JOIN um_rating ON org_profile.org_proid = um_rating.org_proid 
        WHERE org_profile.org_proid = {$orgnick}";

  

        
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            
            if($row = $result->fetch_assoc()) {
             //   echo '<h1>'.$row["org_fullname"]."'s Profile</h1>";
             //   echo '<table>';
             //   echo '<tr><td>ID:</td><td>'.$row["userID"].'</td></tr>';
             //   echo '<tr><td>Avatar:</td><td><img src="'.$row["UserEmail"].'" width="100px" /></td></tr>';
             //   echo '<tr><td>Firstname:</td><td>'.$row["firstname"].'</td></tr>';
              //  echo '<tr><td>Lastname:</td><td>'.$row["lastname"].'</td></tr>';
              //  echo '<tr><td>Country:</td><td>'.$row["country"].'</td></tr>';
  
                $avatarorg= $row['org_avatar'];
               
                $_SESSION['orgID']=$row['org_proid'];
                $org_prof = $_SESSION['orgID'];
                echo $org_prof;
                $_SESSION['orgRate'] = $row['rating'];
                $org_rate = $_SESSION['orgRate'] ;
                echo $org_rate;
                $donorID = $_SESSION['userName'];
                $_SESSION['org_name'] = $row['org_fullname'];
                $org_name = $_SESSION['org_name'];
                $_SESSION['city'] = $row['org_city'];
                $org_city = $_SESSION['city'];
            
             
               
                
                
                $sql22 = "SELECT * FROM veri_request WHERE org_proid='$org_prof'";
                $sql1 = "SELECT * FROM senangpay_data WHERE org_proid='$org_prof'";
                $sqlx = "SELECT * FROM org_social WHERE org_proid='$org_prof'";
                $sqlc = "SELECT * FROM campaign_info WHERE org_proid='$org_prof'";
                
                
                $result2 = $conn->query($sql1);
                $resultx = $conn->query($sqlx);
                $result22 = $conn->query($sql22);
                $resultc = $conn->query($sqlc);
                
                $row1 = mysqli_fetch_assoc($result2);
                $row1x = mysqli_fetch_assoc($resultx);
                $row122 = mysqli_fetch_assoc($result22);
                $rowc = mysqli_fetch_assoc($resultc);
                
                   // echo $row1x['facebook_url'];
                   // echo $rowc['camp_img'];
                
                if (!$resultc) {
                    ///disable senagpay gate
                    die('Invalid query: ' . mysql_error());
                }else{
                    
                 $_SESSION['senangmerchantid']= $row1['merchant_id'];
                 $_SESSION['senangsecret']= $row1['secret_key'];
                 $senangmerchant= $_SESSION['senangmerchantid'];
                 $senangsecret= $_SESSION['senangsecret'];
                
                }
?>
<?php 
               //echo $senangmerchant;
               //echo $org_prof;
//echo "donate with senangpay here <a href=' http://localhost/uf/uf/senangpay_openapi_samplecode/senangpay_openapi_samplecode.php'>aa</a>";
// echo $rowc['camp_img'];
               
?>

<?php
  
    if ($row122 > 0) {
        
        
                 $status = "Not Verified";
                 if($row122['veri_status']== $status){
                 $veripro = "In Process";   
                     $regnum = "In Process to verification";
                         ?>
                 
                <style type="text/css">#donateBlock{
                display:none;
                }</style>
                
                <?php     
                        
                    }
        
                else{
                    $veripro = "Verified"; 
                    $regnum = $row122["org_regnum"];
                  
                     
                    
                    if($row1 > 0){
                        
                        $gateway_status = "0";
                        if($row1['gateway_status']== $gateway_status){
                        
                                   ?>
                 
                <style type="text/css">#senangblock{
                display:none;
                }</style>

                <?php
                            
                            
                        }
                        
                        
                    }else{
                        
                        
                        
                    }
                }
                // $fvisit = mysql_fetch_array($result3);
               
            
                echo $status; }else{
                    
                $veripro = "Not Verified";
                 $regnum = "This organization is not Verify";
                ?>
                 
                <style type="text/css">#donateBlock{
                display:none;
                }</style>
            
                <?php 
                }
                

       
   

?>



        



<div class="content content-boxed">
    <!-- User Header -->
    <div class="block">
        <!-- Basic Info -->
        <div class="bg-image" style="background-image: url('<?php echo $one->assets_folder; ?>/img/photos/photo6@2x.jpg');">
            <div class="block-content bg-primary-dark-op text-center overflow-hidden">
                <div class="push-30-t push animated fadeInDown">
                  <img  class="img-avatar"    src="../userfiles/avatars/<?php echo $avatarorg; ?>">
                </div>
                <div class="push-30 animated fadeInUp">
                    <h2 class="h4 font-w600 text-white push-5"><?php  echo $row["org_fullname"] ?></h2>
                    <h3 class="h5 text-gray"><?php  echo $row["org_type"] ?></h3>
                </div>
            </div>
        </div>
        <!-- END Basic Info -->

        <!-- Stats -->
        <div class="block-content text-center">
            <div class="row items-push text-uppercase">
              
                <div class="col-xs-6 col-sm-4">
                    <div class="font-w700 text-gray-darker animated fadeIn">Location</div>
                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)"><?php echo $org_city;?></a>
                </div>


            
           
                <div class="col-xs-6 col-sm-4">
                    <div class="font-w700 text-gray-darker animated fadeIn">Rate This Organization</div>
                    <a class="h4 font-w300 text-primary animated flipInX" href="javascript:void(0)">
                    <div class="article-rating">Rating:  <?php echo round($org_rate) ?>/5  </div> 
                    <a class="h6 font-w300 text-gray-darker animated flipInX" href="javascript:void(0)">Choose Your NUmber to rate </br> </a>
                    <?php foreach(range(1, 5) as $rating): ?>
  				</a>	 <a href="rate.php?orgid=<?php echo  $orgnick; ?>&rating=<?php echo $rating; ?>"><?php echo $rating; ?>
  				<?php endforeach; ?>
                   
         </a>
                   
                </div>
              <div class="col-xs-6 col-sm-4">
                    <div class="font-w700 text-gray-darker animated fadeIn">Verfication</div>
                                                           
                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)" data-toggle="popover" title="" data-placement="left" data-content="UmmahFund Verification is process where Organization existence is verified through several process. Look more on FAQ"><?php echo $veripro;?></a>
                </div>
            </div>
        </div>
        <!-- END Stats -->
    </div>
    <!-- END User Header -->
   
    <!-- Main Content -->
    <div class="row">
        <div class="col-sm-6 col-sm-push-7 col-lg-4 col-lg-push-8">
            <!-- Follow -->
            <div class="block" id="donateBlock">
            <a class="block block-rounded block-link-hover3 text-center"  href="#" data-toggle="modal" data-target="#modal-normal">
                                <div class="block-content block-content-full bg-success">
                                    <div class="h1 font-w700 text-white">Donate Now</div>
                                    <div class="h5 text-white-op  push-5-t">to this organization</div>
                                </div>
                                <div class="block-content block-content-full block-content-mini">
                                 
                                    <span >Click to choose your donation method</span>
                                </div>
                            </a>
            </div>
      
                    <div class="">
             
                                    
                                    <button   onclick="window.open('<?php echo $row1x["facebook_url"];?>') "class="btn btn-block btn-primary push-10" type="button" ><i class="fa fa-facebook pull-left"  ></i> Organization Facebook</button>
                                    <button onclick="window.open('<?php echo $row1x["youtube_url"];?>') "class="btn btn-block btn-danger push-10" type="button"><i class="fa fa-youtube pull-left"></i> Organization Youtube</button>
                                    <button onclick="window.open('<?php echo $row1x["twitter_url"];?>') "class="btn btn-block btn-info push-10" type="button"><i class="fa fa-twitter pull-left"></i> Follow our Twitter</button>
                            
            </div>
            <!-- END Follow -->

         
       <div class="block block-opt-refresh-icon6">
                <div class="block-header">
                    <ul class="block-options">
                      
                    </ul>
                    <h3 class="block-title"><i class="si si-home"></i> Fundrasing & campaign</h3>
                </div>
               
                  
                    
                    <div class="">
                        <?php
                        if ($rowc > 0) {
                            
                            
                            
                            ?>
                            <!-- Article -->
                            <div class="block  text-center">
                          
                               <?php $campid = $rowc['campaignID'];
                                 $link = "I would to know more" ;   ?>
                                
                                <img class="img-responsive " src="../userfiles/campaignbanner/<?php echo $rowc['camp_img'];?>" alt="">
                                <div class="block-content block-content-full">
                                    <h2 class="h4 push-10"><?php echo $rowc['camp_title'];?></h2>
                                    <p class="text-gray-dark"><?php echo $rowc['camp_desc'];?></p>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#modal-camp" type="button">Know More</button>
                                </div>
                                
                                
                            </div>
                            <!-- END Article -->
                            <?php 
                        }else{
                            ?>
                        <div class="block-content block-content-full">
                        <p class="text-gray-dark text-center ">This Organization doesn`t have campaign</p>
                             </div>
                        <?php
                            
                            
                        }
                        
                        ?>
                        </div>
                        
                       
                   
                  

        

     
                </div>
           
        </div>
        <div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">
            <!-- Timeline -->
            <div class="block block-opt-refresh-icon6">
                <div class="block-header">
                    <ul class="block-options">
                      
                    </ul>
                    <h3 class="block-title"><i class="si si-list"></i> Organization details</h3>
                </div>
                <div class="block-content">
         

                    
                  <div class="table-responsive push-50">
                                <table class="table table-bordered table-hover">
                                   
                                    <tbody>
                                        <tr>
                                            
                                            <td>
                                                <p class="font-w600 push-10">Organization Name</p>
                                                <div class="text-muted">   <?php  echo $org_prof; echo  $_SESSION['senangmerchantid'];?> <?php  echo $row["org_fullname"] ?></div>
                                                
                                            </td>
                                           
                                            <td class="text-left">
                                            <p class="font-w600 push-10">Location</p>
                                                <div class="text-muted"><?php  echo $row["org_city"] ?> <?php  echo $row["org_state"] ?></div>
                                            </td>
                                         
                                        </tr>
                                        <tr>
                                            
                                            <td>
                                                <p class="font-w600 push-10">Address</p>
                                                <div class="text-muted"><?php  echo $row["org_address"] ?></div>
                                            </td>
                                           
                                            <td class="text-left">
                                            <p class="font-w600 push-10">Contact Person</p>
                                                <div class="text-muted"><?php  echo $row["org_contacperson"] ?></div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                           
                                            <td class="text-left">
                                                <p class="font-w600 push-10">Phone Number </p>
                                                <div class="text-muted">+<?php  echo $row["org_tel"] ?></div>
                                            </td>
                                          
                                            <td class="text-left">
                                            <p class="font-w600 push-10">Type</p>
                                                <div class="text-muted"><?php  echo $row["org_type"] ?></div>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                           
                                            <td class="text-left">
                                                <p class="font-w600 push-10">Established year </p>
                                                <div class="text-muted"><?php  echo $row["org_year"] ?></div>
                                            </td>
                                          
                                            <td class="text-left">
                                            <p class="font-w600 push-10">Registration Number</p>
                                                <div class="text-muted"><?php echo $regnum; ?>
                                                    
                                                    <?php //sila select dari database verify, jika null ckap xverify lgi.
                                              //  $query = mysql_query("SELECT * FROM tablex");
//
                                              //  if ($result = mysql_fetch_array($query)){
//
                                                   // if ($result['column'] == NULL) { print "<input type='checkbox' />"; }
                                                   // else { print "<input type='checkbox' checked />"; }
                                             //   }
                                                ?>
                                                
                                                </div>
                                            </td>
                                           
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>


                <!-- About -->
            <div class="block">
                <div class="block-content">
                    <p><?php  echo $row["org_fullname"] ?></p>
                    <p><?php  echo $row["org_description"] ?></p>
                 
                </div>
            </div>
            <!-- END About -->

     
                </div>
            </div>
            <!-- END Timeline -->
                 <!-- Timeline -->
           
            </div>
            <!-- END Timeline -->
        </div>
    </div>
    
    <div class="modal" id="modal-normal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Donation Method & gateway</h3>
                        </div>
                        <div class="block-content">
                            <div class="text-center">
                            Please choose you method of donation <br>
                          
                            </div>
                            <!-- senangpay-->
                            <div class="" id="senangblock">
                           <a class="block block-rounded block-link-hover3" href="http://localhost/uf/uf/senangpay_openapi_samplecode/senangpay_Gateway.php" id="senangstatus">
                                <div class="block-content block-content-full clearfix">
                                    <div class="pull-right">
                                        <img class="img" style="height:60px;width:120px;"src="../assets/img/photos/senanypay.png" alt="">
                                    </div>
                                    <div class="pull-left push-10-t">
                                        <div class="font-w600 push-5">SenangPay</div>
                                        <div class="text-muted">Donate Using Online Bank Transfer,Credit and debit card
                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <!-- paypal

                            paypal removed beccause of senaypay alredy committed-->
                         
                            <!-- bank transfer modal-->
                            <a class="block block-rounded block-link-hover3"  href="#" data-toggle="modal" data-target="#modal-manualbank" data-dismiss="modal">
                                <div class="block-content block-content-full clearfix">
                                    <div class="pull-right">
                                        <img class="img" style="height:60px;width:120px;" src="../assets/img/photos/bank-logo.jpg" alt="">
                                    </div>
                                    <div class="pull-left push-10-t">
                                        <div class="font-w600 push-5">Manual Bank transfer</div>
                                        <div class="text-muted">Account number Information</div>
                                    </div>
                                </div>
                            </a>
                            
                            
                             <div class="text-center">
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal" id="modal-camp" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Campaign details</h3>
                        </div>
                        <div class="block-content">
                      <img class="img-responsive " src="../userfiles/campaignbanner/<?php echo $rowc['camp_img'];?>" alt="">
                                <div class="block-content block-content-full">
                                    <h2 class="h4 push-10"><?php echo $rowc['camp_title'];?></h2> 
                                    <p class="text-gray-dark"><?php echo $rowc['camp_desc'];?></p>
                                   
                                </div>
                            <div class="table-responsive push-50">
                                   <table class="table table-bordered table-hover">
                                   
                                    <tbody>
                                        <tr>
                                            
                                            <td>
                                                <p class="font-w600 push-10">Campaign Name</p>
                                                <div class="text-muted"><?php  echo $rowc['camp_title']; ?></div>
                                            </td>
                                           
                                            <td class="text-left">
                                            <p class="font-w600 push-10">Location</p>
                                                <div class="text-muted"><?php  echo $rowc["camp_location"] ?> <?php  echo $row["org_state"] ?></div>
                                            </td>
                                         
                                        </tr>
                                        <tr>
                                            
                                            <td>
                                                <p class="font-w600 push-10">Categories</p>
                                                <div class="text-muted"><?php  echo $rowc["camp_categories"] ?></div>
                                            </td>
                                           
                                            <td class="text-left">
                                            <p class="font-w600 push-10">Funds required</p>
                                                <div class="text-muted">RM<?php  echo $rowc["camp_limit"] ?>
                                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-normal" data-dismiss="modal" > Donate Now</button>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                           
                                          
                                          
                                            <td class="text-left">
                                            <p class="font-w600 push-10">Start Date</p>
                                                <div class="text-muted text-success"><?php  echo $rowc["camp_startdate"] ?></div>
                                            </td>
                                             <td class="text-left">
                                                <p class="font-w600 push-10">End date </p>
                                                <div class="text-muted text-danger"><?php  echo $rowc["camp_endate"] ?></div>
                                            </td>
                                           
                                        </tr>
                                       
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                       
                        <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- END Main Content -->
    <?php
              }
          //  echo '</table>';
        }
        else {
           echo '
            <div class="text-center" style="padding-top:100px;">
                            No such Organization is existed. Search again <a href="#">here</a> <br>
                          
                            </div>'
           
           ;
        }
    }
    else {

        
            
       
    }
    
   // include_once("includes/menu.php");
?>
        
        
 
            <div class="modal" id="modal-manualbank"  tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Manual Bank Transfer</h3>
                        </div>
                        
                        <div class="block-content">
                            <div class="text-center">
                            Organization Bank Details <br>
                          
                            </div>
 <?php


// Create connection

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT bank_1,account_1,receipent_1,bank_2,account_2,receipent_2 FROM payment_gateway WHERE org_proid='$org_prof'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      //  echo "id: " . $row["bank_1"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
 ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            
                                            <th style="width: 20%;">Bank Name</th>
                                            <th>Receipent Name</th>
                                            <th style="width: 30%;">Bank Acc No.</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            
                                            <td class="font-w600"><?php echo $row["bank_1"]?></td>
                                            <td><?php  echo $row["receipent_1"]?></td>
                                            <td><?php  echo $row["account_1"]?></td>
                                        
                                        </tr>
                                        <tr>
                                            
                                           <td class="font-w600"><?php echo $row["bank_2"]?></td>
                                            <td><?php  echo $row["receipent_2"]?></td>
                                            <td><?php  echo $row["account_2"]?></td>
                                           
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            
                            
                        </div>
                            <?php 
   }
} else {
    echo "<div class='text-center'>No Account available</div>";
}

mysqli_close($conn);
?>  
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
                        $(document).ready(function () {
                            $("#demo1 .stars").click(function () {
                           
                                $.post('rating.php',{rate:$(this).val()},function(d){
                                    if(d>0)
                                    {
                                        alert('You already rated This organization');
                                    }else{
                                        alert('Thanks For Rating');
                                    }
                                });
                                $(this).attr("checked");
                            });
                        });
                    </script>

<!-- END Page Content -->

<?php require '../inc/views/frontend_footer.php'; ?>
<?php require '../inc/views/template_footer_start.php'; ?>
<?php require '../inc/views/template_footer_end.php'; ?>