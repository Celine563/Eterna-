<?php
require_once 'connection.php';

$pdo = Connection::getConnection();

$sql = "SELECT description, price FROM Products WHERE category_id = :cat_id ORDER BY product_name";
$stmt = $pdo->prepare($sql);
$stmt->execute([':cat_id' => 8]);  

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$products) {
    echo "<p>No products found.</p>";
} else {
    foreach ($products as $product) {
        echo "<div class='prod'>";
        echo "<p>" . htmlspecialchars(substr($product['description'], 0, 100)) . "</p>";
        echo "<p>Price: $" . number_format($product['price'], 2) . "</p>";
        echo "</div>";
    }
}
Connection::closeConnection();
?>
