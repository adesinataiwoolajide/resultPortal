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
                            <li class="breadcrumb-item"><a href="students.php">Students</a>
                            </li>
                            <li class="breadcrumb-item active">List of All Saved Students
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
                                    <h4 class="card-title">Student Biodate Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                    <fieldset class="form-group">
                                                        <label for="roundText">Select Excel File</label>
                                                        <input type="file" id="roundText" class="form-control round" name="file" required>
                                                    </fieldset>
                                                </div>
                                                
                                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                <label for="roundText">Submit The Excel File</label>
                                                    <button type="submit" class="btn btn-secondary btn-lg btn-block" name="add-user">UPLOAD THE STUDENTS RECORD</button>
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
                                    <h4 class="card-title">List of All Saved Students</h4>
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
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Adeola Joke</td>
                                                    <td>171646</td>
                                                    <td>joke@gmail.com</td>
                                                    <td>09074746473</td>
                                                    <td>ND 1</td>
                                                    <td>Full Time</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Jibola Hammmed</td>
                                                    <td>171326</td>
                                                    <td>jibola@gmail.com</td>
                                                    <td>090745393033</td>
                                                    <td>ND 2</td>
                                                    <td>Full Time</td>
                                                    
                                                </tr>
                                                
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


