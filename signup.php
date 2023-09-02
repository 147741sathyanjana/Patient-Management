<!DOCTYPE html>
<html>

<head>
    <title>Patient Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="center">
        <div style="width:250px; display: table">
            <h2>Create Account</h2>
            <form action="includes/signup.inc.php" method="POST">
                <input type="text" name="name" placeholder="Name"
                    value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>" required>
                <input type="text" name="address" placeholder="Address"
                    value="<?php echo isset($_GET['address']) ? $_GET['address'] : ''; ?>" required>
                <input type="date" name="dob" placeholder="Date of Birth"
                    value="<?php echo isset($_GET['dob']) ? $_GET['dob'] : ''; ?>" required>
                <input type="text" name="telephone" placeholder="Telephone"
                    value="<?php echo isset($_GET['telephone']) ? $_GET['telephone'] : ''; ?>" required>
                <input type="text" name="nic" placeholder="NIC"
                    value="<?php echo isset($_GET['nic']) ? $_GET['nic'] : ''; ?>" required>
                <input type="password" name="pwd" placeholder="Password" required>
                <input type="password" name="rePwd" placeholder="Re-type Password" required>
                <button type="submit" class="button" name="submit"><b>Sign Up</b></button>
            </form>

            <button class='button' onclick="document.location='signin.php'" )><b>Back</b></button>

            <?php
      if (!isset($_GET['signup'])) {
        exit();
      } else {
        $signupCheck = $_GET['signup'];
        if ($signupCheck == "char") {
          echo "<h4 class='error'>Invalid characters found.</h4>";
          exit();
        } elseif ($signupCheck == "name") {
          echo "<h4 class='error'>Invalid name entered.</h4>";
          exit();
        } elseif ($signupCheck == "passwordlengthinvalid") {
          echo "<h4 class='error'>Please enter a password containing more than 4 characters.</h4>";
          exit();
        } elseif ($signupCheck == "passwordmismatch") {
          echo "<h4 class='error'>Passwords don't match.</h4>";
          exit();
        } elseif ($signupCheck == "success") {
          echo "<h4 class='success'>Success!.</h4>";
          exit();
        }
      }
      ?>
        </div>
    </div>

</html>