<?php
include '../model/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get error messages from session or set empty
$first_name_error = $_SESSION['first_name_error'] ?? "";
$last_name_error = $_SESSION['last_name_error'] ?? "";
$email_error = $_SESSION['email_error'] ?? "";
$phone_number_error = $_SESSION['phone_number_error'] ?? "";
$dob_error = $_SESSION['dob_error'] ?? "";
$gender_error = $_SESSION['gender_error'] ?? "";
$username_error = $_SESSION['username_error'] ?? "";
$password_error = $_SESSION['password_error'] ?? "";
$confirm_password_error = $_SESSION['confirm_password_error'] ?? "";
$billing_address_error = $_SESSION['billing_address_error'] ?? "";
$city_error = $_SESSION['city_error'] ?? "";
$state_error = $_SESSION['state_error'] ?? "";
$zip_code_error = $_SESSION['zip_code_error'] ?? "";
$country_error = $_SESSION['country_error'] ?? "";
$payment_method_error = $_SESSION['payment_method_error'] ?? "";
$favorite_category_error = $_SESSION['favorite_category_error'] ?? "";
$referral_error = $_SESSION['referral_error'] ?? "";

$checkValid = true;
$final_error = "";

// Clear previous error messages
unset($_SESSION['first_name_error'], $_SESSION['last_name_error'], $_SESSION['email_error'], 
      $_SESSION['phone_number_error'], $_SESSION['dob_error'], $_SESSION['gender_error'], 
      $_SESSION['username_error'], $_SESSION['password_error'], $_SESSION['confirm_password_error'], 
      $_SESSION['billing_address_error'], $_SESSION['city_error'], $_SESSION['state_error'], 
      $_SESSION['zip_code_error'], $_SESSION['country_error'], $_SESSION['payment_method_error'], 
      $_SESSION['favorite_category_error'], $_SESSION['referral_error']);

