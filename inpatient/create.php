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
      <h2>Insert In-Patient</h2>
      <form action="create.inc.php" method="POST">
        <input type="number" name="patientId" placeholder="Patient ID" required>
        <input type="text" name="name" placeholder="Name" required>
        <button class="button" type="submit" name="add"><b>Insert</b></button>
      </form>
      <button class="button" onclick="document.location='index.php'" )><b>Back</b></button>
      <?php
      if (!isset($_GET['create'])) {
        exit();
      } else {
        $pidCheck = $_GET['create'];
        if ($pidCheck == "invalidpid") {
          echo "<h4 class='error'>Patient not found.</h4>";
          exit();
        }
      }
      ?>
    </div>
  </div>

</html>