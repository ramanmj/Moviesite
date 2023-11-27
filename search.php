<?php require 'header.php';?>
		<div class="products p-3 flex flex-wrap w-2/12">
<?php
	require "db.php";
	// if(isset($_GET['submit'])){
	
		$searchbar = $_GET['searchbar'];
		// echo var_dump($searchbar);
		// $searchbar = mysqli_real_escape_string($REQUEST['searchbar']);	
		$search="SELECT * FROM movies WHERE title like '%".$searchbar."%' ";
		$result =mysqli_query($connection,$search);
		
						
						if(mysqli_num_rows($result)>0 ){
							while($row=mysqli_fetch_assoc($result)){
								$data[]=$row;
							// echo var_dump($cdata);
							} 
							foreach ($data as $key) { 
			 ?>   
					<div class="tending-content ">
						<a href="http://localhost/6thsem/play.php?movieid=<?php echo $key['movieid'];?>"><img src="<?php echo $key['image'];?>"></a>
					</div>
					
				<?php }}?>
		</div>
	<?php require 'footer.php';?>