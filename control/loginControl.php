<?php
include '../model/db.php';
session_start();

$username_error = $password_error = $final_error = "";
$username = $password = "";

if (isset($_POST["login"])) {
    $username = trim($_POST["username"] ?? '');
    $password = trim($_POST["password"] ?? '');

    if (empty($username)) {
        $username_error = "Username is required.";
    }

    if (empty($password)) {
        $password_error = "Password is required.";
    }

    if (empty($username_error) && empty($password_error)) {
        $conn = connectDB();
        $safe_username = mysqli_real_escape_string($conn, $username);
        $safe_password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM registrationtbl WHERE username = '$safe_username' AND password = '$safe_password'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $role = $row['role'];

            $_SESSION['username'] = $username;
            //SUCCESSFUL LOGIN

            if ($role === 'admin') {
                header("Location: ../view/adminHome.php");
                exit();
            } elseif ($role === 'customer') {
                header("Location: ../view/customerHome.php");
                exit();
            } else {
                $final_error = "Unknown role.";
            }
        } else {
            $final_error = "Invalid username or password.";
        }

        mysqli_close($conn);
    }
}
?>
