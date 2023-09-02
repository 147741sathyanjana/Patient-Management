<!DOCTYPE html>
<html>

<head>
    <title>Patient Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="center">
        <div style="width:250px; display: table;">
            <h1 style=" text-align: center">Patient Management System</h1>
            <h2 style=" text-align: center">Group 6</h2>
            <form action="includes/signin.inc.php" method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <br>
                <input type="password" name="pwd" placeholder="Password" required>
                <br>
                <button type="submit" class="button" name="submit"><b>Sign In</b></button>
                <button class="button" onclick="document.location='signup.php'"><b>Create a new account</b></button>
            </form>

            <?php
      if (!isset($_GET['signin'])) {
        exit();
      } else {
        $signinCheck = $_GET['signin'];
        if ($signinCheck == "invalidname") {
          echo "<h4 class='error'>Incorrect Name.</h4>";
          exit();
        } elseif ($signinCheck == "incorrectpwd") {
          echo "<h4 class='error'>Incorrect Password.</h4>";
          exit();
        } elseif ($signinCheck == "success") {
          echo "<h4 class='success'>Success!</h4>";
          exit();
        }
      }
      ?>
        </div>
    </div>
</body>

</html>