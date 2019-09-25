<?php
	session_start();
	require("../Dev/general/all_purpose_class.php");
	include_once("../connection/connection.php");
    require('../Dev/Database.php');
    require('../Dev/autoload.php');
    
    $all_purpose = new all_purpose($db);
    $user = new User();
	try{
        $db = Database::getInstance()->getConnection();
        if(isset($_GET['email'])){
            $eemail = $_SESSION['user_name'];
            $email = $_GET['email'];
            $details = $user::getSingleUser($email);
            $name = $details['name'];
            
            if($user::deleteUserAccount($email)){
                $action ="Deleted $email From the User List";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                $_SESSION['success'] = "You Have Deleted $email From the User List Successfully";
                $all_purpose->redirect("users.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("users.php");
            }
            
        }else{
            $_SESSION['error']="Please Click The Trash Icon To Delete The User Details";
            $all_purpose->redirect("users.php");
        }
    }catch(PDOException $e){
    	$_SESSION['error']= $e->getMessage();
    	$all_purpose->redirect("users.php");
    }