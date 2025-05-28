<?php
if (!function_exists('connectDB')) {
    function connectDB() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ecommercesystemdb";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        //echo "Connected successfully";
        return $conn;
    }
}
?>
