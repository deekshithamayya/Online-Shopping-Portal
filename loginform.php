<?php 
$un = $_POST["username"];
$pw = $_POST["password"];
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "fashion";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	echo "not connected";
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM logincredentials where userid='$un' and password='$pw'";

$result = $conn->query($sql);

if ($result->num_rows ==1) {
header('Location:main.html');
    } 
else {
	  header('Location:login.html');
} 
$conn->close();
?>
