<!--
Ummah Fund platform(beta)
Type:html/php
Name: Registration  form HTML & link dengan email PHP
last update: 13/12/2016
by: shahril aidi

note: tukar password verify melalui email, PHP settle,tukar $message ke html cantik

status: function settle, ui 100% not yet 
!-->
<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-submit']))
{
	$email = $_POST['txtemail'];
	
	$stmt = $user->runQuery("SELECT userID FROM um_users WHERE userEmail=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['userID']);
		$code = md5(uniqid(rand()));
		
		$stmt = $user->runQuery("UPDATE um_users SET tokenCode=:token WHERE userEmail=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
        
        
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
                            Your request for reset the password.
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
                                              <h1 style="font-size: 48px; font-weight: 400; margin: 0;">Password reset</h1>

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
                                            <p style="margin: 0;">Howdy!</p>
                                            
                                            <p style="margin: 0; font-size:15px; color: #7f8c8d">Looks like you requesting to reset your password. Click button below to reset your password</p>


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
                                                 <td align="center" style="border-radius: 3px;" bgcolor="#FFA73B"><a href="http://localhost/ummahfundalpha/module/access_module/resetpass.php?id='.$id.'&code='.$code.'" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #FFA73B; display: inline-block;">Reset Account password Account</a></td>

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
                                          <p style="margin: 0; font-size:15px; color: #7f8c8d">If that doesnt work, copy and paste the following link in your browser:</p>

                                        </td>
                                      </tr>
                                      <!-- COPY -->
                                        <tr>
                                          <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 20px 30px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;" >
                                            <p style="margin: 0;"><a href="<?= $activation_link ?>" target="_blank" style="color: #FFA73B;"></a></p>
                                          </td>
                                        </tr>
                                      <!-- COPY -->
                                      <tr>
                                        <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 20px 30px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;" >
                                          <p style="margin: 0;">Jika ada sebarang kemusykilan, atau cadangan, bolehlah hubungi kami di +6012-945-1382 atau melalui email hello@ummahfunds.com</p>
                                               <p style="margin: 0; font-size:15px; color: #7f8c8d">Got any inquries?, dont hesitate to contact our founder directly
                                                   through this number <a href="callto:60129451382">+6012-945-1382</a> or email to our team at hello@ummahfunds.com</p>

                                        </td>
                                      </tr>
                                      <!-- COPY -->
                                      <tr>
                                        <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;" >
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
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                                        <!-- HEADLINE -->
                                        <tr>
                                          <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;" >
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
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                                      <!-- NAVIGATION -->
                                      <tr>
                                        <td bgcolor="#f4f4f4" align="left" style="padding: 30px 30px 30px 30px; color: #666666; font-size: 14px; font-weight: 400; line-height: 18px;" >
                                          <p style="margin: 0;">
                                            <a href="http://ummahfunds.com/userdashboard" target="_blank" style="color: #111111; font-weight: 700;">Dashboard</a> -
                                            <a href="http://ummahfunds.com/blog" target="_blank" style="color: #111111; font-weight: 700;">Blog</a> -
                                            <a href="http://ummahfunds.com/faq" target="_blank" style="color: #111111; font-weight: 700;">Help</a>
                                          </p>
                                        </td>
                                      </tr>
                                      <!-- PERMISSION REMINDER -->
                                      <tr>
                                        <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666;font-size: 14px; font-weight: 400; line-height: 18px;" >
                                          <p style="margin: 0;">You received this email because you just signed up for a new account. If it looks weird, <a href="http://ummahfunds.com" target="_blank" style="color: #111111; font-weight: 700;">view it in your browser</a>.</p>
                                        </td>
                                      </tr>
                                      <!-- UNSUBSCRIBE -->
                                      <tr>
                                        <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666;font-size: 14px; font-weight: 400; line-height: 18px;" >
                                          <p style="margin: 0;">If these emails get annoying, please feel free to <a href="http://ummahfunds/stop" target="_blank" style="color: #111111; font-weight: 700;">unsubscribe</a>.</p>
                                        </td>
                                      </tr>
                                      <!-- ADDRESS -->
                                      <tr>
                                        <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666;font-size: 14px; font-weight: 400; line-height: 18px;" >
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

              ';
		$subject = "UmmahFunds: Password Reset link";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  this email not found. 
			    </div>";
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body id="login">
    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Forgot Password</h2><hr />
        
        	<?php
			if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
              	<div class='alert alert-info'>
				Please enter your email address. You will receive a link to create a new password via email.!
				</div>  
                <?php
			}
			?>
        
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
     	<hr />
        <button class="btn btn-danger btn-primary" type="submit" name="btn-submit">Generate new Password</button>
      </form>

    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>