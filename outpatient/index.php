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
      <a href="../includes/logout.inc.php">Log out</a>
      <a href="../receptionists/">Receptionists</a>
      <a href="../reports/">Reports</a>
      <a href="../bills/">Bills</a>
      <a href="../rooms/">Rooms</a>
      <a href="../admissions/">Admissions</a>
      <a href="../appointments/">Appointments</a>
      <a href="../doctors/">Doctors</a>
      <a href="" class="active">Out Patients</a>
      <a href="../inpatient/">In Patients</a>
      <a href="../">Patients</a>
    </div>
  </div>

  <div>
    <div class="horizontalContainer">
      <h2 style="margin-right: 20px;">Out-Patients</h2>
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
            echo "<th><a class='sort' href='?table=outpatient&order=id&sort=$sort'>ID</a></th>";
            echo "<th><a class='sort' href='?table=outpatient&order=pid&sort=$sort'>Patient ID</a></th>";
            echo "<th><a class='sort' href='?table=outpatient&order=date&sort=$sort'>Date</a></th>";
            echo "</strong>";
            ?>
          </strong>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM out_patient;";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
          echo '<tr><td colspan="10">No Rows Returned</td></tr>';
        } else {
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>{$row['id']}</td>
                <td>{$row['patient_id']}</td>
                <td>{$row['date']}</td>
              </tr>";
          }
        }
        if (isset($_GET['order']) && $result->num_rows == 0) {
          $order = $_GET['order'];
          $sql = "SELECT * FROM outpatient ORDER BY $order $sort";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>