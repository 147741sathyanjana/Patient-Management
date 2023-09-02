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
        <a href="../bills/">Bills</a>
        <a href="../rooms/">Rooms</a>
        <a href="../admissions/">Admissions</a>
        <a href="../appointments/">Appointments</a>
        <a href="" class="active">Doctors</a>
        <a href="../outpatient/">Out Patients</a>
        <a href="../inpatient/">In Patients</a>
        <a href="../">Patients</a>
      </div>
    </div>
  </div>

  <div>
    <div class="horizontalContainer">
      <h2 style="margin-right: 20px;">Doctors</h2>
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
            echo "<th><a class='sort' href='?table=doctor&order=doctor_id&sort=$sort'>Doctor ID</a></th>";
            echo "<th><a class='sort' href='?table=doctor&order=name&sort=$sort'>Name</a></th>";
            echo "<th><a class='sort' href='?table=doctor&order=nic&sort=$sort'>NIC</a></th>";
            echo "</strong>";
            ?>
            <th>Update</th>
            <th>Delete</th>
          </strong>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM doctor;";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
          echo '<tr><td colspan="10">No Rows Returned</td></tr>';
        } else {
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>{$row['doctor_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['nic']}</td>
                <td>
                <form action='update.php?doctor_id={$row['doctor_id']}' method='POST'>
                <button class='button2'><strong>Update</strong></button>
                </form>
                </td>
                <td>
                <form action='delete.php?doctor_id={$row['doctor_id']}' method='POST'>
                <button class='button2'><strong>Delete</strong></button>
                </form>
                </td>
              </tr>
              ";
          }
        }
        if (isset($_GET['order']) && $result->num_rows == 0) {
          $order = $_GET['order'];
          $sql = "SELECT * FROM doctor ORDER BY $order $sort";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>