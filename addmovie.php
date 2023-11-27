<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<script src="https://kit.fontawesome.com/1e29f16d53.js" crossorigin="anonymous"></script>
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/tailwind.js"></script>
	<script type="text/javascript" src="js/tailwind.config.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
	<title></title>
	<script src="js/main.js" type="text/javascript">
		
	
  
  </script>
</head>
<?php 
	include "db.php";
	// var_dump($_FILES);
	
	
		if(isset($_POST['submit'])){
			$err=[];
			if(empty($_POST['info'])){
				$err['info']="enter info";
			}else{
				$info=$_POST['info'];
			}
			if(empty($_POST['director'])){
				$err['director']="enter director";
			}else{
				$director=$_POST['director'];
			}
			if(empty($_POST['duration'])){
				$err['duration']="enter duration";
			}else{
				$duration=$_POST['duration'];
			}
			// var_dump($err);
			// video upload
			$maxsize=6000000000;
			if(isset($_FILES['file']['name']) && $_FILES['file']['name'] !=''){
				$name=$_FILES['file']['name'];
				$target_dir="movies/";
				$target_file=$target_dir.$name;
				$extention= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$extention_arr=array("mp4","avi","3gp","mov","mpeg");
				if(in_array($extention, $extention_arr)){
					if($_FILES['file']['size'] >=$maxsize){
						$_SESSION['message']='file too large';
					}else{
						if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
							// $sql="INSERT INTO movies (title,video) values ('".$name."','".$target_file."')";
							$_SESSION['message']='';
							// 	mysqli_query($connection,$sql); 
							// 	$_SESSION['message']="file successfully uploaded";
						}
					}
				}else{
					$_SESSION['message']='Please select a valid file';
				}
			}else{
				$_SESSION['message']='Please select a file';
			}
			$imgfilename =$_FILES["image"]["name"];
			$imgtempname =$_FILES["image"]["tmp_name"];
				$folder ="images/".$imgfilename;
		move_uploaded_file($imgtempname,$folder);
			// header('location:index.php');
			// exit;
		
			if(count($err)==0){
				$sql="INSERT INTO movies (title,video,info,director,duration,image) values ('".$name."','".$target_file."','".$info."','".$director."','".$duration."','".$folder."')";
				$result= mysqli_query($connection,$sql); 
				if ($result){	
				echo "uloaded";
				
				} else {
					die("register failed $connection->error");
					
				}
				//connection close
				$connection->close();
								
				}
		}
		if(isset($_SESSION['message'])){
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}


	?>
<body>
	
	<div class="container w-2/4">
		<form method="post"  enctype="multipart/form-data">
		<div>
			<label>description for movie</label>
			<input type="text" name="info" class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
			<?php if(isset($err['info'])){ ?>
				<p> <?php echo $err['info'];
				 ?></p>
			 <?php } ?>
		</div>
		<div>
			<label class="block mb-2">director</label>
			<input type="text" name="director"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
			<?php if(isset($err['director'])){ ?>
				<p> <?php echo $err['director'];
				 ?></p>
			 <?php } ?>
		</div>
		<div>
			<label class="block mb-2">image</label>
			<input type="file" name="image"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
		</div>
		<div>
			<label class="block mb-2">duration</label>
			<input type="text" name="duration"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
			<?php if(isset($err['duration'])){ ?>
				<p> <?php echo $err['duration'];
				 ?></p>
			 <?php } ?>
		</div>
		<div>
			<label class="block mb-2">movie</label>
			<input type="file" name="file"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
			
		</div>
		
		<div><button name="submit" class="rounded-md bg-primary text-white px-8 py-2">Submit</button></div>
	</form>
	</div>
</body>
</html>