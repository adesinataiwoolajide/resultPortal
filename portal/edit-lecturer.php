<?php
    require_once('header.php');
    require_once('sidebar.php');
    $staff_number = $_GET['staff_number']; 
    $details = $staff->getSingleStaff($staff_number);
    $email = $details['staff_email'];
    $userDetails = $user->getSingleUser($email);
    $user_id = $userDetails['user_id'];
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
                            <li class="breadcrumb-item"><a href="edit-lecturer.php?staff_number=<?php echo $staff_number ?>">Edit Lecturer</a>
                            </li>
                            <li class="breadcrumb-item"><a href="lecturers.php">Lecturers</a>
                            </li>
                            <li class="breadcrumb-item active">List of All Saved Lecturers
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
                                    <h4 class="card-title">Edit Lecturer Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        
                                        <form action="update_lecturer.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                    <fieldset class="form-group">
                                                        <label for="roundText"> Lecturer Full Name</label>
                                                        <input type="text" id="roundText" class="form-control round" name="name" placeholder="Enter The Full Name" 
                                                        required value="<?php echo $details['staff_name'] ?>">
                                                    </fieldset>
                                                </div>
                                                <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                    <fieldset class="form-group">
                                                        <label for="roundText">Lecturer E-Mail</label>
                                                        <input type="email" id="roundText" class="form-control round" placeholder="Enter The E-mail" name="email" required
                                                        value="<?php echo $details['staff_email'] ?>" >
                                                    </fieldset>
                                                </div>
                                                <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                    <fieldset class="form-group">
                                                        <label for="roundText">Lecturer Phone Number</label>
                                                        <input type="number" id="roundText" class="form-control round" placeholder="Enter Phone Number" required 
                                                        name="phone_number" maxlength="11" value="<?php echo $details['phone_number'] ?>">
                                                    </fieldset>
                                                </div>
                                                <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                    <fieldset class="form-group">
                                                        <label for="roundText"> Staff Number</label>
                                                        <input type="text" id="roundText" class="form-control round" name="staff_number" readonly value="<?php echo $staff_number ?>">
                                                    </fieldset>
                                                </div>

                                            
                                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                                <!-- <input type="text" name="password" value="<?php echo $userDetails['password'] ?>"> -->

                                                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                                    <button type="submit" class="btn btn-secondary btn-lg btn-block" name="add-user">UPDATE THE LECTURER</button>
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
                                    <h4 class="card-title">List of All Saved Lecturers</h4>
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
                                                    <th>Email</th>
                                                    <th>Staff Number</th>
                                                    <th>Phone Number</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php 
                                                $num =1;
                                                foreach($staff->getAllstaffs() as $staffs){ ?>
                                                    <tr>
                                                        <td><?php echo $num ?>
                                                            <a href="delete-lecturer.php?staff_number=<?php echo $staffs['staff_number'] ?>" class="btn btn-danger" onclick="return(confirmToDelete());"><i class="fa fa-trash-o"></i></a>
                                                            <a href="edit-lecturer.php?staff_number=<?php echo $staffs['staff_number'] ?>" class="btn btn-success" onclick="return(confirmToEdit());"><i class="fa fa-pencil"></i></a>
                                                        </td>
                                                        <td><?php echo $staffs['staff_name'] ?></td>
                                                        <td><?php echo $staffs['staff_email'] ?></td>
                                                        <td><?php echo $staffs['staff_number'] ?></td>
                                                        <td><?php echo $staffs['phone_number'] ?></td>
                                                        
                                                    </tr><?php 
                                                    $num++; 
                                                } ?>
                                               
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Staff Number</th>
                                                    <th>Phone Number</th>
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


