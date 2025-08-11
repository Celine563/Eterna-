<?php

function getProducts($pdo, $filter = []) {
    $sql = "SELECT p.image_data, p.product_name, p.description, p.price FROM Products p";
    
   
    $conditions = [];
    $params = [];

    if (!empty($filter['category_id'])) {
        $conditions[] = "p.category_id = :category_id";
        $params[':category_id'] = $filter['category_id'];
    }

    if (!empty($filter['product_ids'])) {
        $placeholders = implode(',', array_fill(0, count($filter['product_ids']), '?'));
        $conditions[] = "p.product_id IN ($placeholders)";
        $params = array_merge($params, $filter['product_ids']);
    }

    if ($conditions) {
        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $sql .= " ORDER BY p.product_name";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function renderProducts($products) {
    if (empty($products)) {
        echo "<p>No products found.</p>";
        return;
    }
    echo '<div class="product-list">';
    foreach ($products as $product) {
        echo '<div class="product-item">';
        if (!empty($product['image_data'])) {
            echo '<img src="data:image/jpeg;base64,' . base64_encode($product['image_data']) . '" style="max-width:200px; height:auto;">';
        } else {
            echo '<p>No image available</p>';
        }
        echo '<h3>' . htmlspecialchars($product['product_name']) . '</h3>';
        echo '<p>' . htmlspecialchars(substr($product['description'], 0, 100)) . ' </p>';
        echo '<p>Price: $' . number_format($product['price'], 2) . '</p>';
        echo '</div>';
    }
    echo '</div>';
}
