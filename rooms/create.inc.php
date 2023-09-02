<?php
include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (isset($_POST['add'])) {
  $room_no = mysqli_real_escape_string($conn, $_POST['room_no']);
  $room_type = mysqli_real_escape_string($conn, $_POST['room_type']);

  createRoom($conn, $room_no, $room_type);
  header("Location: index.php");
}
