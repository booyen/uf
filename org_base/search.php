<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("ummah",$con);
    $query=mysql_query("select * from um_users where userName LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['userName'];
    }
    echo json_encode($array);
?>
