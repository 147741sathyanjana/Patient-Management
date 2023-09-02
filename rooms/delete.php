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
      <h2>Delete Room</h2>
      <form action="delete.inc.php" method="POST">
        <?php
        $room_no = $_REQUEST['room_no'];
        $sql = "SELECT * FROM room WHERE room_no=$room_no";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        echo "<input type='number' placeholder='room no' name='room_no' value='{$row['room_no']}' readonly><br>";
        echo "<input type='text' placeholder='room_type' name='nic' value='{$row['room_type']}' disabled><br>";

        echo "<button class='button' type='submit' name='delete'><b>Delete</b></button>";
        ?>
      </form>
      <button class="button" onclick="document.location='index.php'" )><b>Back</b></button>
    </div>
  </div>

</html>