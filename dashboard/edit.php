<?php include 'header.php'; ?>
<?php 
	include "../db.php";
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
				$target_dir="../movies/";
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
				$folder ="../images/".$imgfilename;
		move_uploaded_file($imgtempname,$folder);
			// header('location:index.php');
			// exit;
				if(!empty($_POST['genre'])) {
					$arr=$_POST['genre'];
					var_dump($_POST['genre']);
		         // foreach($arr as $value){
		            $sqlcheck="INSERT INTO moviegenres (movieid,genreid) values ('".$_GET['movieid']."','".$arr."')";
		            $sqlcheckresult=mysqli_query($connection,$sqlcheck); 
		            if ($sqlcheckresult){	
						echo "uloaded";
				
						} else {
							die("register failed $connection->error");
					
						}
		       			 // }

		    }
		
			if(count($err)==0){
				$sql="UPDATE  movies SET title='".$name."',video='".$target_file."',info='".$info."',director='".$director."',duration='".$duration."',image='".$folder."' WHERE movieid='".$_GET['movieid']."' ";
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
			<?php
				include '../db.php';
						$sql="SELECT * FROM movies where movieid='".$_GET['movieid']."'";
						$result=Mysqli_query($connection,$sql);
						$row=Mysqli_fetch_array($result);
						// var_dump($row);
						// if(mysqli_num_rows($result)>0 ){
						// 	while($row=mysqli_fetch_array($result)){
						// 		$data[]=$row;
						// 	// echo var_dump($cdata);
						// 	} 
						// 	foreach ($data as $key) {
							 ?>
		<div>
			<label>description for movie</label>
			<input type="text" name="info" class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full" placeholder="<?php echo $row['info'] ?>">
			<?php if(isset($err['info'])){ ?>
				<p> <?php echo $err['info'];
				 ?></p>
			 <?php } ?>
		</div>
		<div>
			<label class="block mb-2">director</label>
			<input type="text" name="director"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full" placeholder="<?php echo $row['director'] ?>">
			<?php if(isset($err['director'])){ ?>
				<p> <?php echo $err['director'];
				 ?></p>
			 <?php } ?>
		</div>
		<div>
			<label class="block mb-2">image</label>
			<input type="file" name="image"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full" >
		</div>
		<div>
			<label class="block mb-2">duration</label>
			<input type="text" name="duration"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full" placeholder="<?php echo $row['duration'] ?>">
			<?php if(isset($err['duration'])){ ?>
				<p> <?php echo $err['duration'];
				 ?></p>
			 <?php } ?>
		</div>
		<div>
			<label class="block mb-2">movie</label>
			<input type="file" name="file"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
			
		</div>
	<?php ?>
		<?php include'../db.php';?>

		<div class="checkbox">
				<?php
					$gen="SELECT * FROM genres";
					$rgen=Mysqli_query($connection,$gen);
					if(mysqli_num_rows($rgen)>0 ){
						while($rrow=mysqli_fetch_assoc($rgen)){
							$rdata[]=$rrow;
							// echo var_dump($cdata);
						} 
						foreach ($rdata as $rkey) { ?>
				<input type="checkbox" id="vehicle1" class="p-2" name="genre" value="<?php echo $rkey['genreid'];?>">
	  			<label for="genre"><?php echo $rkey['genre']; ?></label>
	  		<?php }}?>
		</div>
		<div><button name="submit" class="rounded-md bg-primary text-white px-8 py-2">Submit</button></div>
	</form>
	</div>
</body>
</html>