<?php include 'header.php';
 include 'db.php';
	$sql="SELECT * FROM movies where movieid='".$_GET['movieid']."'";
	$result=Mysqli_query($connection,$sql); 
	if(mysqli_num_rows($result)>0 ){
			$row=mysqli_fetch_array($result);
				// $data[]=$row;
				// echo var_dump($cdata);
			
			
?>

<div class="frame container ">
	<div class="mx-auto bg-blue h-96 ">

		<video class="video" controls>
 		<source src="<?php echo $row['video']?>" type="video/mp4">
		Your browser does not support the video tag.

		</video>
</div>
</div>
<div class="description flex flex-wrap">
	<div class="w-2/12 p-10"><img src="<?php echo $row['image']?>"></div>
	<div class="flex flex-wrap w-8/12 p-10">

		<div><?php echo $row['title']?></div><br>
		<div><?php echo $row['info']?></div>

	</div>
	<div class="w-2/12 p-10 text-white rounded-md">
		<?php 
			$pull="SELECT * FROM wishlist where movieid='".$_GET['movieid']."' AND userid='".$_SESSION['userid']."'";
			$insert=Mysqli_query($connection,$pull);
			if(mysqli_num_rows($insert)==0){
		?>
		<?php 

	if(isset($_POST['submit'])){
		$send="INSERT INTO wishlist (movieid,userid) values('".$_GET['movieid']."','".$_SESSION['userid']."')";
		$res=Mysqli_query($connection,$send);
	}
?>
		<form method="post">
			<button class="bg-dark  p-2 rounded-md" name="submit">add to favorite</button>
		</form>
	<?php }else{?>
		<?php
		if(isset($_POST['submit'])){
		$send="DELETE FROM wishlist WHERE movieid='".$_GET['movieid']."' AND userid='".$_SESSION['userid']."'";
		$res=Mysqli_query($connection,$send);
	}
?>
		<form method="post" http-equiv='refresh'>
			<button class="bg-error  p-2 rounded-md" name="submit">remove from favorite</button>
		</form>
	</div>
</div>
<?php }}?>

