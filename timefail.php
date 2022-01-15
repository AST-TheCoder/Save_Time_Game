<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="includes/style.css">
  <title>Time Fail</title>
</head>
<body>
  <?php include 'config.php';?>
  <?php $names = mysqli_query($conn, "SELECT * FROM name;");?>
  <?php $name=mysqli_fetch_assoc($names);?>
  <form action="start.php" method="POST">
    <h1>Save Time</h1><br>
    <label for="resume">Sorry <?php echo $name['name'];?>, Your time is finished.</label><br>
    <br><br>
    <button name="resume">Play again!</button><br><br>
  </form>
</body>
</html>