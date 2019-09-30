<?php
	session_start();
	require("Dev/general/all_purpose_class.php");
	require('Dev/autoload.php');
	require('Dev/Database.php');
	try{
		$db = Database::getInstance()->getConnection();
		$all_purpose = new all_purpose($db);
		if(isset($_POST['login'])){
			$email = $all_purpose->sanitizeInput($_POST['email']);
			
			$query = $db->prepare("SELECT * FROM administrator  WHERE email =:email ");
			$arr=array(':email'=>$email);
			$query->execute($arr);
			$check = $query->rowCount();
			if($check == 0){
				$_SESSION['error'] = "Opps!! $email Does not Exist";
				$all_purpose->redirect("forgot-password.php");
			}else{
				$result = $query->fetch();
				$all_purpose->redirect("update-password.php?email=$email");
			}
		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Retrieve Your Account";
			$all_purpose->redirect("forgot-password.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("forgot-password.php");
	}