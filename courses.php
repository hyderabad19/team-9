<?php
session_start();
$stuid=$_SESSION["stuid"];
echo($stuid);
$conn = new mysqli("localhost", "root", "","drreddy");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from course where course_id IN (select course_id from stu_sta_cou_bridge where stu_id=$stuid)";

$res=$conn->query($sql);

    while($row=$res->fetch_assoc())
    {
      echo "your course is ".$row['course_name'];
    }

   
  ?>    