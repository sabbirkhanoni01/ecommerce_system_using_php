<?php include "../control/registerControl.php"; ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Customer Registration</title>
  <link rel="stylesheet" href="../css/register.css" />
</head>
<body>
  <h2>Employee Registration Form</h2>
  
  <form action="" method="post" enctype="multipart/form-data">

    <h3>Personal Information</h3>
    <table class="form-table">
      <tr>
        <td><label for="first_name">First Name:</label></td>
        <td>
          <input type="text" id="first_name" name="first_name" value="<?php echo isset($_SESSION['first_name']) ? htmlspecialchars($_SESSION['first_name']) : ''; ?>" />
          <span id="first_name_notification" class="form-notification"><?php echo $first_name_error; ?></span>
        </td>
        <td><label for="last_name">Last Name:</label></td>
        <td>
          <input type="text" id="last_name" name="last_name" value="<?php echo isset($_SESSION['last_name']) ? htmlspecialchars($_SESSION['last_name']) : ''; ?>" />
          <span id="last_name_notification" class="form-notification"><?php echo $last_name_error; ?></span>
        </td>
      </tr>
      <tr>
        <td><label for="email">Email:</label></td>
        <td>
          <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" />
          <span id="email_notification" class="form-notification"><?php echo $email_error; ?></span>
        </td>
        <td><label for="phone_number">Phone Number:</label></td>
        <td>
          <input type="tel" id="phone_number" name="phone_number" value="<?php echo isset($_SESSION['phone_number']) ? htmlspecialchars($_SESSION['phone_number']) : ''; ?>" />
          <span id="phone_number_notification" class="form-notification"><?php echo $phone_number_error; ?></span>
        </td>
      </tr>
      <tr>
        <td><label for="alt_phone_number">Alternate Phone:</label></td>
        <td>
          <input type="tel" id="alt_phone_number" name="alt_phone_number" value="<?php echo isset($_SESSION['alt_phone_number']) ? htmlspecialchars($_SESSION['alt_phone_number']) : ''; ?>" />
        </td>
        <td><label for="dob">Date of Birth:</label></td>
        <td>
          <input type="date" id="dob" name="dob" value="<?php echo isset($_SESSION['dob']) ? htmlspecialchars($_SESSION['dob']) : ''; ?>" />
          <span id="dob_notification" class="form-notification"><?php echo $dob_error; ?></span>
        </td>
      </tr>
      <tr>
        <td><label>Gender:</label></td>
        <td colspan="3">
          <input type="radio" name="gender" value="male" id="male" class="radio-input" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'male') ? 'checked' : ''; ?> />
          <label for="male" class="inline-label">Male</label>
          <input type="radio" name="gender" value="female" id="female" class="radio-input" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'female') ? 'checked' : ''; ?> />
          <label for="female" class="inline-label">Female</label>
          <input type="radio" name="gender" value="other" id="other" class="radio-input" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'other') ? 'checked' : ''; ?> />
          <label for="other" class="inline-label">Other</label>
          <span id="gender_notification" class="form-notification"><?php echo $gender_error; ?></span>
        </td>
      </tr>
    </table>

    <h3>Account Information</h3>
    <table class="form-table">
      <tr>
        <td><label for="username">Username:</label></td>
        <td colspan="3">
          <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : ''; ?>" />
          <span id="username" class="form-notification"><?php echo $username_error; ?></span>
        </td>
      </tr>
      <tr>
        <td><label for="password">Password:</label></td>
        <td>
          <input type="password" id="password" name="password" value="<?php echo isset($_SESSION['password']) ? htmlspecialchars($_SESSION['password']) : ''; ?>" />
          <span id="password_notification" class="form-notification"><?php echo $password_error; ?></span>
        </td>
        <td><label for="confirm_password">Confirm Password:</label></td>
        <td>
          <input type="password" id="confirm_password" name="confirm_password" value="<?php echo isset($_SESSION['confirm_password']) ? htmlspecialchars($_SESSION['confirm_password']) : ''; ?>" />
          <span id="confirm_password_notification" class="form-notification"><?php echo $confirm_password_error; ?></span>
        </td>
      </tr>
    </table>

    <h3>Address Information</h3>
    <table class="form-table">
      <tr>
        <td><label for="billing_address">Home Address:</label></td>
        <td colspan="3">
          <textarea id="billing_address" name="billing_address"><?php echo isset($_SESSION['billing_address']) ? htmlspecialchars($_SESSION['billing_address']) : ''; ?></textarea>
          <br /><span id="billing_address_notification" class="form-notification"><?php echo $billing_address_error; ?></span>
        </td>
      </tr>
      <tr>
        <td><label for="city">City:</label></td>
        <td>
          <input type="text" id="city" name="city" value="<?php echo isset($_SESSION['city']) ? htmlspecialchars($_SESSION['city']) : ''; ?>" />
          <span id="city_notification" class="form-notification"><?php echo $city_error; ?></span>
        </td>
        <td><label for="state">State:</label></td>
        <td>
          <input type="text" id="state" name="state" value="<?php echo isset($_SESSION['state']) ? htmlspecialchars($_SESSION['state']) : ''; ?>" />
          <span id="state_notification" class="form-notification"><?php echo $state_error; ?></span>
        </td>
      </tr>
      <tr>
        <td><label for="zip_code">Zip Code:</label></td>
        <td>
          <input type="text" id="zip_code" name="zip_code" value="<?php echo isset($_SESSION['zip_code']) ? htmlspecialchars($_SESSION['zip_code']) : ''; ?>" />
          <span id="zip_code_notification" class="form-notification"><?php echo $zip_code_error; ?></span>
        </td>
        <td><label for="country">Country:</label></td>
        <td>
          <select id="country" name="country">
            <option value="">Select Country</option>
            <option value="Bangladesh" <?php echo (isset($_SESSION['country']) && $_SESSION['country'] == 'Bangladesh') ? 'selected' : ''; ?>>Bangladesh</option>
            <option value="Canada" <?php echo (isset($_SESSION['country']) && $_SESSION['country'] == 'Canada') ? 'selected' : ''; ?>>Canada</option>
            <option value="UK" <?php echo (isset($_SESSION['country']) && $_SESSION['country'] == 'UK') ? 'selected' : ''; ?>>UK</option>
            <option value="Australia" <?php echo (isset($_SESSION['country']) && $_SESSION['country'] == 'Australia') ? 'selected' : ''; ?>>Australia</option>
            <option value="Other" <?php echo (isset($_SESSION['country']) && $_SESSION['country'] == 'Other') ? 'selected' : ''; ?>>Other</option>
          </select>
          <span id="country_notification" class="form-notification"><?php echo $country_error; ?></span>
        </td>
      </tr>
    </table>

    <h3>Preferences</h3>
    <table class="form-table">
      <tr>
        <td><label for="payment_method">Salary Receive Method:</label></td>
        <td>
          <select id="payment_method" name="payment_method">
            <option value="">Select Method</option>
            <option value="credit_card" <?php echo (isset($_SESSION['payment_method']) && $_SESSION['payment_method'] == 'credit_card') ? 'selected' : ''; ?>>Credit Card</option>
            <option value="paypal" <?php echo (isset($_SESSION['payment_method']) && $_SESSION['payment_method'] == 'paypal') ? 'selected' : ''; ?>>PayPal</option>
          </select>
          <span id="payment_method_notification" class="form-notification"><?php echo $payment_method_error; ?></span>
        </td>
        <td><label for="favorite_category">Position:</label></td>
        <td>
          <select id="favorite_category" name="favorite_category">
            <option value="">Select Position</option>
            <option value="admin" <?php echo (isset($_SESSION['favorite_category']) && $_SESSION['favorite_category'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
            <option value="customer" <?php echo (isset($_SESSION['favorite_category']) && $_SESSION['favorite_category'] == 'customer') ? 'selected' : ''; ?>>Customer</option>
          </select>
          <span id="favorite_category_notification" class="form-notification"><?php echo $favorite_category_error; ?></span>
        </td>
      </tr>
      <tr>
        <td><label for="referral">How did you hear about us?</label></td>
        <td colspan="3">
          <select id="referral" name="referral">
            <option value="">Select Source</option>
            <option value="google" <?php echo (isset($_SESSION['referral']) && $_SESSION['referral'] == 'google') ? 'selected' : ''; ?>>Google</option>
            <option value="social_media" <?php echo (isset($_SESSION['referral']) && $_SESSION['referral'] == 'social_media') ? 'selected' : ''; ?>>Social Media</option>
            <option value="friend" <?php echo (isset($_SESSION['referral']) && $_SESSION['referral'] == 'friend') ? 'selected' : ''; ?>>Friend</option>
            <option value="other" <?php echo (isset($_SESSION['referral']) && $_SESSION['referral'] == 'other') ? 'selected' : ''; ?>>Other</option>
          </select>
          <span id="referral_notification" class="form-notification"><?php echo $referral_error; ?></span>
        </td>
      </tr>
    </table>

    <table class="button-table">
      <tr>
        <td><button class="RegisterButton" type="submit" name="submit">Register</button></td>
        <td><button id="ResetButton" type="reset">Reset</button></td>
      </tr>
    </table>

    <div class="register-link">
      Already have an account? <a href="login.php">Login here</a>
    </div>

  </form>
</body>
</html>
