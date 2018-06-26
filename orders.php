<html>
<body><?php 
$size=$_POST["size"];
$proid=$_POST["productid"];
$name= $_POST["name"];
$address=$_POST["address"];
$phone=$_POST["phone"];

$email=$_POST["email"];
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "fashion";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	echo "not connected";
    die("Connection failed: " . $conn->connect_error);
} 
 $sql1 = "INSERT INTO `billing` (`name`, `address`, `phone`, `email`) VALUES ('$name', '$address', '$phone', '$email')";

$result1 = $conn->query($sql1);

$sql2 = "SELECT * FROM billing ORDER BY orderid DESC LIMIT 1;";
$result2 = $conn->query($sql2); 
if ($result2->num_rows ==1) {
while($row = $result2->fetch_assoc()) {

	$ordid=$row["orderid"];
}
}
	$querry="INSERT INTO `orderinfo` (`orderid`, `productid`, `size`) VALUES('$ordid','$proid','$size');";

$result3 = $conn->query($querry);

header("Location:last.html");





$conn->close();

?>
</body>


</body>
</html>
