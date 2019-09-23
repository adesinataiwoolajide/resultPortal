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
                            <li class="breadcrumb-item"><a href="Lecturers.php">Lecturers</a>
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
                                    <h4 class="card-title">Lecturer Registration Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                    <fieldset class="form-group">
                                                        <label for="roundText">Full Name</label>
                                                        <input type="text" id="roundText" class="form-control round" name="full_name" placeholder="Enter The Full Name" required>
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
                                                        <label for="roundText">Phone Number</label>
                                                        <input type="number" id="roundText" class="form-control round" placeholder="Enter Phone Number" required name="phone_number">
                                                    </fieldset>
                                                </div>
                                                <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                                    <fieldset class="form-group">
                                                        <label for="roundText">Password</label>
                                                        <input type="password" id="roundText" class="form-control round" name="password" placeholder="Enter The Password" required>
                                                    </fieldset>
                                                </div>
                                                

                                                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                                    <button type="submit" class="btn btn-secondary btn-lg btn-block" name="add-user">ADD THE LECTURER</button>
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
                                                    <th>Phone Number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Adesina Taiwo</td>
                                                    <td>taiwo@gmail.com</td>
                                                    <td>08138139333</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Akinsola Goke</td>
                                                    <td>goke@gmail.com</td>
                                                    <td>081526252652</td>
                                                    
                                                </tr>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
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


