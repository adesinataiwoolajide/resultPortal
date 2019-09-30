<?php
	session_start();
	require("../Dev/general/all_purpose_class.php");
	include_once("../connection/connection.php");
    require('../Dev/Database.php');
    require('../Dev/autoload.php');
    
    $all_purpose = new all_purpose($db);
    $allocation = new CourseAllocation();
    $user = new User();
    $course = new Course();
	try{
        $db = Database::getInstance()->getConnection();
        if(isset($_POST['allocate-course'])){
            $eemail = $_SESSION['user_name'];
            $user_id = $all_purpose->sanitizeInput($_POST['user_id']);
            $course_id = $all_purpose->sanitizeInput(($_POST['course_id']));
            $level = $all_purpose->sanitizeInput(($_POST['level']));
            $program = $all_purpose->sanitizeInput(($_POST['program']));
            $session = $all_purpose->sanitizeInput(($_POST['session']));

            $details = $user->getSingleUserId($user_id);
            $email = $details['email'];
            $name = $details['name'];

            $courses = $course->getSingleCourseId($course_id);
            $course_code = $courses['course_code'];
            $course_title = $courses['course_title'];
            $course_unit = $courses['course_unit'];

            $allocation_id =  $_POST['allocation_id'];

            if($allocation->updateAllocation($course_id, $user_id, $program, $level, $session, $allocation_id)){
                $action ="Updated Allocated $course_code Details to the Course List";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                $_SESSION['success'] = "You Have Updated The Allocated Course $course_code To $name Successfully";
                $all_purpose->redirect("course_allocation.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("edit-course-allocation.php?allocation_id=$allocation_id");
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update the Allocated The Course";
            $all_purpose->redirect("edit-course-allocation.php?allocation_id=$allocation_id");
        }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
        $all_purpose->redirect("edit-course-allocation.php?allocation_id=$allocation_id");
    }