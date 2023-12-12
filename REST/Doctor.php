<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Doctor {
    private $doctors = array();
    
    public function getAllDoctors(){
        if(isset($_GET['email'])){
            $email = $_GET['email'];
            $query = 'SELECT * FROM doctor WHERE email LIKE "%' .$email. '%"';
        } else {
            $query = 'SELECT * FROM doctor';
        }
        
        $dbcontroller = new DBController();
        $this->doctors = $dbcontroller->executeSelectQuery($query);
        return $this->doctors;
    }

    public function addDoctor(){
        if(isset($_POST['email']) && isset($_POST['medical_title']) && isset($_POST['description']) && isset($_POST['treatment_provided']) 
           && isset($_POST['workplace']) && isset($_POST['experience_in_years']) && isset($_POST['credentials']) && isset($_POST['counseling_hours']) 
           && isset($_POST['counseling_days'])){
            
            $email = $_POST['email'];
            $medical_title = $_POST['medical_title'];
            $description = $_POST['description'];
            $treatment_provided = $_POST['treatment_provided'];
            $workplace = $_POST['workplace'];
            $experience_in_years = $_POST['experience_in_years'];
            $credentials = $_POST['credentials'];
            $counseling_hours = $_POST['counseling_hours'];
            $counseling_days = $_POST['counseling_days'];

            $query = "INSERT INTO doctor (email, medical_title, description, treatment_provided, workplace, experience_in_years, credentials, counseling_hours, counseling_days) 
                      values (?,?,?,?,?,?,?,?,?)";
            
            $data = [$email, $medical_title, $description, $treatment_provided, $workplace, $experience_in_years, $credentials, $counseling_hours, $counseling_days];
            
            $dbcontroller = new DBController();
            $result = $dbcontroller->executeQuery($query, $data);
            
            if($result != 0){
                $result = array('success'=>1);
                return $result;
            }
        }
    }
    
    public function deleteDoctor(){
        if(isset($_GET['email'])){
            $email = $_GET['email'];
            $query = 'DELETE FROM doctor WHERE email = ?';
            $data = [$email];
            
            $dbcontroller = new DBController();
            $result = $dbcontroller->executeQuery($query, $data);
            
            if($result != 0){
                $result = array('success'=>1);
                return $result;
            }
        }
    }
    
    public function editDoctor(){
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $medical_title = $_POST['medical_title'];
            $description = $_POST['description'];
            $treatment_provided = $_POST['treatment_provided'];
            $workplace = $_POST['workplace'];
            $experience_in_years = $_POST['experience_in_years'];
            $credentials = $_POST['credentials'];
            $counseling_hours = $_POST['counseling_hours'];
            $counseling_days = $_POST['counseling_days'];

            $query = "UPDATE doctor SET medical_title = ?, description = ? , treatment_provided = ? , workplace= ?, experience_in_years = ?, 
                      credentials = ?, counseling_hours = ?, counseling_days = ? WHERE email = ? ";
            
            $data = [$medical_title, $description, $treatment_provided, $workplace, $experience_in_years, $credentials, $counseling_hours, $counseling_days, $email];
            
            $dbcontroller = new DBController();
            $result= $dbcontroller->executeQuery($query, $data);
            
            if($result != 0){
                $result = array('success'=>1);
                return $result;
            }
        }
    }
}
?>
