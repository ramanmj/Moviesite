<?php 
include 'header.php';
 ?>
 <div class="top text-white flex flex-wrap text-xl  pt-8 bg-primary" >
		<!-- <div>Top IMDB Rating</div> -->
		<div class="all-button border mr-3 rounded-md"><button>All</button></div>
		<div class="movies-button border mr-3 rounded-md"><button>Movies</button></div>
		<div class="tv-button border mr-3 rounded-md"><button>Tv shows</button></div>
	</div>
	<div class="top-content bg-primary">
		<div class="scam-cont  -mt-1">
		<div>
			<h1 class="text-white m-0 text-3xl p-3">Popular</h1>
		</div>
		
			<div class="popular ">
					<?php 
			include 'db.php';
			
				$asql="SELECT * FROM movies where moviegenres='".$_GET['genre']."'";
						$aresult=Mysqli_query($connection,$asql);
						if(mysqli_num_rows($aresult)>0 ){
							while($arow=mysqli_fetch_assoc($aresult)){
								$adata[]=$arow;
							// echo var_dump($cdata);
							} 
							foreach ($adata as $akey) { 
			 ?>   
					<div class="tending-content p-3">
						<a href="http://localhost/6thsem/play.php?movieid=<?php echo $akey['movieid'];?>"><img src="<?php echo $akey['image'];?>"></a>
					</div>
					
				<?php }}?>	
					
			
	</div>
	</div>
<?php include 'footer.php'; ?>