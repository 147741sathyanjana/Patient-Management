<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['delete'])) {
  $rid = mysqli_real_escape_string($conn, $_POST['report_id']);

  deleteReport($conn, $rid);
  header("Location: index.php");
}
