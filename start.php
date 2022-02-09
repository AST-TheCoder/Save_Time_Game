<?php session_start();
  $name=$_SESSION['name'];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="includes/style.css">
  <title>User Info</title>
</head>
<body>
  <form action="game.php" method="POST">
    <h1>Save Time</h1><br>
    <label for="name">Name:</label><br>
    <input type="text" name="name" id="" placeholder="Enter your name" value="<?php echo $name?>" required>
    <label for="gr_size">Level (1 to 4):</label><br>
    <input type="number" min="1" max="4" name="gr_sz" id="" placeholder="Enter your preferred level" required>
    <br><br>
    <button name="start">Start</button><br><br>
  </form>
</body>
</html>
