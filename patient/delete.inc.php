<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['delete'])) {
  $pid = mysqli_real_escape_string($conn, $_POST['pid']);

  deletePatient($conn, $pid);
  header("Location: ../index.php");
}
