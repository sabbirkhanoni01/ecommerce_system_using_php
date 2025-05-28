<?php include "../control/loginControl.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css" />
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="" method="post" class="login-form">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username ?? ''); ?>">
        <span class="form-notification"><?php echo $username_error ?? ""; ?></span>
      </div>
      
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span class="form-notification"><?php echo $password_error ?? ""; ?></span>
      </div>

      <div class="button-group">
        <button type="submit" name="login" class="login-button">Login</button>
        <button type="reset" class="reset-button">Reset</button>
      </div>

      <div class="register-link">
        Don't have an account? <a href="register.php">Register here</a>
      </div>

      <?php if (!empty($final_error)) : ?>
      <div class="form-notification" style="text-align: center; margin-top: 10px;">
        <?php echo $final_error; ?>
      </div>
      <?php endif; ?>
      
    </form>
  </div>
</body>
</html>
