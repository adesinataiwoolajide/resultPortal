<?php
	session_start();
	require("../Dev/general/all_purpose_class.php");
	include_once("../connection/connection.php");
    require('../Dev/Database.php');
    require('../Dev/autoload.php');
    
    $user = new User();
    $student = new Student();
	try{
        $db = Database::getInstance()->getConnection();
        $all_purpose = new all_purpose($db);
        if(isset($_GET['matric_number'])){
            $eemail = $_SESSION['user_name'];
           
            $matric_number =$_GET['matric_number'];
            $details = $student->getSingleStudent($matric_number);
            $email = $details['student_email'];
            $userDetails = $user->getSingleUser($email);
            $user_id = $userDetails['user_id'];
           
            if($user->deleteUserAccount($email) AND ($student->deleteStudent($matric_number))){
                $action ="Deleted $matric_number Details";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                $_SESSION['success'] = "You Have Deleted $matric_number Details Successfully";
                $all_purpose->redirect("students.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("students.php");
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update The User Details";
            $all_purpose->redirect("students.php");
        }
    }catch(PDOException $e){
        $_SESSION['error']= $e->getMessage();
    	$all_purpose->redirect("students.php");
    }