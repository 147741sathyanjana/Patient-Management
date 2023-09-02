<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['update'])) {
  $pid = mysqli_real_escape_string($conn, $_POST['pid']);
  $nic = mysqli_real_escape_string($conn, $_POST['nic']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $disease = mysqli_real_escape_string($conn, $_POST['disease']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $age = (int)date("Y") - (int)substr($dob, 0, 4);

  updatePatient($conn, $pid, $nic, $gender, $name, $address, $disease, $dob, $age);
  header("Location: ../index.php");
}
