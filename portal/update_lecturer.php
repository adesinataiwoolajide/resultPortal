<?php
	session_start();
	require("../Dev/general/all_purpose_class.php");
	include_once("../connection/connection.php");
    require('../Dev/Database.php');
    require('../Dev/autoload.php');
    
    $user = new User();
    $staff = new Staff;
	try{
        $db = Database::getInstance()->getConnection();
        $all_purpose = new all_purpose($db);
        if(isset($_POST['add-user'])){
            $eemail = $_SESSION['user_name'];
            $name = $all_purpose->sanitizeInput($_POST['name']);
            $staff_name = $name;
            $staff_email = $all_purpose->sanitizeInput($_POST['email']);
            $email = $staff_email;
            $phone_number = $all_purpose->sanitizeInput($_POST['phone_number']);
            $year = date('Y');
            $staff_number =$_POST['staff_number'];

            $user_id = $_POST['user_id'];
            $role = 'Lecturer';

           
            if($user-> updateUserLectuere($role,$name, $email, $user_id) AND ($staff->updateStaff($staff_number, $phone_number, $staff_email, $staff_name))){
                $action ="Updated $satff_number Details";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                $_SESSION['success'] = "You Have Updated $satff_number Details Successfully";
                $all_purpose->redirect("lecturers.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("lecturer.php?staff_number=$staff_number");
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update The User Details";
            $all_purpose->redirect("lecturer.php?staff_number=$staff_number");
        }
    }catch(PDOException $e){
        $_SESSION['error']= $e->getMessage();
    	$all_purpose->redirect("lecturer.php?staff_number=$staff_number");
    }