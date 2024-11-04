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
<h2>學生成績查詢</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label for="fname">輸入學生姓名</label><br>
<input type="text" id="fname" name="anothername" value=""><br>
<input type="submit" value="查詢">
  </form>      
<?php
$name =@$_POST["anothername"];
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ch12_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$sql = "SELECT 座號, 姓名, 選課, 課程, 成績 FROM 選課表 where  姓名 = '$name'"; 
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
  // output data of each row
 echo"<table><tr><th>座號</th><th>姓名</th><th>選課</th><th>課程</th><th>成績</th>";
  while($row = $result->fetch_assoc()) {
     echo "<tr><td>". $row["座號"]. "</td><td>". $row["姓名"]. "</td><td> " . $row["選課"] . "</td><td>"
    . $row["課程"] . "</td><td>" . $row["成績"]. "</td></tr>";
  }
  echo"</table>";   
} else {
//echo "0 results";
}
$conn->close();
?>
<p><a href="main.php">返回</a></p> 
</body>
</html>
    