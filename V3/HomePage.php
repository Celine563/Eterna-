<?php
require_once 'Util/connection.php';
require_once 'Util/products.php';

$pdo = Connection::getConnection();

$filter1 = ['category_id' => 8]; 
$filter2 = ['category_id' => 7]; 
$filter3 = ['category_id' => 15]; 
$filter4 = ['category_id' => 9];  
$filter5 = ['category_id' => 14]; 
$filter6 = ['category_id' => 10]; 
$filter7 = ['category_id' => 16]; 
$filter8 = ['category_id' => 18];


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
    <a href="brownshoe.php?id=1">
    <?php renderProducts($products1); ?>
</a>
    <br>
  </div>

  <div class="blackDress">
    <br>
    <a href="blackdress.php?id=2">
    <?php renderProducts($products2); ?>
    </a>
    <br>
  </div>

  <div class="brownBag">
    <br>
    <a href="brownbag.php?id=3">
    <?php renderProducts($products3); ?>
    </a>
    <br>
  </div>

  <div class="goldNecklace">
    <br>
    <a href="goldnecklace.php?id=4">
    <?php renderProducts($products4); ?>
    </a>
    <br>
  </div>
</div>

<div class="accessories">
  <div class="bunny">
    <br>
    <a href="bunny.php?id=5">
    <?php renderProducts($products5); ?>
    </a>
    <br>
  </div>

  <div class="ties">
    <br>
    <a href="ties.php?id=6">
    <?php renderProducts($products6); ?>
    </a>
    <br>
  </div>

  <div class="backpack">
    <br>
    <a href="backpack.php?id=7">
    <?php renderProducts($products7); ?>
    </a>
    <br>
  </div>

  <div class="eyeshadow">
    <br>
    <a href="eyeshadow.php?id=8">
    <?php renderProducts($products8); ?>
</a>
    <br>
  </div>
</div>

<?php require 'footer.php'; ?>
<?php require 'social.php'; ?>

</body>
</html>
