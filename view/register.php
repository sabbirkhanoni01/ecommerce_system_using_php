<?php include "../control/registerControl.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Registration</title>
  <link rel="stylesheet" href="../css/register.css">
</head>
<body>
  <h2>Customer Registration Form</h2>
  
  <form action="" method="post">

    <h3>Personal Information</h3>
    <table class="form-table">
      <tr>
        <td><label for="first_name">First Name:</label></td>
        <td><input type="text" id="first_name" name="first_name"><span id="first_name_notification" class="form-notification"><?php echo $first_name_error; ?></span></td>
        <td><label for="last_name">Last Name:</label></td>
        <td><input type="text" id="last_name" name="last_name"><span id="last_name_notification" class="form-notification"><?php echo $last_name_error; ?></span></td>
        <td></td>
      </tr>
      <tr>
        <td><label for="email">Email:</label></td>
        <td><input type="email" id="email" name="email"><span id="email_notification" class="form-notification"><?php echo $email_error; ?></span></td>
        <td><label for="phone_number">Phone Number:</label></td>
        <td><input type="tel" id="phone_number" name="phone_number"><span id="phone_number_notification" class="form-notification"><?php echo $phone_number_error; ?></span></td>
      </tr>
      <tr>
        <td><label for="alt_phone_number">Alternate Phone:</label></td>
        <td><input type="tel" id="alt_phone_number" name="alt_phone_number"></td>
        <td><label for="dob">Date of Birth:</label></td>
        <td><input type="date" id="dob" name="dob"><span id="dob_notification" class="form-notification"><?php echo $dob_error; ?></span></td>
      </tr>
      <tr>
        <td><label>Gender:</label></td>
        <td colspan="3">
          <input type="radio" name="gender" value="male" id="male" class="radio-input">
          <label for="male" class="inline-label">Male</label>
          <input type="radio" name="gender" value="female" id="female" class="radio-input">
          <label for="female" class="inline-label">Female</label>
          <input type="radio" name="gender" value="other" id="other" class="radio-input">
          <label for="other" class="inline-label">Other</label>
          <span id="gender_notification" class="form-notification"><?php echo $gender_error; ?></span>
        </td>
      </tr>
    </table>

    <h3>Account Information</h3>
    <table class="form-table">
      <tr>
        <td><label for="username">Username:</label></td>
        <td colspan="3"><input type="text" id="username" name="username"><span id="username" class="form-notification"><?php echo $username_error; ?></span></td>
      </tr>
      <tr>
        <td><label for="password">Password:</label></td>
        <td><input type="password" id="password" name="password"><span id="password_notification" class="form-notification"><?php echo $password_error; ?></span></td>
        <td><label for="confirm_password">Confirm Password:</label></td>
        <td><input type="password" id="confirm_password" name="confirm_password"><span id="confirm_password_notification" class="form-notification"><?php echo $confirm_password_error; ?></span></td>
      </tr>
      <tr>
        <td><label for="profile_picture">Profile Picture:</label></td>
        <td colspan="3"><input type="file" id="profile_picture" name="profile_picture"></td>
      </tr>
    </table>

    <h3>Address Information</h3>
    <table class="form-table">
      <tr>
        <td><label for="billing_address">Billing Address:</label></td>
        <td colspan="3">
          <textarea id="billing_address" name="billing_address"></textarea><br><span id="shipping_address" class="form-notification"><?php echo $billing_address_error; ?></span>
        </td>
      </tr>
      <tr>
        <td><label for="city">City:</label></td>
        <td><input type="text" id="city" name="city"><span id="city_notification" class="form-notification"><?php echo $city_error; ?></span></td>
        <td><label for="state">State:</label></td>
        <td><input type="text" id="state" name="state"><span id="state_notification" class="form-notification"><?php echo $state_error; ?></span></td>
      </tr>
      <tr>
        <td><label for="zip_code">Zip Code:</label></td>
        <td><input type="text" id="zip_code" name="zip_code"><span id="zip_code_notification" class="form-notification"><?php echo $zip_code_error; ?></span></td>
        <td><label for="country">Country:</label></td>
        <td>
          <select id="country" name="country">
            <option value="">Select Country</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Canada">Canada</option>
            <option value="UK">UK</option>
            <option value="Australia">Australia</option>
            <option value="Other">Other</option>
          </select>
          <span id="country_notification" class="form-notification"><?php echo $country_error; ?></span>
        </td>
      </tr>
    </table>

    <h3>Preferences</h3>
    <table class="form-table">
      <tr>
        <td><label for="payment_method">Payment Method:</label></td>
        <td>
          <select id="payment_method" name="payment_method">
            <option value="credit_card">Credit Card</option>
            <option value="paypal">PayPal</option>
            <option value="cash_on_delivery">Cash on Delivery</option>
          </select>
          <span id="payment_method_notification" class="form-notification"><?php echo $payment_method_error; ?></span>
        </td>
        <td><label for="favorite_category">Favorite Category:</label></td>
        <td>
          <select id="favorite_category" name="favorite_category">
            <option value="electronics">Electronics</option>
            <option value="fashion">Fashion</option>
            <option value="home_appliances">Home Appliances</option>
            <option value="books">Books</option>
            <option value="others">Others</option>
          </select>
          <span id="favorite_category_notification" class="form-notification"><?php echo $favorite_category_error; ?></span>
        </td>
      </tr>
      <tr>
        <td><label for="referral">How did you hear about us?</label></td>
        <td colspan="3">
          <select id="referral" name="referral">
            <option value="google">Google</option>
            <option value="social_media">Social Media</option>
            <option value="friend">Friend</option>
            <option value="other">Other</option>
          </select>
          <span id="referral_notification" class="form-notification"><?php echo $referral_error; ?></span>
        </td>
      </tr>
    </table>

    <h3>Terms & Conditions</h3>
    <table class="form-table">
      <tr>
        <td colspan="4">
          <p class="agreement">Select your agreement level:</p>
          <input class="checkbox2" type="checkbox" id="termsAgree" name="termsAgree" value="Agree">
          <label class="checkbox2" for="termsAgree" class="inline-label">Agree</label><br>
          <input class="checkbox2" type="checkbox" id="termsPartially" name="termsPartially" value="PartiallyAgree">
          <label class="checkbox2" for="termsPartially" class="inline-label">Partially agree</label><br>
          <input class="checkbox2" type="checkbox" id="termsStrongly" name="termsStrongly" value="StronglyAgree">
          <label class="checkbox2" for="termsStrongly" class="inline-label">Strongly agree</label><br>
          <input class="checkbox2" type="checkbox" id="termsNot" name="termsNot" value="NotAgree">
          <label class="checkbox2" for="termsNot" class="inline-label">Not agree</label><br>
          <p>By checking any of the above options, you acknowledge that you have read and understood our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</p>
          <span id="terms_notification" class="form-notification"><?php echo $terms_error; ?></span>
        </td>
      </tr>
    </table>

    <table class="button-table">
      <tr>
        <td><button class="RegisterButton" type="submit" name="submit">Register</button></td>
        <td><button id="ResetButton" type="reset">Reset</button></td>
      </tr>
    </table>
  </form>

  <!--<script src="../script/script.js"></script>-->
</body>
</html>