<?php
include "config.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-+0qzX6n7y+4x1QK9Tt5zv0J3K8jyJQ5PzJ2JYJv4YvL2xZ6jY5J5z9QqJ5JZQJZzO4tLzv6fZGJzLjK5Gg1Jg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="index.css" />
    <script src="https://kit.fontawesome.com/3f747cad6f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Load CSS files -->
   <link rel="stylesheet" href="index.css" />
   <link rel="stylesheet" href="index1.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />
<!-- Load JavaScript files -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <title> Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>patient <br>Management<br>System</div>
            <div class="list-group list-group-flush my-3">
            <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2" style="color: #1f5135;"></i>Dashboard</a>
                <a href="patient.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-bed me-2"  style="color: #1f5135;"></i>Patient</a>
                <a href="appointment_list_table.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-bed me-2"  style="color: #1f5135;"></i>Appointment list</a>
                
                        <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
                <a href="header.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>header.php</a>
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
                            <i class="fas fa-truck-medical fs-1 primary-text border rounded-full secondary-bg p-3"></i>
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
                <div class="report-container">            
                <div class="calendar-container" style="padding: 30px;">
                    <div id="calendar"></div>
                </div>
                </div>
                <div class="report-container">            

                <div class="container" style="padding:25px;">
                <table class="table table-hover text-center">
                    <thead class="table">
                        <tr>
                            <th colspan="7">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" id="searchInput" class="form-control" placeholder="Search">
                                    </div>
                                    <div class="col-md-6 text-md-end">
                                        <!-- <a href="register_form.php" class="btn btn-dark add-btn" style="border: 2px solid green;" >Add New Patient</a> -->
                                        <a href="register_form.php" data-toggle="modal" data-target="#registerModal" class="btn btn-dark add-btn"  style="border: 2px solid green;" >Add New Patient</a>

                                    </div>
                                </div>
                            </th>
                        </tr>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Action</th>
                            </tr>
                    </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $select = "SELECT patient.patient_id, user.first_name, user.last_name, user.email, patient.gender 
                                        FROM patient INNER JOIN user ON patient.email = user.email";

                                $stmt = $pdo->query($select);
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <th><?php echo $row['patient_id'] ?></th>
                                    <th><?php echo $row['first_name'] ?></th>
                                    <th><?php echo $row['last_name'] ?></th>
                                    <th><?php echo $row['email'] ?></th>
                                    <th><?php echo $row['gender'] ?></th>
                                    <td>
                                        <a href="edit.php?patient_id=<?php echo $row['patient_id'] ?>" class="line-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                        <a href="delete.php?patient_id=<?php echo $row['patient_id'] ?>" class="line-dark"><i class="fa-solid fa-trash-can fs-5"></i></a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>     
                            </tbody>
                        </table>
                    </div>
                    </div>




            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <!-- Content will be loaded here -->
      <div class="modal-body" id="registerModalContent">
        <!-- Content will be loaded here using AJAX -->
      </div>
    </div>
  </div>
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
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>

    <!-- <script>
    $(document).ready(function() {
        // Handle button click event
        $(".add-btn").click(function(event) {
        event.preventDefault(); // Prevent the default link behavior

        // Perform AJAX request to load register_form.php content
        $.ajax({
            url: "register_form.php",
            method: "GET",
            success: function(data) {
            // Insert the loaded content into the modal dialog
            $("#registerModalContent").html(data);
            // Show the modal
            $('#registerModal').modal('show');
            },
            error: function() {
            // Handle errors if the request fails
            alert("Failed to load the registration form.");
            }
        });
        });
    });

    </script> -->

    <script>
        $(document).ready(function() {
            $(document).on('click', '.form-btn', function(e) {
                e.preventDefault(); // prevent form from submitting normally
                var form_data = $('#register-form').serialize(); // get the form data
                $.ajax({
                    url: 'register_form.php', // PHP script that handles the form submission
                    type: 'POST',
                    data: form_data,
                    success: function(response) {
                        // handle the response from the server
                        alert(response);
                    },
                    error: function(xhr, status, error) {
                        // handle errors
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    }
                });
            });
        });
    </script>
    
    
    <script>
    
    $(document).ready(function() {
        var calendarEl = $('#calendar');

        var calendar = new FullCalendar.Calendar(calendarEl[0], {
            eventColor: 'yellow',
            initialView: 'dayGridMonth', // Display a monthly view
            height: 550,
            header: { center: 'month,agendaWeek' }, // buttons for switching between views

            // Define the events as a function to load data via AJAX
            events: function(info, successCallback, failureCallback) {
                $.ajax({
                    url: 'fetch_appointments.php', // Adjust the URL to your server script
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        var events = [];

                        $.each(response, function(index, appointment) {
                            events.push({
                                title: appointment.appointment_description,
                                start: appointment.appointment_datetime,
                                end: moment(appointment.appointment_datetime).add(appointment.duration_in, 'minutes').format(),
                            });
                        });

                        successCallback(events);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching appointment data:', error);
                        failureCallback(error);
                    }
                });
            },
        });

        calendar.render();
    });

    </script>

</body>

</html>
 