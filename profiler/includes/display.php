<?php 
//display all users
include_once("includes/config.php");

$sql = "SELECT * FROM um_users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    while($row = $result->fetch_assoc()) {
        $firstname = $row["userName"];
        echo '<tr><td><a href="/uf/uf/profiler/profiles.php?first='.$firstname.'">'.$firstname.'</a><br /></td></tr>';
    }
    echo '</table>';
}
else {
    echo "0 results";
}
include_once("menu.php");
?>