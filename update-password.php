<?php 
    session_start();
	require("Dev/general/all_purpose_class.php");
	require('Dev/autoload.php');
    require('Dev/Database.php');
    $user = new User ();
    $email = $_GET['email'];
    $details = $user::getSingleUser($email);
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>TOPS RESULT PORTAL | UPDATE PASSWORD</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.min.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Toast/css/Toast.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" 
    data-menu="vertical-menu-modern" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="app-assets/images/logo/stack-logo-dark.png" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>TOPS RESULT PORTAL</span></h6>
                                </div>
                                <div class="card-content">
                                   <div class="card-body">
                                        <form class="form-horizontal" action="update-account.php" novalidate method="POST">
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="email" name="email" class="form-control" id="user-name" 
                                                placeholder="Your Username" value="<?php echo $details['email'] ?>" readonly>
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" name="name" class="form-control" id="user-name" value="<?php echo $details['name'] ?>"
                                                placeholder="Your Username" required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control" name="password" id="user-password" placeholder="Enter Password" required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 float-sm-left text-center text-sm-left">
                                                    <a href="./" class="card-link">Login</a>
                                                </div>
                                                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right">
                                                    <a href="forgot-password.php" class="card-link">Forgot Password ?</a>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-secondary btn-block" name="update-user"><i class="ft-unlock"></i> Update Password</button>
                                        </form>
                                    </div>
                                    <!-- <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>DO not have an account ?</span></p>
                                    <div class="card-body">
                                        <a href="register-with-bg-image.html" class="btn btn-outline-danger btn-block"><i class="ft-user"></i> Register</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/forms/form-login-register.min.js"></script>
    <script src="assets/Toast/js/Toast.min.js"></script>
    <?php 
    if(isset($_SESSION['success'])){
        $message = $_SESSION['success']; ?>
        <script type="text/javascript">
            new Toast({ message: '<p style="color:white"><b><?php echo $message; ?></p></b>', type: 'success' });
        </script><?php 
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
        $message = $_SESSION['error'];?>
    
        <script type="text/javascript">
            new Toast({ message: '<p style="color:white"><b><?php echo $message; ?> </b></p>', type: 'danger' });
        </script><?php 
        unset($_SESSION['error']);
    }  ?>
  </body>
</html>