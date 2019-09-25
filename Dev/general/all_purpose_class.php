<?php
	class all_purpose{
		private $db;

		function __construct($db){
			$this->db= $db;
		}

		
		public function sanitizeInput($input){
			$input=trim($input);
			$input=strip_tags($input);
			$input=stripslashes($input);
			$input=htmlentities($input);
			return $input;
		}

		public function gettingUserdetails($user_id){
			try{
				$bringing = $this->db->prepare("SELECT * FROM administrator WHERE user_id=:user_id");
				$are = array(':user_id'=>$user_id);
				if($bringing->execute($are)){
					return true;
				}else{
					return false;
				}

			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function operationHistory($action, $eemail){
			try{
				$history = $this->db->prepare("INSERT INTO activity(action, user_details)VALUES(:action, :eemail)");
				$arrr = array(':action'=>$action, ':eemail'=>$eemail);
				$result = $history->execute($arrr);
				if(!empty($result)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function redirect($url){
		    header('Location: '.$url);
		    exit();
		}

		public function userAccessLevel($access, $action, $email){
			if($access == 'Admin'){
				$nn= $this->operationHistory($action, $eemail);
				$_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Admin Dashboard";
				$this->redirect("portal/./");
			}elseif($access == 'Lecturer'){
				$nn= $this->operationHistory($action, $eemail);
				$_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Leturer Dashboard";
				$this->redirect("portal/./");
			}elseif($access){
				$nn= $this->operationHistory($action, $eemail);
				$_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Student Dashboard";
				$this->redirect("portal/./");

			}else{
				$_SESSION['error'] = "Your are an Invalid User";
				$this->redirect(".././");
			}
			return $access;
		}

		public function getUserDetailsandAddActivity($eemail, $action){
			try{
				$loging_out = $this->db->prepare("SELECT * FROM administrator WHERE email=:eemail");
				$arr = array(':eemail' =>$eemail);
				$loging_out->execute($arr);
				$feting = $loging_out->fetch();	
				$new =$this->operationHistory($action, $eemail);
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		
		}

		public static function generateRandomHash($length)
		{
			return strtoupper(substr(md5(uniqid(rand())), 0, (-32 + $length)));
		}	

	}
?>