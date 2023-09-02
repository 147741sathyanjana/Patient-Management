<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['add'])) {
  $patientId = mysqli_real_escape_string($conn, $_POST['patientId']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);

  createInPatient($conn, $patientId, $name);
  header("Location: index.php");
}
