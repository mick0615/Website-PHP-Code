<!DOCTYPE html>
<html>
    <head><meta charset="UTF-8"></head>
<body>
    <?php
    $id=$_GET["peopleseat"];
echo "<h2>".$id."學生資料更改</h2>";
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

$sql2 = "select * from 學生表 where 座號=$id";
$result = $conn->query($sql2);
    $row=$result->fetch_assoc();
     echo $row['姓名']
        ?>

<form action="main.php" method="post">
  <label for="seat">請輸入學生座號:</label>
  <input type="text" id="emp" name="empseat" value="<?php echo $row['座號']; ?>"><br><br>
  <label for="name">請輸入學生姓名:</label>
  <input type="text" id="emp" name="empname" value="<?php echo $row['姓名']; ?>"><br><br>
    <label for="gender">學生性別:</label>
  <select id="emp" name="gender">
      <?PHP
      IF ($row['性別']=='男') {
    ECHO "<option value='男' selected>男</option>
    <option value='女' >女</option>
    <option value='其他' >其他</option>"
 ;}
      IF ($row['性別']=='女') {
    ECHO "<option value='男' >男</option>
    <option value='女' selected>女</option>
    <option value='其他' >其他</option>"
 ;}
      IF ($row['性別']=='其他') {
    ECHO "<option value='男' >男</option>
    <option value='女' >女</option>
    <option value='其他' selected>其他</option>"
 ;}
      ?>
      </select><br><br>
    <label for="dep">請輸入學生系級:</label>
    <input type="text" id="emp" name="empdep" value="<?php echo $row['系級']; ?>"><br><br>
 
  <input type="submit" value="送出">
</form> 
   <p><a href="main.php">返回</a></p> 
</body>
</html>