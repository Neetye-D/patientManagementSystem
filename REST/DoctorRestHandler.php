<?php
require_once("SimpleRest.php");
require_once("Doctor.php");
		
class DoctorRestHandler extends SimpleRest {

	function getAllDoctors() {	
		$doctor = new Doctor();
		$rawData = $doctor->getAllDoctors();
		echo "getAllDoctors method called.";

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}
		var_dump($rawData);

		$requestContentType = isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : null;
		
		$this->setHttpHeaders($requestContentType, $statusCode);
		
		$result["output"] = $rawData;
				
		if(strpos($requestContentType,'json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function add() {	
		$doctor = new Doctor();
		$rawData = $doctor->addDoctor();
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function deleteDoctorByEmail() {	
		$doctor = new Doctor();
		$rawData = $doctor->deleteDoctor();
		
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function editDoctorByEmail() {	
		$doctor = new Doctor();
		$rawData = $doctor->editDoctor();
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
}
?>
