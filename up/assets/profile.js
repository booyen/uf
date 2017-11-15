/* 
 * Copyright (C) 2016 Shubham
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/* 
    Created on : Apr 3, 2016, 5:08:57 PM
    Author     : Shubham
    Website : http://mycodingtricks.com/
*/
var profile_submit_url = "ajax/profile.php";

get_profile();
function profile_submit(e){
    $.post(profile_submit_url+"?action=update",$(".profile-form").serialize(),get_profile);
}
function edit_profile(field,tick){
    $("#"+field+"_input_wrap").show();
    $("#"+field+"_input").focus();
    $("#"+field+"_text").hide();
    if(tick){
        $("#"+field+"_input_wrap").append("<span onclick=\"update_profile('"+field+"')\" class=\"tick\"></span>");
    }
    
}
function update_profile(field){
    var value = $("#"+field+"_input").val();
    var data = field+"="+value;
    $.post(profile_submit_url+"?action=update",data,function(response){
      get_profile();
    });
}
function submitenter(e,field){
    var keycode;
    if(window.event) keycode = window.event.keyCode;
    else if(e) keycode = e.which;
    else return true;

    if(keycode == 13 && !e.shiftKey){
        update_profile(field);
        return false;
    }

    return true;
}
function get_profile(){
    $.getJSON(profile_submit_url+"?action=get&callback=?",function(response){
        if(response.status==200){
            $.each(response.data,function(field,value){
                switch(field){
                    case 'profile_pic':                 
                        $("#profile_pic_text").html("<img src='"+value+"' width='100px'/>").fadeIn();
                        $("#"+field+"_input_wrap").hide();
                        break;
                    case 'resume':
                        $("#resume_text").html("<a href='"+value+"' target=_blank rel=nofollow>View Resume</a>").fadeIn();
                        $("#"+field+"_input_wrap").hide();
                        break;
                    default: 
                        $("#"+field+"_text").html(value).fadeIn();
                        $("#"+field+"_input_wrap").hide();
                        $("#"+field+"_input").val(value);
                        break;
                }
                var tick = $("#"+field+"_input_wrap>.tick");
                if(tick.length>0) tick.remove();
            });
        }
    });
}

function upload_file(field){
    if(supportAjaxUploadWithProgress()){
        var formData = new FormData();
        var file = document.getElementById(field+"_input").files[0];
        formData.append(field,file);
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener('loadstart', function(event){ onloadstartHandler(event,field) }, false);
        xhr.upload.addEventListener('progress', function(event){ onprogressHandler(event,field) }, false);
        xhr.upload.addEventListener('load', function(event){ onloadHandler(event,field) }, false);
        xhr.addEventListener('readystatechange', function(event){ onreadystatechangeHandler(event,field) }, false);
        xhr.open('POST',profile_submit_url+'?action=upload',true);
        xhr.send(formData);
    }
}
// Handle the start of the transmission
function onloadstartHandler(evt,field) {
  var div = document.getElementById(field+'_upload-status');
  div.innerHTML = 'Upload started.';
}
// Handle the end of the transmission
function onloadHandler(evt,field) {
  var div = document.getElementById(field+'_upload-status');
  div.innerHTML += 'File uploaded. Waiting for response.';
}
// Handle the progress
function onprogressHandler(evt,field) {
  var div = document.getElementById(field+'_progress');
  var percent = (evt.loaded/evt.total*100).toFixed(0);
  div.innerHTML = percent + '%';
  div.style.width = percent + '%';
}
function onreadystatechangeHandler(evt,field) {
  var status, text, readyState;
  try {
    readyState = evt.target.readyState;
    text = evt.target.responseText;
    status = evt.target.status;
  }
  catch(e) {
    return;
  }
  if (readyState == 4 && status == '200' && evt.target.responseText) {
    var status = document.getElementById(field+'_upload-status');
    var response = JSON.parse(evt.target.responseText);
    if(response.status==200){
         setTimeout(get_profile,3000);
    }else{
        print_error("#"+field+"_upload-status",response.data);
        document.getElementById(field+'_progress').style.display = "none";
    }
  }
}
function supportAjaxUploadWithProgress() {
  return supportFileAPI() && supportAjaxUploadProgressEvents() && supportFormData();

  function supportFileAPI() {
    var fi = document.createElement('INPUT');
    fi.type = 'file';
    return 'files' in fi;
  };

  function supportAjaxUploadProgressEvents() {
    var xhr = new XMLHttpRequest();
    return !! (xhr && ('upload' in xhr) && ('onprogress' in xhr.upload));
  };

  function supportFormData() {
    return !! window.FormData;
  }
}

function print_error(target,text){
  $(target).html("<div class='alert error'>"+text+"</div>"); 
}