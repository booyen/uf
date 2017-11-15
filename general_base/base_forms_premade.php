<?php require 'inc/config_dashboard_donors.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/base_head.php'; ?>


<link rel="stylesheet" href="assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
<script src="assets/js"></script>

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Basic Information <small></small>
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Profile Settings</li>
                <li><a class="link-effect" href="">Basic</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
   


    <!-- Mega Form -->
    <h6 class="content-heading">Hi donors! Please fill in the information below, so that your volunteering service and intreset can be listed. Need help?. click <a href="#"> here</a></h6>
    <div class="block block-bordered">
        <div class="block-header bg-gray-lighter">
            <ul class="block-options">
                <li>
                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                </li>
                <li>
                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                </li>
            </ul>
            <h3 class="block-title">Personal information</h3>
        </div>
        <div class="block-content">
            <form class="form-horizontal push-10-t push-10" action="base_forms_premade.php" method="post" onsubmit="return false;">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <div class="col-xs-6 ">
                                  <div class="form-material ">
                                                    <input class="form-control" type="text" id="firstname" name="firstname">
                                                    <label for="register6-firstname">Firstname</label>
                                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-material ">
                                                    <input class="form-control" type="text" id="lastname" name="lastname">
                                                    <label for="register6-firstname">Lastname</label>
                                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material ">
                                                    <input class="form-control" type="text" id="email" name="email">
                                                    <label for="register6-firstname">Email</label>
                                    <div class="help-block text-right">Email is already entered </div>
                                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="form-material ">
                                                    <input class="form-control" type="text" id="username" name="username">
                                                    <label for="register6-firstname">Username</label>
                                                </div>
                              
                  
                            </div>
                            <div class="col-xs-6">
                                <div class="form-material">
                                                    <input class="form-control" type="text" id="phonenum" name="phonenum">
                                                    <label for="register6-firstname">Phone Num</label>
                                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="col-xs-12">
                                 <div class="form-material">
                                                    <select class="form-control" id="nationality" name="nationality" size="1">
                                                        <option value="1">Malaysian</option>
                                                        <option value="2">Non-Malaysian</option>
                                                        
                                                    </select>
                                                    <label for="contact2-subject">Nationality</label>
                                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="mega-bio">Bio</label>
                                <textarea class="form-control input-lg" id="bio" name="bio" rows="22" placeholder="Enter a few details about yourself.."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="col-xs-12">
                                  <div class="form-material">
                                                    <select class="form-control" id="state" name="state" size="1">
                                                        <option value="1">Kedah</option>
                                                        <option value="2">Perlis</option>
                                                        <option value="1">Pulau pinang</option>
                                                        <option value="2">Perak</option>
                                                        <option value="1">Selangor</option>
                                                        <option value="2">Wilayah Persekutuan Kuala lumpur</option>
                                                        <option value="1">Wilayah Persekutuan Putrajaya</option>
                                                        <option value="2">Wilayah Persekutuan Labuan</option>
                                                        <option value="1">Negeri sembilan</option>
                                                        <option value="2">Johor</option>
                                                        <option value="1">Pahang</option>
                                                        <option value="2">Terengganu</option>
                                                        <option value="2">Kelantan</option>
                                                        <option value="2">Sabah</option>
                                                        <option value="2">Sarawak</option>
                                                    </select>
                                                    <label for="contact2-subject">State</label>
                                                </div>
                            </div>
                            <div class="col-xs-12">
                                  <div class="form-material ">
                                                    <input class="form-control" type="text" id="city" name="city">
                                                    <label for="register6-firstname">City</label>
                                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                           
                                 <div class="form-material">
                                                    <select class="form-control" id="profession" name="profession" size="1">
                                                        <option value="1">Education</option>
                                                        <option value="2">Sports</option>
                                                        <option value="3">Computer</option>
                                                        <option value="4">Language</option>
                                                        <option value="5">Medical</option>
                                                        <option value="6">Engineering</option>
                                                        <option value="7">Arts</option>
                                                        <option value="8">Management</option>
                                                        <option value="9">Student</option>
                                                        <option value="9">Business</option>
                                                        
                                                    </select>
                                                    <label for="contact2-subject">Profession Involved</label>
                                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                   <div class="form-material ">
                                                    <input class="form-control" type="text" id="register6-firstname" name="register6-firstname">
                                                    <label for="register6-firstname">Age</label>
                                                </div>
                            </div>
                        </div>
                        <div class="form-group form-material">
                            <label class="col-xs-12">Gender</label>
                            <div class="col-xs-12">
                                <label class="css-input css-radio css-radio-warning push-10-r">
                                    <input type="radio" name="mega-gender-group"><span></span> Female
                                </label>
                                <label class="css-input css-radio css-radio-warning">
                                    <input type="radio" name="mega-gender-group"><span></span> Male
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <button class="btn btn-warning" type="submit"><i class="fa fa-check push-5-r"></i> Complete Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Mega Form -->

</div>
<!-- END Page Content -->

<?php require 'inc/views/base_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>
<?php require 'inc/views/template_footer_end.php'; ?>
<script src="<?php echo $one->assets_folder; ?>/js/core/jquery.min.js" ></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
  <script type="application/javascript">
                                $(function(){
                                    $('#hero-demo').autoComplete({
                                        minChars: 1,
                                        source: function(term, suggest){
                                            term = term.toLowerCase();
                                            var choices = ['ActionScript', 'AppleScript', 'Asp', 'Assembly', 'BASIC', 'Batch', 'C', 'C++', 'CSS', 'Clojure', 'COBOL', 'ColdFusion', 'Erlang', 'Fortran', 'Groovy', 'Haskell', 'HTML', 'Java', 'JavaScript', 'Lisp', 'Perl', 'PHP', 'PowerShell', 'Python', 'Ruby', 'Scala', 'Scheme', 'SQL', 'TeX', 'XML'];
                                            var suggestions = [];
                                            for (i=0;i<choices.length;i++)
                                                if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                                            suggest(suggestions);
                                        }
                                    });
                                });


                                </script>