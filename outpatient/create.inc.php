<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['add'])) {
  $patientId = mysqli_real_escape_string($conn, $_POST['patientId']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);

  createOutPatient($conn, $patientId, $date);
  header("Location: index.php");
}
