<?php 
    class CourseAllocation  {

        public function getAllAllocation()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM course_allocations ORDER BY allocation_id DESC");
			$query->execute();
            $list = $query->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }

        public function addAllocation($course_id, $user_id, $program, $level, $session)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("INSERT INTO course_allocations(course_id, user_id, program, level, session) 
            VALUES (:course_id, :user_id, :program, :level, :session)");
            $query->bindValue(":course_id", $course_id);
            $query->bindValue(":user_id", $user_id);
            $query->bindValue(":level", $level);
            $query->bindValue(":program", $program);
            $query->bindValue(":session", $session);

            if(!empty($query->execute())){
                return true;
            }else{
                return false;
            }
            
        }

        public function updateAllocation($course_id, $user_id, $program, $level, $session, $allocation_id)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("UPDATE course_allocations SET course_id=:course_id, user_id=:user_id, program=:program, level=:level, 
            session=:session WHERE allocation_id=:allocation_id");
            $query->bindValue(":course_id", $course_id);
            $query->bindValue(":user_id", $user_id);
            $query->bindValue(":level", $level);
            $query->bindValue(":program", $program);
            $query->bindValue(":session", $session);
            $query->bindValue(":allocation_id", $allocation_id);

            if(!empty($query->execute())){
                return true;
            }else{
                return false;
            }
            
        }

        public function deleteAllocation($allocation_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM course_allocations WHERE allocation_id=:allocation_id");
			$query->bindValue(":allocation_id", $allocation_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function getSingleAllocation($allocation_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM course_allocations WHERE allocation_id=:allocation_id");
            $query->bindValue(":allocation_id", $allocation_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSingleAlloca($allocation_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM course_allocations WHERE allocation_id=:allocation_id");
            $query->bindValue(":allocation_id", $allocation_id);
			$query->execute();
			return $query->fetch();
        }

        public function checkAllocation($course_id, $user_id, $program, $level, $session)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM course_allocations WHERE course_id=:course_id AND user_id=:user_id AND 
            program=:program AND level=:level AND session=:session");
            $query->bindValue(":course_id", $course_id);
            $query->bindValue(":user_id", $user_id);
            $query->bindValue(":level", $level);
            $query->bindValue(":program", $program);
            $query->bindValue(":session", $session);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
    

        public function checkAllocationDuplicate($course_id,  $program, $level, $session)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM course_allocations WHERE course_id=:course_id AND 
            program=:program AND level=:level AND session=:session");
            $query->bindValue(":course_id", $course_id);
            $query->bindValue(":level", $level);
            $query->bindValue(":program", $program);
            $query->bindValue(":session", $session);

            if($query->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }
    }

    

?>