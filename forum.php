<?php
session_start();

$conn = new mysqli("localhost", "root", "","drreddy");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$questions=[];
$answers=[];
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
 $q1='select * from forum';
 $res=$conn->query($q1);
  

while($r=$res->fetch_assoc())
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
    $answers=[];
    $endj=0;
    
    if (!empty($questions[$j]))
    {
        
        echo($ids[$j]);
        $q2="select * from answer where qid='$ids[$j]'";
        $res1=$conn->query($q2);
        $l=0;
        while($r1=$res1->fetch_assoc())
        {
           $answers[$k]=$r1["ans"];
           $k++;
        }
        
        $endj=$k;
        
    ?>
<div class="md-form container ">
    <div class="container"><?php echo $questions[$j] ?></div>
        <?php
        while($l<$endj)
        {
        if (!empty($answers[$l]))
        {
        ?>
            <div class="container"><?php echo $answers[$l] ?></div>
        <?php
        }
        $l++;
        }
        ?>
        <button class="button" onclick="$('#target').toggle();">
            Reply
        </button>
        <div id="target" style="display: none">
            <form method="post">
            <textarea id="qs" name="answer" class="md-textarea form-control" rows="3"></textarea>
            <br/>
            <p class="submit"><input type="submit" name="submit" value="Submit"></p>
            </form>
        </div>
</div>
</div>

   <?php
    if(isset($_POST['submit']))
    {
       $ans=$_POST["answer"];
       $sql = "insert into answer(qid,ans) values('$ids[$j]','$ans')";
       $res2=$conn->query($sql);
       header("location:forum.php");
    }
     }
     

    $j++;
    }

  ?>
             
 