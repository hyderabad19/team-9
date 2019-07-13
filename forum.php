<?php
session_start();
if(isset($_POST["qs"]))
{
 $x=$_POST["qs"];
}
$conn = new mysqli("http://127.0.0.1:8088", "root", "","q");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="main.css"/>

</head>
<body>
<div class="md-form container ">
<div class="container"><?php echo $x ?></div>
<button class="button" onclick="$('#target').toggle();">
    Reply
</button>
<div id="target" style="display: none">
<form method="post" action="forum.php">
<textarea id="qs" name="qs" class="md-textarea form-control" rows="3"></textarea>
<br/>
<p class="submit"><input type="submit" name="commit" value="Submit"></p>
</form>
</div>
</div>
  