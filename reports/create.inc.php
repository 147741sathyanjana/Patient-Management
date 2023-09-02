<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['add'])) {
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $doctor_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
  $information = mysqli_real_escape_string($conn, $_POST['information']);

  createReport($conn, $date, $category, $doctor_id, $information);
  header("Location: index.php");
}