if (isset($_POST['submit'])) {
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone_number'] = $_POST['phone_number'];
    $_SESSION['dob'] = $_POST['dob'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['confirm_password'] = $_POST['confirm_password'];
    $_SESSION['billing_address'] = $_POST['billing_address'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['zip_code'] = $_POST['zip_code'];
    $_SESSION['country'] = $_POST['country'];
    $_SESSION['payment_method'] = $_POST['payment_method'];
    $_SESSION['favorite_category'] = $_POST['favorite_category'];
    $_SESSION['referral'] = $_POST['referral'];

    // Validation
    if (empty($_POST["first_name"])) {
        $_SESSION['first_name_error'] = "Please enter your first name.";
        $checkValid = false;
    } else {
        $first_name = $_POST["first_name"];
    }

    if (empty($_POST["last_name"])) {
        $_SESSION['last_name_error'] = "Please enter your last name.";
        $checkValid = false;
    } else {
        $last_name = $_POST["last_name"];
    }

    if (empty($_POST["email"])) {
        $_SESSION['email_error'] = "Please enter your email.";
        $checkValid = false;
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["phone_number"])) {
        $_SESSION['phone_number_error'] = "Please enter your phone number.";
        $checkValid = false;
    } else {
        $phone_number = $_POST["phone_number"];
    }

    if (empty($_POST["dob"])) {
        $_SESSION['dob_error'] = "Please select your Date of Birth.";
        $checkValid = false;
    } else {
        $dob = $_POST["dob"];
    }

    if (empty($_POST["gender"])) {
        $_SESSION['gender_error'] = "Please select your gender.";
        $checkValid = false;
    } else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["username"])) {
        $_SESSION['username_error'] = "Please enter your username.";
        $checkValid = false;
    } else {
        $username = $_POST["username"];
    }

    if (empty($_POST["password"])) {
        $_SESSION['password_error'] = "Please enter your password.";
        $checkValid = false;
    } elseif (empty($_POST["confirm_password"])) {
        $_SESSION['confirm_password_error'] = "Please confirm your password.";
        $checkValid = false;
    } elseif ($_POST["password"] !== $_POST["confirm_password"]) {
        $_SESSION['confirm_password_error'] = "Passwords do not match.";
        $checkValid = false;
    } else {
        $password = $_POST["password"];
    }

    if (empty($_POST["billing_address"])) {
        $_SESSION['billing_address_error'] = "Please enter your billing address.";
        $checkValid = false;
    } else {
        $billing_address = $_POST["billing_address"];
    }

    if (empty($_POST["city"])) {
        $_SESSION['city_error'] = "Please enter your city.";
        $checkValid = false;
    } else {
        $city = $_POST["city"];
    }

    if (empty($_POST["state"])) {
        $_SESSION['state_error'] = "Please enter your state.";
        $checkValid = false;
    } else {
        $state = $_POST["state"];
    }

    if (empty($_POST["zip_code"])) {
        $_SESSION['zip_code_error'] = "Please enter your zip code.";
        $checkValid = false;
    } else {
        $zip_code = $_POST["zip_code"];
    }

    if (empty($_POST["country"])) {
        $_SESSION['country_error'] = "Please select your country.";
        $checkValid = false;
    } else {
        $country = $_POST["country"];
    }

    if (empty($_POST["payment_method"])) {
        $_SESSION['payment_method_error'] = "Please select a payment method.";
        $checkValid = false;
    } else {
        $payment_method = $_POST["payment_method"];
    }

    if (empty($_POST["favorite_category"])) {
        $_SESSION['favorite_category_error'] = "Please select a favorite category.";
        $checkValid = false;
    } else {
        $favorite_category = $_POST["favorite_category"];
    }

    if (empty($_POST["referral"])) {
        $_SESSION['referral_error'] = "Please select a referral source.";
        $checkValid = false;
    } else {
        $referral = $_POST["referral"];
    }

    // If not valid, reload page with errors
    if (!$checkValid) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $conn = connectDB();

        $checkQuery = "SELECT * FROM registrationtbl WHERE username = '$username'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username_error'] = "Username already exists.";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $sql = "INSERT INTO registrationtbl (
                first_name,last_name,email,phone_number,dob,gender,username,password,
                billing_address,city,state,zip_code,country,payment_method,role,referral
            ) VALUES (
                '$first_name','$last_name','$email','$phone_number','$dob','$gender','$username',
                '$password','$billing_address','$city','$state','$zip_code','$country','$payment_method',
                '$favorite_category','$referral'
            )";

            if (mysqli_query($conn, $sql)) {
                unset($_SESSION['first_name'], $_SESSION['last_name'], $_SESSION['email'], 
                      $_SESSION['phone_number'], $_SESSION['dob'], $_SESSION['gender'], 
                      $_SESSION['username'], $_SESSION['password'], $_SESSION['confirm_password'], 
                      $_SESSION['billing_address'], $_SESSION['city'], $_SESSION['state'], 
                      $_SESSION['zip_code'], $_SESSION['country'], $_SESSION['payment_method'], 
                      $_SESSION['favorite_category'], $_SESSION['referral']);

                unset($_SESSION['first_name_error'], $_SESSION['last_name_error'], $_SESSION['email_error'], 
                      $_SESSION['phone_number_error'], $_SESSION['dob_error'], $_SESSION['gender_error'], 
                      $_SESSION['username_error'], $_SESSION['password_error'], $_SESSION['confirm_password_error'], 
                      $_SESSION['billing_address_error'], $_SESSION['city_error'], $_SESSION['state_error'], 
                      $_SESSION['zip_code_error'], $_SESSION['country_error'], $_SESSION['payment_method_error'], 
                      $_SESSION['favorite_category_error'], $_SESSION['referral_error']);

                header("Location: ../view/login.php");
                exit();
            } else {
                $finalStatement = "Error: " . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
    }
}
?>
