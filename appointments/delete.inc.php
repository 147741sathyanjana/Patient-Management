<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['delete'])) {
  $aid = mysqli_real_escape_string($conn, $_POST['aid']);

  deleteAppointment($conn, $aid);
  header("Location: index.php");
}
