<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $person_id = $_POST['person_id'];
    $route_id = $_POST['route_id'];
    $address = $_POST['address'];

    $stmt = $pdo->prepare('INSERT INTO orders (person_id, route_id, address, status) VALUES (?, ?, ?, ?)');
    $stmt->execute([$person_id, $route_id, $address, 'pending']);

    echo json_encode(['status' => 'success']);
}
?>
