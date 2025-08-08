<?php
require_once 'Util/connection.php';

$pdo = Connection::getConnection();

$sql = "SELECT p.product_name, p.description, p.price, p.stock_quantity, 
               p.image_data, c.category_name
        FROM Products p
        JOIN Categories c ON p.category_id = c.category_id
        ORDER BY p.product_name";

$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="CSS/HomeStyle.css">
</head>
<body>

<?php require 'header.php'; ?>

<?php if (!empty($products)): ?>
  <div class="product-list">
    <?php foreach ($products as $product): ?>
      <div class="product-item">
        <h2><?= htmlspecialchars($product['product_name']) ?></h2>

        <?php if (!empty($product['image_data'])): ?>
          <img src="data:image/jpeg;base64,<?= base64_encode($product['image_data']) ?>"
               alt="<?= htmlspecialchars($product['product_name']) ?>"
               style="max-width:200px; height:auto;">
        <?php else: ?>
          <p><em>No image available</em></p>
        <?php endif; ?>

        <p><?= htmlspecialchars($product['description']) ?></p>
        <p>Category: <?= htmlspecialchars($product['category_name']) ?></p>
        <p>Price: $<?= number_format($product['price'], 2) ?></p>
        <p>In stock: <?= (int)$product['stock_quantity'] ?></p>
      </div>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <p>No products found.</p>
<?php endif; ?>

<?php require 'footer.php'; ?>
<br>
<?php require 'social.php'; ?>

</body>
</html>
