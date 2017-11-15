<?php
function connection(){
    try {
        /*
         * Edit The Below Variable with your Database Details
         * If you're not getting anything then you can contact me
         * Contact URL : http://mycodingtricks.com/contact-us/
         */
            $db_host = 'localhost';  //  hostname
            $db_name = 'test';  //  databasename
            $db_user = 'test';  //  username
            $user_pw = '123456';  //  password
         
        //You Don't Need to Edit This
            $con = new PDO('mysql:host='.$db_host.'; dbname='.$db_name, $db_user, $user_pw);  
            $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $con->exec("SET CHARACTER SET utf8");  //  return all sql requests as UTF-8  
        }
        catch (PDOException $err) {  
            echo "harmless error message if the connection fails";
            $err->getMessage() . "<br/>";
            file_put_contents('PDOErrors.txt',$err, FILE_APPEND);  // write some details to an error-log outside public_html  
            //die();  //  terminate connection
        }
        return $con;
}
