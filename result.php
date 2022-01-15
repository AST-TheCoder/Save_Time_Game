<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="includes/style.css">
	<title>Save Time</title>
</head>
<body>
	<?php include 'config.php';?>
  	<?php $sizes = mysqli_query($conn, "SELECT * FROM gr_sz;");?>
  	<?php $size=mysqli_fetch_assoc($sizes);?>
  	<?php $gr_sz=$size['gr_sz'];?>
	<?php $vals = mysqli_query($conn, "SELECT * FROM info;");?>
	<?php
		$cnt=0;
		while($chk=mysqli_fetch_assoc($vals)){
			$val[$cnt]=$chk['num'];
			$dis[$cnt]=100000000000000;
			$cnt=$cnt+1;
		}
		$dis[0]=$val[0];
		$vis[0]=0;
		$sz=$gr_sz*$gr_sz;
		$s=1;
		for($i=0;$i<$s;$i=$i+1){
			$u=$vis[$i];

			$v=$u+1;
			if($v>=0 && $v<$sz && $v%$gr_sz!=0 && $dis[$u]+$val[$v]<$dis[$v]){
				$dis[$v]=$dis[$u]+$val[$v];
				$vis[$s]=$v;
				$par[$v]=$u;
				$s=$s+1;
			}

			$v=$u-1;
			if($v>=0 && $v<$sz && $u%$gr_sz!=0 && $dis[$u]+$val[$v]<$dis[$v]){
				$dis[$v]=$dis[$u]+$val[$v];
				$vis[$s]=$v;
				$par[$v]=$u;
				$s=$s+1;
			}

			$v=$u+$gr_sz;
			if($v>=0 && $v<$sz && $dis[$u]+$val[$v]<$dis[$v]){
				$dis[$v]=$dis[$u]+$val[$v];
				$vis[$s]=$v;
				$par[$v]=$u;
				$s=$s+1;
			}

			$v=$u-$gr_sz;
			if($v>=0 && $v<$sz && $dis[$u]+$val[$v]<$dis[$v]){
				$dis[$v]=$dis[$u]+$val[$v];
				$vis[$s]=$v;
				$par[$v]=$u;
				$s=$s+1;
			}
		}
		$res=$_POST['res'];
		$sum=$val[0];
		$len=strlen($res);
		$u=0;
		for($i=0;$i<$len;$i=$i+1){
			if($res[$i]!='L' && $res[$i]!='R' && $res[$i]!='D' && $res[$i]!='U'){
				$sum=0;
				break;
			}

			if($res[$i]=='U'){
				$v=$u-$gr_sz;
				$p[$u]=1;
				$p[$v]=1;
				if($v<0 || $v>=$sz){
					$sum=0;
					break;
				}
				$u=$v;
				$sum=$sum+$val[$v];
			}

			if($res[$i]=='D'){
				$v=$u+$gr_sz;
				$p[$u]=1;
				$p[$v]=1;
				if($v<0 || $v>=$sz){
					$sum=0;
					break;
				}
				$u=$v;
				$sum=$sum+$val[$v];
			}

			if($res[$i]=='R'){
				$v=$u+1;
				$p[$u]=1;
				$p[$v]=1;
				if($v<0 || $v>=$sz || $v%$gr_sz==0){
					$sum=0;
					break;
				}
				$u=$v;
				$sum=$sum+$val[$v];
			}

			if($res[$i]=='L'){
				$v=$u-1;
				$p[$u]=1;
				$p[$v]=1;
				if($v<0 || $v>=$sz || $u%$gr_sz==0){
					$sum=0;
					break;
				}
				$u=$v;
				$sum=$sum+$val[$v];
			}
		}
		if($sum!=$dis[$sz-1]){
			for($i=0;$i<$sz;$i=$i+1){
				$p[$i]=0;
			}
			for($u=$sz-1;$u>0;$u=$par[$u]){
				$v=$par[$u];
				if($v+1==$u){
					$path.="R";
				}
				if($v-1==$u){
					$path.="L";
				}
				if($v+$gr_sz==$u){
					$path.="D";
				}
				if($v-$gr_sz==$u){
					$path.="U";
				}
				$p[$v]=1;
				$p[$u]=1;
			}
			$path=strrev($path);
		}
	?>
	<h1>Save Time</h1>
	<table>
		<?php $vals = mysqli_query($conn, "SELECT * FROM info;");?>
		<?php for($i=1; $i<=$gr_sz; $i=$i+1){?>
			<tr>
				<?php for($j=1; $j<=$gr_sz; $j=$j+1){?>
					<td>
						<?php $val=mysqli_fetch_assoc($vals);?>
						<?php if($p[($i-1)*$gr_sz+$j-1]!=1){?>
							<div>
								<p style="padding-top: 30px"><?php echo $val['num'];?></p>
							</div>
						<?php }?>
						<?php if($p[($i-1)*$gr_sz+$j-1]==1){?>
							<div style="background-color: darkgreen;">
								<p style="padding-top: 30px"><?php echo $val['num'];?></p>
							</div>
						<?php }?>
					</td>
				<?php }?>
			</tr>
		<?php }?>
	</table>
	<br>
	<?php $names = mysqli_query($conn, "SELECT * FROM name;");?>
  	<?php $name=mysqli_fetch_assoc($names);?>
	<form action="start.php" method="POST">
		<?php if($sum==$dis[$sz-1]){?>
	    	<label for="resume">Great <?php echo $name['name'];?>, Your prediction is right.</label><br>
	    <?php }?>
		<?php if($sum!=$dis[$sz-1]){?>
	    	<label for="resume">Sorry <?php echo $name['name'];?>, Your prediction is Wrong.</label><br>
	    	<label for="resume">One of the optimal paths is <?php echo $path;?>.</label><br>
	    <?php }?>
	    <br><br>
	    <button name="resume">Play again!</button><br><br>
  	</form>
</body>
</html>