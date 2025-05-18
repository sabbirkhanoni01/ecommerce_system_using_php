<?php
// Initialize error messages
$username_error = $password_error = "";

// Dummy credentials for login (replace with database lookup later)
$valid_username = "customer1";
$valid_password = "123456";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $is_valid = true;

    // Validate username
    if (empty($username)) {
        $username_error = "Username is required.";
        $is_valid = false;
    }

    // Validate password
    if (empty($password)) {
        $password_error = "Password is required.";
        $is_valid = false;
    }

    // Authenticate
    if ($is_valid) {
        if ($username === $valid_username && $password === $valid_password) {
            // Login success — redirect to dashboard or home page
            header("Location: customer_dashboard.php");
            exit();
        } else {
            $password_error = "Invalid username or password.";
        }
    }
}
?>
