<?php
include "../model/db.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = connectDB();

$hasError = false;

// Handle Delete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']);
    
    // Get the image path before deleting
    $result = mysqli_query($conn, "SELECT image_path FROM producttbl WHERE productID = $id");
    if ($row = mysqli_fetch_assoc($result)) {
        $imagePath = $row['image_path'];
        // Delete the image file if it exists
        if (!empty($imagePath) && file_exists("../" . $imagePath)) {
            unlink("../" . $imagePath);
        }
    }
    
    $query = "DELETE FROM producttbl WHERE productID = $id";
    mysqli_query($conn, $query);
    $_SESSION['popup_message'] = "Product deleted successfully.";
    header("Location: ../view/addProduct.php");
    exit();
}

// Handle Edit Load
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_id'])) {
    $id = intval($_POST['edit_id']);
    
    // Debug: Check if we received the edit_id
    error_log("Edit ID received: " . $id);
    
    $result = mysqli_query($conn, "SELECT * FROM producttbl WHERE productID = $id");

    if ($result && $row = mysqli_fetch_assoc($result)) {
        // Clear any existing error messages and form data first
        unset($_SESSION['product_name_error'], $_SESSION['product_price_error'],
              $_SESSION['product_quantity_error'], $_SESSION['product_description_error'],
              $_SESSION['product_category_error'], $_SESSION['product_image_error']);
        
        // Set edit mode and populate form data
        $_SESSION['edit_mode'] = true;
        $_SESSION['edit_productID'] = $row['productID'];
        $_SESSION['product_name'] = $row['name'];
        $_SESSION['product_price'] = $row['price'];
        $_SESSION['product_quantity'] = $row['quantity'];
        $_SESSION['product_description'] = $row['description'];
        $_SESSION['product_category'] = $row['categoryID'];
        $_SESSION['current_image'] = $row['image_path'];
        
        // Debug: Check if edit mode is set
        error_log("Edit mode set: " . ($_SESSION['edit_mode'] ? 'true' : 'false'));
    } else {
        $_SESSION['popup_message'] = "Product not found or database error.";
        error_log("Product not found with ID: " . $id);
    }

    header("Location: ../view/addProduct.php");
    exit();
}

// Function to handle image upload
function handleImageUpload($fileInputName, $oldImagePath = null) {
    $uploadDir = "../uploads/products/";
    
    // Create directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] == 0) {
        $fileName = $_FILES[$fileInputName]['name'];
        $fileTmpName = $_FILES[$fileInputName]['tmp_name'];
        $fileSize = $_FILES[$fileInputName]['size'];
        $fileType = $_FILES[$fileInputName]['type'];
        
        // Get file extension
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Allowed file types
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        
        // Validate file type
        if (!in_array($fileExt, $allowedTypes)) {
            $_SESSION['product_image_error'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
            return false;
        }
        
        // Validate file size (5MB max)
        if ($fileSize > 5 * 1024 * 1024) {
            $_SESSION['product_image_error'] = "File size must be less than 5MB.";
            return false;
        }
        
        // Generate unique filename
        $newFileName = uniqid() . '_' . time() . '.' . $fileExt;
        $targetFile = $uploadDir . $newFileName;
        
        // Move uploaded file
        if (move_uploaded_file($fileTmpName, $targetFile)) {
            // Delete old image if updating
            if ($oldImagePath && file_exists("../" . $oldImagePath)) {
                unlink("../" . $oldImagePath);
            }
            
            return "uploads/products/" . $newFileName;
        } else {
            $_SESSION['product_image_error'] = "Error uploading image.";
            return false;
        }
    }
    
    // If no new image uploaded, return old image path
    return $oldImagePath;
}

