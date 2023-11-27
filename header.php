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
<body>

	<header class=" py-6  bg-black md:bg-primary text-white pt-15 h-23">
		<div class="container flex flex-wrap">
			<div class="flex logo w-2/12">
				logo<i class="far fa-arrow-circle-left"></i>
			</div>
			<div class="flex-1 nav w-5/12">
					<ul class="flex mx-3">
							<li class="px-6"><a href="index.php">Home</a></li>
							<li class="gen px-6"><a href="genre.php">Genre</a>
								<div class="genre  absolute hidden w-2/3 -mt-5" >
						<ul class="flex flex-wrap">
							<li><a href="http://localhost/6thsem/genre.php?genre=action">Action</a></li>
							<li><a href="http://localhost/6thsem/genre.php?genre=animation">Animation</a></li>
							<li><a href="http://localhost/6thsem/genre.php?genre=documentry">Docunentry</a></li>
							<li><a href="http://localhost/6thsem/genre.php?genre=comedy">Conedy</a></li>
						
							<li><a href="http://localhost/6thsem/genre.php?genre=crime">Crime</a></li>
							<li><a href="http://localhost/6thsem/genre.php?genre=fantacy">Fantacy</a></li>
							<li><a href="http://localhost/6thsem/genre.php?genre=drama">Drama</a></li>
							<li><a href="http://localhost/6thsem/genre.php?genre=music">Music</a></li>
							<li><a href="http://localhost/6thsem/genre.php?genre=family">Family</a></li>
							<li><a href="http://localhost/6thsem/genre.php?genre=kids">Kids</a></li>
							<li><a href="http://localhost/6thsem/genre.php?genre=history">History</a></li>
						</ul>
					</div></li>
							<li class=" px-6"><a href="list.php">Movies</a></li>
							<li class="px-6"><a href="list.php">TV shows</a></li>
							<li class="px-6"><a href="list.php">Top IMDB</a></li>
					</ul> 
				
			</div>
			<div class="flex search w-3/12">
				 	<div class="relative">
				 		<form action="search.php" method="get">
				 			<input type="search" name="searchbar"  class=" bg-transparent border rounded-md text-base leading-normal py-1 px-4 " placeholder="search">
						<button class="absolute right-2 top-1/2 transform -translate-y-1/2"><i class="fas fa-search pt-1"></i></button>
				 		</form>
				 	</div>

			</div>
			<?php 
			session_start();
				if(empty($_SESSION['email'])){
					?>
					<div class="flex login w-2/12">
					<a href="login.php"><button>Login</button></a>
			</div>
			<?php
				}else{
				?>
					<div class="flex login w-2/12 relative profile ">
					<a href="login.php">profile</a>
					<div class="fav absolute hidden rounded-md">
						<div class="pb-2"><a href="profile.php">profile</a></div>
						<div class="pb-2"><a href="favortie.php">favorite</a></div>
						<div class="text-error"><a href="logout.php">logout</a></div>
					</div>
			</div>
				<?php
				}
			
			?>
		</div>
	</header>