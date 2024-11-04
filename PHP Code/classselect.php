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

<h2>學生選課/成績資料</h2>

<table>
  <tr>
    <th>座號</th>
    <th>姓名</th>
    <th>選課</th>
    <th>課程</th>
    <th>成績</th>
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

$sql2 = "select * from 選課表";
$result = $conn->query($sql2);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["座號"]. "</td><td>". $row["姓名"]. "</td><td> " . $row["選課"] . "</td><td>"
    . $row["課程"] . "</td><td>" . $row["成績"]. "</td></tr>";
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