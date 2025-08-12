<?php
function renderCategoryProducts($catId) {
    require_once 'connection.php';
    $pdo = Connection::getConnection();

    $sql = "SELECT description, price FROM Products WHERE category_id = :cat_id ORDER BY product_name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':cat_id' => $catId]);  

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$products) {
        echo "<p>No products found.</p>";
    } else {
        echo "<div class='prod'>";
        foreach ($products as $product) {
            echo "<div class='p'>";
            echo "<div class='desc'>";
            echo "<p>" . htmlspecialchars(substr($product['description'], 0, 100)) . "</p>";
            echo "</div>";
            echo "<p>Price: $" . number_format($product['price'], 2) . "</p>";
            echo "</div>";
        }
        echo "</div>";
    }

    Connection::closeConnection();
}
?>
