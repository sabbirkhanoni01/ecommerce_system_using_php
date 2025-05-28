<?php
session_start();
include "../control/productControl.php";

// Handle cancel edit mode
if (isset($_GET['cancel_edit'])) {
    // Clear all edit-related session variables
    unset($_SESSION['edit_mode'], $_SESSION['edit_productID'], $_SESSION['current_image']);
    unset($_SESSION['product_name'], $_SESSION['product_price'], $_SESSION['product_quantity']);
    unset($_SESSION['product_description'], $_SESSION['product_category']);
    unset($_SESSION['product_name_error'], $_SESSION['product_price_error']);
    unset($_SESSION['product_quantity_error'], $_SESSION['product_description_error']);
    unset($_SESSION['product_category_error'], $_SESSION['product_image_error']);
    header("Location: ../view/addProduct.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Products</title>
  <link rel="stylesheet" href="../css/product.css">
</head>
<body>

<div class="container">
  <a href="adminHome.php">
    <header><h1>Add Products</h1></header>
  </a>

  <div class="content">
    <nav>
      <ul>
        <li><a href="adminHome.php">Home</a></li>
        <li><a href="addProduct.php">Add Products</a></li>
        <li><a href="addCategory.php">Add Category</a></li>
        <li><a href="login.php">Logout</a></li>
      </ul>
    </nav>

    <main>
      <h2><?= isset($_SESSION['edit_mode']) ? "Edit Product" : "Add Product" ?></h2>
      
      <!-- Success/Error Messages -->
      <?php if (isset($_SESSION['popup_message'])): ?>
        <div class="message success">
          <?= $_SESSION['popup_message'] ?>
          <?php unset($_SESSION['popup_message']); ?>
        </div>
      <?php endif; ?>
      
      <form method="post" action="../control/productControl.php" enctype="multipart/form-data">
        <?php if (isset($_SESSION['edit_productID'])): ?>
          <input type="hidden" name="productID" value="<?= $_SESSION['edit_productID'] ?>">
        <?php endif; ?>
        
        <div class="form-row">
          <div class="form-group">
            <label>Product Name:</label>
            <input type="text" name="product_name" value="<?= $_SESSION['product_name'] ?? '' ?>">
            <span style="color:red"><?= $_SESSION['product_name_error'] ?? '' ?></span>
          </div>

          <div class="form-group">
            <label>Price:</label>
            <input type="text" name="product_price" value="<?= $_SESSION['product_price'] ?? '' ?>">
            <span style="color:red"><?= $_SESSION['product_price_error'] ?? '' ?></span>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Quantity:</label>
            <input type="text" name="product_quantity" value="<?= $_SESSION['product_quantity'] ?? '' ?>">
            <span style="color:red"><?= $_SESSION['product_quantity_error'] ?? '' ?></span>
          </div>

          <div class="form-group">
            <label>Category:</label>
            <select name="product_category">
              <option value="">Select a category</option>
              <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['categoryID'] ?>" <?= (isset($_SESSION['product_category']) && $_SESSION['product_category'] == $cat['categoryID']) ? 'selected' : '' ?>>
                  <?= $cat['category_name'] ?>
                </option>
              <?php endforeach; ?>
            </select>
            <span style="color:red"><?= $_SESSION['product_category_error'] ?? '' ?></span>
          </div>
        </div>

        <div class="form-group">
          <label>Description:</label>
          <textarea name="product_description"><?= $_SESSION['product_description'] ?? '' ?></textarea>
          <span style="color:red"><?= $_SESSION['product_description_error'] ?? '' ?></span>
        </div>

        <div class="form-group">
          <label>Product Image:</label>
          <div class="image-upload-container">
            <div class="file-input-wrapper">
              <input type="file" name="product_image" id="product_image" accept="image/*" onchange="previewImage(this)">
              <label for="product_image" class="file-input-label">
                <span class="file-input-button">Choose File</span>
                <span class="file-input-text" id="file-name">No file chosen</span>
              </label>
            </div>
            <div class="file-upload-info">
              <small>Allowed formats: JPG, JPEG, PNG, GIF (Max size: 5MB)</small>
            </div>
            
            <!-- Current image preview for edit mode -->
            <?php if (isset($_SESSION['edit_mode']) && !empty($_SESSION['current_image'])): ?>
              <div class="current-image">
                <p><strong>Current Image:</strong></p>
                <img src="../<?= $_SESSION['current_image'] ?>" alt="Current Product Image" class="image-preview-img">
              </div>
            <?php endif; ?>
            
            <!-- New image preview -->
            <div id="image-preview" class="image-preview-container" style="display: none;">
              <p><strong>New Image Preview:</strong></p>
              <img id="preview-img" src="" alt="Image Preview" class="image-preview-img">
            </div>
          </div>
          <span style="color:red"><?= $_SESSION['product_image_error'] ?? '' ?></span>
        </div>

        <div class="button-group">
          <button type="submit" name="<?= isset($_SESSION['edit_mode']) ? 'update' : 'submit' ?>">
            <?= isset($_SESSION['edit_mode']) ? 'Update Product' : 'Add Product' ?>
          </button>
          
          <?php if (isset($_SESSION['edit_mode'])): ?>
            <a href="../view/addProduct.php?cancel_edit=1" class="cancel-btn">Cancel Edit</a>
          <?php endif; ?>
        </div>
      </form>

      <h2>Product Table</h2>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Category</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($products as $product): ?>
            <tr>
              <td>
                <?php if (!empty($product['image_path'])): ?>
                  <img src="../<?= $product['image_path'] ?>" alt="Product Image" class="product-thumbnail">
                <?php else: ?>
                  <div class="no-image">No Image</div>
                <?php endif; ?>
              </td>
              <td><?= htmlspecialchars($product['name']) ?></td>
              <td>$<?= number_format($product['price'], 2) ?></td>
              <td><?= $product['quantity'] ?></td>
              <td><?= htmlspecialchars($product['category_name'] ?? 'No Category') ?></td>
              <td class="description-cell"><?= htmlspecialchars($product['description']) ?></td>
              <td>
                <div class="action-buttons">
                  <!-- Edit Icon -->
                  <form method="post" action="../control/productControl.php" style="display:inline-block">
                    <input type="hidden" name="edit_id" value="<?= $product['productID'] ?>">
                    <button type="submit" title="Edit" class="action-btn edit-btn">
                      <img src="../resources/edit.png" alt="Edit"/>
                    </button>
                  </form>

                  <!-- Delete Icon -->
                  <form method="post" action="../control/productControl.php" style="display:inline-block">
                    <input type="hidden" name="delete_id" value="<?= $product['productID'] ?>">
                    <button type="submit" title="Delete" onclick="return confirm('Are you sure you want to delete this product?')" class="action-btn delete-btn">
                      <img src="../resources/delete.png" alt="Delete"/>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <footer>
    <p>© 2025 My Website. All rights reserved.</p>
  </footer>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    const fileName = document.getElementById('file-name');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
        fileName.textContent = input.files[0].name;
    } else {
        preview.style.display = 'none';
        fileName.textContent = 'No file chosen';
    }
}
</script>

</body>
</html>