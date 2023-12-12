<?php
// Retrieve the patient ID from the query parameter
include "config.php";
$patientId = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-*************" crossorigin="anonymous" />

<link rel="stylesheet" href="patient_details.css" />
<link rel="stylesheet" href="treatment_form.css" />


<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <!-- Get Details Of A Single Patient And Display Them Here -->
        <?php
        // $pat_id = $_GET['patient_id'];
       
        $ret = "SELECT * FROM patient INNER JOIN user ON patient.email = user.email WHERE patient_id=?";
        $stmt = $pdo->prepare($ret);
        $stmt->bindParam(1, $patientId, PDO::PARAM_INT);
        $stmt->execute();
        $patient = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($patient) {
        ?>
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                    <h4 class="page-title"><?php echo $patient['first_name']; ?> <?php echo $patient['last_name']; ?>'s Profile</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-4 col-md-4">
                                <div class="card-box text-center">
                                    <img src="<?php echo $patient['picture']; ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                    <div class="text-left mt-3">
                                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2"><?php echo $patient['first_name']; ?> <?php echo $patient['last_name']; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong><span class="ml-2"><?php echo $patient['email']; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Phone Number :</strong> <span class="ml-2"><?php echo $patient['phone_no']; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Address :</strong> <span class="ml-2"><?php echo $patient['address']; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Date of Birth :</strong> <span class="ml-2"><?php echo $patient['date_of_birth']; ?></span></p>
                                    </div>
                                    
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <button id="back-button" class="btn btn-outline-secondary">
                                                <i class="fas fa-arrow-left"></i> Back
                                            </button>
                                        </div>
                                    </div>
                                
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-lg-8 col-xl-8">
                                <div class="card-box">
                                
                                <div class="m-4">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <li class="nav-item">
                                            <a href="#appointment" class="nav-link " data-bs-toggle="tab">Appointment</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#medical-details" class="nav-link" data-bs-toggle="tab">Medical Details </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#treatment" class="nav-link active" data-bs-toggle="tab">Treatment</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="treatment">
                                            <h4 class="mt-2">Home tab content</h4>
                                            <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                                            <div class="m-4">
 
                                        </div>
                                            <button type="button" class="btn btn-warning"  id="load-treatment-form"> start treatment</button>
                                            <div id="treatment-form-container"><?php


                                            echo ($patientId);
                                            // $_GET['patientId'];
                                            // Retrieve the last 'appointment_id' for the patient from the 'appointments' table
                                            $sql = "SELECT appointment_id FROM appointment WHERE patient_id = ? ORDER BY appointment_id DESC LIMIT 1";
                                            $stmt = $pdo->prepare($sql);

                                            if ($stmt->execute([$patientId])) {
                                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                if ($row) {
                                                    $appointment_id = $row['appointment_id'];
                                                    echo "appointment: " . $appointment_id;
                                                    // Continue with the form submission and database insert
                                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                        // Retrieve form data
                                                        $treatment_start_date = $_POST['treatment_start_date'];
                                                        $treatment_finish_date = $_POST['treatment_finish_date'];
                                                        $treatment_details = $_POST['treatment_details'];
                                                        $prescriptions = $_POST['prescriptions'];
                                                        $patient_id = $_POST['patient_id'];

                                                        // Perform database insert using the retrieved 'appointment_id'
                                                        $insertSql = "INSERT INTO treatment (patient_id, appointment_id, treatment_details, treatment_start_date, treatment_finish_date, prescriptions)
                                                            VALUES (?, ?, ?, ?, ?, ?)";
                                                        $insertStmt = $pdo->prepare($insertSql);

                                                        if ($insertStmt->execute([$patient_id, $appointment_id, $treatment_details, $treatment_start_date, $treatment_finish_date, $prescriptions])) {
                                                            if ($insertStmt->rowCount() > 0) {
                                                                echo "Treatment saved successfully";
                                                            } else {
                                                                // echo "Error: No rows affected.";
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
                                                        <!-- <input
                                                            type="text"
                                                            id="patient-being-treated"
                                                            name="patient-being-treated"
                                                            class="formbold-form-input"
                                                        /> -->
                                                    </div>
                                                <input type="hidden" name="patient_id" value="<?php echo $patientId; ?>">
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

                                            </div></div>

                                        </div>
                                        <div class="tab-pane fade" id="medical-details">
                                            <h4 class="mt-2">Medical Details tab content</h4>
                                            <p class="text-muted mb-2 font-13"><strong>Weight :</strong> <span class="ml-2"><?php echo $patient['weight']; ?> kg</span></p>
                                            <p class="text-muted mb-2 font-13"><strong>Height :</strong> <span class="ml-2"><?php echo $patient['height']; ?> cm</span></p>
                                            <p class="text-muted mb-2 font-13"><strong>Gender :</strong> <span class="ml-2"><?php echo $patient['gender']; ?></span></p>
                                            <p class="text-muted mb-2 font-13"><strong>Blood Group :</strong> <span class="ml-2"><?php echo $patient['blood_group']; ?></span></p>
                                            <p class="text-muted mb-2 font-13"><strong>Allergies :</strong> <span class="ml-2"><?php echo $patient['allergies']; ?></span></p>
                                            <p class="text-muted mb-2 font-13"><strong>Medical History :</strong> <span class="ml-2"><?php echo $patient['medical_history']; ?></span></p>
                                            <button type="button" class="btn btn-primary" onclick="loadTreatments()">Show Treatments</button>
                                            <div id="treatments-container"></div>

                                        
                                        </div>
                                        <div class="tab-pane fade" id="appointment">
                                            <h4 class="mt-2">Medical Details tab content</h4>
                                            <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
                                            <button type="button" class="btn btn-warning"  id="load-appointment-form">Make appointment</button>
                                            <div id="appointment-form-container"></div>
                                        </div>
                                    </div>
                                </div>

                                
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->


            </div>
        <?php
        } else {
            // Handle the case where the patient with the specified ID does not exist.
            echo "Patient not found.";
        }
        ?>

    </div>

</body>
<script>

    function goBack() {
        window.location.href = 'patient.php';
    }

    // Attach a click event listener to the back button using jQuery
    $(document).ready(function () {
        $('#back-button').click(function () {
            goBack();
        });
    });

// Function to load and display the appointment form with a transition
function loadAppointmentForm() {

    // Make an AJAX request to load the form from appointment_form.php

    // Create a URLSearchParams object to parse the URL
    var urlParams = new URLSearchParams(window.location.search);
    
    // Retrieve the patient ID from the URL parameter
    var patient_id = urlParams.get('id');
    $.ajax({
        url: 'appointment_form.php',
        method: 'GET',
        data: { patient_id: patient_id },
        success: function (data) {
            // Insert the loaded form into the appointment-form-container
            $('#appointment-form-container').html(data);

            // Add the 'show' class to trigger the transition effect
            $('#appointment-form-container').addClass('show');
        },
        error: function () {
            alert('Error loading the appointment form.');
        }
    });
}

// Function to hide the appointment form
function hideAppointmentForm() {
    // Remove the 'show' class to trigger the transition effect
    $('#appointment-form-container').removeClass('show');
}

// Add $(document).ready() here
$(document).ready(function () {
    // Attach a click event listener to the "Load Appointment Form" button
    $('#load-appointment-form').click(function () {
        loadAppointmentForm();
    });

    // Attach a click event listener to the form submit button
    $(document).on('click', '#submit-appointment-form', function (event) {
        var urlParams = new URLSearchParams(window.location.search);
    
    // Retrieve the patient ID from the URL parameter
    var patient_id = urlParams.get('id');
        event.preventDefault();
        console.log('Button clicked');

        // Make sure the 'form' selector correctly targets the form you want to submit
        var formData = $('form').serialize();

        // Ensure that patientId is correctly added to the form data
        formData += '&patientId=' + patient_id;

        $.ajax({
            url: 'appointment_form.php',
            method: 'POST',
            data: formData,
            success: function (data) {
                console.log(data);
                if (data === "Appointment booked successfully") {
                    alert('Appointment booked successfully');
                    hideAppointmentForm();
                } 
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + status, error);
                alert('Error ajax booking the appointment.');
            }
        });
    });
});





function loadTreatments() {
    
    // Make an AJAX request to retrieve the patient's treatments
    $.ajax({
        url: 'get_treatments.php', // Assuming you have a PHP file to handle this request
        method: 'GET',
        data: { patient_id: <?php echo $patientId; ?> },
        success: function (data) {
            // Insert the loaded treatments into a modal or a specific element on the page
            // For example, if you have a div with the id "treatments-container":
            $('#treatments-container').html(data);
            // Show the modal or toggle a specific element's visibility
            $('#treatments-modal').modal('show');
        },
        error: function () {
            alert('Error loading treatments.');
        }
    });
}


</script>





</html>


