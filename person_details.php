<?php
require 'config/database.php';

header('Content-Type: application/json');

if (isset($_GET['person_id'])) {
    $person_id = intval($_GET['person_id']);

    $stmt = $conn->prepare("SELECT * FROM persons WHERE id = ?");
    $stmt->bind_param("i", $person_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['error' => 'Person not found']);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Invalid request']);
}

$conn->close();
?>
