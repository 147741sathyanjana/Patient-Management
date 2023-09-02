<?php

include 'dbh.inc.php';
include 'functions.inc.php';

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $pwd = $_POST['pwd'];

  loginUser($conn, $name, $pwd);
} else {
  header("Location: ../signin.php");
  exit();
}
