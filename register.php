<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<script type="text/javascript" src="js/tailwind.js"></script>
	<script type="text/javascript" src="js/tailwind.config.js"></script>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<title>register</title>
</head>
<?php 
 include 'db.php';
 
 
 session_start();
 $error =[];
 
 if(isset($_POST['submit'])){
 	if(isset($_POST['Name'])){
		$name=$_POST['Name'];
		$_SESSION['Name']=$_POST['Name'];
	}elseif(empty($_POST['Name'])){
		$error['Name'] = "enter Name";
	}
 	if(empty($_POST['email'])){
		$error['email']="enter email";
	}elseif (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $_POST['email'])){
		$email=$_POST['email'];
		$_SESSION['email']=$_POST['email'];
	}else{
		$error['email']="enter pattern dosent match";
	}
	if(empty($_POST['password'])){
		$error['password']="enter password";
	} 
	if($_POST['c-password'] != $_POST['password']){
		$error['re-password']="password dosen't match";
	}else{
		$password=$_POST['password'];
		$_SESSION['password']=$_POST['password'];
	}
	if(!isset($_POST['gender'])){
		$error['gender']="select  gender";
	}else{
		$gender= $_POST['gender'];
		$_SESSION['gender']=$_POST['gender'];
	}	
	if(count($error) == 0){
			$sql="INSERT INTO user (name,email,password,gender) values ('$name','$email','$password','$gender')";
			$result = mysqli_query($connection,$sql);
			if ($result){	
				header("location:index.php");
				
			} else {
				die("register failed $connection->error");
				
			}
		
			//connection close
			$connection->close();
			}
 }

?>
<body>	
	<div class="container py-10">
		<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			
			<div class="md:w-8/12 lg:w-6/12 mx-auto border border-solid border-gray-200 shadow-md rounded-md px-6 pb-6 overflow-hidden">
				<div class="py-4 px-6 mb-6 -mx-6 bg-gray-500 text-white">
				Register form
			</div>
				<div >
					<label for="Name" class="block mb-2">Name</label>
					<input type="text" name="Name"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
					<?php if(isset($error['Name'])){ ?>
							<p> <?php echo $error['Name'];
							 ?></p>
						 <?php } ?>
				</div>
				<div>
					<label for="email" class="block mb-2">Email</label>
					<input type="text" name="email"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
					<?php if(isset($error['email'])){ ?>
							<p> <?php echo $error['email'];
							 ?></p>
						 <?php } ?>
				</div>
				<div>
					<label for="password" class="block mb-2">Password</label>
					<input type="password" name="password"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
				</div>
				<div>
					<label for="confirm-password" class="block mb-2">Confirm Password</label>
					<input type="password" name="c-password"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
					<?php if(isset($error['password'])){ ?>
							<p> <?php echo $error['password'];
							 ?></p>
						 <?php } ?>
				</div>
				<div class="py-2">
					<label for="email" class="mb-2">Gender</label>
					<input type="radio" name="gender" value="male"> 
					<input type="radio" name="gender" value="female">
					<?php if(isset($error['gender'])){ ?>
							<p> <?php echo $error['gender'];
							 ?></p>
						 <?php } ?>
				</div>
				<button name="submit" class="rounded-md bg-primary text-white px-8 py-2">Login</button>
			<div class="pt-6"><a href="login.php" class="pr-2 underline text-sm">Sign up</a></div>
		</form>
	</div>
	</div>
</body>
</html>