<?php
	session_start();
	require("../Dev/general/all_purpose_class.php");
	include_once("../connection/connection.php");
    require('../Dev/Database.php');
    require('../Dev/autoload.php');
    
    $db = Database::getInstance()->getConnection();
    $all_purpose = new all_purpose($db);
    $course = new course();
	try{
       
        if(isset($_GET['course_code'])){
            $eemail = $_SESSION['user_name'];
            $course_code = $_GET['course_code'];
            $details = $course::getSingleCourse($course_code);
            $course_title = $details['course_title'];
            
            if($course->deleteCourse($course_code)){
                $action ="Deleted $email Details From the Course List";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                $_SESSION['success']="You Have Deleted $course_title From The Course List";
	    		$all_purpose->redirect("courses.php");
            }else{

                
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("courses.php");
                
            }
        }else{
            $_SESSION['error']="Please 
             The Course Details";
            $all_purpose->redirect("courses.php");
        }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("courses.php");
    }