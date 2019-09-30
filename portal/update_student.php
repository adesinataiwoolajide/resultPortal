<?php
	session_start();
	require("../Dev/general/all_purpose_class.php");
	include_once("../connection/connection.php");
    require('../Dev/Database.php');
    require('../Dev/autoload.php');
    
    $user = new User();
    $student = new Student;
	try{
        $db = Database::getInstance()->getConnection();
        $all_purpose = new all_purpose($db);
        if(isset($_POST['update-student'])){
            $eemail = $_SESSION['user_name'];
            $student_name = $all_purpose->sanitizeInput($_POST['student_name']);
            $student_email = $all_purpose->sanitizeInput($_POST['student_email']);
            $level = $all_purpose->sanitizeInput($_POST['level']);
            $program = $all_purpose->sanitizeInput($_POST['program']);
            $phone_number = $all_purpose->sanitizeInput($_POST['phone_number']);
            $matric_number = $_POST['matric_number'];
            $user_id = $_POST['user_id'];
            $role = 'Student';
            $name = $student_name;
            $email = $student_email;

           
            if($user->updateUserLectuere($role, $name, $email, $user_id) AND 
                ($student->updateStudent($matric_number, $phone_number, $student_email, $student_name, $level, $program))){
                $action ="Updated $matric_number Details";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                $_SESSION['success'] = "You Have Updated $matric_number Details Successfully";
                $all_purpose->redirect("students.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("edit-student.php?matric_number=$matric_number");
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update The User Details";
            $all_purpose->redirect("edit-student.php?matric_number=$matric_number");
        }
    }catch(PDOException $e){
        $_SESSION['error']= $e->getMessage();
    	$all_purpose->redirect("edit-student.php?matric_number=$matric_number");
    }