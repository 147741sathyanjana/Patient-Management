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
      <h2>Insert Patient</h2>
      <form action="create.inc.php" method="POST">
        <input type="text" name="nic" placeholder="NIC" required>
        <br>
        <input type="radio" name="gender" value="male" checked />Male
        <input style="margin-left:10px;" type="radio" name="gender" value="female" />Female
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="disease" placeholder="Disease" required>
        <input type="text" onfocus="(this.type='date')" name="dob" placeholder="Date of Birth" required>
        <button class="button" type="submit" name="add"><b>Insert</b></button>
      </form>
      <button class="button" onclick="document.location='../index.php'" )><b>Back</b></button>
    </div>
  </div>

</html>