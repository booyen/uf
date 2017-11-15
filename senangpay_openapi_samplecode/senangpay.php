<?php session_start();
$org_ID = $_SESSION['orgID'];     
?>
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

 if(isset($_POST['SubmitButton'])){

$merchantid = $_POST['merchant_id'];
$secretkey = $_POST['secretkey'];
//$orgID = $_POST['org_id'];


$sql = "INSERT INTO senangpay_data (org_proid,merchant_id, secret_key, gateway_status)
VALUES ('$org_ID','$merchantid', '$secretkey', '1')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>

<html>
    <head>
    <title>senangPay merchant id save</title>
    </head>
    <body>
        <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <table>
                <tr>
                    <td colspan="2">Please fill up the detail below in order to test the payment. Order ID is defaulted to timestamp.</td>
                </tr>
                <tr>
                    <td>Merchant ID</td>
                    <td>: <input type="text" name="merchant_id" value="" placeholder="Your mechant ID" size="30"></td>
                </tr>
                <tr>
                    <td>Secret KEY</td>
                    <td>: <input type="text" name="secretkey" value="" placeholder="Your secrect key" size="30"></td>
                </tr>
                <tr>
                    <td>Organization org_proid</td>
                    <td>: <input type="text" name="org_id" value="<?php echo $org_ID;?>" placeholder="Unique id to reference the transaction or order" size="30"></td>
                </tr>
               
                <tr>
                    <td><input type="submit" name="SubmitButton" value="Submit"></td>
                </tr>
            </table>
        </form>
    </body>
    </html>