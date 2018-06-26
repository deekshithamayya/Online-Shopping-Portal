<?php 
$fd=$_REQUEST["fd"];
$td=$_REQUEST["td"];
$fp=$_REQUEST["fp"];
$tp=$_REQUEST["tp"];
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "fashion";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	echo "not connected";
    die("Connection failed: " . $conn->connect_error);
}
if(empty($fd) && empty($td) && empty($fp) && empty($tp)) 
$sql = "SELECT orderinfo.orderid,orderinfo.productid,billing.name,billing.address,billing.phone,billing.email,product.price,orderinfo.datetime
from orderinfo,billing,product
WHERE orderinfo.orderid=billing.orderid
AND product.productid=orderinfo.productid;";
else if(empty($fd)&&empty($td)&& !empty($fp)&& !empty($tp)){
$sql="SELECT orderinfo.orderid,orderinfo.productid,billing.name,billing.address,billing.phone,billing.email,product.price,orderinfo.datetime
from orderinfo,billing,product
WHERE orderinfo.orderid=billing.orderid
AND product.productid=orderinfo.productid
AND product.price BETWEEN ".$fp." AND ".$tp.";"; 
}
else if(empty($fd)&&empty($td)&& !empty($fp)&& empty($tp)){
$sql="SELECT orderinfo.orderid,orderinfo.productid,billing.name,billing.address,billing.phone,billing.email,product.price,orderinfo.datetime
from orderinfo,billing,product
WHERE orderinfo.orderid=billing.orderid
AND product.productid=orderinfo.productid
AND product.price>".$fp.";"; 
}
else if(empty($fd)&&empty($td)&& empty($fp)&& !empty($tp)){
$sql="SELECT orderinfo.orderid,orderinfo.productid,billing.name,billing.address,billing.phone,billing.email,product.price,orderinfo.datetime
from orderinfo,billing,product
WHERE orderinfo.orderid=billing.orderid
AND product.productid=orderinfo.productid
AND product.price<".$tp.";"; 
}
else if(!empty($fd)&&!empty($td)&& empty($fp)&& empty($tp)){
$sql="SELECT orderinfo.orderid,orderinfo.productid,billing.name,billing.address,billing.phone,billing.email,product.price,orderinfo.datetime
from orderinfo,billing,product
WHERE orderinfo.orderid=billing.orderid
AND product.productid=orderinfo.productid
AND DATE(orderinfo.datetime) BETWEEN '".$fd."' AND '".$td."';";
}
else if(!empty($fd)&&empty($td)&& empty($fp)&& empty($tp)){
$sql="SELECT orderinfo.orderid,orderinfo.productid,billing.name,billing.address,billing.phone,billing.email,product.price,orderinfo.datetime
from orderinfo,billing,product
WHERE orderinfo.orderid=billing.orderid
AND product.productid=orderinfo.productid
AND DATE(orderinfo.datetime) > '".$fd."';";
}
else if(!empty($fd)&&empty($td)&& empty($fp)&& empty($tp)){
$sql="SELECT orderinfo.orderid,orderinfo.productid,billing.name,billing.address,billing.phone,billing.email,product.price,orderinfo.datetime
from orderinfo,billing,product
WHERE orderinfo.orderid=billing.orderid
AND product.productid=orderinfo.productid
AND DATE(orderinfo.datetime) >= '".$fd."';";
}

else if(empty($fd)&& !empty($td)&& empty($fp)&& empty($tp)){
$sql="SELECT orderinfo.orderid,orderinfo.productid,billing.name,billing.address,billing.phone,billing.email,product.price,orderinfo.datetime
from orderinfo,billing,product
WHERE orderinfo.orderid=billing.orderid
AND product.productid=orderinfo.productid
AND DATE(orderinfo.datetime) <= '".$td."';";
}
else if(!empty($fd)&& !empty($td)&& !empty($fp)&& !empty($tp)){
$sql="SELECT orderinfo.orderid,orderinfo.productid,billing.name,billing.address,billing.phone,billing.email,product.price,orderinfo.datetime
from orderinfo,billing,product
WHERE orderinfo.orderid=billing.orderid
AND product.productid=orderinfo.productid
AND DATE(orderinfo.datetime) BETWEEN '".$fd."' AND '".$td."' ".
"AND product.price BETWEEN ".$fp." AND ".$tp.";"; 

}





$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo'<table>
<tr><th>Order Id</th>
<th>Product Id</th>
<th>Name</th>
<th>Address</th>
<th>Phone</th>
<th>Email</th>
<th>Price</th>
<th>Date and Time</th>
</tr>';
 while($row = $result->fetch_assoc()) {
echo '<tr>
<td>'.$row["orderid"].'</td>
<td>'.$row["productid"].'</td>
<td>'.$row["name"].'</td>
<td>'.$row["address"].'</td>
<td>'.$row["phone"].'</td>
<td>'.$row["email"].'</td>
<td>'.$row["price"].'</td>
<td>'.$row["datetime"].'</td>

</tr>';
}
echo'</table>';
}	
    
else {
	echo "0 results";	  
} 
$conn->close();
?>
</body>


</body>
</html>
