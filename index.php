<?php include 'header.php';?>
	
	<div class="slider h-180 ">
		<?php 
			include 'db.php';
			
				$slider="SELECT * FROM slider";
						$rslider=Mysqli_query($connection,$slider);
						if(mysqli_num_rows($rslider)>0 ){
							while($srow=mysqli_fetch_assoc($rslider)){
								$sdata[]=$srow;
							// echo var_dump($cdata);
							} 
							foreach ($sdata as $skey) { 
			 ?>   
		<a href="http://localhost/6thsem/play.php?movieid=<?php echo $skey['movieid'];?>"><div class="relative"><div class="bg-gradient-to-b from-transparent to-primary absolute left-0 top-0 bottom-0 right-0"></div><img src="<?php echo $skey['sliderimg'];?>">
			<div class="absolute top-96 text-white left-10">
				<div class="title text-5xl pb-5"><?php echo $skey['name'];?></div>

				<div class="info pb-5"><?php echo $skey['info'];?>
				<br>
					
			</div>
			<button class="rounded-md bg-white text-black p-1"> watch now</button>
		</div>
		</div></a>
		
			<?php }}?>
	</div>
	<div class="trending-cont bg-primary -mt-1">
		<div>
			<h1 class="text-white m-0 text-3xl p-3">Trending</h1>
		</div>

			<div class="trending ">
				<?php 
			include 'db.php';
			
				$sql="SELECT * FROM movies ORDER BY movieid ASC";
						$result=Mysqli_query($connection,$sql);
						if(mysqli_num_rows($result)>0 ){
							while($row=mysqli_fetch_assoc($result)){
								$data[]=$row;
							// echo var_dump($cdata);
							} 
							foreach ($data as $key) { 
			 ?>   
					<div class="tending-content p-3">
						<a href="http://localhost/6thsem/play.php?movieid=<?php echo $key['movieid'];?>"><img src="<?php echo $key['image'];?>"></a>
					</div>
				
				<?php }}?>	

			</div>
		
	</div>
	<div class="scam-cont bg-primary -mt-1">
		<div>
			<h1 class="text-white m-0 text-3xl p-3">Popular</h1>
		</div>
		
			<div class="popular ">
					<?php 
			include 'db.php';
			
				$asql="SELECT * FROM movies ORDER BY movieid DESC";
						$aresult=Mysqli_query($connection,$asql);
						if(mysqli_num_rows($aresult)>0 ){
							while($arow=mysqli_fetch_assoc($aresult)){
								$adata[]=$arow;
							// echo var_dump($cdata);
							} 
							foreach ($adata as $akey) { 
			 ?>   
					<div class="tending-content p-3">
						<a href="http://localhost/6thsem/play.php?movieid=<?php echo $key['movieid'];?>"><img src="<?php echo $akey['image'];?>"></a>
					</div>
					
				<?php }}?>	
					
			
	</div>
<?php include 'footer.php'; ?>