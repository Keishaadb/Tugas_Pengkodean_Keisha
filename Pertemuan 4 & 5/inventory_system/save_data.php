<?php
header('Content-Type: application/json');
include 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['itemName']) && isset($data['price']) && isset($data['qty'])) {
    $itemName = $data['itemName'];
    $price = $data['price'];
    $qty = $data['qty'];

    $stmt = $pdo->prepare("INSERT INTO items (item_name, price, qty) VALUES (?, ?, ?)");
    $success = $stmt->execute([$itemName, $price, $qty]);

    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}
?>