<html>
<head></head>
<body><?php 
$q = $_REQUEST["q"];
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "fashion";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	echo "not connected";
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM product where categoryname='$q';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
echo"<a onclick=\"setproduct(".$row["productid"].")\" href=\"billing.html\">";
 echo"<div class=\"item\">";
echo"<img src=\"".$row["imgsrc"]."\"/>";
echo"<div class=\"rate\">"."Price:".$row["price"]."</div>";
echo"</div></a>";
  }
} 
else {
    echo "0 results";
} 
$conn->close();
?>
</body>
</html>