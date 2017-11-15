<?php
require 'connection.php';
/*
 * You can Replace it with Your User's User id
 * For Example: 
 * $user_id = $_SESSION['user_id']
 * This User Id will be used to update the users profile
 */

$user_id = 1;

$users_table_name = "users"; //Users Table Name 

//Data That will be printed
$status = 400; //We are Using 200 For Success and 400 for Error
$message = NULL;


/*
 * Edit the $mysql_field array with your own array.
 * This Array Contains key that it get on Form Submit and Update the Value of Mysql Column of particular user row.
 * For Example: When Form Send `fname` field, it will update `first_name` MySQL Column
 * I'm using this array to Prevent MYSQL Injection
 */

$mysql_field = array(
    "fname"=>"first_name",
    "lname"=>"last_name",
    "qualification"=>"qualification",
    "resume"=>"resume_url",
    "profile_pic"=>"profile_pic_url"
    );

/*
 * $allowed_file_extension contains array of file extension that are allowed for custom fields.
 * For Example: 
 * (1). When Form send `profile_pic` field(i.e when User will uplod his/her profie picture), then We will check, does that files extension match with allowed extensions.
 * (2). When Form send `resume` field(i.e when user will upload his/her resume), then we will match the resume file extension with our allowed extensions
 */
$allowed_file_extension = array(
    "profile_pic"=>array("png","jpg","jpeg","gif"),
    "resume"=>array("docx","pdf")
    );

/*
 * $max_file_size array will be used to allow only file size that are less than or equals to the allowed size
 * for custom form data.
 * For Example: For `profile_pic` and `resume` we have Allowed 5MB and 10MB of file Size respectively.
 */
$max_file_size = array(
    "profile_pic"=>5*1000*1000,
    "resume"=>10*1000*1000
);

/*
 * $upload_dir is the folder on server in which file will be uploaded
 * $database_upload_prefix is the url used in the database for the file.
 */
$upload_dir = "../uploads";
$database_upload_prefix = "http://localhost/User%20Profile/uploads";
//Handling User Actions
$action = $_REQUEST['action'];

if($action=="upload") upload_action();
if($action=="get") get_profile();
if($action=="update") update_profile();

if(isset($_REQUEST['callback'])){
    $callback = $_REQUEST['callback'];
    echo $callback."(".json_encode(array("status"=>$status,"data"=>$message)).")";
}else{
    echo json_encode(array("status"=>$status,"data"=>$message));
}

function update_profile(){
    global $mysql_field,$status,$message;
    $fields = $_POST;
    foreach($fields as $key=>$value){
        if(isset($mysql_field[$key])){
            update_table($mysql_field[$key], $value);
        }
    }
}
function upload_action(){
    global $allowed_file_extension,$max_file_size,$upload_dir,$database_upload_prefix,$mysql_field,$status,$message;
    $files = $_FILES;
    foreach($files as $key=>$value){
        $file = $files[$key];
        $file_name = $file['name'];
        $ext = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
        if(in_array($ext,$allowed_file_extension[$key])){
            if($file['size']<=$max_file_size[$key]){
                $upload_name = md5(time()+rand(0,time())).".".$ext;
                $destination = $upload_dir."/".$upload_name;
                $tmp_name = $file['tmp_name'];
                $upload = move_uploaded_file($tmp_name, $destination);
                $upload_url = $database_upload_prefix."/".$upload_name;
                if($upload){
                    update_table($mysql_field[$key], $upload_url);
                }else{
                    $status = 400;
                    $message = "We're unable to upload your file now. Please Try Again!";
                }
            }else{
                $status = 400;
                $message = "You file size (".$file['size'].") is greater than Max Allowed Size(".$max_file_size[$key].")";
            }
        }else{
            $status = 400;
            $message = "Only ".join(",",$allowed_file_extension[$key])." files are Allowed. ";
        }
    }
    
}

function update_table($key,$value){
    global $user_id,$users_table_name,$status,$message;
    $con = connection();
    $q = "UPDATE `{$users_table_name}` SET `{$key}`=? WHERE `id`=?";
    try{
        $prepare = $con->prepare($q);
        $execute = $prepare->execute(array($value,$user_id));
        $status = 200;
        $message = "Profile Successfully Updated!";
    } catch (PDOException $ex) {
        
        $status = 400;
        $message = "Error: ".$ex->getMessage();
    } 
}

function get_profile(){
    global $user_id,$users_table_name,$status,$message,$mysql_field,$status,$message;
    $con = connection();
    $select = array();
    foreach($mysql_field as $k=>$v){
        $select[] = "`{$v}`";
    }
    $select = join(",",$select);
    try{
        $sql = $con->prepare("SELECT {$select} FROM `{$users_table_name}` WHERE `id`=:user_id");
        $sql->execute(array(":user_id"=>$user_id));
        
        if($sql->rowCount()>0){
            $fetch  = $sql->fetch();
            $message = array();
            foreach($mysql_field as $k=>$v){
                $message[$k] = $fetch[$v];
            }
        }
        
        $status = 200;
    } catch (PDOException $ex) {
        
        $status = 400;
        $message = "Error: ".$ex->getMessage();
    }
}
