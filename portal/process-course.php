<?php
	session_start();
	require("../Dev/general/all_purpose_class.php");
	include_once("../connection/connection.php");
    require('../Dev/Database.php');
    require('../Dev/autoload.php');
    
    $all_purpose = new all_purpose($db);
    $course = new course();
	try{
        $db = Database::getInstance()->getConnection();
        if(isset($_POST['add-course'])){
            $eemail = $_SESSION['user_name'];
            $course_title = $all_purpose->sanitizeInput($_POST['course_title']);
            $course_code = strtoupper($all_purpose->sanitizeInput($_POST['course_code']));
            $course_unit = $all_purpose->sanitizeInput(($_POST['course_unit']));
            $course_status = $all_purpose->sanitizeInput(($_POST['status']));
            
            if($course->checkCourseCode($course_code)){
                $_SESSION['error']="You HAve Added $course_code To The Course List Before";
	    		$all_purpose->redirect("courses.php");
            }else{

                if($course->addCourse($course_title, $course_code, $course_unit, $course_status)){
                    $action ="Added $course_code Details to the Course List";
                    $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                    $_SESSION['success'] = "You Have Added $course_code to the Course List Successfully";
                    $all_purpose->redirect("courses.php");
                }else{
                    $_SESSION['error']="Network Failure, Please Try Again Later";
                    $all_purpose->redirect("courses.php");
                }
            }
        }else{
            $_SESSION['error']="Please FIll The Below Form To Add The Course Details";
            $all_purpose->redirect("courses.php");
        }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("courses.php");
    }