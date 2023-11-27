 <?php include 'header.php';?>

 	<div class="container m-10">
 		<div class="text-2xl p-5">My favorite</div>
 		<div class="fav  flex flex-wrap ">
			<?php 
			include 'db.php';
			
				$asql="SELECT movies.image, wishlist.movieid,wishlist.userid FROM wishlist INNER JOIN movies ON movies.movieid = wishlist.movieid where userid='".$_SESSION['userid']."'";
						$aresult=Mysqli_query($connection,$asql);
						if(mysqli_num_rows($aresult)>0 ){
							while($arow=mysqli_fetch_assoc($aresult)){
								$adata[]=$arow;
							// echo var_dump($cdata);
							} 
							foreach ($adata as $akey) { 
			 ?>   
			
					<div class="tending-content w-2/10 p-3 relative ">
						<a href="http://localhost/6thsem/play.php?movieid=<?php echo $akey['movieid'];?>"><img src="<?php echo $akey['image'];?>"></a>
						<form action=""  method="post">
							<button name="cross" class="bg-error p-1 px-2.5 rounded-full absolute right-5 top-5"><i class="fas fa-times"></i></button>
						</form>
					</div>
					
				<?php }}?>
				 <?php 
			 	if(isset($_POST['cross'])){
			 		$sql="DELETE FROM wishlist WHERE movieid='".$akey['movieid']."' AND userid='".$_SESSION['userid']."' ";
			 		$result=Mysqli_query($connection,$sql);
			 	}

			 ?>
		</div>
 	</div>
 <?php include 'footer.php'; ?>