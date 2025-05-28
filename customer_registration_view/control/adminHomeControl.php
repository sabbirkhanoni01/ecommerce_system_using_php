<?php
include "../model/db.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$conn = connectDB();

// Load all products with image, name, price
$products = [];
$query = "SELECT productID, name, price, image_path FROM producttbl ORDER BY productID DESC";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}

mysqli_close($conn);
?>
