<?php
require '../config/database.php';

$person_id = $_GET['person_id'];

$stmt = $pdo->prepare('SELECT * FROM orders WHERE person_id = ?');
$stmt->execute([$person_id]);
$orders = $stmt->fetchAll();

echo json_encode($orders);
?>
