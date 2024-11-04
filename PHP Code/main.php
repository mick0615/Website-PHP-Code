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
<style>
table, th, td {
  border:1px solid black;
}
</style>

<table style="width:100%">
  <tr>
    <th><p><a href="into.html">新增學生資料</a></p> </th>
    <th><p><a href="class.php">課程資料</a></p></th>
    <th> <p><a href="classselect.php">學生選課/成績資料</a></p></th>
      <th><p><a href="results.php">學生成績查詢</a></p> </th>
      <th><p><a href="AVG.php">課程平均成績查詢</a></p></th>    
  </tr>
</table>

    <h2>學生資料</h2>
<table>
  <tr>
    <th>座號</th>
    <th>姓名</th>
    <th>性別</th>
    <th>系級</th>
    <th>操作</th>
  </tr>
<?php
$id=@$_POST["empseat"];
$name=@$_POST["empname"];
$gender=@$_POST["gender"];
$dep=@$_POST["empdep"];
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

$sql = "insert into 學生表 (座號, 姓名, 性別, 系級,) Values ($id, '$name', '$gender', $dep)";
$conn->query($sql);

$sql2 = "select * from 學生表";
$result = $conn->query($sql2);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["座號"]. "</td><td>". $row["姓名"]. "</td><td> " . $row["性別"] . "</td><td>" . $row["系級"] ."</td><td>". "<a href='delete.php?peopleseat=". $row["座號"]."'>刪除 ; </a><a href='Update.php?peopleseat=". $row["座號"]."'>更改</a></td></tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
    </table>
    </body>
</html>