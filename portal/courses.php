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
                            <li class="breadcrumb-item"><a href="courses.php">Courses</a>
                            </li>
                            <li class="breadcrumb-item active">List of All Saved Departmental Courses
                            </li>
                        </ol>
                    </div>
                    </div>
                </div>
            </div>
            <div class="content-body"><!-- Stats -->
                <section class="basic-elements">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Departmental Course Registration Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="process-course.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                            
                                                <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                    <fieldset class="form-group">
                                                        <label for="roundText">Course Title</label>
                                                        <input type="text" id="roundText" class="form-control round" name="course_title" 
                                                        placeholder="Enter The Course Title" 
                                                        required>
                                                    </fieldset>
                                                </div>
                                                <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                    <fieldset class="form-group">
                                                        <label for="roundText">Course Code</label>
                                                        <input type="text" id="roundText" class="form-control round" placeholder="Enter The Course Code" 
                                                        name="course_code" 
                                                        required maxlength="7">
                                                    </fieldset>
                                                </div>
                                                <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                    <fieldset class="form-group">
                                                        <label for="roundText">Course Unit</label>
                                                        <input type="number" id="roundText" class="form-control round" name="course_unit" 
                                                        placeholder="Enter The Course Unit" 
                                                        required>
                                                    </fieldset>
                                                </div>
                                                <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                    <fieldset class="form-group">
                                                        <label for="roundText">Course Status</label>
                                                        
                                                        <select id="roundText" class="form-control round" name="status">
                                                            <option> -- Select The Status -- </option>
                                                            <option></option><?php
                                                            $status = array('Core', 'Required', 'Elective'); 
                                                            foreach($status as $positions){ ?>
                                                                <option value="<?php echo $positions ?>"> <?php echo $positions ?>  </option><?php
                                                            } ?>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                                    <button type="submit" class="btn btn-secondary btn-lg btn-block" name="add-course">ADD THE COURSE</button>
                                                </div>
                                            
                                            
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">List of All Saved Departmental COurses</h4>
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
                                                    <th>Course Title</th>
                                                    <th>Course Code</th>
                                                    <th>Course Unit</th>
                                                    <th>Course Status</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php
                                                $num =1;
                                                foreach($course::getAllCourses() as $courses){?>
                                                    <tr>
                                                        <td><?php echo $num ?>
                                                            <a href="delete-course.php?course_code=<?php echo $courses['course_code'] ?>" class="btn btn-danger" onclick="return(confirmToDelete());"><i class="fa fa-trash-o"></i></a>
                                                            <a href="edit-course.php?course_code=<?php echo $courses['course_code'] ?>" class="btn btn-success" onclick="return(confirmToEdit());"><i class="fa fa-pencil"></i></a>
												
                                                        
                                                        </td>
                                                        <td><?php echo $courses['course_title'] ?></td>
                                                        <td><?php echo $courses['course_code'] ?></td>
                                                        <td><?php echo $courses['course_unit'] ?></td>
                                                        <td><?php echo $courses['course_status'] ?></td>
                                                        
                                                    </tr><?php 
                                                    $num++;
                                                } ?>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Course Title</th>
                                                    <th>Course Code</th>
                                                    <th>Course Unit</th>
                                                    <th>Course Status</th>
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


