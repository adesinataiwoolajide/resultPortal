<?php 
    class Staff {

        public function checkStaffNumber($staff_number)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM staffs WHERE staff_number=:staff_number");
			$query->bindValue(":staff_number", $staff_number);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
        }

        public function checkStaffstaffEmail($staff_email)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM staffs WHERE staff_email=:staff_email");
			$query->bindValue(":staff_email", $staff_email);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
        }

        public function checkStaffPhone($phone_number)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM staffs WHERE phone_number=:phone_number");
			$query->bindValue(":phone_number", $phone_number);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
        }
        
        public function addStaff($staff_number, $phone_number, $staff_email, $staff_name)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("INSERT INTO staffs(staff_name, staff_email, staff_number, phone_number)VALUES
            (:staff_name, :staff_email, :staff_number, :phone_number)");
            $query->bindValue(":staff_number", $staff_number);
            $query->bindValue(":staff_email", $staff_email);
            $query->bindValue(":staff_name", $staff_name);
            $query->bindValue(":phone_number", $phone_number);
            
            if(!empty($query->execute())){
                return true;
            }else{
                return false;
            }
        }

        public function updateStaff($staff_number, $phone_number, $staff_email, $staff_name)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("UPDATE staffs SET staff_name=:staff_name, staff_email=:staff_email, phone_number=:phone_number WHERE staff_number=:staff_number");
            $query->bindValue(":staff_number", $staff_number);
            $query->bindValue(":staff_email", $staff_email);
            $query->bindValue(":staff_name", $staff_name);
            $query->bindValue(":phone_number", $phone_number);
        
            if(!empty($query->execute())){
                return true;
            }else{
                return false;
            }
        }
        

        public function deleteStaff($staff_number)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM staffs WHERE staff_number=:staff_number");
			$query->bindValue(":staff_number", $staff_number);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function getAllstaffs()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM staffs ORDER BY staff_number ASC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSingleStaffList($staff_number)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM staffs WHERE staff_number=:staff_number");
            $query->bindValue(":staff_number", $staff_number);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSingleStaff($staff_number)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM staffs WHERE staff_number=:staff_number");
            $query->bindValue(":staff_number", $staff_number);
			$query->execute();
			return $query->fetch();
        }


    }
?>