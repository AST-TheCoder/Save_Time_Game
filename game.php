<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="includes/style.css">
	<title>Save Time</title>
</head>
<body>

	<?php

		include 'config.php';

		$name=$_POST['name'];
		$gr_sz=$_POST['gr_sz'];
		$gr_sz=$gr_sz+1;
		$sz=$gr_sz*$gr_sz;

		mysqli_query($conn, "DELETE FROM info;");
		mysqli_query($conn, "DELETE FROM name;");
		mysqli_query($conn, "INSERT INTO name(name) VALUES('$name');");
		mysqli_query($conn, "DELETE FROM gr_sz;");
		mysqli_query($conn, "INSERT INTO gr_sz(gr_sz) VALUES('$gr_sz');");

		while($sz!=0){
			$sz=$sz-1;
			$r=rand(1,20);
			mysqli_query($conn, "INSERT INTO info(num) VALUES('$r');");
		}

	?>
	<h1>Save Time</h1>
	<table>
		<?php $vals = mysqli_query($conn, "SELECT * FROM info;");?>
		<?php for($i=1; $i<=$gr_sz; $i=$i+1){?>
			<tr>
				<?php for($j=1; $j<=$gr_sz; $j=$j+1){?>
					<td><div>
						<?php $val=mysqli_fetch_assoc($vals);?>
						<p style="padding-top: 30px"><?php echo $val['num'];?></p>
					</div></td>
				<?php }?>
			</tr>
		<?php }?>
	</table>
	<br>
	<form action="result.php" method="POST">
	    <label for="res"><?php echo $name?>, write your answer</label><br>
	    <input type="text" name="res" id="" placeholder="Enter your answer" required>
	    <br><br>
	    <button>Let's check!</button><br><br>
  	</form>
  	<?php header("refresh:300;url=timefail.php");?>
</body>
</html>
