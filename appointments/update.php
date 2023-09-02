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
      <h2>Update Appointment</h2>
      <form action="update.inc.php" method="POST">
        <?php
        $aid = $_REQUEST['aid'];
        $sql = "SELECT * FROM appointment WHERE aid=$aid";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        mysqli_close($conn);
        echo "<input type='text' placeholder='aid' name='aid' value='{$row['aid']}' readonly><br>";
        echo "<input type='time' placeholder='Time' name='time' value='{$row['time']}' required><br>";
        echo "<input type='date' placeholder='Date' name='date' value='{$row['date']}' required><br>";
        echo "<input type='text' placeholder='Doctor Name' name='doctor_name' value='{$row['doctor_name']}' required><br>";
        echo "<input type='text' placeholder='Address' name='address' value='{$row['address']}' required>";
        echo "<input type='text' placeholder='Telephone' name='telephone' value='{$row['telephone']}' required>";
        echo "<input type='text' placeholder='Name' name='name' value='{$row['name']}' required>";
        echo "<button class='button' type='submit' name='update'><b>Update</b></button>";
        ?>
      </form>
      <button class="button" onclick="document.location='index.php'" )><b>Back</b></button>
    </div>
  </div>

</html>