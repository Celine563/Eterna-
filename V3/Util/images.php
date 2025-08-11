<?php
require_once 'connection.php';

$pdo = Connection::getConnection();

function getProductImage($pdo, $product_id) {
    $sql = "SELECT image_data FROM Products WHERE product_id = :product_id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['product_id' => $product_id]);
    return $stmt->fetchColumn(); // returns raw image blob or false
}

function renderProductImage($imageData) {
    if ($imageData) {
        echo '<img src="data:image/png;base64,' . base64_encode($imageData) . '" style="max-width:200px; height:auto;">';
    } else {
        echo '<p>No image available</p>';
    }
}
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);
    $imageData = getProductImage($pdo, $product_id);
    
    if ($imageData !== false) {
        header('Content-Type: image/png');
        echo $imageData;
    } else {
        echo 'Image not found.';
    }
} 

Connection::closeConnection();
?>
