<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['update'])) {
  $aid = mysqli_real_escape_string($conn, $_POST['aid']);
  $time = mysqli_real_escape_string($conn, $_POST['time']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);

  updateAppointment($conn, $aid, $time, $date, $doctor_name, $address, $telephone, $name);
  header("Location: index.php");
}
