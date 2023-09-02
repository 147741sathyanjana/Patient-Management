<?php
session_start();

include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (!isset($_SESSION["name"])) {
  header("Location: ../signin.php");
  die();
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Patient Management System</title>
  <link rel="stylesheet" href="../css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <div class="center">
    <div style="width:300px; display: table">
      <h2>Insert Room</h2>
      <form action="create.inc.php" method="POST">
        <input type="number" name="room_no" placeholder="Room No" required><br>
        <input type="text" name="room_type" placeholder="Room Type" required>
        <button class="button" type="submit" name="add"><b>Insert</b></button>
      </form>
      <button class="button" onclick="document.location='index.php'" )><b>Back</b></button>

      <?php
      if (!isset($_GET['create'])) {
        exit();
      } else {
        $roomCheck = $_GET['create'];
        if ($roomCheck == "roomexists") {
          echo "<h4 class='error'>Room No Exists.</h4>";
          exit();
        }
      }
      ?>
    </div>
  </div>

</html>