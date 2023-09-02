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
        <a href="" class="active">Appointments</a>
        <a href="../doctors/">Doctors</a>
        <a href="../outpatient/">Out Patients</a>
        <a href="../inpatient/">In Patients</a>
        <a href="../">Patients</a>
      </div>
    </div>
  </div>

  <div>
    <div class="horizontalContainer">
      <h2 style="margin-right: 20px;">Appointments</h2>
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
            echo "<th><a class='sort' href='?table=appointment&order=aid&sort=$sort'>Appointment ID</a></th>";
            echo "<th><a class='sort' href='?table=appointment&order=time&sort=$sort'>Time</a></th>";
            echo "<th><a class='sort' href='?table=appointment&order=date&sort=$sort'>Date</a></th>";
            echo "<th><a class='sort' href='?table=appointment&order=doctor_name&sort=$sort'>Doctor Name</a></th>";
            echo "<th><a class='sort' href='?table=appointment&order=address&sort=$sort'>Address</a></th>";
            echo "<th><a class='sort' href='?table=appointment&order=telephone&sort=$sort'>Telephone</a></th>";
            echo "<th><a class='sort' href='?table=appointment&order=name&sort=$sort'>Name</a></th>";
            echo "</strong>";
            ?>
            <th>Update</th>
            <th>Delete</th>
          </strong>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM appointment;";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
          echo '<tr><td colspan="10">No Rows Returned</td></tr>';
        } else {
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>{$row['aid']}</td>
                <td>{$row['time']}</td>
                <td>{$row['date']}</td>
                <td>{$row['doctor_name']}</td>
                <td>{$row['address']}</td>
                <td>{$row['telephone']}</td>
                <td>{$row['name']}</td>
                <td>
                <form action='update.php?aid={$row['aid']}' method='POST'>
                <button class='button2'><strong>Update</strong></button>
                </form>
                </td>
                <td>
                <form action='delete.php?aid={$row['aid']}' method='POST'>
                <button class='button2'><strong>Delete</strong></button>
                </form>
                </td>
              </tr>";
          }
        }
        if (isset($_GET['order']) && $result->num_rows == 0) {
          $order = $_GET['order'];
          $sql = "SELECT * FROM appointment ORDER BY $order $sort";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>