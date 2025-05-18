
<?php include "../control/loginControl.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Login</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<h2>Customer Login</h2>

<form action="" method="post">
  <table class="form-table">
    <tr>
      <td><label for="username">Username:</label></td>
      <td><input type="text" id="username" name="username"><span class="form-notification"><?php echo $username_error; ?></span></td>
    </tr>
    <tr>
      <td><label for="password">Password:</label></td>
      <td><input type="password" id="password" name="password"><span class="form-notification"><?php echo $password_error; ?></span></td>
    </tr>
  </table>

  <table class="button-table">
    <tr>
      <td><button class="RegisterButton" type="submit" name="submit">Login</button></td>
      <td><button id="ResetButton" type="reset">Reset</button></td>
    </tr>
  </table>
</form>

</body>
</html>
