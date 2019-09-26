<?php
    require_once('header.php');
    require_once('sidebar.php');
?>
    <div class="app-content content"><?php 
        if($role == 'Admin'){ ?>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-6 col-12 mb-2">
                    
                        <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="users.php">Users</a>
                                </li>
                                <li class="breadcrumb-item active">List of All Saved Users
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
                                        <h4 class="card-title">User Registration Form</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            
                                            <form action="process_user.php" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <label for="roundText">Full Name</label>
                                                            <input type="text" id="roundText" class="form-control round" name="name" placeholder="Enter The Full Name" required>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <label for="roundText">E-Mail</label>
                                                            <input type="email" id="roundText" class="form-control round" placeholder="Enter The E-mail" name="email" required>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <label for="roundText">Password</label>
                                                            <input type="password" id="roundText" class="form-control round" name="password" placeholder="Enter The Password" 
                                                            required>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <label for="roundText">Repeat Password</label>
                                                            <input type="password" id="roundText" class="form-control round" placeholder="Repeat Password" required name="repeat">
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                                        <button type="submit" class="btn btn-secondary btn-lg btn-block" name="add-user">ADD THE USER</button>
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
                                        <h4 class="card-title">List of All Saved Users</h4>
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
                                                        <th>Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody><?php 
                                                    $num =1;
                                                    foreach($user->getAllUser() as $users){?>
                                                        <tr>
                                                            <td><?php echo $num; ?>
                                                            
                                                                <a href="delete-user.php?email=<?php echo $users['email'] ?>" class="btn btn-danger" onclick="return(confirmToDelete());"><i class="fa fa-trash-o"></i></a>
                                                                <a href="edit-user.php?email=<?php echo $users['email'] ?>" class="btn btn-success" onclick="return(confirmToEdit());"><i class="fa fa-pencil"></i></a>
                                                    
                                                            </td>
                                                            <td><?php echo $users['name'] ?></td>
                                                            <td><?php echo $users['email'] ?></td>
                                                            <td><?php echo $users['role'] ?></td>
                                                            
                                                        </tr>
                                                    <?php
                                                    $num++;
                                                    } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
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
            </div><?php 
        }else{
            $_SESSION['error'] = "You dont have access to this page"; ?>
            <script type="">window.location=("./") </script> <?php
            
        }  ?>
    </div>
<?php

    require_once('footer.php');

?>


