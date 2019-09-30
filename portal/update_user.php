<?php
	session_start();
	require("../Dev/general/all_purpose_class.php");
	include_once("../connection/connection.php");
    require('../Dev/Database.php');
    require('../Dev/autoload.php');
    
    $user = new User();
	try{
        $db = Database::getInstance()->getConnection();
        $all_purpose = new all_purpose($db);
        if(isset($_POST['update-user'])){
            $eemail = $_SESSION['user_name'];
            $name = $all_purpose->sanitizeInput($_POST['name']);
            $email =$_POST['email'];
            $pass = $all_purpose->sanitizeInput(sha1($_POST['password']));
            //$user_id = $_POST['user_id'];
            $former = $_POST['former'];
            if(empty($pass)){
                $details = $user::getSingleUser($email);
                $password = $details['password'];
            }else{
                $password = $pass;
            }
            
            $role = 'Admin';

            if($user->updateUser($role,$name, $email, $password)){
                $action ="Updated $email Data";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                $_SESSION['success'] = "You Have Updated $email Details Successfully";
                $all_purpose->redirect("users.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("edit-user.php?email=$email");
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update The User Details";
            $all_purpose->redirect("edit-user.php?email=$email");
        }
    }catch(PDOException $e){
        $_SESSION['error']= $e->getMessage();
    	$all_purpose->redirect("edit-user.php?email=$email");
    }