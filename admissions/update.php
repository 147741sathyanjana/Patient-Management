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
      <h2>Update Admission</h2>
      <form action="update.inc.php" method="POST">
        <?php
        $custodian_ID = $_REQUEST['custodian_ID'];
        $sql = "SELECT * FROM admission WHERE custodian_ID=$custodian_ID";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);

        echo "<input type='text' placeholder='Custodian ID' name='custodian_ID' value='{$row['custodian_ID']}' readonly><br>";
        echo "<input type='text' placeholder='Name' name='name' value='{$row['name']}' required><br>";
        echo "<input type='text' placeholder='Telephone' name='telephone' value='{$row['telephone']}' required><br>";
        echo "<input type='text' placeholder='Patient ID' name='patient_id' value='{$row['patient_id']}' required><br>";
        echo "<input type='date' placeholder='Date of Admission' name='date_of_admission' value='{$row['date_of_admission']}' required>";
        echo "<input type='date' placeholder='Date of Discharge' name='date_of_discharge' value='{$row['date_of_discharge']}'>";
        echo "<button class='button' type='submit' name='update'><b>Update</b></button>";
        ?>
      </form>
      <button class="button" onclick="document.location='index.php'" )><b>Back</b></button>
      <?php
      if (!isset($_GET['update'])) {
        exit();
      } else {
        $pidCheck = $_GET['update'];
        if ($pidCheck == "invalidpid") {
          echo "<h4 class='error'>Patient not found.</h4>";
          exit();
        }
      }
      ?>
    </div>
  </div>

</html>