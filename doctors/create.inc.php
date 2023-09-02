<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['add'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $nic = mysqli_real_escape_string($conn, $_POST['nic']);

  createDoctor($conn, $name, $nic);
  header("Location: index.php");
}
