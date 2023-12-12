
<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){

    $email = $_POST['usermail'];

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];
    $picture = $_POST['picture'];
    $date_of_birth = $_POST['date_of_birth'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $allergies = $_POST['allergies'];
    $medical_history = $_POST['medical_history'];
    $nic = $_POST['nic'];
    $patient_id = $_GET['patient_id'];
    // it validates each field using an array called $error to store any errors.
    // If there are no errors, the code proceeds to update the user and patient records in the database using prepared statements.
    $error = array();

    if(empty($email)){
        $error[] = 'Email field is required';
    }
    if(empty($first_name)){
        $error[] = 'First Name field is required';
    }
    if(empty($last_name)){
        $error[] = 'Last Name field is required';
    }
    if(empty($phone_no)){
        $error[] = 'Phone Number field is required';
    }
    if(empty($address)){
        $error[] = 'Address field is required';
    }
    if(empty($date_of_birth)){
        $error[] = 'Date of Birth field is required';
    }
    if(empty($weight)){
        $error[] = 'Weight field is required';
    }
    if(empty($height)){
        $error[] = 'Height field is required';
    }
    if(empty($gender)){
        $error[] = 'Gender field is required';
    }
    if(empty($blood_group)){
        $error[] = 'Blood Group field is required';
    }

    if (empty($error)) {
        try {
            $pdo->beginTransaction();

            // Update user data
            $update_user_query = "UPDATE user SET email=?, first_name=?, last_name=?, phone_no=?, address=?, picture=? WHERE email=?";
            $update_user_stmt = $pdo->prepare($update_user_query);
            $update_user_stmt->execute([$email, $first_name, $last_name, $phone_no, $address, $picture, $email]);

            // Update patient data
            $update_patient_query = "UPDATE patient SET date_of_birth=?, weight=?, height=?, gender=?, blood_group=?, allergies=?, medical_history=?, nic=? WHERE patient_id=?";
            $update_patient_stmt = $pdo->prepare($update_patient_query);
            $update_patient_stmt->execute([$date_of_birth, $weight, $height, $gender, $blood_group, $allergies, $medical_history, $nic, $patient_id]);

            $pdo->commit();

            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }
}
?>


<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="register_form.css">

</head>
<body>
    
<div class="form-container">
        <form action="" method="post">
        <h3>Edit user information</h3>
        <p class="text_muted">Click submit after changing information</p>

        <?php
        if(isset($error)){
            foreach($error as $err){
                echo '<span class="error-msg">'.$err.'</span>';
            }
        }
        ?>

        <?php
        
        $patient_id = $_GET['patient_id'];
        $select_query = "SELECT patient.*, user.* FROM patient 
                        INNER JOIN user ON patient.email = user.email 
                        WHERE patient.patient_id = ?";
        $select_stmt = $pdo->prepare($select_query);
        $select_stmt->execute([$patient_id]);
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        ?>

<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">   
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill the fields</h4>
                                        <!--Add Patient Form-->
                                        
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="email" class="col-form-label">Patient Email</label>
                                                    <input required="required" type="text"  value="<?php echo $row['email'] ?>" class="form-control" name="usermail" id="inputUsermail" placeholder="Patient's Email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" name="first_name" value="<?php echo $row['first_name'] ?>" class="form-control" id="inputFirstName" placeholder="Patient's First Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" name="last_name" value="<?php echo $row['last_name'] ?>"  class="form-control"  id="inputLastName" placeholder="Patient`s Last Name">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Date Of Birth</label>
                                                    <input type="date" required="required" name="date_of_birth" value="<?php echo $row['date_of_birth'] ?>" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">NIC</label>
                                                    <input required="required" type="text" name="nic" value="<?php echo $row['nic'] ?> "  class="form-control"  id="inputPassword4" placeholder="Patient`s NIC number">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Address</label>
                                                <input required="required" type="text" value="<?php echo $row['address'] ?>" class="form-control" name="address" id="inputAddress" placeholder="Patient's Addresss">
                                            </div>
                                            
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                        <label for="inputCity" class="col-form-label">Image url</label>
                                                        <input required="required" type="text" name="picture" value="<?php echo $row['picture'] ?>"  class="form-control" id="inputCity" placeholder="Patient's Image's url">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputCity" class="col-form-label">Phone Number</label>
                                                        <input required="required" type="text" name="phone_no" value="<?php echo $row['phone_no'] ?>" class="form-control" id="inputCity">
                                                    </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Height</label>
                                                    <input required="required" type="text" name="height"  value="<?php echo $row['height'] ?>" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Weight</label>
                                                    <input required="required" type="text" name="weight" value="<?php echo $row['weight'] ?>"  class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label"> Gender</label>
                                                    <select id="inputState" required="required" name="gender" value="<?php echo $row['gender'] ?>"  class="form-control">
                                                        <option value="">Choose</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>                                       
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="inputCity" class="col-form-label">Patient Allergies</label>
                                                    <input required="required" type="text" name="allergies" value="<?php echo $row['allergies'] ?> " class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label"> Blood Group</label>
                                                    <select id="inputState" required="required" name="blood_group" value="<?php echo $row['blood_group'] ?> "   class="form-control">
                                                        <option>Choose</option>
                                                      <option value="A+">A+</option>
                                                      <option value="A-">A -</option>
                                                      <option value="B+">B+</option>
                                                      <option value="B-">B -</option>
                                                      <option value="O+">O+</option>
                                                      <option value="0-">O -</option>
                                                      <option value="AB+">AB+</option>
                                                      <option value="AB-">AB -</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="inputAddress" class="col-form-label">Medical History</label>
                                                    <textarea  type="text" class="form-control" name="medical_history" value="<?php echo $row['medical_history'] ?> "  id="inputAddress" placeholder="Patient's medical history"></textarea>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="inputAddress" class="col-form-label">Password</label>
                                                    <input required="required" type="text" class="form-control" name="password" id="inputAddress" placeholder="Enter your password ">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputAddress" class="col-form-label">Confirm Password</label>
                                                    <input required="required" type="text" class="form-control" name="cpassword" id="inputAddress" placeholder="Comfirm your password ">
                                                </div>

                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Patient Number</label>
                                                    <input type="text" name="pat_number" value="<?php echo $patient_number;?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>

                                            <input type="submit" value="save changes" class="form-btn" name="submit">
           
                                              <p>Already have an account? <a href="login_form.php">Login now!</a></p>
                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
            </div>        </form>
    </div>
</body>
</html>






