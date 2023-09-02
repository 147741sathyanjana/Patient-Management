<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['add'])) {
  $time = mysqli_real_escape_string($conn, $_POST['time']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);

  createAppointment($conn, $time, $date, $doctor_name, $address, $telephone, $name);
  header("Location: index.php");
}
