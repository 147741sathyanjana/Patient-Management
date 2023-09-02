<?php
session_start();

include '../includes/functions.inc.php';
include '../includes/dbh.inc.php';

if (!isset($_SESSION["name"])) {
  header("Location: signin.php");
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
        <a href="" class="active">Receptionists</a>
        <a href="../reports/">Reports</a>
        <a href="../bills/">Bills</a>
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
      <h2 style="margin-right: 20px;">Receptionists</h2>
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
            echo "<th><a class='sort' href='?table=receptionists&order=receptionistID&sort=$sort'>Receptionist ID</a></th>";
            echo "<th><a class='sort' href='?table=receptionists&order=Name&sort=$sort'>Name</a></th>";
            echo "<th><a class='sort' href='?table=receptionists&order=Address&sort=$sort'>Address</a></th>";
            echo "<th><a class='sort' href='?table=receptionists&order=Age&sort=$sort'>Age</a></th>";
            echo "<th><a class='sort' href='?table=receptionists&order=DOB&sort=$sort'>DOB</a></th>";
            echo "<th><a class='sort' href='?table=receptionists&order=Telephone&sort=$sort'>Telephone</a></th>";
            echo "<th><a class='sort' href='?table=receptionists&order=NIC&sort=$sort'>NIC</a></th>";
            echo "</strong>";
            ?>
          </strong>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM receptionist;";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
          echo '<tr><td colspan="10">No Rows Returned</td></tr>';
        } else {
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>{$row['receptionistID']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Address']}</td>
                <td>{$row['Age']}</td>
                <td>{$row['DOB']}</td>
                <td>{$row['Telephone']}</td>
                <td>{$row['NIC']}</td>
              </tr>";
          }
        }
        if (isset($_GET['order']) && $result->num_rows == 0) {
          $order = $_GET['order'];
          $sql = "SELECT * FROM receptionist ORDER BY $order $sort";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>