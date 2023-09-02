<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['update'])) {
  $doctor_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $nic = mysqli_real_escape_string($conn, $_POST['nic']);

  updateDoctor($conn, $doctor_id, $name, $nic);
  header("Location: index.php");
}
