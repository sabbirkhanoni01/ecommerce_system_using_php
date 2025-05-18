<?php

$first_name_error = "";
$last_name_error = "";
$email_error = "";
$phone_number_error = "";
$dob_error = "";
$gender_error = "";
$username_error = "";
$password_error = "";
$confirm_password_error = "";
$shipping_address_error = "";
$billing_address_error = "";
$city_error = "";
$state_error = "";
$zip_code_error = "";
$country_error = "";
$payment_method_error = "";
$favorite_category_error = "";
$referral_error = "";
$terms_error = "";
$checkValid = true;
$finalStatement = "";


    if (isset($_POST['submit'])) {

    if (empty($_POST["first_name"])) {
        $first_name_error = "Please enter your first name.";
        $checkValid = false;
    } else {
        $first_name = $_POST["first_name"];

    }

   
    if (empty($_POST["last_name"])) {
        $last_name_error = "Please enter your last name.";
        $checkValid = false;
    } else {
        $last_name = $_POST["last_name"];

    }

    
    if (empty($_POST["email"])) {
        $email_error = "Please enter your email.";
        $checkValid = false;
    } else {
        $email = $_POST["email"];

    }

    
    if (empty($_POST["phone_number"])) {
        $phone_number_error = "Please enter your Phone No..";
        $checkValid = false;
    } else {
        $phone_number = $_POST["phone_number"];

    }

    
    if (empty($_POST["dob"])) {
        $dob_error = "Please select your Date of Birth.";
        $checkValid = false;
    } else {
        $dob = $_POST["dob"];

    }

    
    if (empty($_POST["gender"])) {
        $gender_error = "Please select your Gender.";
        $checkValid = false;
    } else {
        $gender = $_POST["gender"];

    }

   
    if (empty($_POST["username"])) {
        $username_error = "Please enter your Username";
        $checkValid = false;
    } else {
        $username = $_POST["username"];

    }

    
    if (empty($_POST["password"])) {
        $password_error = "Please enter your password.";
        $checkValid = false;
    } elseif (empty($_POST["confirm_password"])) {
        $confirm_password_error = "Please confirm your password.";
        $checkValid = false;
    } elseif ($_POST["password"] !== $_POST["confirm_password"]) {
        $confirm_password_error = "Passwords do not match.";
        $checkValid = false;
    } else {
        $password = $_POST["password"];

    }

    
    if (empty($_POST["shipping_address"])) {
        $shipping_address_error = "Please enter your shipping address.";
        $checkValid = false;
    } else {
        $shipping_address = $_POST["shipping_address"];

    }

    
    if (empty($_POST["billing_address"])) {
        $billing_address_error = "Please enter your billing address.";
        $checkValid = false;
    } else {
        $billing_address = $_POST["billing_address"];

    }

    
    if (empty($_POST["city"])) {
        $city_error = "Please enter your city.";
        $checkValid = false;
    } else {
        $city = $_POST["city"];

    }

    
    if (empty($_POST["state"])) {
        $state_error = "Please enter your state.";
        $checkValid = false;
    } else {
        $state = $_POST["state"];

    }

    
    if (empty($_POST["zip_code"])) {
        $zip_code_error = "Please enter your zip code.";
        $checkValid = false;
    } else {
        $zip_code = $_POST["zip_code"];

    }


    if (empty($_POST["country"])) {
        $country_error = "Please select your country.";
        $checkValid = false;
    } else {
        $country = $_POST["country"];

    }

    
    if (empty($_POST["payment_method"])) {
        $payment_method_error = "Please select a payment method.";
        $checkValid = false;
    } else {
        $payment_method = $_POST["payment_method"];
    }


    if (empty($_POST["favorite_category"])) {
        $favorite_category_error = "Please select a favorite category.";
        $checkValid = false;
    } else {
        $favorite_category = $_POST["favorite_category"];
    }


    if (empty($_POST["referral"])) {
        $referral_error = "Please select a referral source.";
        $checkValid = false;
    } else {
        $referral = $_POST["referral"];
    }

    
    if (empty($_POST["termsAgree"]) && empty($_POST["termsPartially"]) && empty($_POST["termsStrongly"]) && empty($_POST["termsNot"])) {
        $terms_error = "You must check at least one agreement option.";
        $checkValid = false;
    } else {
        $terms = "Agreement accepted.";
        
    }

    if (!$checkValid) {
        $finalStatement =  "Please fill the Form Properly";
    }else{
        header("Location: ../view/register_submitted.php");
    }

}

?> 