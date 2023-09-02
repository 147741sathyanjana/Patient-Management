<?php
session_start();

include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (!isset($_SESSION["name"])) {
  header("Location: ../signin.php");
  die();
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Patient Management System</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="navBar">
    <div class="navBar-centered">
      <div class="navBar-centered">
        <a href="../includes/logout.inc.php">Log out</a>
        <a href="../receptionists/">Receptionists</a>
        <a href="../reports/">Reports</a>
        <a href="" class="active">Bills</a>
        <a href="../rooms/">Rooms</a>
        <a href="../admissions/">Admissions</a>
        <a href="../appointments/">Appointments</a>
        <a href="../doctors/">Doctors</a>
        <a href="../outpatient/">Out Patients</a>
        <a href="../inpatient/">In Patients</a>
        <a href="../">Patients</a>
      </div>
    </div>
  </div>

  <div>
    <div class="horizontalContainer">
      <h2 style="margin-right: 20px;">Bills</h2>
      <form action='create.php' method='POST'>
        <button name='add' class='addBtn'><strong>+</strong></button>
      </form>
    </div>

    <table>
      <thead>
        <tr>
          <strong>
            <?php
            if (isset($_GET['sort'])) {
              $sort = $_GET['sort'];
            } else {
              $sort = 'ASC';
            }
            $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
            echo "<strong>";
            echo "<th><a class='sort' href='?table=bill&order=bill_id&sort=$sort'>Bill ID</a></th>";
            echo "<th><a class='sort' href='?table=bill&order=patient_id&sort=$sort'>Patient ID</a></th>";
            echo "<th><a class='sort' href='?table=bill&order=total_fee&sort=$sort'>Total Fee</a></th>";
            echo "<th><a class='sort' href='?table=bill&order=nursing_charges&sort=$sort'>Nursing Charges</a></th>";
            echo "<th><a class='sort' href='?table=bill&order=medicine_charges&sort=$sort'>Medicine Charges</a></th>";
            echo "<th><a class='sort' href='?table=bill&order=room_charges&sort=$sort'>Room Charges</a></th>";
            echo "<th><a class='sort' href='?table=bill&order=doctor_charges&sort=$sort'>Doctor Charges</a></th>";
            echo "</strong>";
            ?>
            <th>Delete</th>
          </strong>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM bill;";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
          echo '<tr><td colspan="10">No Rows Returned</td></tr>';
        } else {
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>{$row['bill_id']}</td>
                <td>{$row['patient_id']}</td>
                <td>{$row['total_fee']}</td>
                <td>{$row['nursing_charges']}</td>
                <td>{$row['medicine_charges']}</td>
                <td>{$row['room_charges']}</td>
                <td>{$row['doctor_charges']}</td>
                <td>
                <form action='delete.php?bill_id={$row['bill_id']}' method='POST'>
                <button class='button2'><strong>Delete</strong></button>
                </form>
                </td>
              </tr>";
          }
        }
        if (isset($_GET['order']) && $result->num_rows == 0) {
          $order = $_GET['order'];
          $sql = "SELECT * FROM bill ORDER BY $order $sort";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>