<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['update'])) {
  $custodian_ID = mysqli_real_escape_string($conn, $_POST['custodian_ID']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
  $patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
  $date_of_admission = mysqli_real_escape_string($conn, $_POST['date_of_admission']);
  $date_of_discharge = mysqli_real_escape_string($conn, $_POST['date_of_discharge']);

  updateAdmission($conn, $custodian_ID, $name, $telephone, $patient_id, $date_of_admission, $date_of_discharge);
  header("Location: index.php");
}
