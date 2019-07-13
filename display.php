<?php
$dir = "docs\\";

// Sort in ascending order - this is default
$a = scandir($dir);

// Sort in descending order
$b = scandir($dir,1);
foreach($a as $i)
{
if($i== '.' || $i== '..')
continue;
echo "<a href='$dir$i'>$i</a><br>";
}
?>