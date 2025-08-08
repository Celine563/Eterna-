<?php
require_once 'Util/connection.php';

$pdo = Connection::getConnection();

$sql = "SELECT p.image_data 
        FROM Products p
        JOIN Categories c ON p.category_id = c.category_id
        ORDER BY c.sort_order, p.product_name";

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
<br>
<br>
<?php if (!empty($products)): ?>
  <div class="product-list">
    <?php foreach ($products as $product): ?>
      <?php if (!empty($product['image_data'])): ?>
        <img src="data:image/jpeg;base64,<?= base64_encode($product['image_data']) ?>"
             style="max-width:200px; height:auto;">
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <p>No images found.</p>
<?php endif; ?>

<br>
<br>

<?php require 'footer.php'; ?>
<br>
<?php require 'social.php'; ?>

</body>
</html>
