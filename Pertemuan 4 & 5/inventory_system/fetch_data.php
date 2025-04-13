<?php
header('Content-Type: application/json');
include 'config.php';

$stmt = $pdo->query("SELECT * FROM items ORDER BY created_at DESC");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($items);
?>