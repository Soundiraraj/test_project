<?php
require '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];

    if (!empty($name)) {
        $stmt = $conn->prepare("INSERT INTO routes (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Route added successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add route']);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

$conn->close();
?>
