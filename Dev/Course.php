<?php
	class Course{

        public function checkCourseCode($course_code)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM courses WHERE course_code=:course_code");
			$query->bindValue(":course_code", $course_code);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
        }
        
        public function addCourse($course_title, $course_code, $course_unit, $course_status)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("INSERT INTO courses(course_title, course_code, course_unit, course_status)VALUES
            (:course_title, :course_code, :course_unit, :course_status)");
            $query->bindValue(":course_code", $course_code);
            $query->bindValue(":course_title", $course_title);
            $query->bindValue(":course_unit", $course_unit);
            $query->bindValue(":course_status", $course_status);
            if(!empty($query->execute())){
                return true;
            }else{
                return false;
            }
        }

        public function updateCourse($course_title, $course_code, $course_unit, $course_status, $course_id)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("UPDATE courses SET course_title=:course_title, course_unit=:course_unit, course_status=:course_status, course_code=:course_code 
            WHERE course_id=:course_id");
            $query->bindValue(":course_code", $course_code);
            $query->bindValue(":course_title", $course_title);
            $query->bindValue(":course_unit", $course_unit);
            $query->bindValue(":course_status", $course_status);
            $query->bindValue(":course_id", $course_id);
            if(!empty($query->execute())){
                return true;
            }else{
                return false;
            }
        }

        public function deleteCourse($course_code)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM courses WHERE course_code=:course_code");
			$query->bindValue(":course_code", $course_code);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function getAllCourses()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM courses ORDER BY course_title ASC");
			$query->execute();
            $list = $query->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }

        public function getSingleCourseList($course_code)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM courses WHERE course_code=:course_code");
            $query->bindValue(":course_code", $course_code);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSingleCourse($course_code)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM courses WHERE course_code=:course_code");
            $query->bindValue(":course_code", $course_code);
			$query->execute();
			return $query->fetch();
        }

        public function getSingleCourseId($course_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM courses WHERE course_id=:course_id");
            $query->bindValue(":course_id", $course_id);
			$query->execute();
			return $query->fetch();
        }
    }


?>