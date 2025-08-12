<?php
require_once 'Util/connection.php';
require_once 'Util/desc.php';



?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="CSS/product.css">
  <link rel="stylesheet" href="CSS/HomeStyle.css">
</head>
<body>

<?php require 'header.php'; ?>

<br>

<?php
renderCategoryProducts(8); 
?>

<button class='buy'>Buy Now</button>

<div class="images">
<img src="Util/images.php?product_id=1" alt="Brown heel"/>
</div>


<br><br>

<?php require 'footer.php'; ?>
<br>
<?php require 'social.php'; ?>

</body>
</html>
