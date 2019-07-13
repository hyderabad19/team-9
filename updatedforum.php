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
$questions=[];
$ids=[];
$i=0;
$j=0;
$k=0;
$end=0;

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
 <?php
 $q1=mysqli_query($connection,'select * from questions'); 
 
while($r=mysqli_fetch_array($q1))
{
   $questions[$i]=$r["question"];
   $ids[$i]=$r["qid"];
   $i++;
}
$end=$i;

?>

<div class="container">
   <?php                            
   $j=0;
    while($j<$end)
    {
    $endj=0;
    if (!empty($question))
    {
        $q2=mysqli_query($connection,'select * from answers where qid='); 
        $l=0;
        while($r1=mysqli_fetch_array($q2))
        {
           $answers[$k]=$r1["answer"];
           $k++;
        }
        $endj=$k;

    ?>
<div class="md-form container ">
    <div class="container"><?php echo $question[$j] ?></div>
        <?php
        while($l<$endj)
        {
        if (!empty($answer))
        {
        ?>
            <div class="container"><?php echo $answer[$l] ?></div>
        <?php
        }
        $l++;
        }
        ?>
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
</div>

   <?php
   
     }
    $j++;
    }
  ?>
             
 

  
