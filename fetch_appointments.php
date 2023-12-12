<?php
    // Connect to the database
    include 'config.php';

    // Validator
    use Opis\JsonSchema\{
        Validator, ValidationResult, ValidationError, Schema
    };
    require 'vendor\autoload.php';

    // Query to get appointment data
$sQuery = "SELECT * FROM appointment";

// Check if datetime_search parameter is provided in the URL
if(isset($_GET['datetime_search'])) {
    $datetime_search = $_GET['datetime_search'];
    echo "Datetime Search: " . $_GET['datetime_search'] . "<br>";

    // Add the datetime filter to the query
    $sQuery .= " WHERE appointment_datetime LIKE :datetime_search";

    // Prepare the statement with named parameters
    $stmt = $pdo->prepare($sQuery);
    $stmt->bindValue(':datetime_search', '%' . $datetime_search . '%', PDO::PARAM_STR);
    $stmt->execute();

    $array_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // If datetime_search is not provided, fetch all appointments
    $result = $pdo->query($sQuery);
    $array_result = $result->fetchAll(PDO::FETCH_ASSOC);
}
    // SCHEMA IMPLEMENTATION
    $jsonSchema = file_get_contents('schema\FetchAppointmentsSchema.json');

    $jsonData = json_encode($array_result, JSON_PRETTY_PRINT);

    $schema = Schema::fromJsonString($jsonSchema);
    $validator = new Validator();
    $validationResult = $validator->schemaValidation(json_decode($jsonData), $schema);

    if($validationResult->isValid()) {
        // Data is valid!
        header('Content-Type: application/json');
        echo $jsonData;
    } else {
        header('HTTP/1.1 400 Bad Request');
        echo("Error Schema");
    }
?>
