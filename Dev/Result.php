<?php 
    class Result {

        public function checkDResult($course_code, $session)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM results WHERE matric_number=:matric_number, course_code=:course_code AND session=:session");
            $query->bindValue(":course_code", $course_code);
            $query->bindValue(":session", $session);
            $query->bindValue(":matric_number", $matric_number);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
        }
        
        public function addCourseRegistration($course_code, $matric_number, $session)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("INSERT INTO results(matric_number, session, course_code)VALUES
            (:matric_number, :session, :course_code)");
            $query->bindValue(":course_code", $course_code);
            $query->bindValue(":session", $session);
            $query->bindValue(":matric_number", $matric_number);
            
            if(!empty($query->execute())){
                return true;
            }else{
                return false;
            }
        }

        public function updateCourseRegistration($course_code, $session, $matric_number)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("UPDATE results SET course_code=:course_code, session=:session WHERE matric_number=:matric_number)");
            $query->bindValue(":course_code", $course_code);
            $query->bindValue(":session", $session);
            $query->bindValue(":matric_number", $matric_number);
        
            if(!empty($query->execute())){
                return true;
            }else{
                return false;
            }
        }

        public function deleteCourseRegistration($registration_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM results WHERE registration_id=:registration_id");
            $query->bindValue(":registration_id", $registration_id);
            
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function getAllCourseRegistration()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM results ORDER BY session ASC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSingleStudentCourseList($matric_number)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM results WHERE matric_number=:matric_number");
            $query->bindValue(":matric_number", $matric_number);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSingleStudentCourse($matric_number)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM results WHERE matric_number=:matric_number");
            $query->bindValue(":matric_number", $matric_number);
			$query->execute();
			return $query->fetch();
        }

        public function getSingleStudentCourseForm($matric_number, $session)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM results WHERE matric_number=:matric_number AND session=:session");
            $query->bindValue(":matric_number", $matric_number);
            $query->bindValue(":session", $session);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSingleCourseFOrm($course_code)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM results WHERE matric_number=:matric_number AND session=:session");
            $query->bindValue(":matric_number", $matric_number);
            $query->bindValue(":session", $session);
			$query->execute();
			return $query->fetch();
        }


    }
?>