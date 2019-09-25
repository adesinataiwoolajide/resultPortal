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
            $password = $all_purpose->sanitizeInput(sha1($_POST['password']));
            $phone_number = $all_purpose->sanitizeInput($_POST['phone_number']);
            $year = date('Y');
            $number = rand(01,50);

            if(strlen($number) < 2){
                $staff_number = 'CSC'.'-'.'00'.$number."-".$year;
            }elseif(strlen($number) == 2){
                $staff_number = 'CSC'.'-'.'0'.$number."-".$year;
            }else{
                $staff_number = 'CSC'.'-'.$number."-".$year;
            }
            
            $role = 'Lecturer';

            if($user->checkIfExistemail($staff_email) OR ($staff->checkStaffstaffEmail($staff_email))){
                $_SESSION['error']="Ooopss $staff_email is in use by another user, Please Kindly use another E-Mail And Try Again";
                $all_purpose->redirect("lecturers.php");
            }elseif($staff->checkStaffPhone($phone_number)){

                $_SESSION['error']="Ooopss $phone_number is in use by another lecturer, Please Kindly use another Phone Number And Try Again";
                $all_purpose->redirect("lecturers.php");
            }else{

                if($user->addUser($name, $email, $password, $role) AND ($staff->addStaff($staff_number, $phone_number, $staff_email, $staff_name))){
                    $action ="Added $staff_number Details to the User List";
                    $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                    $_SESSION['success'] = "You Have Added $staff_number Details to the Staff List Successfully";
                    $all_purpose->redirect("lecturers.php");
                }else{
                    $_SESSION['error']="Network Failure, Please Try Again Later";
                    $all_purpose->redirect("lecturers.php");
                }
            }
        }else{
            $_SESSION['error']="Please FIll The Below Form To Add The User Details";
            $all_purpose->redirect("lecturers.php");
        }
    }catch(PDOException $e){
        $_SESSION['error']= $e->getMessage();
    	$all_purpose->redirect("lecturers.php");
    }