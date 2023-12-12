<?php
include 'config.php';

// $patient_id = 6;
$patient_id = $_GET['patient_id'];

echo ($patient_id);
// $_GET['patientId'];
if (isset($_GET['patient_id'])) {
  // Retrieve the patient ID from the query parameter
  // $patient_id = $_GET['patient_id'];

  // Now you can use $patientId in your code
  // ...
} else {
  // Handle the case where "patient_id" is not set
  echo "Patient ID is missing in the request.";
}
// Retrieve the last 'appointment_id' for the patient from the 'appointments' table
$sql = "SELECT appointment_id FROM appointment WHERE patient_id = ? ORDER BY appointment_id DESC LIMIT 1";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([$patient_id])) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $appointment_id = $row['appointment_id'];
        echo "appointment: " . $appointment_id;
        // Continue with the form submission and database insert
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $patient_being_treated=$_POST['patient_being_treated'];
            $treatment_start_date = $_POST['treatment_start_date'];
            $treatment_finish_date = $_POST['treatment_finish_date'];
            $treatment_details = $_POST['treatment_details'];
            $prescriptions = $_POST['prescriptions'];
            $patient_id = $_POST['patient_id'];

            // Perform database insert using the retrieved 'appointment_id'
            $insertSql = "INSERT INTO treatment (patient_id, appointment_id,patient_being_treated, treatment_details, treatment_start_date, treatment_finish_date, prescriptions)
                VALUES (?, ?, ?, ?, ?, ?)";
            $insertStmt = $pdo->prepare($insertSql);

            if ($insertStmt->execute([$patient_id, $appointment_id, $treatment_details, $treatment_start_date, $treatment_finish_date, $prescriptions])) {
                if ($insertStmt->rowCount() > 0) {
                    echo "Treatment saved successfully";
                } else {
                    echo "Error: No rows affected.";
                }
            } else {
                echo "Error executing query: " . $insertStmt->errorInfo()[2];
            }
        }

    } else {
        echo "No appointments found for the specified patient.";
    }
} else {
    echo "Error executing query: " . $stmt->errorInfo()[2];
}
?>



<div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
    <form action="" method="POST">
      <div class="formbold-mb-5">
            <label for="patient-being-treated" class="formbold-form-label formbold-form-label-2">
                Patient being treated:
            </label>
            <input
                type="text"
                id="patient-being-treated"
                name="patient-being-treated"
                class="formbold-form-input"
            />
        </div>
      <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
      <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">

      <div class="flex flex-wrap formbold--mx-3">
        <div class="w-full sm:w-half formbold-px-3">
          <div class="formbold-mb-5 w-full">
            <label for="treatment_start_date" class="formbold-form-label"> Start Date </label>
            <input
              type="date"
              name="treatment_start_date"
              id="treatment_start_date"
              class="formbold-form-input"
            />
          </div>
        </div>
        <div class="w-full sm:w-half formbold-px-3">
          <div class="formbold-mb-5">
          <label for="treatment_finish_date" class="formbold-form-label"> End Date </label>
            <input
              type="date"
              name="treatment_finish_date"
              id="treatment_finish_date"
              class="formbold-form-input"
            />
          </div>
        </div>
      </div>

      <div class="formbold-mb-5 formbold-pt-3">
        <div class="flex flex-wrap formbold--mx-3">
          <div class="w-full sm:w-half formbold-px-3">
            <div class="formbold-mb-5">
            </div>
          </div>
          
        </div>
        <label class="formbold-form-label formbold-form-label-2">
          Treatment Details
        </label>
              <!-- Add atreatment_details -->
              <div class="formbold-mb-5">
  <textarea
    name="treatment_details"
    id="treatment_details"
    placeholder="Enter treatment details"
    class="formbold-form-input"
    required
  ></textarea>
</div>

      <!-- Add prescriptions -->
          <div class="formbold-mb-5">
                <label for="prescriptions" class="formbold-form-label"> <strong>Prescriptions</strong>  </label>
                <textarea
                    name="prescriptions"
                    id="prescriptions"
                    placeholder="Enter prescriptions"
                    class="formbold-form-input formbold-textarea"
                ></textarea>
            </div>
      </div>

      <div>
        <button id="close-appointment-form" class="btn btn-danger">Close</button>
        <button class="formbold-btn" id="submit-treatment-form">Save treatment</button>
      </div>

    </form>
  </div>
</div>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: "Inter", Arial, Helvetica, sans-serif;
  }
  .formbold-mb-5 {
    margin-bottom: 20px;
  }
  .formbold-pt-3 {
    padding-top: 12px;
  }
  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    max-width: 550px;
    width: 100%;
    background: white;
  }
  .formbold-form-label {
    display: block;
    font-weight: 500;
    font-size: 16px;
    color: #07074d;
    margin-bottom: 12px;
  }
  .formbold-form-label-2 {
    font-weight: 600;
    font-size: 20px;
    margin-bottom: 20px;
  }

  .formbold-form-input {
    width: 100%;
    padding: 12px 24px;
    border-radius: 6px;
    border: 1px solid #e0e0e0;
    background: white;
    font-weight: 500;
    font-size: 16px;
    color: #6b7280;
    outline: none;
    resize: none;
  }
  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  .formbold-textarea {
  height: 200px; /* Adjust the height as needed */
  resize: vertical; /* Allow vertical resizing */
}

  .formbold-btn {
    text-align: center;
    font-size: 16px;
    border-radius: 6px;
    padding: 14px 32px;
    border: none;
    font-weight: 600;
    background-color: #70b280;
    color: white;
    width: 75%;
    cursor: pointer;
  }
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }

  .formbold--mx-3 {
    margin-left: -12px;
    margin-right: -12px;
  }
  .formbold-px-3 {
    padding-left: 12px;
    padding-right: 12px;
  }
  .flex {
    display: flex;
  }
  .flex-wrap {
    flex-wrap: wrap;
  }
  .w-full {
    width: 100%;
  }
  @media (min-width: 540px) {
    .sm\:w-half {
      width: 50%;
    }
  }
</style>