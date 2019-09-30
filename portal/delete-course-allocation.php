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
        if(isset($_GET['allocation_id'])){
            $eemail = $_SESSION['user_name'];
            $allocation_id = $_GET['allocation_id'];

            $deed = $allocation->getSingleAlloca($allocation_id);
            $course_id = $deed['course_id'];
            $courses = $course->getSingleCourseId($course_id);
            $course_code = $courses['course_code'];
            $course_title = $courses['course_title'];
            $course_unit = $courses['course_unit'];

            $user_id = $deed['user_id'];
            $deta = $user->getSingleUserId($user_id);
            $email = $deta['email'];
            $name = $deta['name'];
            

            if($allocation->deleteAllocation($allocation_id)){
                $action ="Deleted $course_code Allocated to $name";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                $_SESSION['success'] = "You Have Deleted $course_code Allocated to $name Successfully";
                $all_purpose->redirect("course_allocation.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
               $all_purpose->redirect("course_allocation.php");
            }
            
        }else{
            $_SESSION['error']="Please Click The Trash Icon to delete the course allocation";
           $all_purpose->redirect("course_allocation.php");
        }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
       $all_purpose->redirect("course_allocation.php");
    }