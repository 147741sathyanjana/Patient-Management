<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['delete'])) {
  $bill_id = mysqli_real_escape_string($conn, $_POST['bill_id']);

  deleteBill($conn, $bill_id);
  header("Location: index.php");
}
