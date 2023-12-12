<?php
include 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');
$patient_id = $_GET['patient_id']; // Correct the variable name
// $_GET['patientId'];
 echo ($patient_id);
 if (isset($_GET['patient_id'])) {
  // Retrieve the patient ID from the query parameter
  $patientId = $_GET['patient_id'];

  // Now you can use $patientId in your code
  // ...
} else {
  // Handle the case where "patient_id" is not set
  echo "Patient ID is missing in the request.";
}
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $fullName = $_POST['name'];
    $phoneNumber = $_POST['phone'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $patient_id = $_POST['patient_id'];
    $appointment_description = $_POST['appointment_description'];
    $duration = $_POST['duration']; // Added duration field
    $diagnosis = $_POST['diagnosis']; // Added diagnosis field
    // Perform database insert (Assuming you have a PDO connection)

    $appointment_datetime = "$date $time"; // Combine date and time into a datetime value
    $sql = "INSERT INTO appointment (patient_id, appointment_description, duration_in, appointment_datetime, diagnosis)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    // Assuming you have the patient_id, duration_in, and diagnosis values available

    if ($stmt->execute([$patient_id, $appointment_description, $duration, $appointment_datetime, $diagnosis])) {
      if ($lastInsertedId) {
        // Appointment was inserted successfully, and you have the appointment ID
        // You can use $lastInsertedId to pass the appointment ID to the treatment form
        echo "Appointment booked successfully with ID: " . $lastInsertedId;
    } else {
        echo "Error: No rows affected.";
    }
} else {
    echo "Error executing query: " . $stmt->errorInfo()[2];
}
}
?>



<div class="formbold-main-wrapper">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="formbold-form-wrapper">
    <form action="" method="POST">
      <div class="formbold-mb-5">
        <label for="name" class="formbold-form-label"> Full Name </label>
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Full Name"
          class="formbold-form-input"
        />
      </div>
      <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
      <input type="hidden" name="appointment_id" value="">
      <div class="formbold-mb-5">
        <label for="phone" class="formbold-form-label"> Phone Number </label>
        <input
          type="text"
          name="phone"
          id="phone"
          placeholder="Enter your phone number"
          class="formbold-form-input"
        />
      </div>
      <div class="formbold-mb-5">
        <label for="email" class="formbold-form-label"> Email Address </label>
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Enter your email"
          class="formbold-form-input"
        />
      </div>
      <div class="flex flex-wrap formbold--mx-3">
        <div class="w-full sm:w-half formbold-px-3">
          <div class="formbold-mb-5 w-full">
            <label for="date" class="formbold-form-label"> Date </label>
            <input
              type="date"
              name="date"
              id="date"
              class="formbold-form-input"
            />
          </div>
        </div>
        <div class="w-full sm:w-half formbold-px-3">
          <div class="formbold-mb-5">
            <label for="time" class="formbold-form-label"> Time </label>
            <input
              type="time"
              name="time"
              id="time"
              class="formbold-form-input"
            />
          </div>
        </div>
      </div>

      <div class="formbold-mb-5 formbold-pt-3">
        
        <div class="flex flex-wrap formbold--mx-3">
          <div class="w-full sm:w-half formbold-px-3">
            <div class="formbold-mb-5">
              <input
                type="text"
                name="area"
                id="area"
                placeholder="Enter area"
                class="formbold-form-input"
              />
            </div>
          </div>
          <div class="w-full sm:w-half formbold-px-3">
            <div class="formbold-mb-5">
              <input
                type="text"
                name="city"
                id="city"
                placeholder="Enter city"
                class="formbold-form-input"
              />
            </div>
          </div>
          <div class="w-full sm:w-half formbold-px-3">
            <div class="formbold-mb-5">
            </div>
          </div>
          <div class="w-full sm:w-half formbold-px-3">
            <div class="formbold-mb-5">
            </div>
            
          </div>
          
        </div>
        <label class="formbold-form-label formbold-form-label-2">
          Appointment Details
        </label>
              <!-- Add appointment_description -->
      <div class="formbold-mb-5">
      <input
  type="text"
  name="appointment_description"
  id="appointment_description"
  placeholder="Appointment Description"
  class="formbold-form-input"
  required
/>

      </div>

      <!-- Add diagnosis -->
      <div class="formbold-mb-5">
        <label for="diagnosis" class="formbold-form-label">Diagnosis</label>
        <input
          type="text"
          name="diagnosis"
          id="diagnosis"
          placeholder="Diagnosis"
          class="formbold-form-input"
        />
      </div>

      <!-- Add duration -->
      <div class="formbold-mb-5">
        <label for="duration" class="formbold-form-label">Duration (minutes)</label>
        <input
          type="number"
          name="duration"
          id="duration"
          placeholder="Duration (minutes)"
          class="formbold-form-input"
        />
      </div>
      </div>

      <div>
        <button id="close-appointment-form" class="btn btn-danger">Close</button>
        <button class="formbold-btn" id="submit-appointment-form">Book Appointment</button>
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