// Validate and Handle Add or Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit']) || isset($_POST['update']))) {
    $name = trim($_POST['product_name']);
    $price = trim($_POST['product_price']);
    $quantity = trim($_POST['product_quantity']);
    $description = trim($_POST['product_description']);
    $category = $_POST['product_category'];

    // Store form data in session for persistence
    $_SESSION['product_name'] = $name;
    $_SESSION['product_price'] = $price;
    $_SESSION['product_quantity'] = $quantity;
    $_SESSION['product_description'] = $description;
    $_SESSION['product_category'] = $category;

    // Clear previous error messages
    $_SESSION['product_name_error'] = "";
    $_SESSION['product_price_error'] = "";
    $_SESSION['product_quantity_error'] = "";
    $_SESSION['product_description_error'] = "";
    $_SESSION['product_category_error'] = "";
    $_SESSION['product_image_error'] = "";

    // Validation
    if (empty($name)) {
        $_SESSION['product_name_error'] = "Product name is required"; 
        $hasError = true;
    }

    if (empty($price)) {
        $_SESSION['product_price_error'] = "Price is required"; 
        $hasError = true;
    } elseif (!is_numeric($price) || $price <= 0) {
        $_SESSION['product_price_error'] = "Price must be a positive number"; 
        $hasError = true;
    }

    if (empty($quantity)) {
        $_SESSION['product_quantity_error'] = "Quantity is required"; 
        $hasError = true;
    } elseif (!ctype_digit($quantity) || $quantity <= 0) {
        $_SESSION['product_quantity_error'] = "Quantity must be a positive integer"; 
        $hasError = true;
    }

    if (empty($description)) {
        $_SESSION['product_description_error'] = "Description is required"; 
        $hasError = true;
    }

    if (empty($category)) {
        $_SESSION['product_category_error'] = "Category is required"; 
        $hasError = true;
    }

    // Handle image upload
    $imagePath = null;
    if (isset($_POST['update'])) {
        // For update, get current image path
        $currentImage = $_SESSION['current_image'] ?? null;
        $imagePath = handleImageUpload('product_image', $currentImage);
    } else {
        // For new product, image is required
        if (empty($_FILES['product_image']['name'])) {
            $_SESSION['product_image_error'] = "Product image is required";
            $hasError = true;
        } else {
            $imagePath = handleImageUpload('product_image');
            if ($imagePath === false) {
                $hasError = true;
            }
        }
    }

    // DB Operation
    if (!$hasError) {
        // Escape strings to prevent SQL injection
        $name = mysqli_real_escape_string($conn, $name);
        $price = mysqli_real_escape_string($conn, $price);
        $quantity = mysqli_real_escape_string($conn, $quantity);
        $description = mysqli_real_escape_string($conn, $description);
        $category = mysqli_real_escape_string($conn, $category);
        
        if (isset($_POST['update'])) {
            $id = intval($_POST['productID']);
            if ($imagePath) {
                $imagePath = mysqli_real_escape_string($conn, $imagePath);
                $query = "UPDATE producttbl SET name='$name', price='$price', quantity='$quantity', categoryID='$category', description='$description', image_path='$imagePath' WHERE productID=$id";
            } else {
                $query = "UPDATE producttbl SET name='$name', price='$price', quantity='$quantity', categoryID='$category', description='$description' WHERE productID=$id";
            }
            
            if (mysqli_query($conn, $query)) {
                $_SESSION['popup_message'] = "Product updated successfully.";
            } else {
                $_SESSION['popup_message'] = "Error updating product: " . mysqli_error($conn);
            }
        } else {
            $imagePath = mysqli_real_escape_string($conn, $imagePath);
            $query = "INSERT INTO producttbl (name, price, quantity, categoryID, description, image_path)
                      VALUES ('$name', '$price', '$quantity', '$category', '$description', '$imagePath')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION['popup_message'] = "Product added successfully.";
            } else {
                $_SESSION['popup_message'] = "Error adding product: " . mysqli_error($conn);
            }
        }

        // Clear form data and session variables after successful operation
        unset($_SESSION['product_name'], $_SESSION['product_price'], $_SESSION['product_quantity'],
              $_SESSION['product_description'], $_SESSION['product_category'], $_SESSION['current_image'],
              $_SESSION['product_name_error'], $_SESSION['product_price_error'],
              $_SESSION['product_quantity_error'], $_SESSION['product_description_error'],
              $_SESSION['product_category_error'], $_SESSION['product_image_error'],
              $_SESSION['edit_mode'], $_SESSION['edit_productID']);

        header("Location: ../view/addProduct.php");
        exit();
    } else {
        // If there are errors, redirect back to form
        header("Location: ../view/addProduct.php");
        exit();
    }
}

// Load products
$products = [];
$res = mysqli_query($conn, "SELECT p.*, c.category_name FROM producttbl p LEFT JOIN categorytbl c ON p.categoryID = c.categoryID ORDER BY p.productID DESC");
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        $products[] = $row;
    }
}

// Load categories
$categories = [];
$res2 = mysqli_query($conn, "SELECT * FROM categorytbl ORDER BY category_name");
if ($res2) {
    while ($row = mysqli_fetch_assoc($res2)) {
        $categories[] = $row;
    }
}

mysqli_close($conn);
?>