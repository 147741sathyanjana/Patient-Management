<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['add'])) {
  $patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
  $total_fee = mysqli_real_escape_string($conn, $_POST['total_fee']);
  $nursing_charges = mysqli_real_escape_string($conn, $_POST['nursing_charges']);
  $medicine_charges = mysqli_real_escape_string($conn, $_POST['medicine_charges']);
  $room_charges = mysqli_real_escape_string($conn, $_POST['room_charges']);
  $doctor_charges = mysqli_real_escape_string($conn, $_POST['doctor_charges']);

  createBill($conn, $patient_id, $total_fee, $nursing_charges, $medicine_charges, $room_charges, $doctor_charges);
  header("Location: index.php");
}
