<?php
include "config.php";

// The patient_id of the patient to be deleted is obtained from the $_GET variable.
$patient_id = $_GET['patient_id'];

try {
    $pdo->beginTransaction();

    // Delete patient record
    $delete_patient_query = "DELETE FROM patient WHERE patient_id = :patient_id";
    $delete_patient_stmt = $pdo->prepare($delete_patient_query);
    $delete_patient_stmt->bindParam(':patient_id', $patient_id, PDO::PARAM_INT);
    $delete_patient_stmt->execute();

    $pdo->commit();
    
    header("location: index.php");
} catch (PDOException $e) {
    $pdo->rollBack();
    // Output an error message
    echo "Failed: " . $e->getMessage();
}
?>
