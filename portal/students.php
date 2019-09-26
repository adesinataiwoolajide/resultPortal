<?php
    require_once('header.php');
    require_once('sidebar.php');
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
                            <li class="breadcrumb-item"><a href="students.php"><?php
                                if(($role == 'Admin') OR ($role == 'Lecturer')){ ?>
                                
                                   Students <?php
                                }else{ ?>
                                    My Details  <?php
                                } ?></a>
                            </li>
                            <li class="breadcrumb-item active"><?php
                                if(($role == 'Admin') OR ($role == 'Lecturer')){ ?>
                                
                                    List of All Saved Students <?php
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
                if($role == 'Admin'){ ?>
                    <section class="basic-elements">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Student Biodate Form</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            
                                            <form action="process-student.php" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <label for="roundText">Select Excel File</label>
                                                            <input type="file" id="roundText" class="form-control round" name="file" required>
                                                        </fieldset>
                                                    </div>
                                                    
                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                    <label for="roundText">Submit The Excel File</label>
                                                        <button type="submit" class="btn btn-secondary btn-lg btn-block" name="add-student">UPLOAD THE STUDENTS RECORD</button>
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
                                                                    onclick="return(confirmToDelete());"><i class="fa fa-trash-o"></i></a><?php
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


