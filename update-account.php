<?php
	session_start();
	require("Dev/general/all_purpose_class.php");
	include_once("connection/connection.php");
    require('Dev/Database.php');
    require('Dev/autoload.php');
    
    $user = new User();
	try{
        $db = Database::getInstance()->getConnection();
        $all_purpose = new all_purpose($db);
        if(isset($_POST['update-user'])){
            
            $name = $all_purpose->sanitizeInput($_POST['name']);
            $email =$_POST['email'];
            $password = $all_purpose->sanitizeInput(sha1($_POST['password']));
            $eemail = $email;
            $result = $user->getSingleUser($email);
            $role = $result['role'];
           
            if($user->updateUser($role, $name, $email, $password)){
               
                $action ="$email Updated Account";

				$_SESSION['user_name'] = $result['email'];
				$_SESSION['role'] = $result['role'];
				$_SESSION['name'] = $result['name'];
				$_SESSION['id'] = $result['user_id'];

				$user_email = $_SESSION['user_name'];
				$access = $_SESSION['role'];
                $action ="Logged In";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
				$login =  $all_purpose->userAccessLevel($access, $action, $email);
                
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("update-password.php?email=$email");
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update The User Details";
            $all_purpose->redirect("update-password.php?email=$email");
        }
    }catch(PDOException $e){
        $_SESSION['error']= $e->getMessage();
    	$all_purpose->redirect("update-password.php?email=$email");
    }