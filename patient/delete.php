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
    <div style='width:300px; display: table'>
      <h2>Delete Patient</h2>
      <form action="delete.inc.php" method="POST">
        <?php
        $pid = $_REQUEST['pid'];
        $sql = "SELECT * FROM patient WHERE pid=$pid";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        echo "<input type='text' placeholder='pid' name='pid' value='{$row['pid']}' readonly><br>";
        echo "<input type='text' placeholder='NIC' name='nic' value='{$row['nic']}' disabled><br>";
        $gender = $row['gender'];
        if ($gender === "male") {
          echo "<input type='radio' name='gender' value='male' checked disabled/>Male";
          echo "<input style='margin-left:10px;' type='radio' name='gender' value='female' disabled/>Female";
        } else if ($gender === "female") {
          echo "<input type='radio' name='gender' value='male' disabled/>Male";
          echo "<input style='margin-left:10px;' type='radio' name='gender' value='female' checked disabled/>Female<br>";
        }
        echo "<input type='text' placeholder='Name' name='name' value='{$row['name']}' disabled><br>";
        echo "<input type='text' placeholder='Address' name='address' value='{$row['address']}' disabled>";
        echo "<input type='text' placeholder='Disease' name='disease' value='{$row['Disease']}' disabled>";
        echo "<input type='date' placeholder='Date' name='dob' value='{$row['dob']}' disabled>";
        echo "<button class='button' type='submit' name='delete'><b>Delete</b></button>";
        ?>
      </form>
      <button class="button" onclick="document.location='../index.php'" )><b>Back</b></button>
    </div>
  </div>

</html>