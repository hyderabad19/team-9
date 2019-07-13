<?php
session_start();
$staid=$_SESSION["staid"];
$conn = new mysqli("localhost", "root", "","drreddy");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from course where course_id IN (select course_id from sta_cou_bridge where sta_id=$staid)";

$res=$conn->query($sql);

    while($row=$res->fetch_assoc())
    {
      echo "courses are ".$row['course_name'];
      
    }

   
  ?>   