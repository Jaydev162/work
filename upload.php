<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<META http-equiv="X-UA-compatible" content="if_edge">
<meta name="viewpoint" content="width=device-width,initial-scale=1.0">
<title>document</title>
</head>
<body>
<form action="" method ="post" enctype="multiple/data">
 <input type="file" name="image">
 <br><br>
 <button type="submit" name="submit">submit</button>
</form>
<form><div>
<?php
include("bdconnection.php");
$res=mysqli_query($conn,"select * from images");
while($row=mysqli_fetch_assoc($res))
{ ?>
<img src="images/<?php echo $row['file']?>">
<?php } ?>
</div>
</form>
</body>
</html>
<?php
 include("bdconnection.php"); 
 if(isset($_POST['submit']))
 {
	 $file_name=$_FILES["image"]['name'];
	 $tempname=$_FILES['images']['tempname'];
	 $folder="images/".$file_name;
	
   $query=mysqli_query($conn,"insert into images(file)values('$file_name')");

  if(move_uploaded_file($tempname,$folder))
  {echo "upload successfully";
  }
  else
  {
	  echo "not uploaded";
  }
 }
?>