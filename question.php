<?php
    $conn = new mysqli("localhost", "root", "","drreddy");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $question=$_POST["qs"];
    $stuid=$_SESSION["stuid"];
    $sql = "insert into forum(stu_id,status,question) values('',0,'$question')";
    $res=$conn->query($sql);
    header("location:index.php");    
    ?>      