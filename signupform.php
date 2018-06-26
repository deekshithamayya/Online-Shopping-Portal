<?php 
$uid = $_REQUEST["userid"];
$pw = $_REQUEST["password"];
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "fashion";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM logincredentials where userid='$uid';";

$result = $conn->query($sql);

if ($result->num_rows == 0) {

	$querry="INSERT INTO logincredentials(`userid`, `password`) VALUES ('$uid','$pw');";
$conn->query($querry);
    echo"notexists";
}
else{
	echo "exists";
}

    
?>

