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
</head>

<body>
  <div class="center">
    <div style="width:250px; display: table">
      <h2>Insert Receptionist</h2>
      <form action="create.inc.php" method="POST">
        <?php
        if (isset($_GET['name'])) {
          $name = $_GET['name'];
          echo '<input type="text" name="name" placeholder="Name" value="' . $name . '" required>';
        } else {
          echo '<input type="text" name="name" placeholder="Name" required>';
        }
        if (isset($_GET['address'])) {
          $address = $_GET['address'];
          echo '<input type="text" name="address" placeholder="Address"  value="' . $address . '" required>';
        } else {
          echo '<input type="text" name="address" placeholder="Address" required>';
        }
        if (isset($_GET['dob'])) {
          $dob = $_GET['dob'];
          echo '<input type="date" name="dob" placeholder="Date of Birth"  value="' . $dob . '" required>';
        } else {
          echo '<input type="date" name="dob" placeholder="Date of Birth" required>';
        }

        if (isset($_GET['telephone'])) {
          $telephone = $_GET['telephone'];
          echo '<input type="text" name="telephone" placeholder="Telephone"  value="' . $telephone . '" required>';
        } else {
          echo '<input type="text" name="telephone" placeholder="Telephone" required>';
        }
        if (isset($_GET['nic'])) {
          $nic = $_GET['nic'];
          echo '<input type="text" name="nic" placeholder="NIC"  value="' . $nic . '" required>';
        } else {
          echo '<input type="text" name="nic" placeholder="NIC" required>';
        }
        ?>
        <input type="password" name="pwd" placeholder="Password" required>
        <br>
        <input type="password" name="rePwd" placeholder="Re-type Password" required>
        <br>
        <button type="submit" class="button" name="submit"><b>Sign Up</b></button>
      </form>
      <button class='button' onclick="document.location='index.php'" )><b>Back</b></button>

      <?php
      if (!isset($_GET['signup'])) {
        exit();
      } else {
        $signupCheck = $_GET['signup'];
        if ($signupCheck == "char") {
          echo "<h4 class='error'>Invalid characters found.</h4>";
          exit();
        } elseif ($signupCheck == "name") {
          echo "<h4 class='error'>Invalid name entered.</h4>";
          exit();
        } elseif ($signupCheck == "passwordlengthinvalid") {
          echo "<h4 class='error'>Please enter a password containing more than 4 characters.</h4>";
          exit();
        } elseif ($signupCheck == "passwordmismatch") {
          echo "<h4 class='error'>Passwords don't match.</h4>";
          exit();
        }
      }
      ?>
    </div>
  </div>

</html>