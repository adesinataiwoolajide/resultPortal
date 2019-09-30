<?php
    require_once('header.php');
    require_once('sidebar.php');
?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                   
                    <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="course_allocation.php">Course Allocation</a>
                            </li>
                            <li class="breadcrumb-item active"> Departmental Course Allocation
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
                                        <h4 class="card-title">Departmental Course Allocation Form</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form action="process_course_allocation.php" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                
                                                    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <label for="roundText"> Course Title </label>
                                                            <select id="roundText" class="form-control round" name="course_id" required>
                                                                <option value=""> -- Select The Course -- </option>
                                                                <option value=""></option><?php
                                                                foreach($course->getAllCourses() as $courses){?>
                                                                    <option value="<?php echo $courses['course_id'] ?>"> 
                                                                    <?php echo $courses['course_title']. " ". $courses['course_code'] ?> 
                                                                    </option><?php
                                                                } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <label for="roundText"> Lecturer </label>
                                                            <select id="roundText" class="form-control round" name="user_id" required>
                                                                <option value=""> -- Select The Lecturer -- </option>
                                                                <option value=""></option><?php
                                                                foreach($user->getAlLect() as $lecturer){?>
                                                                    <option value="<?php echo $lecturer['user_id'] ?>"> 
                                                                    <?php echo $lecturer['name'] ?> 
                                                                    </option><?php
                                                                } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <label for="roundText"> Level </label>
                                                            <select id="roundText" class="form-control round" name="level" required>
                                                                <option value="">- Select Level -</option>
                                                                <option value=""></option><?php
                                                                $level = array('OND 1', 'OND 2', 'HND 1', 'HND 2'); 
                                                                foreach($level as $levels){ ?>
                                                                    <option value="<?php echo $levels ?>"> <?php echo $levels ?>  
                                                                    </option><?php
                                                                } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <label for="roundText">Program</label>
                                                            <select id="roundText" class="form-control round" name="program" required>
                                                                <option value="">- Select Program - </option>
                                                                <option value=""></option><?php
                                                                $status = array('Full Time', 'Part Time'); 
                                                                foreach($status as $positions){ ?>
                                                                    <option value="<?php echo $positions ?>"> <?php echo $positions ?>  
                                                                    </option><?php
                                                                } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <label for="roundText">Academic Session</label>
                                                            
                                                            <select id="roundText" class="form-control round" name="session" required>
                                                                <option value="">- Select Session -</option>
                                                                <option></option><?php
                                                                $session = array('2017/2018', '2018/2019', '2019/2020', '2020/2021');
                                                                foreach($session as $sessions){ ?>
                                                                    <option value="<?php echo $sessions ?>"> <?php echo $sessions ?>  
                                                                    </option><?php
                                                                } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                                        <button type="submit" class="btn btn-secondary btn-lg btn-block" 
                                                        name="allocate-course">ALLOCATE THE COURSE</button>
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
                                    <h4 class="card-title">List of All Departmental Course Allocation</h4>
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
                                                   
                                                    <th>Staff Name</th>
                                                    <th>Program</th>
                                                    <th>Level</th>
                                                    <th>Session</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php
                                                $num =1;
                                                foreach($allocation->getAllAllocation() as $courses){ 
                                                    $course_id = $courses['course_id'];
                                                    $details = $course->getSingleCourseId($course_id);
                                                    $user_id = $courses['user_id'];
                                                    $lect = $user->getSingleUserId($user_id);
                                                     ?>
                                                    <tr>
                                                        <td><?php echo $num;
                                                            if($role == 'Admin'){ ?>
                                                                <a href="delete-course-allocation.php?allocation_id=<?php echo $courses['allocation_id'] ?>" 
                                                                class="" onclick="return(confirmToDelete());">
                                                                <i class="fa fa-trash-o"></i></a>
                                                                <a href="edit-course-allocation.php?allocation_id=<?php echo $courses['allocation_id'] ?>" 
                                                                class="" 
                                                                onclick="return(confirmToEdit());"><i class="fa fa-pencil"></i></a><?php
                                                            } ?>
                                                        
                                                        </td>
                                                        <td><?php echo $details['course_title'] ?></td>
                                                        <td><?php echo $details['course_code'] ?></td>
                                                        <td><?php echo $lect['name'] ?></td>
                                                        <td><?php echo $courses['program'] ?></td>
                                                        <td><?php echo $courses['level'] ?></td>
                                                        <td><?php echo $courses['session'] ?></td>
                                                        
                                                    </tr><?php 
                                                    $num++;
                                                } ?>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Course Title</th>
                                                    <th>Course Code</th>
                                                    
                                                    <th>Staff Name</th>
                                                    <th>Program</th>
                                                    <th>Level</th>
                                                    <th>Session</th>
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