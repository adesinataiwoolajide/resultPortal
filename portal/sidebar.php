<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>NAVIGATION</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
            </li>
            
            <li class=" nav-item"><a href="./"><i class="ft-home"></i><span class="menu-title" data-i18n=""><?php echo strtoupper($_SESSION['role'])
             ." " . " HOME" ?></span></a>
            </li><?php 
            $role = $_SESSION['role'];
            if($role == 'Admin'){ ?>
                <li class=" nav-item"><a href="users.php"><i class="ft-user"></i><span class="menu-title" data-i18n="">USERS</span></a>
                </li>
                <li class=" nav-item"><a href="courses.php"><i class="ft-printer"></i><span class="menu-title" data-i18n="">COURSES</span></a>
                </li>
                <li class=" nav-item"><a href="lecturers.php"><i class="ft-book"></i><span class="menu-title" data-i18n="">LECTURER</span></a>
                </li>

                <li class=" nav-item"><a href="students.php"><i class="ft-users"></i><span class="menu-title" data-i18n="">STUDENTS</span></a>
                </li>
                <li class=" nav-item"><a href="course_allocation.php"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">COURSE ALLOCATION</span></a>
                </li>

                <li class=" nav-item"><a href=""><i class="ft-users"></i><span class="menu-title" data-i18n=""> REGISTRATION </span></a>
                </li>
                
                <li class=" nav-item"><a href=""><i class="fa fa-certificate"></i><span class="menu-title" data-i18n="">RESULTS</span></a>
                </li><?php
            }elseif($role == 'Lecturer'){ ?>
                <li class=" nav-item"><a href="courses.php"><i class="ft-printer"></i><span class="menu-title" data-i18n="">DEPT COURSES</span></a>
                </li>
                <li class=" nav-item"><a href="students.php"><i class="ft-users"></i><span class="menu-title" data-i18n="">STUDENTS DETAILS</span></a>
                </li>
                <li class=" nav-item"><a href="lecturers.php"><i class="ft-book"></i><span class="menu-title" data-i18n="">MY DETAILS</span></a>
                </li>
                <li class=" nav-item"><a href=""><i class="ft-monitor"></i><span class="menu-title" data-i18n="">MY COURSES</span></a>
                </li>
                <li class=" nav-item"><a href=""><i class="fa fa-certificate"></i><span class="menu-title" data-i18n="">COMPUTE RESULTS</span></a>
                </li><?php
            }elseif($role == 'Student'){ ?>
                <li class=" nav-item"><a href="courses.php"><i class="ft-printer"></i><span class="menu-title" data-i18n="">DEPT COURSES</span></a>
                </li>
                <li class=" nav-item"><a href="students.php"><i class="ft-users"></i><span class="menu-title" data-i18n="">MY DETAILS</span></a>
                </li>

                <li class=" nav-item"><a href=""><i class="ft-users"></i><span class="menu-title" data-i18n=""> REGISTRATION </span></a>
                </li>
                
                <li class=" nav-item"><a href=""><i class="fa fa-certificate"></i><span class="menu-title" data-i18n="">MY RESULTS</span></a>
                </li><?php
            }else{ ?>
                <li class=" nav-item"><a href="../log-out.php"><i class="fa fa-lock"></i><span class="menu-title" data-i18n="">INVALID USER</span></a>
                </li><?php
            } ?>

            <li class=" nav-item"><a href="../log-out.php"><i class="fa fa-lock"></i><span class="menu-title" data-i18n="">LOG OUT</span></a>
            </li>

        </ul>
    </div>
</div>