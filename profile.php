<?php include 'header.php'; ?>
<?php
var_dump($_POST);
include 'db.php';

if(isset($_POST['update'])){
	$error =[];
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
	var_dump($error);
			if(count($error) == 0){
					$change = "UPDATE user SET name= '".$_POST['name']."', email= '".$_POST['email']."', password='".$_POST['password']."'  WHERE userid = '".$_SESSION['userid']."'";
					$qchange = mysqli_query($connection,$change);
					if($qchange){
						echo "done";
					}
					else{
						die("$connection->connect_errno");
						}
			}

		}

	if(isset($_SESSION['userid'])){
				$sql=" SELECT * FROM user WHERE userid='".$_SESSION['userid']."'";
				$result =Mysqli_query($connection,$sql);
				$row =Mysqli_fetch_array($result);
				// echo var_dump($row);

				?>
	<div class="container w-8/12 text-white bg-dark mt-10 p-5 mb-10" >
		<div class="text-2xl">Upadate profile</div>
		<form method="post">
				<div class="flex flex-wrap">
					<div class="w-5/12 p-5">
					<label for="Name" class="block mb-2">Name</label>
					<input type="text" name="Name"  class="border border-solid border-gray-200 w-full text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none " placeholder="<?php echo $row['name'];?>"> 
					<?php if(isset($error['Name'])){ ?>
							<p> <?php echo $error['Name'];
							 ?></p>
						 <?php } ?>
				</div>
				<div  class="w-5/12 p-5">
					<label for="Email" class="block mb-2">email</label>
					<input type="text" name="email"  class="border border-solid border-gray-200 block text-base leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full" placeholder="<?php echo $row['email'];?>">
					<?php if(isset($error['email'])){ ?>
							<p> <?php echo $error['email'];
							 ?></p>
						 <?php } ?>
				</div >
				<div class="w-5/12 p-5">
					<label for="new-password" class="block mb-2">New Password</label>
					<input type="password" name="password"  class="border border-solid border-gray-200 block text-dark leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full" >	
					<?php if(isset($error['password'])){ ?>
							<p> <?php echo $error['password'];
							 ?></p>
						 <?php } ?>
				</div>
				<div class="w-5/12 p-5">
					<label for="new-confirm-password" class="block mb-2"> New Confirm Password</label>
					<input type="password" name="c-password"  class="border border-solid border-gray-200 block text-dark leading-normal p-2 rounded-md focus:border-gray-300 focus:outline-none w-full">

				</div>

			</div>
			<div class="pl-5"><button name="Update" class="update rounded-md bg-primary text-white px-8 py-2 border ">Save</button></div>
		</form>
	</div>

<?php 
}
include 'footer.php'; ?>