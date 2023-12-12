<?php
// Database connection code
include 'config.php';


// Fetch patient data from the database
$query = $pdo->query('SELECT *
FROM user
INNER JOIN patient ON user.email = patient.email;');
$patient = $query->fetchAll(PDO::FETCH_ASSOC);

// Define the JSON schema


// Validate the data against the schema
$data = json_decode(json_encode($patient)); // Convert the data to an object for validation



// Data is valid according to the schema
header('Content-Type: application/json');
echo json_encode($patient);
?>
