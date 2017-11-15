<?php require '../inc/config.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>



<!-- Register Content -->


<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('../profile_module/AdminLTE-master/home.php');
}


if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));
	
	$stmt = $reg_user->runQuery("SELECT * FROM um_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$email,$upass,$code))
		{			
			//email link token
            $id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
            
			//email Html forms for ummah funds(registration verification)
            $message = "<html><head>";
            $message .= "<title></title>";
            $message .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <style type="text/css">
                            /* FONTS */
                            ';
             $message.= "      @media screen {
                                @font-face {
                                  font-family: 'Lato';
                                  font-style: normal;
                                  font-weight: 400;
                                  src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
                                }

                                @font-face {
                                  font-family: 'Lato';
                                  font-style: normal;
                                  font-weight: 700;
                                  src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
                                }

                                @font-face {
                                  font-family: 'Lato';
                                  font-style: italic;
                                  font-weight: 400;
                                  src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
                                }

                                @font-face {
                                  font-family: 'Lato';
                                  font-style: italic;
                                  font-weight: 700;
                                  src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
                                }
                            }

                            /* CLIENT-SPECIFIC STYLES */
                            body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
                            table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
                            img { -ms-interpolation-mode: bicubic; }

                            /* RESET STYLES */
                            img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
                            table { border-collapse: collapse !important; }
                            body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

                            /* iOS BLUE LINKS */
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }

                            /* MOBILE STYLES */
                            @media screen and (max-width:600px){
                                h1 {
                                    font-size: 32px !important;
                                    line-height: 32px !important;
                                }
                            }

                            /* ANDROID CENTER FIX */
                            ";
                       $message .= 'div[style*="margin: 16px 0;"] { margin: 0 !important; }
                        </style>
                        </head>
                        <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

                        <!-- HIDDEN PREHEADER TEXT -->
                        <div style=\"display: none; font-size: 1px; color: #fefefe; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;\">
                            Were thrilled to have you here! Get ready to dive into your new account.
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <!-- LOGO -->
                            <tr>
                                <td bgcolor="#ecf0f1" align="center">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="center" valign="top" width="600">
                                    <![endif]-->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                                        <tr>
                                            <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                                                <a href="http://ummahfunds.com" target="_blank">
                                                    <img alt="Logo" src="https://s27.postimg.org/cecheiccj/logosmall_2.png" width="40" height="40" style="display: block; width: 40px; max-width: 40px; min-width: 40px; color: #ffffff; font-size: 18px;" border="0">
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                            <!-- HERO -->
                            <tr>
                                <td bgcolor="#ecf0f1" align="center" style="padding: 0px 10px 0px 10px;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="center" valign="top" width="600">
                                    <![endif]-->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                                        <tr>
                                            <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                                              <h1 style="font-size: 48px; font-weight: 400; margin: 0;">Terima kasih!</h1>

                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                            <!-- COPY BLOCK -->
                            <tr>
                                <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="center" valign="top" width="600">
                                    <![endif]-->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                                      <!-- COPY -->
                                      <tr>
                                        <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 40px 30px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;" >
                                            <p style="margin: 0;">Thank you</p>
                                            <p style="margin: 0;">Kami menghargai pendaftaran anda di platform UmmahFund, terima kasih. Sebelum anda boleh menggunakan platform untuk menderma, anda mestilah mengesahkan dulu email yang telah didaftarkan dengan klik butang "Comfirm account dibawah".</p> 
                                            <p style="margin: 0; font-size:15px; color: #7f8c8d">Were excited to have you get started. First, you need to confirm your account. Just press the button below.</p>


                                        </td>
                                      </tr>
                                      <!-- BULLETPROOF BUTTON -->
                                      <tr>
                                        <td bgcolor="#ffffff" align="left">
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                 <td align="center" style="border-radius: 3px;" bgcolor="#FFA73B"><a href="http://localhost/ummahfundalpha/module/access_module/verify.php?id='.$id.'&code='.$code.'" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #FFA73B; display: inline-block;">Confirm Account</a></td>

                                                    </tr>
                                                </table>
                                              </td> 
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                      <!-- COPY -->
                                      <tr>
                                        <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;" >
                                          <p style="margin: 0;">Jika button diatas tidak berfungsi, sila copy dan paste link dibawah ke url browser anda</p>
                                            <p style="margin: 0; font-size:15px; color: #7f8c8d">If that doesnt work, copy and paste the following link in your browser:
                                            http://localhost/ummahfundalpha/module/access_module/verify.php?id='.$id.'&code='.$code.'</p>
                                            
                                        </td>
                                      </tr>
                                      <!-- COPY -->
                                        <tr>
                                          <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 20px 30px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;" >
                                            <p style="margin: 0;"><a href="<?= $activation_link ?>" target="_blank" style="color: #FFA73B;"></a>
    </p>
    </td>
    </tr>
    <!-- COPY -->
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 20px 30px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;">
            <p style="margin: 0;">Jika ada sebarang kemusykilan, atau cadangan, bolehlah hubungi kami di +6012-945-1382 atau melalui email hello@ummahfunds.com</p>
            <p style="margin: 0; font-size:15px; color: #7f8c8d">Got any inquries?, dont hesitate to contact our founder directly through this number <a href="callto:60129451382">+6012-945-1382</a> or email to our team at hello@ummahfunds.com</p>

        </td>
    </tr>
    <!-- COPY -->
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;">
            <p style="margin: 0;">For Ummah,<br>The UmmahFunds Team</p>
        </td>
    </tr>

    </table>
    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
    </td>
    </tr>
    <!-- SUPPORT CALLOUT -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="center" valign="top" width="600">
                                    <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <!-- HEADLINE -->
                <tr>
                    <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;">
                        <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                        <p style="margin: 0;"><a href="http://www.ummahfunds.com/tanya_live" target="_blank" style="color: #FFA73B;">We&rsquo;re here, ready to talk</a></p>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
        </td>
    </tr>
    <!-- FOOTER -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="center" valign="top" width="600">
                                    <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <!-- NAVIGATION -->
                <tr>
                    <td bgcolor="#f4f4f4" align="left" style="padding: 30px 30px 30px 30px; color: #666666; font-size: 14px; font-weight: 400; line-height: 18px;">
                        <p style="margin: 0;">
                            <a href="http://ummahfunds.com/userdashboard" target="_blank" style="color: #111111; font-weight: 700;">Dashboard</a> -
                            <a href="http://ummahfunds.com/blog" target="_blank" style="color: #111111; font-weight: 700;">Blog</a> -
                            <a href="http://ummahfunds.com/faq" target="_blank" style="color: #111111; font-weight: 700;">Help</a>
                        </p>
                    </td>
                </tr>
                <!-- PERMISSION REMINDER -->
                <tr>
                    <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666;font-size: 14px; font-weight: 400; line-height: 18px;">
                        <p style="margin: 0;">You received this email because you just signed up for a new account. If it looks weird, <a href="http://ummahfunds.com" target="_blank" style="color: #111111; font-weight: 700;">view it in your browser</a>.</p>
                    </td>
                </tr>
                <!-- UNSUBSCRIBE -->
                <tr>
                    <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666;font-size: 14px; font-weight: 400; line-height: 18px;">
                        <p style="margin: 0;">If these emails get annoying, please feel free to <a href="http://ummahfunds/stop" target="_blank" style="color: #111111; font-weight: 700;">unsubscribe</a>.</p>
                    </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                    <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666;font-size: 14px; font-weight: 400; line-height: 18px;">
                        <p style="margin: 0;">hello@ummahfunds.com - Kuala Lumpur, MY - <a href="callto:60129451382">012-945-1382</a></p>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
        </td>
    </tr>
    </table>

    </body>

    </html>

    '; $subject = "UmmahFund : Thank you for registering with us!"; $reg_user->send_mail($email,$message,$subject); $msg = "
    <div class='alert alert-success'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Success!</strong> We've sent an email to $email. Please click on the confirmation link in the email to create your account.
    </div>
    "; } else { echo "sorry , Query could no execute..."; } } } ?>

    <div class="bg-white">
        <div class="content content-boxed overflow-hidden">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <div class="push-30-t push-20 animated fadeIn">
                        <!-- Register Title -->
                        <div class="text-center">
                            <i class="fa fa-2x fa-circle-o-notch text-primary"></i>
                            <h1 class="h3 push-10-t">Create Account</h1>
                        </div>
                        <!-- END Register Title -->
                        <?php if(isset($msg)) echo $msg;  ?>

                        <!-- Register Form -->
                        <!-- jQuery Validation (.js-validation-register class is initialized in js/pages/base_pages_register.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-register form-horizontal push-50-t push-50"  method="post">
                              
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success">
                                        <input class="form-control" type="text" id="register-username" name="txtuname" placeholder="Please enter a username">
                                        <label for="register-username">Username</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success">
                                        <input class="form-control" type="email" id="register-email" name="txtemail" placeholder="Please provide your email">
                                        <label for="register-email">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success">
                                        <input class="form-control" type="password" id="register-password" name="txtpass" placeholder="Choose a strong password..">
                                        <label for="register-password">Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success">
                                        <input class="form-control" type="password" id="register-password2" name="register-password2" placeholder="..and confirm it">
                                        <label for="register-password2">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-7 col-sm-8">
                                    <label class="css-input switch switch-sm switch-success">
                                    <input type="checkbox" id="register-terms" name="register-terms"><span></span> I agree with terms &amp; conditions
                                </label>
                                </div>
                                <div class="col-xs-5 col-sm-4">
                                    <div class="font-s13 text-right push-5-t">
                                        <a href="#" data-toggle="modal" data-target="#modal-terms">View Terms</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                    <button class="btn btn-sm btn-block btn-success" type="submit" name="btn-signup">Create Account</button>
                                </div>
                            </div>
                        </form>
                        <!-- END Register Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Register Content -->

    <!-- Register Footer -->
    <div class="pulldown push-30-t text-center animated fadeInUp">
        <small class="text-muted"><span class="js-year-copy"></span> &copy; <?php echo $one->name . ' ' . $one->version; ?></small>
    </div>
    <!-- END Register Footer -->

    <!-- Terms Modal -->
    <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout">
            <div class="modal-content">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Terms &amp; Conditions</h3>
                    </div>
                    <div class="block-content">
                        <?php $one->get_text('small', 5); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> I agree</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Terms Modal -->

    <?php require '../inc/views/template_footer_start.php'; ?>

    <!-- Page JS Plugins -->
    <script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="<?php echo $one->assets_folder; ?>/js/pages/base_pages_register.js"></script>

    <?php require '../inc/views/template_footer_end.php'; ?>