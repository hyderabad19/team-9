<?php
session_start();
 $x=$_POST["logid"];
 $y=$_POST["password"];
$conn = new mysqli("localhost:", "root", "","");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from login where logid='$x';";
$result=$conn->query($sql);
if($result->num_rows)
{  
$pass=$result->fetch_assoc();
if($y==$pass[password])
{
    $_SESSION["logid"]=$x;
    header("location:loginsuccess.php");
}
 else 
     {
    echo "invalid password";
    include 'log.html';
}
}
else
{
    echo  "invalid loginid";
    include 'log.html';
}
?>
