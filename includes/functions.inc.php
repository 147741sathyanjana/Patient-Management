<?php
//login name/pwd exists
function nameExists($conn, $name, $pwd)
{
  $sql = "SELECT * FROM receptionist WHERE Name=? OR password=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?signup=stmterror");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $name, $pwd);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}

//receptionist
function createUser($conn, $name, $address, $age, $dob, $telephone, $nic, $pwd)
{
  $sql = "INSERT INTO receptionist (Name, Address, Age, DOB, Telephone, NIC, password) VALUES (?, ?, ?, ?, ?, ?, ?);";
  mysqli_query($conn, $sql);
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?signup=stmterror");
    exit();
  }
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  $age = (int)date("Y") - (int)substr($dob, 0, 4);

  mysqli_stmt_bind_param($stmt, "sssssss", $name, $address, $age, $dob, $telephone, $nic, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function pwdCheck($pwd, $rePwd)
{
  if ($pwd == $rePwd) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function pwdLength($pwd)
{

  if (strlen($pwd) > 4) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

//login
function loginUser($conn, $name, $pwd)
{

  $userExists = nameExists($conn, $name, $pwd);

  if (!$userExists) {
    header("Location: ../signin.php?signin=invalidname");
    exit();
  }

  $hashedPwd = $userExists["password"];
  $checkPwd = password_verify($pwd, $hashedPwd);

  if (!$checkPwd) {
    header("Location: ../signin.php?signin=incorrectpwd");
    exit();
  } elseif ($checkPwd) {
    sleep(1);
    session_start();
    $_SESSION["name"] = $userExists["Name"];
    $_SESSION["password"] = $userExists["password"];
    $uidSession = $userExists['Name'];
    header("Location: ../index.php");
    exit();
  }
}

//patient
function createPatient($con, $nic, $gender, $name, $address, $disease, $dob, $age)
{
  $sql = "INSERT INTO patient(nic, gender, name, address, age, disease, dob) VALUES('$nic', '$gender', '$name', '$address', '$age', '$disease', '$dob');";
  mysqli_query($con, $sql);
  $con->close();
}

function updatePatient($con, $pid, $nic, $gender, $name, $address, $disease, $dob, $age)
{
  $sql = "UPDATE patient SET nic='$nic', gender='$gender', name='$name', address='$address', age='$age', disease='$disease', dob='$dob' WHERE pid=$pid;";
  mysqli_query($con, $sql);
  $con->close();
}

function deletePatient($con, $pid)
{
  $sql = "DELETE FROM patient WHERE pid='$pid';";
  mysqli_query($con, $sql);
  $con->close();
}

//inpatient
function createInPatient($con, $patientId, $name)
{
  $sql = "SELECT pid FROM patient WHERE pid='$patientId';";
  $result = $con->query($sql);
  if ($result->num_rows == 0) {
    header("Location: create.php?create=invalidpid");
    exit();
  } else {
    $sql = "INSERT INTO inpatient(patient_id, name) VALUES('$patientId', '$name');";
    mysqli_query($con, $sql);
  }

  $con->close();
}

function deleteInPatient($con, $id)
{
  $sql = "DELETE FROM inpatient WHERE id='$id';";
  mysqli_query($con, $sql);
  $con->close();
}

//outpatient
function createOutPatient($con, $patientId, $date)
{
  $sql = "SELECT pid FROM patient WHERE pid='$patientId';";
  $result = $con->query($sql);
  if ($result->num_rows == 0) {
    header("Location: create.php?create=invalidpid");
    exit();
  } else {
    $sql = "INSERT INTO out_patient(patient_id, date) VALUES('$patientId', '$date');";
    mysqli_query($con, $sql);
  }

  $con->close();
}

//doctor
function createDoctor($con, $name, $nic)
{
  $sql = "INSERT INTO doctor(name, nic) VALUES('$name', '$nic');";
  mysqli_query($con, $sql);
  $con->close();
}

function updateDoctor($con, $doctor_id, $name, $nic)
{
  $sql = "UPDATE doctor SET nic='$nic', name='$name'WHERE doctor_id=$doctor_id;";
  mysqli_query($con, $sql);
  $con->close();
}

function deleteDoctor($con, $doctor_id)
{
  $sql = "DELETE FROM doctor WHERE doctor_id='$doctor_id';";
  mysqli_query($con, $sql);
  $con->close();
}

//appointment
function createAppointment($con, $time, $date, $doctor_name, $address, $telephone, $name)
{
  $sql = "INSERT INTO appointment(time, date, doctor_name, address, telephone, name) VALUES('$time', '$date', '$doctor_name', '$address', '$telephone', '$name');";
  mysqli_query($con, $sql);
  $con->close();
}

function updateAppointment($con, $aid, $time, $date, $doctor_name, $address, $telephone, $name)
{
  $sql = "UPDATE appointment SET time='$time', date='$date', doctor_name='$doctor_name', address='$address', telephone='$telephone', name='$name' WHERE aid=$aid;";
  mysqli_query($con, $sql);
  $con->close();
}

function deleteAppointment($con, $aid)
{
  $sql = "DELETE FROM appointment WHERE aid='$aid';";
  mysqli_query($con, $sql);
  $con->close();
}

//admission
function createAdmission($con, $name, $telephone, $patient_id, $date_of_admission, $date_of_discharge)
{
  $sql = "SELECT pid FROM patient WHERE pid='$patient_id';";
  $result = $con->query($sql);
  if ($result->num_rows == 0) {
    header("Location: create.php?create=invalidpid");
    exit();
  } else {
    $sql = "INSERT INTO admission(name, telephone, patient_id, date_of_admission, date_of_discharge) VALUES('$name', '$telephone', '$patient_id', '$date_of_admission', '$date_of_discharge');";
    mysqli_query($con, $sql);
  }
}

function updateAdmission($con, $custodian_ID, $name, $telephone, $patient_id, $date_of_admission, $date_of_discharge)
{
  $sql = "SELECT pid FROM patient WHERE pid='$patient_id';";
  $result = $con->query($sql);
  if ($result->num_rows == 0) {
    header("Location: update.php?update=invalidpid&custodian_ID=$custodian_ID");
    exit();
  } else {
    $sql = "UPDATE admission SET name='$name', datelephonete='$telephone', patient_id='$patient_id', date_of_admission='$date_of_admission', date_of_discharge='$date_of_discharge' WHERE custodian_ID=$custodian_ID;";
    mysqli_query($con, $sql);
    $con->close();
  }
}

//report
function createReport($con, $date, $category, $doctor_id, $information)
{
  $sql = "SELECT doctor_id FROM doctor WHERE doctor_id='$doctor_id';";
  $result = $con->query($sql);
  if ($result->num_rows == 0) {
    header("Location: create.php?create=invaliddocid");
    exit();
  } else {
    $sql = "INSERT INTO report(date, category, doctor_id, information) VALUES('$date', '$category', '$doctor_id', '$information');";
    mysqli_query($con, $sql);
    $con->close();
  }
}

function updateReport($con, $report_id, $date, $category, $doctor_id, $information)
{
  $sql = "SELECT doctor_id FROM doctor WHERE doctor_id='$doctor_id';";
  $result = $con->query($sql);
  if ($result->num_rows == 0) {
    header("Location: update.php?update=invaliddocid&report_id=$report_id");
    exit();
  } else {
    $sql = "UPDATE report SET date='$date', category='$category', doctor_id='$doctor_id', information='$information' WHERE report_id=$report_id;";
    mysqli_query($con, $sql);
    $con->close();
  }
}

function deleteReport($con, $report_id)
{
  $sql = "DELETE FROM report WHERE report_id='$report_id';";
  mysqli_query($con, $sql);
  $con->close();
}

//room
function createRoom($con, $room_no, $room_type)
{
  $sql = "SELECT room_no FROM room WHERE room_no='$room_no';";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    header("Location: create.php?create=roomexists");
    exit();
  } else {
    $sql = "INSERT INTO room(room_no, room_type) VALUES('$room_no', '$room_type');";
    mysqli_query($con, $sql);
    $con->close();
  }
}

function deleteRoom($con, $room_no)
{
  $sql = "DELETE FROM room WHERE room_no='$room_no';";
  mysqli_query($con, $sql);
  $con->close();
}

//bill
function createBill($con, $patient_id, $total_fee, $nursing_charges, $medicine_charges, $room_charges, $doctor_charges)
{
  $sql = "SELECT pid FROM patient WHERE pid='$patient_id';";
  $result = $con->query($sql);
  if ($result->num_rows == 0) {
    header("Location: create.php?create=invalidpid");
    exit();
  } else {
    $sql = "INSERT INTO bill(patient_id ,total_fee, nursing_charges, medicine_charges, room_charges, doctor_charges) VALUES('$patient_id' ,'$total_fee', '$nursing_charges', '$medicine_charges', '$room_charges', '$doctor_charges');";
    mysqli_query($con, $sql);
    $con->close();
  }
}

function deleteBill($con, $bill_id)
{
  $sql = "DELETE FROM bill WHERE bill_id='$bill_id';";
  mysqli_query($con, $sql);
  $con->close();
}