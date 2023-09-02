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
      <h2>Delete In-Patient</h2>
      <form action="delete.inc.php" method="POST">
        <?php
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM inpatient WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);

        echo "<input type='text' placeholder='id' name='id' value='{$row['id']}' readonly><br>";
        echo "<input type='text' placeholder='Patient ID' name='patient_id' value='{$row['patient_id']}' disabled><br>";
        echo "<input type='text' placeholder='Name' name='name' value='{$row['name']}' disabled><br>";
        echo "<button class='button' type='submit' name='delete'><b>Delete</b></button>";
        ?>
      </form>
      <button class="button" onclick="document.location='index.php'" )><b>Back</b></button>
    </div>
  </div>

</html>