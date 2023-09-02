<?php
include '../includes/dbh.inc.php';
include '../includes/functions.inc.php';

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
  $nic = mysqli_real_escape_string($conn, $_POST['nic']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  $rePwd = mysqli_real_escape_string($conn, $_POST['rePwd']);
  $age = (int)date("Y") - (int)substr($dob, 0, 4);

  if (!pwdLength($pwd)) {
    header("Location: index.php?signup=passwordlengthinvalid&name=$name&address=$address&dob=$dob&telephone=$telephone&nic=$nic");
    exit();
  }
  if (!pwdCheck($pwd, $rePwd)) {
    header("Location: index.php?signup=passwordmismatch&name=$name&address=$address&dob=$dob&telephone=$telephone&nic=$nic");
    exit();
  }
  createUser($conn, $name, $address, $age, $dob, $telephone, $nic, $pwd);
  header("Location: index.php");
  exit();
}
