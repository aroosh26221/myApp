<div align="center">
<?php
$conn=new PDO("mysql:host=localhost;dbname=image","root","");	
	if(isset($_POST['sub']))
	{$image=$_FILES['image'];
	$path="images/". $image['name'];
	move_uploaded_file($image['tmp_name'],$path);
	 $userName=$_POST['userName'];
	 $photo=$image['name'];
	$ins="insert into img (name,image) value('$userName','$photo')";
	$q=$conn->query($ins);
	header("location:image.php");}?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method="post" enctype="multipart/form-data">
<input type="file" name="image"><br><br>
<input type="text" name="userName"><br>
<input type="submit" name="sub" value="add"><br><br>
<table border="2" cellspacing="0">
	<tr>
		<td>id</td>
		<td>Name</td>
		<td>Photo</td>
	</tr>
	<?php
	$sel="select *from img";
	$se=$conn->query($sel);
	while($row=$se->fetch(PDO::FETCH_ASSOC)){?>
	<tr><td><?php echo $row['id']?></td>
		<td><?php echo $row['name']?></td>
		<td><img width="30%" src="images/<?php echo $row['image']?>"></td>
	</tr>
	<?php	
	}?>

</body>
</html>