<?php
session_start();

include 'includes/functions.inc.php';
include 'includes/dbh.inc.php';

if (!isset($_SESSION["name"])) {
  header("Location: signin.php");
  die();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Patient Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="navBar">
        <div class="navBar-centered">
            <div class="navBar-centered">
                <a href="includes/logout.inc.php">Log out</a>
                <a href="receptionists/">Receptionists</a>
                <a href="reports/">Reports</a>
                <a href="bills/">Bills</a>
                <a href="rooms/">Rooms</a>
                <a href="admissions/">Admissions</a>
                <a href="appointments/">Appointments</a>
                <a href="doctors/">Doctors</a>
                <a href="outpatient/">Out Patients</a>
                <a href="inpatient/">In Patients</a>
                <a href="" class="active">Patients</a>
            </div>
        </div>
    </div>

    <div>
        <div class="horizontalContainer">
            <h2 style="margin-right: 20px;">Patients</h2>
            <form action='patient/create.php' method='POST'>
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
            echo "<th><a class='sort' href='?table=patient&order=pid&sort=$sort'>Patient ID</a></th>";
            echo "<th><a class='sort' href='?table=patient&order=nic&sort=$sort'>NIC</a></th>";
            echo "<th><a class='sort' href='?table=patient&order=gender&sort=$sort'>Gender</a></th>";
            echo "<th><a class='sort' href='?table=patient&order=name&sort=$sort'>Name</a></th>";
            echo "<th><a class='sort' href='?table=patient&order=address&sort=$sort'>Address</a></th>";
            echo "<th><a class='sort' href='?table=patient&order=age&sort=$sort'>Age</a></th>";
            echo "<th><a class='sort' href='?table=patient&order=disease&sort=$sort'>Disease</a></th>";
            echo "<th><a class='sort' href='?table=patient&order=dob&sort=$sort'>Dob</a></th>";
            echo "</strong>";
            ?>
                        <th>Update</th>
                        <th>Delete</th>
                    </strong>
                </tr>
            </thead>
            <tbody>
                <?php
        $sql = "SELECT * FROM patient;";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
          echo '<tr><td colspan="10">No Rows Returned</td></tr>';
        } else {
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>{$row['pid']}</td>
                <td>{$row['nic']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['name']}</td>
                <td>{$row['address']}</td>
                <td>{$row['age']}</td>
                <td>{$row['Disease']}</td>
                <td>{$row['dob']}</td>
                <td>
                <form action='patient/update.php?pid={$row['pid']}' method='POST'>
                <button class='button2'><strong>Update</strong></button>
                </form>
                </td>
                <td>
                <form action='patient/delete.php?pid={$row['pid']}' method='POST'>
                <button class='button2'><strong>Delete</strong></button>
                </form>
                </td>
              </tr>";
          }
        }
        if (isset($_GET['order']) && $result->num_rows == 0) {
          $order = $_GET['order'];
          $sql = "SELECT * FROM patient ORDER BY $order $sort";
        }
        ?>
            </tbody>
        </table>
    </div>
</body>

</html>