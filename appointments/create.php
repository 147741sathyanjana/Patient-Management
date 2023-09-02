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
      <h2>Insert Appointment</h2>
      <form action="create.inc.php" method="POST">
        <input type="text" onfocus="(this.type='time')" name="time" placeholder="Time" required>
        <input type="text" onfocus="(this.type='date')" name="date" placeholder="Date" required>
        <input type="text" name="doctor_name" placeholder="Doctor Name" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="telephone" placeholder="Telephone" required>
        <input type="text" name="name" placeholder="Name" required>
        <button class="button" type="submit" name="add"><b>Insert</b></button>
      </form>
      <button class="button" onclick="document.location='index.php'" )><b>Back</b></button>
    </div>
  </div>

</html>