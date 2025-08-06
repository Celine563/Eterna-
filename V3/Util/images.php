<?php
include "Connection.php";

$pdo = Connection::getConnection();

if (isset($_GET["image_id"])) {
    $image_id = intval($_GET["image_id"]);

    $stmt = $pdo->prepare("SELECT image_data FROM Images WHERE image_id = :image_id");
    $stmt->execute(['image_id' => $image_id]);
    $imageData = $stmt->fetchColumn();

    if ($imageData !== false) {
        header("Content-Type: image/jpeg");
        echo $imageData;
    } else {
        echo "Image not found.";
    }
}

Connection::closeConnection();
?>
