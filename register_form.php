<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){
    $email = $_POST['usermail'];
    $password = $_POST['password'];
    $confirm_password = $_POST['cpassword'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];
    $picture = $_POST['user_image'];
    
    // Perform frontend validation and sanitization
    
    // Check if passwords match
    if($password != $confirm_password){
        $error[] = 'Password not matched!';
    } else {
        // Hash the password
        $hash = password_hash($password, PASSWORD_BCRYPT);
        
        // Use prepared statements to insert data
        $insert_user = $pdo->prepare("INSERT INTO user(email, password, first_name, last_name, phone_no, picture, address) VALUES(:email, :password, :first_name, :last_name, :phone_no, :picture, :address)");
        $insert_user->execute([
            ':email' => $email,
            ':password' => $hash,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':phone_no' => $phone_no,
            ':picture' => $picture,
            ':address' => $address
        ]);

        $date_of_birth = $_POST['date_of_birth'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $gender = $_POST['gender'];
        $blood_group = $_POST['blood_group'];
        $allergies = $_POST['allergies'];
        $medical_history = $_POST['medical_history'];
        $nic = $_POST['nic'];                
        
        $insert_patient = $pdo->prepare("INSERT INTO patient(email, date_of_birth, weight, height, gender, blood_group, allergies, medical_history, nic) VALUES(:email, :date_of_birth, :weight, :height, :gender, :blood_group, :allergies, :medical_history, :nic)");
        $insert_patient->execute([
            ':email' => $email,
            ':date_of_birth' => $date_of_birth,
            ':weight' => $weight,
            ':height' => $height,
            ':gender' => $gender,
            ':blood_group' => $blood_group,
            ':allergies' => $allergies,
            ':medical_history' => $medical_history,
            ':nic' => $nic
        ]);
        
        // Redirect and set cookie
        header("Location: login_form.php");
        setcookie('USER_PASSED', time() , time() + 2 * 24 * 60 * 60);
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="register_form.css">
</head>

<body>

    <div class="form-container">

        <form action="" method="post" id="register-form">
            <h3>REGISTER NOW</h3>
            <?php
            if(isset($error)){
                foreach($error as $err){
                    echo '<span class="error-msg">'.$err.'</span>';
                }
            }
            ?>

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                            <li class="breadcrumb-item active">Add Patient</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill the fields</h4>
                                        <!--Add Patient Form-->

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email" class="col-form-label">Patient Email</label>
                                                <input required="required" type="text" class="form-control" name="usermail" id="inputUsermail" placeholder="Patient's Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">First Name</label>
                                                <input type="text" required="required" name="first_name" class="form-control" id="inputFirstName" placeholder="Patient's First Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                <input required="required" type="text" name="last_name" class="form-control" id="inputLastName" placeholder="Patient`s Last Name">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">Date Of Birth</label>
                                                <input type="date" required="required" name="date_of_birth" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label">NIC</label>
                                                <input required="required" type="text" name="nic" class="form-control" id="inputPassword4" placeholder="Patient`s NIC number">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Address</label>
                                            <input required="required" type="text" class="form-control" name="address" id="inputAddress" placeholder="Patient's Addresss">
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="inputCity" class="col-form-label">Image url</label>
                                                <input required="required" type="text" name="user_image" class="form-control" id="inputCity" placeholder="Patient's Image's url">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCity" class="col-form-label">Phone Number</label>
                                                <input required="required" type="text" name="phone_no" class="form-control" id="inputCity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCity" class="col-form-label">Height</label>
                                                <input required="required" type="text" name="height" class="form-control" id="inputCity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCity" class="col-form-label">Weight</label>
                                                <input required="required" type="text" name="weight" class="form-control" id="inputCity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState" class="col-form-label"> Gender</label>
                                                <select id="inputState" required="required" name="gender" class="form-control">
                                                    <option>Choose</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="inputCity" class="col-form-label">Patient Allergies</label>
                                                <input required="required" type="text" name="allergies" class="form-control" id="inputCity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState" class="col-form-label"> Blood Group</label>
                                                <select id="inputState" required="required" name="blood_group" class="form-control">
                                                    <option>Choose</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A -">A -</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B -">B -</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O -">O -</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB -">AB -</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="inputAddress" class="col-form-label">Medical History</label>
                                                <textarea type="text" class="form-control" name="medical_history" id="inputMedicalHistory" placeholder="Patient's medical history"></textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="inputAddress" class="col-form-label">Password</label>
                                                <input required="required" type="text" class="form-control" name="password" id="inputPassword" placeholder="Enter your password ">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputAddress" class="col-form-label">Confirm Password</label>
                                                <input required="required" type="text" class="form-control" name="cpassword" id="inputPassword" placeholder="Comfirm your password ">
                                            </div>
                                        </div>

                                        <input type="submit" value="register now" class="form-btn" name="submit">
                                        <p>Already have an account? <a href="login_form.php">Login now!</a></p>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
            </div>
        </form>
    </div>
</body>
</html>
