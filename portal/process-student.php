<?php
	session_start();
	require("../Dev/general/all_purpose_class.php");
	include_once("../connection/connection.php");
    require('../Dev/Database.php');
    require('../Dev/autoload.php');
    
    $user = new User();
    $student = new Student;

	try{
        $db = Database::getInstance()->getConnection();
        $all_purpose = new all_purpose($db);
        if(isset($_POST['add-student'])){
            $check =0;      
            $filename=$_FILES["file"]["tmp_name"];
            $email = $_SESSION['user_name'];
            
            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($filename, "r");
                $role = 'Student';
                
                while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){

                    $new = $emapData;
                    $student_name = $emapData[0];
                    $student_email = $emapData[1];
                    $phone_number = $emapData[2];
                    $matric_number = $emapData[3];
                    $level =$emapData[4];
                    $program = $emapData[5];
                    $email = $student_email;
                    $password= sha1($student_email);
                    $name = $student_name;

                    if(($user->checkIfExistemail($email)) OR ($student->checkStudentstudentEmail($student_email))){
                        $_SESSION['error']="Ooopss $student_email is in use by another user, Please Kindly use another E-Mail And Try Again";
                        $all_purpose->redirect("students.php");

                    }elseif($student->checkStudentPhone($phone_number)){
                        
                        $_SESSION['error']="Ooopss $phone_number is in use by another student, Please Kindly use another Phone Number And Try Again";
                        $all_purpose->redirect("students.php");
                    
                    
                    
                    }else{
                        if(($student->addStudent($student_name, $student_email, $matric_number, $phone_number,  $level, $program)) AND 
                            ($user->addUser($name, $email, $password, $role))){
                            $action ="Added $matric_number Details to the Student List";
                            $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                            $_SESSION['success'] = "You Have Uploaded The Students Details Successfully";
                        }else{
                            $_SESSION['error']="Network Failure, Please Try Again Later";
                            $all_purpose->redirect("students.php");
                        }
                    }

                }
                
                $all_purpose->redirect("students.php");

            }

        }else{
            $_SESSION['error']="Please Select An Excel File with (.csv) extension To Upload The Students Details";
            $all_purpose->redirect("students.php");
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    	//$all_purpose->redirect("students.php");
    }