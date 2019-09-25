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
        if(isset($_POST['update-course'])){
            $eemail = $_SESSION['user_name'];
            $course_title = $all_purpose->sanitizeInput($_POST['course_title']);
            $course_code = strtoupper($all_purpose->sanitizeInput($_POST['course_code']));
            $course_unit = $all_purpose->sanitizeInput(($_POST['course_unit']));
            $course_status = $all_purpose->sanitizeInput(($_POST['status']));
            $course_id = $_POST['course_id'];
            $return = $_POST['return'];
            $prev = $_POST['prev_code'];

            if($course->updateCourse($course_title, $course_code, $course_unit, $course_status, $course_id)){
                $action ="Changed The Course code from $prev to $course_code";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                $_SESSION['success'] = "You Changed The Course code from $prev to $course_code Successfully";
                $all_purpose->redirect("courses.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("edit-course.php?course_id=$course_id");
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update The Course Details";
            $all_purpose->redirect("edit-course.php?course_id=$course_id");
        }
    }catch(PDOException $e){
    	echo $e->getMessage();
    	//$all_purpose->redirect("edit-course.php?course_id=$course_id");
    }