<?php
require_once 'Util/connection.php';
require_once 'Util/products.php';

$pdo = Connection::getConnection();

$filter = ['category_id' => 1];


$products = getProducts($pdo, $filter);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="CSS/HomeStyle.css">
  <link rel="stylesheet" href="CSS/products.css">
</head>
<body>

<?php require 'header.php'; ?>

<?php renderProducts($products); ?>

<?php require 'footer.php'; ?>
<?php require 'social.php'; ?>

</body>
</html>
