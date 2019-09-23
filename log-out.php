<?php
	//starting session
	session_start();
	require("Dev/general/all_purpose_class.php");
	require('Dev/autoload.php');
	require('Dev/Database.php');
	try{
		$db = Database::getInstance()->getConnection();
		$all_purpose = new all_purpose($db);
		//assigning session variable to a variable
		$email = $_SESSION['user_name'];
		$action = "Logged Out";
		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
		$_SESSION['success'] = $email. " ". "You have logged out successfully";
		
		unset($email);
		//destroying the session
		session_destroy();
		//redirecting to the index page
		$all_purpose->redirect("./");	
	}catch(PDOException $e){
		$_SESSION['error'] = "Network Failure". $e->getMessage();
		$all_purpose->redirect("./");	
	}	
?>