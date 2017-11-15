<!DOCTYPE html>
<html>
    <head>
        <title>profile.php - PHP User Profile Page Script</title>
        <link href="assets/main.css" rel="stylesheet"/>
        <link href="assets/profile.css" rel="stylesheet"/>
        <script type="text/javascript" src="assets/jquery.min.js"></script>
        <script type="text/javascript" src="assets/profile.js"></script>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        
        <form class="profile-form" action="ajax/profile.php" onsubmit="profile_submit(this); return false;">
            <div class="form-label">
                <label for="fname_text">First Name</label>
                <span id="fname_text" onclick="edit_profile('fname',true)"></span>
                <div id="fname_input_wrap" class="input-wrap">
                    <input id="fname_input" name="fname" value="" onkeypress="submitenter(event,'fname')"/>
                </div>
            </div>
            <div class="form-label">
                <label for="lname_text">Last Name</label>
                <span id="lname_text" onclick="edit_profile('lname',true)"></span>
                <div id="lname_input_wrap" class="input-wrap">
                    <input id="lname_input" name="lname" value="" onkeypress="submitenter(event,'lname');"/>
                </div>
            </div>
            <div class="form-label">
                <label for="qualification_text">Qualification</label>
                <span id="qualification_text" onclick="edit_profile('qualification',true)"></span>
                <div id="qualification_input_wrap" class="input-wrap">
                    <textarea id="qualification_input" name="qualification" value="" onkeypress="submitenter(event,'qualification')"></textarea>
                </div>
            </div>
            <div class="form-label">
                <label for="resume_text">Resume</label>
                <span id="resume_text" onclick="edit_profile('resume')"></span>
                <div id="resume_input_wrap" class="input-wrap">
                    <input id="resume_input" type="file" name="resume" value="" onchange="upload_file('resume')"/>
                    <div id="resume_upload-status"></div>
                    <div class="progress">
                        <div class="progressBar" id="resume_progress"></div>
                    </div>
                </div>
            </div>
            <div class="form-label">
                <label for="profile_pic_text">Profile Picture</label>
                <span id="profile_pic_text" onclick="edit_profile('profile_pic')"></span>
                <div id="profile_pic_input_wrap" class="input-wrap">
                    <input id="profile_pic_input" type="file" name="profile_pic" value="" onchange="upload_file('profile_pic')"/>
                    <div id="profile_pic_upload-status"></div>
                    <div class="progress">
                        <div class="progressBar" id="profile_pic_progress"></div>
                    </div>
                </div>
            </div>
        </form>
        
    </body>
</html>