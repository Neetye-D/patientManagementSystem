<?php
include "config.php";

// Retrieve patient ID from the GET request
$patientId = $_GET['patient_id'];

// Query to retrieve treatments for the patient
$sql = "SELECT * FROM treatment WHERE patient_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$patientId]);
$treatments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Add Bootstrap table -->
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Treatment Details</th>
                <th>Start Date</th>
                <th>Finish Date</th>
                <th>Prescriptions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($treatments): ?>
                <?php foreach ($treatments as $treatment): ?>
                    <tr>
                        <td><?php echo $treatment['treatment_details']; ?></td>
                        <td><?php echo $treatment['treatment_start_date']; ?></td>
                        <td><?php echo $treatment['treatment_finish_date']; ?></td>
                        <td><?php echo $treatment['prescriptions']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No treatments found for the specified patient.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
