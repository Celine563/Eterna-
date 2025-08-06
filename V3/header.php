<?php
include 'Util/connection.php';

$pdo = Connection::getConnection();

$sql = "SELECT category_id, category_name, parent_id FROM Categories ORDER BY parent_id, category_name";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$categories = [];

foreach ($rows as $row) {
    if ($row['parent_id'] === null) {
        $categories[$row['category_id']] = [
            'name' => $row['category_name'],
            'children' => []
        ];
    } else {
        $categories[$row['parent_id']]['children'][] = [
            'name' => $row['category_name']
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
</head>
<body>

<header class="top">
    <h1><a href="HomePage.php">ETERNA</a></h1>

    <?php foreach ($categories as $category): ?>
        <div class="dropdown">
            <h3><?= htmlspecialchars($category['name']) ?></h3>
            <ul class="menu">
                <?php foreach ($category['children'] as $child): ?>
                    <li><a href="#"><?= htmlspecialchars($child['name']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>

    <img src="Images/Search.png" alt="search" class="search">
    <a href="account.php">
        <img src="Images/Account.png" alt="account" class="account">
    </a>
    <a href="cart.php">
        <img src="Images/shoppingbag.png" alt="shopping bag" class="shoppingBag">
    </a>
</header>

</body>
</html>
