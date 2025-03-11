<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
</head>
<body>
    <h2>Customer Registration Form</h2>
    <form action="register_submitted.php" method="post">
        <table>
            <tr>
                <td><label for="first_name">First Name:</label></td>
                <td><input type="text" id="first_name" name="first_name" required></td>
            </tr>
            <tr>
                <td><label for="last_name">Last Name:</label></td>
                <td><input type="text" id="last_name" name="last_name"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" id="username" name="username" required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td><label for="confirm_password">Confirm Password:</label></td>
                <td><input type="password" id="confirm_password" name="confirm_password" required></td>
            </tr>
            <tr>
                <td><label for="phone_number">Phone Number:</label></td>
                <td><input type="tel" id="phone_number" name="phone_number" required></td>
            </tr>
            <tr>
                <td><label for="alt_phone_number">Alternate Phone Number:</label></td>
                <td><input type="tel" id="alt_phone_number" name="alt_phone_number"></td>
            </tr>
            <tr>
                <td><label for="shipping_address">Shipping Address:</label></td>
                <td><textarea id="shipping_address" name="shipping_address" required></textarea></td>
            </tr>
            <tr>
                <td><label for="billing_address">Billing Address:</label></td>
                <td><textarea id="billing_address" name="billing_address"></textarea></td>
            </tr>
            <tr>
                <td><label for="city">City:</label></td>
                <td><input type="text" id="city" name="city"></td>
            </tr>
            <tr>
                <td><label for="state">State:</label></td>
                <td><input type="text" id="state" name="state"></td>
            </tr>
            <tr>
                <td><label for="zip_code">Zip Code:</label></td>
                <td><input type="text" id="zip_code" name="zip_code"></td>
            </tr>
            <tr>
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
                </td>
            </tr>
            <tr>
                <td><label for="payment_method">Preferred Payment Method:</label></td>
                <td>
                    <select id="payment_method" name="payment_method">
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="cash_on_delivery">Cash on Delivery</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="dob">Date of Birth:</label></td>
                <td><input type="date" id="dob" name="dob"></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" id="gender_male" name="gender" value="male"> <label for="gender_male">Male</label>
                    <input type="radio" id="gender_female" name="gender" value="female"> <label for="gender_female">Female</label>
                    <input type="radio" id="gender_other" name="gender" value="other"> <label for="gender_other">Other</label>
                </td>
            </tr>
            <tr>
                <td><label for="profile_picture">Upload Profile Picture:</label></td>
                <td><input type="file" id="profile_picture" name="profile_picture"></td>
            </tr>
            <tr>
                <td><label for="newsletter">Newsletter Subscription:</label></td>
                <td><input type="radio" id="newsletterSubscribe" name="newsletter"> Subscribe</td>
                <td><input type="radio" id="newsletterNotSubscribe" name="newsletter">Not Subscribe</td>
            </tr>
            <tr>
                <td><label for="favorite_category">Favorite Product Category:</label></td>
                <td>
                    <select id="favorite_category" name="favorite_category">
                        <option value="electronics">Electronics</option>
                        <option value="fashion">Fashion</option>
                        <option value="home_appliances">Home Appliances</option>
                        <option value="books">Books</option>
                        <option value="others">Others</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="referral">How did you hear about us?</label></td>
                <td>
                    <select id="referral" name="referral">
                        <option value="google">Google</option>
                        <option value="social_media">Social Media</option>
                        <option value="friend">Friend</option>
                        <option value="other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="sms_notifications">Would you like SMS notifications?</label></td>
                <td><input type="radio" id="sms_notificationsYes" name="sms_notifications"> Yes</td>
                <td><input type="radio" id="sms_notificationsNo" name="sms_notifications"> No</td>
            </tr>
            <tr>
                <td><label for="terms">Terms & Conditions:</label></td>
                <td><input type="checkbox" id="termsAgree" name="termsAgree" value="Agree"> Agree</td>
                <td><input type="checkbox" id="termsPartially" name="termsPartially" value="PartiallyAgree"> Partially agree</td>
                <td><input type="checkbox" id="termsStrongly" name="termsStrongly" value="StronglyAgree"> Strongly agree</td>
                <td><input type="checkbox" id="termsNot" name="termsNot" value="NotAgree"> Not agree</td>
            </tr>
            <tr>
                <td><input type="submit" id="submitBtn" value="Register"></td>
            </tr>
        </table>
    </form>
</body>
</html>
