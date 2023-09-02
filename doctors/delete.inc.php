<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['delete'])) {
  $doctor_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);

  deleteDoctor($conn, $doctor_id);
  header("Location: index.php");
}
