<?php include 'db.php';
	$sql="SELECT * FROM movies where movieid =9";
	$result =Mysqli_query($connection,$sql);
	$row =Mysqli_fetch_array($result);
	
var_dump($row);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<img src="<?php echo $row['image']?>">
	<video width="320" height="240" controls>
 		<source src="<?php echo $row['video']?>" type="video/mp4">
		Your browser does not support the video tag.

</video>
<form>
	<?php
	$gen="SELECT * FROM genres";
	$rgen=Mysqli_query($connection,$gen);
				if(mysqli_num_rows($rgen)>0 ){
							while($rrow=mysqli_fetch_assoc($rgen)){
								$rdata[]=$rrow;
								// echo var_dump($cdata);
							} 
							foreach ($rdata as $rkey) { ?>
							<tr>
								<td><?php echo $rkey['genre']?></td>
								<td><?php echo $rkey['genreid']?></td>
								<?php 
								 
								?>
							</tr>
							<?php  
								// echo var_dump($ckey);	
									}
								}
							?>
</form>
</body>
</html>