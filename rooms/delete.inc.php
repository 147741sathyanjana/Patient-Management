<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['delete'])) {
  $room_no = mysqli_real_escape_string($conn, $_POST['room_no']);

  deleteRoom($conn, $room_no);
  header("Location: index.php");
}