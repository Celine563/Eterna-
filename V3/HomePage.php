<?php
require_once 'Util/connection.php';
require_once 'Util/products.php';

$pdo = Connection::getConnection();

// Filters for each category
$filter1 = ['category_id' => 1];
$filter2 = ['category_id' => 2];
$filter3 = ['category_id' => 3];
$filter4 = ['category_id' => 4];
$filter5 = ['category_id' => 5];
$filter6 = ['category_id' => 6];
$filter7 = ['category_id' => 7];
$filter8 = ['category_id' => 8];

// Get products per category
$products1 = getProducts($pdo, $filter1);
$products2 = getProducts($pdo, $filter2);
$products3 = getProducts($pdo, $filter3);
$products4 = getProducts($pdo, $filter4);
$products5 = getProducts($pdo, $filter5);
$products6 = getProducts($pdo, $filter6);
$products7 = getProducts($pdo, $filter7);
$products8 = getProducts($pdo, $filter8);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="CSS/HomeStyle.css">
  <link rel="stylesheet" href="CSS/products.css">
</head>
<body>

<?php require 'header.php'; ?>

<div class="clothes">
  <div class="brownShoe">
    <br>
    <?php renderProducts($products1); ?>
    <br>
  </div>

  <div class="blackDress">
    <br>
    <?php renderProducts($products2); ?>
    <br>
  </div>

  <div class="brownBag">
    <br>
    <?php renderProducts($products3); ?>
    <br>
  </div>

  <div class="goldNecklace">
    <br>
    <?php renderProducts($products4); ?>
    <br>
  </div>
</div>

<div class="accessories">
  <div class="bunny">
    <br>
    <?php renderProducts($products5); ?>
    <br>
  </div>

  <div class="ties">
    <br>
    <?php renderProducts($products6); ?>
    <br>
  </div>

  <div class="backpack">
    <br>
    <?php renderProducts($products7); ?>
    <br>
  </div>

  <div class="eyeshadow">
    <br>
    <?php renderProducts($products8); ?>
    <br>
  </div>
</div>

<?php require 'footer.php'; ?>
<?php require 'social.php'; ?>

</body>
</html>
