<?php include'db.php';?>

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
			<input type="checkbox" id="vehicle1" class="p-2" name="movies" value="<?php echo $rkey['genre'];?>">
  			<label for="vehicle1"><?php echo $rkey['genre']; ?></label>
  		<?php }}?>
		</div>