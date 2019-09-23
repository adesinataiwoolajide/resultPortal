<?php
	class User{
		
		 public function checkIfExistemail($email)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM administrator WHERE email=:email");
			$query->bindValue(":email", $email);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}
        
        
        public function deleteUserAccount($email)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM administrator WHERE email=:email");
			$query->bindValue(":email", $email);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function getAllUser()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM administrator ORDER BY name ASC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addUser($name, $email, $password, $role)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("INSERT INTO administrator(name, email, password, role)
                 VALUES (:name, :email, :password, :role)");
            $query->bindValue(":name", $name);
             
            $query->bindValue(":email", $email);
            $query->bindValue(":password", $password);
            $query->bindValue(":role", $role);
            if(!empty($query->execute())){
				return true;
			}else{
                return false;
            }
        }
        public function updateUser($role,$name, $email, $password)
        {
            $db = Database::getInstance()->getConnection();
            $query= $db->prepare("UPDATE administrator SET name=:name, password=:password, role=:role WHERE email=:email");
            $query->bindValue(":name", $name);
            $query->bindValue(":email", $email);
            $query->bindValue(":password", $password);
            $query->bindValue(":role", $role);
            //$query->bindValue(":user_id", $user_id);
            if(!empty($query->execute())){
				return true;
			}else{
                return false;
            }
        }

        public function userLogin($email, $password)
        {
            $db= Database::getInstance()->getConnection();
            $query= $db->prepare("SELECT * FROM administrator WHERE email=:email AND password=:password");
            $query->bindValue(":email", $email);
            $query->bindValue(":password", $password);
            $query->execute();
            $details= $query->fetch();
            return $details;
        }

        public function getSingleUser($email)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM administrator WHERE email=:email");
            $query->bindValue(":email", $email);
			$query->execute();
			return $query->fetch();
        }

        public function getSingleUserId($user_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM administrator WHERE user_id=:user_id");
            $query->bindValue(":user_id", $user_id);
			$query->execute();
			return $query->fetch();
        }
        
        public function checkUserLogin($email, $password)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM administrator WHERE email=:email AND password=:password");
            $query->bindValue(":email", $email);
            $query->bindValue(":password", $password);
            $query->execute();
            if($query->rowCount() == 0){
                return true;
            }else{
                return false;
            }
        }

		
	}
?>