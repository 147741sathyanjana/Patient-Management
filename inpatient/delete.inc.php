<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['delete'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);

  deleteInPatient($conn, $id);
  header("Location: index.php");
}
