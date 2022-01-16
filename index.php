<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="includes/style.css">
	<title>Save Time</title>
</head>
<body>
	<form action="start.php">
		<h1>Save Time</h1>
		<p style="color: darkblue;text-shadow: 1px 1px 5px grey;">This is the game of searching the shortest route from source to destination.</p>
		<h4 style="color: darkblue;text-shadow: 1px 1px 5px grey;">Rules of the game:</h4>
		<p style="color: darkblue;text-shadow: 1px 1px 5px grey;">You are given a NxN grid. Now you are at top-left cell. You have to go from top-left to bottom-right cell.<br>Each cell takes a time written on it. You have to minimize total time.<br>You will be given 5 minutes. You have to define the path by L, R, U & D.<br>&emsp;&emsp;L -> Go left from the current cell.<br>&emsp;&emsp;R -> Go right from the current cell.<br>&emsp;&emsp;U -> Go up from the current cell.<br>&emsp;&emsp;D -> Go down from the current cell.<br>Suppose, your answer is "RDDRUL". That means you will go Right, Down, Down, Right, Up & Left.<br>If you cross the border or can't reach to the destination, you will lose.</p>
		<button>Proceed</button>
	</form>
</body>
</html>
