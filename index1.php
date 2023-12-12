<?php
include "config.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Patient Management System</title>
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-+0qzX6n7y+4x1QK9Tt5zv0J3K8jyJQ5PzJ2JYJv4YvL2xZ6jY5J5z9QqJ5JZQJZzO4tLzv6fZGJzLjK5Gg1Jg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="index.css" />
    <script src="https://kit.fontawesome.com/3f747cad6f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Load CSS files -->
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
    
    <link rel="stylesheet"
		href="index1.css">
	<link rel="stylesheet"
		href="responsive.css">
        
</head>

<body>

	<!-- for header part -->
	<header>

		<div class="logosec">
			<div class="logo">PatientManagementSystem</div>
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon">
		</div>

		<div class="searchbar">
			<input type="text"
				placeholder="Search">
			<div class="searchbtn">
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
					class="icn srchicn"
					alt="search-icon">
			</div>
		</div>

		<div class="message">
			<div class="circle"></div>
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png"
				class="icn"
				alt="">
			<div class="dp">
			<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" class="dpicn" alt="dp">
			</div>
		</div>

	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
					<div class="nav-option option1">
						<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png" class="nav-img" alt="dashboard">
						<h3> Dashboard</h3>
					</div>

					<div class="option2 nav-option">
						<img src= "https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png" class="nav-img" alt="articles">
						<a href="patient.php">
                            <h3> Patients</h3>
                        </a>
					</div>

					<div class="nav-option option3">
						<img src= "https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"class="nav-img" alt="report">
						<h3> Appointments</h3>
					</div>

					<div class="nav-option option4">
						<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png" class="nav-img" alt="institution">
						<h3> List of patients</h3>
					</div>

					<div class="nav-option option5">
						<img src= "https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png" class="nav-img" alt="blog">
						<h3> Profile</h3>
					</div>

					<div class="nav-option option6">
						<img src= "https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png" class="nav-img" alt="settings">
						<h3> Settings</h3>
					</div>

					<div class="nav-option logout">
						<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" class="nav-img" alt="logout">
						<h3>Logout</h3>
					</div>

				</div>
			</nav>
		</div>
		<div class="main">

			<div class="searchbar2">
				<input type="text"
					name=""
					id=""
					placeholder="Search">
				<div class="searchbtn">
				<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
						class="icn srchicn"
						alt="search-button">
				</div>
			</div>

			<div class="box-container">

				<div class="box box1">
					<div class="text">
						<h2 class="topic-heading">60.5k</h2>
						<h2 class="topic">Article Views</h2>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png"
						alt="Views">
				</div>

				<div class="box box2">
					<div class="text">
						<h2 class="topic-heading">150</h2>
						<h2 class="topic">Likes</h2>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png"
						alt="likes">
				</div>

				<div class="box box3">
					<div class="text">
						<h2 class="topic-heading">320</h2>
						<h2 class="topic">Comments</h2>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
						alt="comments">
				</div>

				<div class="box box4">
					<div class="text">
						<h2 class="topic-heading">70</h2>
						<h2 class="topic">Published</h2>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
				</div>
			</div>

			<div class="report-container">            
                <div class="calendar-container" style="padding: 30px;">
                    <div id="calendar"></div>
                </div>

					</div>
				</div>
			</div>
            
		</div>
	</div>

	<script>
let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");
 
menuicn.addEventListener("click", () => {
    nav.classList.toggle("navclose");
})</script>
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

    <script>
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
