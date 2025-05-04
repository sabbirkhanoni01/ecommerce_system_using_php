<!DOCTYPE html>
<html>

<head>
    <title>Seller Registration</title>
</head>

<body>
    <h2>Seller Registration Form</h2>
    <form action="submit.php" method="post">
        <table>
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirm_password"></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><input type="tel" name="phone_number"></td>
            </tr>
            <tr>
                <td>Store Name:</td>
                <td><input type="text" name="store_name"></td>
            </tr>
            <tr>
                <td>Business License Number:</td>
                <td><input type="text" name="license_number"></td>
            </tr>
            <tr>
                <td>Business Address:</td>
                <td><textarea name="business_address"></textarea></td>
            </tr>
            <tr>
                <td>Upload Business Logo:</td>
                <td><input type="file" name="business_logo"></td>
            </tr>
            <tr>
                <td>Bank Account Number:</td>
                <td><input type="text" name="bank_account"></td>
            </tr>
            <tr>
                <td>Product Category:</td>
                <td>
                    <select name="product_category">
                        <option value="electronics">Electronics</option>
                        <option value="clothing">Clothing</option>
                        <option value="home_appliances">Home Appliances</option>
                        <option value="books">Books</option>
                        <option value="other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tax Identification Number (TIN):</td>
                <td><input type="text" name="tin_number"></td>
            </tr>
            <tr>
                <td>Operating Hours:</td>
                <td><input type="text" name="operating_hours"></td>
            </tr>
            <tr>
                <td>Return & Refund Policy:</td>
                <td><textarea name="return_policy"></textarea></td>
            </tr>
            <tr>
                <td>Years in Business:</td>
                <td><input type="number" name="business_years" min="0"></td>
            </tr>
            <tr>
                <td>Additional Notes:</td>
                <td><textarea name="additional_notes"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Register"></td>
            </tr>
        </table>
    </form>
</body>

</html>