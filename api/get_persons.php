<?php
require '../config/database.php';

header('Content-Type: application/json');

$sql = "SELECT id, name, latitude, longitude FROM persons";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $persons = [];
    while($row = $result->fetch_assoc()) {
        $persons[] = $row;
    }
    echo json_encode($persons);
} else {
    echo json_encode([]);
}

$conn->close();
?>
