<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/tailwind.js"></script>
	<script type="text/javascript" src="js/tailwind.config.js"></script>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<title>login</title>
</head>
<?php 
	session_start();
	echo var_dump($_SESSION);
	include 'db.php';
		$err =[];
		if(isset($_POST['submit'])){
			if(empty($_POST['email']) || empty($_POST['password'] )){
				$err['email']="enter email and password";
			}else{
				$sql = "SELECT * from user where email ='".$_POST['email']."' AND password = '".$_POST['password']."'"  ;
				$result = mysqli_query($connection,$sql);
				$row = mysqli_fetch_array($result);
				if(is_array($row)){
					
						$_SESSION['userid']=$row['userid'];
						$_SESSION['email']=$row['email'];
						$_SESSION['name']=$row['name'];

					header("location:index.php");
					
				}else{
					$err['email']="invalid email or password";
					}
				}
			}

?>
<body>
	<div class="container py-10"> 
		<div class="md:w-8/12 lg:w-6/12 mx-auto border border-solid border-gray-200 shadow-md rounded-md px-6 pb-6 overflow-hidden">
			<div class="py-4 px-6 mb-6 -mx-6 bg-gray-500 text-white">
				Login form
			</div>
			<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div class="mb-6">
					<label class="block mb-2" for="email">Email</label>
					<input type="text" name="email" class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
				</div>
				<div class="mb-6">
					<label class="block mb-2" for="password">Password</label>
					<input type="text" name="password" class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">
				</div>
				<button class="rounded-md bg-primary text-white px-8 py-2" name="submit">Login</button>
			</form>
			<div class="pt-6"><a href="forgot.html" class="pr-2 underline text-sm">Forgot password?</a> <a href="register.php" class="pr-2 underline text-sm">Register</a></div>
		</div>
	</div>
</body>
</html>