<?php
	session_start();
	require("../Dev/general/all_purpose_class.php");
	include_once("../connection/connection.php");
    require('../Dev/Database.php');
    require('../Dev/User.php');
    
    $user = new User();
	try{
        $db = Database::getInstance()->getConnection();
        $all_purpose = new all_purpose($db);
        if(isset($_POST['add-user'])){
            $eemail = $_SESSION['user_name'];
            $name = $all_purpose->sanitizeInput($_POST['name']);
            $email = $all_purpose->sanitizeInput($_POST['email']);
            $password = $all_purpose->sanitizeInput(sha1($_POST['password']));
            $repeat = $all_purpose->sanitizeInput(sha1($_POST['repeat']));
            if($password != $repeat){
                $_SESSION['error']="Password Does Not Match";
	    		$all_purpose->redirect("users.php");
            }
            $role = 'Admin';

            if($user->checkIfExistemail($email)){
                $_SESSION['error']="Ooopss $email is in use by another user, Please Kindly use another E-Mail And Try Again";
	    		$all_purpose->redirect("users.php");
            }else{

                if($user->addUser($name, $email, $password, $role)){
                    $action ="Added $email Details to the User List";
                    $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                    $_SESSION['success'] = "You Have Added $email Details to the User List Successfully";
                    $all_purpose->redirect("users.php");
                }else{
                    $_SESSION['error']="Network Failure, Please Try Again Later";
                    $all_purpose->redirect("users.php");
                }
            }
        }else{
            $_SESSION['error']="Please FIll The Below Form To Add The User Details";
            $all_purpose->redirect("users.php");
        }
    }catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("users.php");
    }