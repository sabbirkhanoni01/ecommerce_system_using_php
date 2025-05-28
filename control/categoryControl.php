<?php
session_start();
include '../model/db.php';

$nameError = $descError = '';
$name = $description = '';
$finalStatement = '';
$editMode = false;
$editCategoryId = null;

// Handle GET requests (for edit)
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['edit'])) {
    $editCategoryId = intval($_GET['edit']);
    $conn = connectDB();
    
    $sql = "SELECT * FROM categorytbl WHERE categoryID = $editCategoryId";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $category = mysqli_fetch_assoc($result);
        $name = $category['category_name'];
        $description = $category['category_description'];
        $editMode = true;
    }
    
    mysqli_close($conn);
}

// Handle POST requests
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // CASE 1: DELETE category
    if (isset($_POST['categoryID']) && !isset($_POST['category_name'])) {
        $categoryId = intval($_POST['categoryID']);
        $conn = connectDB();
        
        $checkQuery = "SELECT * FROM producttbl WHERE categoryID = $categoryId";
        $checkResult = mysqli_query($conn, $checkQuery);
        
        if (mysqli_num_rows($checkResult) > 0) {
            $_SESSION['popup_message'] = "Cannot delete category. It is used in one or more products.";
        } else {
            $sql = "DELETE FROM categorytbl WHERE categoryID = $categoryId";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['popup_message'] = "Category deleted successfully.";
            } else {
                $_SESSION['popup_message'] = "Error deleting category: " . mysqli_error($conn);
            }
        }
        
        mysqli_close($conn);
        header("Location: ../view/addCategory.php");
        exit();
    }
    
    // CASE 2: ADD or UPDATE category
    $name = trim($_POST['category_name'] ?? '');
    $description = trim($_POST['category_description'] ?? '');
    $editCategoryId = intval($_POST['edit_category_id'] ?? 0);
    
    if ($name === '') {
        $nameError = "Category name is required.";
    }
    
    if ($description === '') {
        $descError = "Description is required.";
    }
    
    if ($nameError === '' && $descError === '') {
        $conn = connectDB();
        
        if ($editCategoryId > 0) {
            // UPDATE existing category
            $sql = "UPDATE categorytbl SET 
                    category_name = '$name', 
                    category_description = '$description' 
                    WHERE categoryID = $editCategoryId";
            
            if (mysqli_query($conn, $sql)) {
                $_SESSION['popup_message'] = "Category updated successfully!";
                header("Location: ../view/addCategory.php");
                exit();
            } else {
                $finalStatement = "Error updating category: " . mysqli_error($conn);
            }
        } else {
            // INSERT new category
            $sql = "INSERT INTO categorytbl (category_name, category_description)
                    VALUES ('$name', '$description')";
            
            if (mysqli_query($conn, $sql)) {
                $_SESSION['popup_message'] = "Category added successfully!";
                header("Location: ../view/addCategory.php");
                exit();
            } else {
                $finalStatement = "Error: " . mysqli_error($conn);
            }
        }
        
        mysqli_close($conn);
    } else {
        // If there are validation errors and we're in edit mode, preserve the edit state
        if ($editCategoryId > 0) {
            $editMode = true;
        }
    }
}

// Fetch categories for listing
$conn = connectDB();
$categories = [];

$sql = "SELECT * FROM categorytbl ORDER BY categoryID DESC";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
}

mysqli_close($conn);
?>