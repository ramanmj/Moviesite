<?php include 'header.php' ?>
<?php 
	include "../db.php";
	$err=[];
	var_dump($_POST);
	if(isset($_POST['submit'])){
		if(empty($_POST['name'])){
			$err['name']="enter name";
		}else{
			$name=$_POST['name'];
		}
		if(empty($_POST['info'])){
			$err['info']="enter info";
		}else{
			$info=$_POST['info'];
		}
		var_dump($_FILES);
		$imgfilename =$_FILES["sliderimg"]["name"];
			$imgtempname =$_FILES["sliderimg"]["tmp_name"];
				$folder ="../images/".$imgfilename;
				$location="images".$imgfilename;
		move_uploaded_file($imgtempname,$folder);
			// header('location:index.php');

		if(count($err)==0){
			$sql="INSERT INTO slider (movieid,sliderimg,info,name) values ('".$_POST['movieid']."','".$location."','".$info."','".$name."') ";
			$result=Mysqli_query($connection,$sql);
			if($result){
				echo "done";
			}
		}
	}
?>
<div class="cover w-6/12 mx-auto">
	<form method="post" enctype="multipart/form-data">
	<div class="name">
		<label for="name">Name</label>
		<input type="text" name="name" class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
		<?php if(isset($err['name'])){ ?>
				<p> <?php echo $err['name'];
				 ?></p>
			 <?php } ?>

	</div>
	<div class="info">
		<label for="info">Information</label>
		<input type="text" name="info" class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
		<?php if(isset($err['info'])){ ?>
				<p> <?php echo $err['info'];
				 ?></p>
			 <?php } ?>

	</div>
	<div class="sliderimg">
		<label for="sliderimg">sliderimg</label>
		<input type="file" name="sliderimg" class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
		<?php if(isset($err['sliderimg'])){ ?>
				<p> <?php echo $err['sliderimg'];
				 ?></p>
			 <?php } ?>

	</div>
	<div class="movieid">
		<label for="movieid">movieid</label>
		<input type="number" name="movieid" class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
		<?php if(isset($err['movieid'])){ ?>
				<p> <?php echo $err['movieid'];
				 ?></p>
			 <?php } ?>
	</div>
	<div class="aru">
		<button class="border bg-primary text-white p-3 rounded-md" name="submit">add</button>
	</div>
</form>
</div>