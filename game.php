<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="includes/style.css">
	<title>Save Time</title>
</head>
<body>

	<?php

		$_SESSION['name']=$_POST['name'];
		$_SESSION['gr_sz']=$_POST['gr_sz'];
		$gr_sz=$_SESSION['gr_sz'];
		$_SESSION['gr_sz']=$_SESSION['gr_sz']+1;
		$name=$_SESSION['name'];
		$gr_sz=$gr_sz+1;
		$sz=$gr_sz*$gr_sz;
		$j=0;

		while($sz!=0){
			$sz=$sz-1;
			$r=rand(1,20);
			$_SESSION['vals'][$j]=$r;
			$j=$j+1;
		}

	?>
	<h1>Save Time</h1>
	<table>
		<?php for($i=1; $i<=$gr_sz; $i=$i+1){?>
			<tr>
				<?php for($j=1; $j<=$gr_sz; $j=$j+1){?>
					<td><div>
						<?php $node=($i-1)*$gr_sz+$j-1; ?>
						<?php $val=$_SESSION['vals'][$node];?>
						<p style="padding-top: 30px"><?php echo $val;?></p>
					</div></td>
				<?php }?>
			</tr>
		<?php }?>
	</table>
	<br>
	<form action="result.php" method="POST">
	    <label for="res"><?php echo $name?>, write your answer (L, R, U or D)</label><br>
	    <input type="text" name="res" id="" placeholder="Enter your answer" pattern="[LRUD]{1,}" required>
	    <br><br>
	    <button>Let's check!</button><br><br>
  	</form>
  	<?php header("refresh:300;url=timefail.php");?>
</body>
</html>