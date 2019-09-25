<?php 
    class Student {

        public function checkStudentMatricNumber($matric_number)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM students WHERE matric_number=:matric_number");
			$query->bindValue(":matric_number", $matric_number);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
        }

        public function checkStudentstudentEmail($student_email)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM students WHERE student_email=:student_email");
			$query->bindValue(":student_email", $student_email);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
        }

        public function checkStudentPhone($phone_number)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM students WHERE phone_number=:phone_number");
			$query->bindValue(":phone_number", $phone_number);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
        }
        
        public function addStudent($student_name, $student_email, $matric_number, $phone_number,  $level, $program)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("INSERT INTO students(student_name, student_email, matric_number, phone_number, level, program)VALUES
            (:student_name, :student_email, :matric_number, :phone_number, :level, :program)");
            $query->bindValue(":matric_number", $matric_number);
            $query->bindValue(":student_email", $student_email);
            $query->bindValue(":student_name", $student_name);
            $query->bindValue(":phone_number", $phone_number);
            $query->bindValue(":level", $level);
            $query->bindValue(":program", $program);
            if(!empty($query->execute())){
                return true;
            }else{
                return false;
            }
        }

        public function updateStudent($matric_number, $phone_number, $student_email, $student_name,$level, $program)
        {
            $db = Database::getInstance()->getConnection();
            $query = $db->prepare("UPDATE students SET student_name=:student_name, student_email=:student_email, 
            phone_number=:phone_number, level=:level, program=:program WHERE matric_number=:matric_number");
            $query->bindValue(":matric_number", $matric_number);
            $query->bindValue(":student_email", $student_email);
            $query->bindValue(":student_name", $student_name);
            $query->bindValue(":phone_number", $phone_number);
            $query->bindValue(":level", $level);
            $query->bindValue(":program", $program);
            if(!empty($query->execute())){
                return true;
            }else{
                return false;
            }
        }

        public function deleteStudent($matric_number)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM students WHERE matric_number=:matric_number");
			$query->bindValue(":matric_number", $matric_number);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function getAllstudents()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM students ORDER BY matric_number ASC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSingleStudentList($matric_number)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM students WHERE matric_number=:matric_number");
            $query->bindValue(":matric_number", $matric_number);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSingleStudent($matric_number)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM students WHERE matric_number=:matric_number");
            $query->bindValue(":matric_number", $matric_number);
			$query->execute();
			return $query->fetch();
        }


    }
?>