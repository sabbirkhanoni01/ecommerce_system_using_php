<?php include "../control/categoryControl.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= $editMode ? 'Edit Category' : 'Add Category' ?></title>
  <link rel="stylesheet" href="../css/category.css">
</head>
<body>

<div class="container">
  <a href="../view/adminHome.php">
    <header><h1><?= $editMode ? 'Edit Category' : 'Add Category' ?></h1></header>
  </a>
  
  <div class="content">
    <nav>
      <ul>
        <li><a href="../view/adminHome.php">Home</a></li>
        <li><a href="../view/addProduct.php">Add Products</a></li>
        <li><a href="../view/addCategory.php">Add Category</a></li>
        <li><a href="../view/login.php">Logout</a></li>
      </ul>
    </nav>
    
    <main>
      <?php if (isset($_SESSION['popup_message'])): ?>
        <div style="color: green; font-weight: bold; text-align: center; margin-bottom: 15px;">
          <?= $_SESSION['popup_message']; unset($_SESSION['popup_message']); ?>
        </div>
      <?php endif; ?>
      
      <?php if (!empty($finalStatement)): ?>
        <div style="color: red; font-weight: bold; text-align: center; margin-bottom: 15px;">
          <?= $finalStatement; ?>
        </div>
      <?php endif; ?>
      
      <h2><?= $editMode ? 'Edit Category' : 'Add New Category' ?></h2>
      <form method="post" action="">
        <?php if ($editMode): ?>
          <input type="hidden" name="edit_category_id" value="<?= $editCategoryId ?>">
        <?php endif; ?>
        
        <div class="form-group">
          <label>Category Name:</label>
          <input type="text" name="category_name" value="<?= $name ?? '' ?>">
          <span style="color:red"><?= $nameError ?? '' ?></span>
        </div>
        
        <div class="form-group">
          <label>Description:</label>
          <textarea name="category_description"><?= $description ?? '' ?></textarea>
          <span style="color:red"><?= $descError ?? '' ?></span>
        </div>
        
        <button type="submit" id="submitButton"><?= $editMode ? 'Update Category' : 'Add Category' ?></button>
        
        <?php if ($editMode): ?>
          <a href="../view/addCategory.php" style="display: inline-block; margin-top: 10px; text-align: center; padding: 10px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 5px;">Cancel Edit</a>
        <?php endif; ?>
      </form>
      
      <h2>Category List</h2>
      <table>
         <thead>
          <tr>
            <th>Category Name</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category['category_name'] ?></td>
            <td><?= $category['category_description'] ?></td>
            <td>
              <div class="action-buttons">
                <!-- Edit button -->
                <a href="../view/addCategory.php?edit=<?= $category['categoryID'] ?>" class="edit-btn">
                  <img src="../resources/edit.png" class="edit-icon" alt="Edit" title="Edit">
                </a>
                
                <!-- Delete form -->
                <form method="post" action="../control/categoryControl.php" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this category?')">
                  <input type="hidden" name="categoryID" value="<?= $category['categoryID'] ?>">
                  <button type="submit" class="delete-btn">
                    <img src="../resources/delete.png" class="trash" alt="Delete" title="Delete">
                  </button>
                </form>
              </div>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </main>
  </div>
  
  <footer>
    <p>© 2025 My Website. All rights reserved.</p>
  </footer>
</div>

</body>
</html>