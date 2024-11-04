<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>課程資料</h2>

<table>
  <tr>
    <th>課號</th>
    <th>課名</th>
    <th>學分數</th>
  </tr>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ch12_db";

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$sql2 = "select * from 課程表";
$result = $conn->query($sql2);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["課號"]. "</td><td>". $row["課名"]. "</td><td> " . $row["學分數"] . "</td></tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
    </table>
    <p><a href="main.php">返回</a></p> 
    </body>
</html>