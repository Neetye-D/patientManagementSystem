<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="index.css" />
    <!-- <link rel="stylesheet" href="patient.css" /> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title> Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>patient <br>Management<br>System</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="patient.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-bed me-2"  style="color: #1f5135;"></i>Patient</a>
                <a href="appointment_list_table.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-bed me-2"  style="color: #1f5135;"></i>Appointment list</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>John Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                                <li><a class="dropdown-item" href="#">Register</a></li>
                                <li><a class="dropdown-item" href="#">Log In</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">720</h3>
                                <p class="fs-5">Patients</p>
                            </div>
                            <i class="fas fa-user-nurse fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">4920</h3>
                                <p class="fs-5">Admitted</p>
                            </div>
                            <i
                                class="fas fa-hospital-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">3899</h3>
                                <p class="fs-5">Emergencies</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">%25</h3>
                                <p class="fs-5">Increase</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="container" id="patient-container">
                 <div class="row" id="patient-row">

            <!-- Patient cards will be added here -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <script>
$(document).ready(function () {
    // Function to fetch and display patient data
    function displayPatients() {
        var absoluteURL = "http://localhost/patientManagementSystem/get_patient_data.php";

        $.ajax({
            url: absoluteURL, // Path to your PHP script
            type: 'GET',
            dataType: 'json',
            accepts: "application/json",
            success: function (data) {
                var patientContainer = $('#patient-container');
                patientContainer.empty();

                var currentRow = null; // Track the current row

                data.forEach(function (patient, index) {
                    // Create a new row every 3 patients (adjust as needed)
                    if (index % 3 === 0) {
                        currentRow = $('<div class="row"></div>');
                        patientContainer.append(currentRow);
                    }

                    // Create the patient card
                    var card = `
                    <div class="col-md-4">
                    <a href="patient_details.php?id=${patient.patient_id}" class="patient-card" style="text-decoration: none;">

                        <div class="card mb-4">
                            <img class="card-img-top" src="${patient.picture}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">${patient.first_name}</h5>
                                <p class="card-text">Medical History: ${patient.medical_history}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Gender: ${patient.gender}</small>
                            </div>
                        </div>
                    </a>

                    </div>
                    `;
                    // Append the card to the current row
                    currentRow.append(card);
                });
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    }
    // Call the function to display patients on page load
    displayPatients();
});

</script>

</body>

</html>
