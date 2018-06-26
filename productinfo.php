
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
$sql = "SELECT * FROM product where productid='$q';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
 echo"<div class=\"item\">";
echo"<img src=\"".$row["imgsrc"]."\"/>";
echo"<div class=\"rate\">"."Price:".$row["price"]."</div>";
echo"</div>";
echo'
<br>
<form action="http://localhost/osp/orders.php" method="post">
Select size:<br>
<select id="size" name="size">
    <option value="small">SMALL</option>
    <option value="medium" selected>MEDIUM</option>
    <option value="large">LARGE</option>
    <option value="extralarge">EXTRA LARGE</option>
  </select><br>
  Name:<br>
  <input type="text" name="name" required>
  <br>
Address:
<br>
<textarea name="address" rows="3" cols="30" required>
</textarea>
<br>
  Phone:<br>
  <input type="text" name="phone" required>
  <br>

  Email-Id:<br>
  <input type="email" name="email">
  <br>
  <input type="text" id="productid" name="productid"  style="display: none">

  <br>
  <input type="submit" value="PLACE YOUR ORDER">
</form> 
';
  }
} 
else {
    echo "0 results";
} 
?>
</body>
</html>
