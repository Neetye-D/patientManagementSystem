<!DOCTYPE html>
<html>
<head>
    <title>Show Doctors</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <h1>Doctor Information</h1>
    <div id="doctorData"></div>
</body>
<script>
$(document).ready(function() {
    $.ajax({
        url: 'http://localhost/patientmanagementsystem/REST/doctor/list/',
        dataType: 'json',
        success: function(data) {
            displayDoctorData(data);
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });

    function displayDoctorData(data) {
        const doctorDataElement = $('#doctorData');
        let html = '<ul>';
        $.each(data.output, function(index, doctor) {
            html += `<li>${doctor.email} - ${doctor.medical_title}</li>`;
        });
        html += '</ul>';
        doctorDataElement.html(html);
    }
});
</script>


</html>
