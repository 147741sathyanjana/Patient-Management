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
      <h2>Delete Bill</h2>
      <form action="delete.inc.php" method="POST">
        <?php
        $bill_id = $_REQUEST['bill_id'];
        $sql = "SELECT * FROM bill WHERE bill_id=$bill_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        echo "<input type='text' placeholder='bill id' name='bill_id' value='{$row['bill_id']}' readonly><br>";
        echo "<input type='text' placeholder='patient id' name='patient_id' value='{$row['patient_id']}' disabled><br>";
        echo "<input type='text' placeholder='total fee' name='total_fee' value='{$row['total_fee']}' disabled><br>";
        echo "<input type='text' placeholder='nursing_charges' name='nursing_charges' value='{$row['nursing_charges']}' disabled>";
        echo "<input type='text' placeholder='medicine_charges' name='medicine_charges' value='{$row['medicine_charges']}' disabled>";
        echo "<input type='text' placeholder='room_charges' name='room_charges' value='{$row['room_charges']}' disabled>";
        echo "<input type='text' placeholder='doctor_charges' name='doctor_charges' value='{$row['doctor_charges']}' disabled>";
        echo "<button class='button' type='submit' name='delete'><b>Delete</b></button>";
        ?>
      </form>
      <button class="button" onclick="document.location='index.php'" )><b>Back</b></button>
    </div>
  </div>

</html>