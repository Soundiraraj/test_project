<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $person_id = $_POST['person_id'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $stmt = $pdo->prepare('UPDATE persons SET latitude = ?, longitude = ? WHERE id = ?');
    $stmt->execute([$latitude, $longitude, $person_id]);

    echo json_encode(['status' => 'success']);
}
?>
