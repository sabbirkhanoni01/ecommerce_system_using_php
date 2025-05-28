<?php include "../control/adminHomeControl.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Home Layout</title>
  <link rel="stylesheet" href="../css/adminHome.css">
</head>
<body>

  <header>
    <h1></h1>
  </header>

  <div class="container">
    <nav>
      <ul>
        <li><a href="#"> Home</a></li>
        <li><a href="../view/addProduct.php"> Add Products</a></li>
        <li><a href="../view/addCategory.php"> Add Category</a></li>
        <li><a href="../view/login.php"> Logout</a></li>
      </ul>
    </nav>

    <main>
  <h2>All Products</h2>
  <div class="product-grid">
    <?php foreach ($products as $product): ?>
      <div class="product-card">

        <!-- Product Image -->
        <div class="product-image">
          <img src="../<?php echo $product['image_path']; ?>" alt="Product Image">
        </div>

        <!-- Product Details -->
        <div class="product-info">
          <p class="product-name"><?php echo htmlspecialchars($product['name']); ?></p>
          <p class="product-price">
            <span class="new-price">Tk. <?php echo number_format($product['price']); ?></span>
          </p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

  </div>

  <footer>
    <p>© 2025 My Website. All rights reserved.</p>
  </footer>

</body>
</html>
