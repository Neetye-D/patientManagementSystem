<?php

//Adapted from https://phppot.com/php/php-restful-web-service/
require_once("DoctorRestHandler.php");
$method = $_SERVER['REQUEST_METHOD'];
$view = "";

if(isset($_GET["resource"]))
	$resource = $_GET["resource"];
if(isset($_GET["page_key"]))
	$page_key = $_GET["page_key"];
/*
controls the RESTful services
URL mapping
*/


switch($resource){
	case "doctor":	
		switch($page_key){

			case "list":
				// to handle REST Url /doctor/list/
				
				//echo "list invoked from doctor";
				$doctorRestHandler = new DoctorRestHandler();
				$result = $doctorRestHandler->getAllDoctors();
			break;
	
			case "create":
				// to handle REST Url /house/create/
				//echo "create invoked from house";
				$doctorRestHandler = new DoctorRestHandler();
				$doctorRestHandler->add();
			break;
		
			case "delete":
				// to handle REST Url /house/delete/<row_id>
				//echo "delete invoked from house";
				$doctorRestHandler = new DoctorRestHandler();
				$result = $doctorRestHandler->deleteDoctorById();
			break;
		
			case "update":
				//echo "update invoked from house";
				// to handle REST Url /house/update/<row_id>
				$doctorRestHandler = new DoctorRestHandler();
				$doctorRestHandler->editDoctorById();
			break;
		}
	break;	
	case "user":	
	//Missing codes for owner handlers
	break;
}	
?>
