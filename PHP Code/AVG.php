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
    <h2>課程平均成績查詢</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label for="fname">請輸入選課課號</label><br>
<input type="text" id="numbl" name="numble" value=""><br>
<input type="submit" value="查詢">
  </form>      
<?php
$num =@$_POST["numble"];
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
$sql = "SELECT 選課, 課程, AVG(成績) FROM 選課表 where  選課 = '$num'"; 
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
  // output data of each row
 echo"<table><tr><th>選課</th><th>課程</th><th>平均成績</th>";
  while($row = $result->fetch_assoc()) {
 echo "<tr><td> " . $row["選課"]. "</td><td>" . $row["課程"]. "</td><td>" . $row["AVG(成績)"]."</td></tr>";
  }
  echo"</table>";   
} else {
  echo "0 results";
}
$conn->close();
?>
<p><a href="main.php">返回</a></p> 
</body>
</html>
    