<?php 
    $user = session('ss_user');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Roqeeb">
        <meta name="author" content="Roqeeb">
        <meta name="keywords" content="Roqeeb">

        <title> <?php echo $title; ?> | Admin</title>

        <!-- Fontfaces CSS-->
        <link href="<?php echo base_url() ?>/assets/css/font-face.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url() ?>/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url() ?>/assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url() ?>/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="<?php echo base_url() ?>/assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Datatable -->
        <link href="<?php echo base_url() ?>/assets/vendor/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="all" />
        <link href="<?php echo base_url() ?>/assets/vendor/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" media="all" />

        <!-- Vendor CSS-->
        <link href="<?php echo base_url() ?>/assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url() ?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url() ?>/assets/vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url() ?>/assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url() ?>/assets/vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url() ?>/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url() ?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="<?php echo base_url() ?>/assets/css/theme.css" rel="stylesheet" media="all">

        
        <!-- Jquery JS-->
        <script src="<?php echo base_url() ?>/assets/vendor/jquery.min.js"></script>
        
    </head>
    <body class="">
        <!-- Page Loader -->
        <div class="page-loader">
            <div class="page-loader__spin"></div>
        </div>
        <!-- End Page Loader -->

        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner">
                            <a class="logo" href="index.html">
                                <img src="<?php echo base_url() ?>/assets/images/icon/logo.png" alt="CoolAdmin" />
                            </a>
                            <button class="hamburger hamburger--slider" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            
                            <li class="<?php if($active == 'Dashboard'){ echo 'active';} ?>">
                                <a href="<?php echo base_url() ?>/admin">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>

                            <li class="<?php if($active == 'Profile'){ echo 'active';} ?>">
                                <a href="<?php echo base_url() ?>/admin/profile">
                                    <i class="zmdi zmdi-account"></i>Account/Profile</a>
                            </li>

                            <li class="<?php if($active == 'Posts'){ echo 'active';} ?>">
                                <a href="<?php echo base_url() ?>/admin/posts">
                                    <i class="fas fa-eye"></i>All Posts</a>
                            </li>

                            <li class="<?php if($active == 'Create'){ echo 'active';} ?>">
                                <a href="<?php echo base_url() ?>/admin/create">
                                    <i class="fas fa-calendar-alt"></i>Create Post</a>
                            </li>

                            <li class="<?php if($active == 'Users'){ echo 'active';} ?>">
                                <a href="<?php echo base_url() ?>/admin/users">
                                    <i class="fas fa-users"></i>Users</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url() ?>/admin/logout">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        <img src="<?php echo base_url() ?>/assets/images/icon/logo.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1 sidebar-bg">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li class="<?php if($active == 'Dashboard'){ echo 'active';} ?>">
                                <a href="<?php echo base_url() ?>/admin">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>

                            <li class="<?php if($active == 'Profile'){ echo 'active';} ?>">
                                <a href="<?php echo base_url() ?>/admin/profile">
                                    <i class="zmdi zmdi-account"></i>Account/Profile</a>
                            </li>

                            <li class="<?php if($active == 'Posts'){ echo 'active';} ?>">
                                <a href="<?php echo base_url() ?>/admin/posts">
                                    <i class="fas fa-eye"></i>All Posts</a>
                            </li>

                            <li class="<?php if($active == 'Create'){ echo 'active';} ?>">
                                <a href="<?php echo base_url() ?>/admin/create">
                                    <i class="fas fa-calendar-alt"></i>Create Post</a>
                            </li>

                            <li class="<?php if($active == 'Users'){ echo 'active';} ?>">
                                <a href="<?php echo base_url() ?>/admin/users">
                                    <i class="fas fa-users"></i>Users</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url() ?>/admin/logout">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid d-flex justify-content-end">
                        <div class="header-wrap">
                            
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?php echo base_url() ?>/assets/images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?php echo base_url() ?>/assets/images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?php echo base_url() ?>/assets/images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?php echo base_url() ?>/assets/images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?php echo base_url() ?>/assets/images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <?php if($user->profile_pic === NULL): ?>
                                                <img src="<?php echo base_url() ?>/assets/images/icon/avatar-01.jpg" alt="<?php echo ($user->username) ?>" />
                                            <?php else: ?>
                                                <img src="<?php echo base_url() ?>/assets/uploads/profile-pictures/<?php echo ($user->profile_pic) ?>" alt="<?php echo ($user->username) ?>" />
                                            <?php endif; ?>
                                        </div>

                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo ucfirst($user->username) ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <?php if($user->profile_pic === NULL): ?>
                                                            <img src="<?php echo base_url() ?>/assets/images/icon/avatar-01.jpg" alt="<?php echo ($user->username) ?>" />
                                                        <?php else: ?>
                                                            <img src="<?php echo base_url() ?>/assets/uploads/profile-pictures/<?php echo ($user->profile_pic) ?>" alt="<?php echo ($user->username) ?>" />
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo ucfirst($user->username) ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo($user->email) ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo base_url() ?>/admin/logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->
        