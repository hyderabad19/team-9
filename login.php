<?php
session_start();
 $x=$_POST["logid"];
 $y=$_POST["password"];
$conn = new mysqli("localhost", "root", "","drreddy");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from student where user_name='$x';";
$result=$conn->query($sql);
if($result->num_rows)
{  
$pass=$result->fetch_assoc();
if($y==$pass['password'])
{
    $_SESSION["stuid"]=$pass['stu_id'];
    header("location:index.php");
}
 else 
     {
    echo "invalid password";
    include 'login.html';
}
}
else
{
    $sql = "select * from staff where user_name='$x';";
    $result=$conn->query($sql);
    if($result->num_rows)
    {  
    $pass=$result->fetch_assoc();
    if($y==$pass['password'])
    {
    $_SESSION["staid"]=$pass['sta_id'];
    header("location:indexstaff.php");
    }
    else 
     {
    echo "invalid password";
    include 'login.html';
    }
}
    echo  "invalid loginid";
    include 'login.html';
}
?>