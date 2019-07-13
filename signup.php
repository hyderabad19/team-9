<?php
$conn = new mysqli("localhost", "root", "","drreddy");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name=$_POST["name"];
$phno=$_POST["phno"];
$dob=$_POST["dob"];
$addres=$_POST["address"];
$password=$_POST["password"];
$skills=$_POST["skills"];
$username=$_POST["username"];
$conn = new mysqli("localhost", "root", "","drreddy");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "insert into student(stu_name,addr,phno,dob,skills,user_name,password) values('$name','$addres','$phno','$dob','$skills','$username','$password')";

$res=$conn->query($sql);
header("location:login.html");

?>