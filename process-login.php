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
			$password = sha1($_POST['password']);
			
			$query = $db->prepare("SELECT * FROM administrator  WHERE email =:email AND password =:password");
			$arr=array(':email'=>$email, ':password'=>$password);
			$query->execute($arr);
			$check = $query->rowCount();
			if($check == 0){
				$_SESSION['error'] = "Opps!! Invalid Username or Password";
				$all_purpose->redirect("./");
			}else{
				$result = $query->fetch();
				$_SESSION['user_name'] = $result['email'];
				$_SESSION['role'] = $result['role'];
				$_SESSION['name'] = $result['name'];
				$_SESSION['id'] = $result['user_id'];

				$user_email = $_SESSION['user_name'];
				$access = $_SESSION['role'];
				$action ="Logged In";
				$login =  $all_purpose->userAccessLevel($access, $action, $email);
			}
		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Access The Result Portal";
			$all_purpose->redirect("./");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("./");
	}