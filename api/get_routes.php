<?php
require '../config/database.php';

header('Content-Type: application/json');

$sql = "SELECT id, name FROM routes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $routes = [];
    while($row = $result->fetch_assoc()) {
        $routes[] = $row;
    }
    echo json_encode($routes);
} else {
    echo json_encode([]);
}

$conn->close();
?>
