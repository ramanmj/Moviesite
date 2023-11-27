<?php include 'header.php';?>
	<main>
		<div class="container center">
			<table class="border-2		border-collapse	">
				<?php
				include '../db.php';
						$sql="SELECT * FROM movies";
						$result=Mysqli_query($connection,$sql);
						if(mysqli_num_rows($result)>0 ){
							while($row=mysqli_fetch_assoc($result)){
								$data[]=$row;
							// echo var_dump($cdata);
							} 
							foreach ($data as $key) { ?>
				<tr class="p-2 ">
					<td class="px-20 bg-orange"><?php echo $key['title'];?></td>
					<td class="px-20 bg-gold"><?php echo $key['movieid'];?></td>
					<td class="px-10"><button class="rounded-md bg-primary text-white px-8 py-2">edit</button></td>
					<td ><a href="http://localhost/6thsem/dashboard/edit.php?movieid=<?php echo $key['movieid'];?>"><button class="rounded-md bg-error text-white px-8 py-2">delete</button></a></td>
					
				</tr>
				<?php }}?>
			</table>
		</div>
	</main>
</body>
</html>