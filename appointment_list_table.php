<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Appointments Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Appointments</h2>
        <div class="form-group">
            <label for="dateFilter">Filter by Date:</label>
            <input type="date" class="form-control" id="dateFilter">
        </div>
        <table class="table table-striped" id="appointmentsTable">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Patient ID</th>
                    <th>Description</th>
                    <th>Duration (minutes)</th>
                    <th>Date & Time</th>
                    <th>Diagnosis</th>
                </tr>
            </thead>
            <tbody>
                <!-- Appointments will be dynamically added here -->
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to update the table with filtered appointments
            function updateTable(dateFilter) {
                $.ajax({
                    url: 'fetch_appointments.php', 
                    method: 'POST',
                    data: {date: dateFilter},
                    dataType: 'json',
                    success: function(data) {
                        var tableBody = $('#appointmentsTable tbody');
                        tableBody.empty();

                        data.forEach(function(appointment) {
                            var row = $('<tr>');
                            row.append($('<td>').text(appointment.appointment_id));
                            row.append($('<td>').text(appointment.patient_id));
                            row.append($('<td>').text(appointment.appointment_description));
                            row.append($('<td>').text(appointment.duration_in));
                            row.append($('<td>').text(appointment.appointment_datetime));
                            row.append($('<td>').text(appointment.diagnosis));
                            tableBody.append(row);
                        });
                    }
                });
            }

            // Initial call to populate the table with all appointments
            updateTable(null);

            // Event listener for date filter change
            $('#dateFilter').on('change', function() {
                var dateFilter = $(this).val();
                updateTable(dateFilter);
            });
        });
    </script>
</body>
</html>
