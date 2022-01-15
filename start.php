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
    <input type="text" name="name" id="" placeholder="Enter your name" required>
    <label for="gr_size">Grid size:</label><br>
    <input type="number" min="2" max="5" name="gr_sz" id="" placeholder="Enter your preferred grid size" required>
    <br><br>
    <button name="start">Start</button><br><br>
  </form>
</body>
</html>