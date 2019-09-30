<?php
    require_once('header.php');
    require_once('sidebar.php');
    $matric_number = $_GET['matric_number'];
    $myDetails = $student->getSingleStudent($matric_number);
    $email = $myDetails['student_email'];
    $details = $user::getSingleUser($email);
?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                   
                    <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="edit-student.php?matric_number=<?php echo $matric_number ?>"><?php
                                if(($role == 'Admin')){ ?>
                                
                                   Edit Student <?php
                                }else{ ?>
                                    Edit My Details  <?php
                                } ?></a>
                            </li>
                            <li class="breadcrumb-item"><a href="students.php"><?php
                                if(($role == 'Admin') OR ($role == 'Lecturer')){ ?>
                                
                                   Students <?php
                                }else{ ?>
                                    My Details  <?php
                                } ?></a>
                            </li>
                            <li class="breadcrumb-item active"><?php
                                if(($role == 'Admin')){ ?>
                                
                                   Update <?php echo $matric_number ?> Data <?php
                                }else{ ?>
                                    My Biodata Information <?php
                                } ?>
                            </li>
                        </ol>
                    </div>
                    </div>
                </div>
            </div>
            <div class="content-body"><!-- Stats --><?php 
                if(($role == 'Admin') OR ($role == 'Student')){ ?>
                    <section class="basic-elements">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Student Biodata Form</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            
                                            <form action="update_student.php" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            
                                                            <input type="text" id="roundText" class="form-control round" name="student_name" 
                                                            required placeholder="Enter Your FUll Name" value="<?php echo $myDetails['student_name'] ?>">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            
                                                            <input type="text" id="roundText" class="form-control round" name="matric_number" 
                                                            required value="<?php echo $matric_number ?>" readonly>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                           
                                                            <input type="email" id="roundText" class="form-control round" name="student_email" required 
                                                            value="<?php echo $myDetails['student_email'] ?>">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            
                                                            <input type="number" id="roundText" class="form-control round" name="phone_number" required
                                                            value="<?php echo $myDetails['phone_number'] ?>">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            
                                                            <select class="form-control round" name="level" required>
                                                                <option value="<?php echo $myDetails['level'] ?>"><?php echo $myDetails['level'] ?> </option>
                                                                <option value=""> </option>
                                                                <option value="OND 1"> OND 1 </option>
                                                                <option value="OND 2"> OND 2 </option>
                                                                <option value="HND 1"> HND 1 </option>
                                                                <option value="HND 2"> HND 2 </option>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <select class="form-control round" name="program" required>
                                                                <option value="<?php echo $myDetails['program'] ?>"><?php echo $myDetails['program'] ?> </option>
                                                                <option value=""> </option>
                                                                <option value="Daily PT"> Daily PT </option>
                                                                <option value="Full TIme"> Full Time </option>
                                                                
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="<?php echo $details['user_id'] ?>">
                                                    
                                                    
                                                    <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                                    
                                                        <button type="submit" class="btn btn-secondary btn-lg btn-block" 
                                                        name="update-student">UPDATE THE STUDENT RECORD</button>
                                                    </div>
                                            
                                                
                                                </div> 
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </section><?php 
                } ?>
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <?php
                                        if(($role == 'Admin') OR ($role == 'Lecturer')){ ?>
                                        
                                            List of All Saved Students <?php
                                        }else{ ?>
                                            My Biodata Information <?php
                                        } ?>
                                    </h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Matric</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Level</th>
                                                    <th>Program</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php 
                                                $num =1;
                                                if(($role == 'Admin') OR ($role == 'Lecturer')){
                                                    foreach($student->getAllstudents() as $students){ ?>

                                                        <tr>
                                                            <td><?php echo $num;
                                                            if($role == 'Admin') { ?>

                                                                <a href="delete-student.php?matric_number=<?php echo $students['matric_number'] ?>" class="btn btn-danger" 
                                                                    onclick="return(confirmToDelete());"><i class="fa fa-trash-o"></i></a>
                                                                <a href="edit-student.php?matric_number=<?php echo $students['matric_number'] ?>" class="btn btn-secondary" 
                                                                    ><i class="fa fa-pencil"></i></a><?php
                                                            } ?>
                                                            </td>
                                                            <td><?php echo $students['student_name']; ?></td>
                                                            <td><?php echo $students['matric_number']; ?></td>
                                                            <td><?php echo $students['student_email']; ?></td>
                                                            <td><?php echo $students['phone_number']; ?></td>
                                                            <td><?php echo $students['level']; ?></td>
                                                            <td><?php echo $students['program']; ?></td>
                                                            
                                                        </tr><?php 
                                                        $num++;
                                                    }
                                                }else{
                                                    $email = $_SESSION['user_name'];
                                                    foreach($student->getSingleStudentEmail($email) as $details){ ?>

                                                        <tr>
                                                            <td><?php echo $num ?>
                                                                <a href="edit-student.php?matric_number=<?php echo $students['matric_number'] ?>" class="btn btn-secondary" 
                                                                        ><i class="fa fa-pencil"></i></a>
                                                            </td>
                                                            <td><?php echo $details['student_name']; ?></td>
                                                            <td><?php echo $details['matric_number']; ?></td>
                                                            <td><?php echo $details['student_email']; ?></td>
                                                            <td><?php echo $details['phone_number']; ?></td>
                                                            <td><?php echo $details['level']; ?></td>
                                                            <td><?php echo $details['program']; ?></td>
                                                            
                                                        </tr><?php 
                                                        $num++;
                                                    }
                                                } ?>
                                                
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Matric</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Level</th>
                                                    <th>Program</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php

    require_once('footer.php');

?>


