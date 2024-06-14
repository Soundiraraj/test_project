<?php
require 'config/database.php';

try {
   

    // Dummy data for persons
    $persons = [
        ['name' => 'Person 1', 'latitude' => 11.0168, 'longitude' => 76.9558], // Gandhipuram
        ['name' => 'Person 2', 'latitude' => 11.0904, 'longitude' => 76.9667], // Saravanampatti
        ['name' => 'Person 3', 'latitude' => 11.0133, 'longitude' => 76.9715], // Amman Kovil
        ['name' => 'Person 4', 'latitude' => 11.0276, 'longitude' => 76.9485], // Ganapathi
        ['name' => 'Person 5', 'latitude' => 11.0285, 'longitude' => 76.9460], // Sivanandha Puram
        ['name' => 'Person 6', 'latitude' => 11.0620, 'longitude' => 76.9955], // Prozone Mall
    ];

    // Insert dummy data into persons table
    $stmt = $pdo->prepare("INSERT INTO persons (name, latitude, longitude) VALUES (:name, :latitude, :longitude)");

    foreach ($persons as $person) {
        $stmt->execute([
            ':name' => $person['name'],
            ':latitude' => $person['latitude'],
            ':longitude' => $person['longitude']
        ]);
    }

    echo "Dummy data inserted successfully";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
