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
      <h2>Delete Report</h2>
      <form action="delete.inc.php" method="POST">
        <?php
        $report_id = $_REQUEST['report_id'];
        $sql = "SELECT * FROM report WHERE report_id=$pid";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        echo "<input type='text' placeholder='Report ID' name='report_id' value='{$row['report_id']}' readonly><br>";
        echo "<input type='date' placeholder='Date' name='nic' value='{$row['date']}' disabled><br>";
        echo "<input type='text' placeholder='Category' name='category' value='{$row['category']}' disabled><br>";
        echo "<input type='text' placeholder='Doctor ID' name='doctor_id' value='{$row['doctor_id']}' disabled>";
        echo "<input type='text' placeholder='Information' name='information' value='{$row['information']}' disabled>";
        echo "<button class='button' type='submit' name='delete'><b>Delete</b></button>";
        ?>
      </form>
      <button class="button" onclick="document.location='index.php'" )><b>Back</b></button>
    </div>
  </div>

</html>