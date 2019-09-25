<?php
	session_start();
	require("../Dev/general/all_purpose_class.php");
	include_once("../connection/connection.php");
    require('../Dev/Database.php');
    require('../Dev/autoload.php');
    
    $user = new User();
    $staff = new Staff();
	try{
        $db = Database::getInstance()->getConnection();
        $all_purpose = new all_purpose($db);
        if(isset($_GET['staff_number'])){
            $eemail = $_SESSION['user_name'];
           
            $staff_number =$_GET['staff_number'];
            $details = $staff->getSingleStaff($staff_number);
            $email = $details['staff_email'];
            $userDetails = $user->getSingleUser($email);
            $user_id = $userDetails['user_id'];
           
            if($user->deleteUserAccount($email) AND ($staff->deleteStaff($staff_number))){
                $action ="Deleted $staff_number Details";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                $_SESSION['success'] = "You Have Deleted $staff_number Details Successfully";
                $all_purpose->redirect("lecturers.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("lecturers.php");
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update The User Details";
            $all_purpose->redirect("lecturers.php");
        }
    }catch(PDOException $e){
        $_SESSION['error']= $e->getMessage();
    	$all_purpose->redirect("lecturers.php");
    }