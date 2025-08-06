<?php
include 'Connection.php';

$pdo = Connection::getConnection();

$sql = "SELECT category_id, category_name, category_type FROM Categories";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$categories = [];
foreach ($rows as $row) {
    $categories[$row['category_type']][] = $row;
}

Connection::closeConnection();

echo json_encode($categories);
?>
