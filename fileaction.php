<?php  
$target_path = "docs\\";  
$target_path = $target_path.basename( $_FILES['file']['name']);   
  
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {  
	echo $target_path;
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
?>





<!--
$image=$request->file('image');
    $name=$request->name.'.'.$image->getClientOriginalExtension();
    $path='images/'.strtolower($request->type);
    $masterlist->url=$path.'/'.$name;
    $image->move($path,$name);

 $res=mysqli_query($conn,$query);
  while($row=mysqli_fetch_assoc($res))
  {
    echo "success" ;
  }





$result=mysqli_query($mysqli,$query);
  while($row=mysqli_fetch_array($result)){
     echo "PRODUCT ID ":$row['pid']  <br> .
         "PRODUCT NAME : $row['pname'] <br> ".
         "SHOP NAME : $row['sname'] <br> ".
         "COST : $row['cost']<br>".
         "BRANDv: $row['brand']<br>".
         "--------------------------------<br>";
		 }
         -->