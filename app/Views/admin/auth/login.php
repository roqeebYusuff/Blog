<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Roqeeb">
    <meta name="author" content="Roqeeb">
    <meta name="keywords" content="Roqeeb">

    <title> Login | Admin</title>

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url() ?>/assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

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

</head>

<body class="animsition login-color">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?php echo base_url() ?>/assets/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <!-- <?php if(!empty($message)){ ?>                                
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                <?php echo $message ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>  -->

                        <div class="login-form">
                            <form action="<?php echo base_url() ?>/admin/login" method="post" id="frmLogin">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full login-color" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full login-color" type="password" name="password" placeholder="Password">
                                </div>                             
                                
                                <div class="form-group">
                                    <label class="text-danger" style="text-transform: none;"><?php echo $message ?></label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--blue2 m-b-20" type="submit">sign in</button>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url() ?>/assets/vendor/jquery.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url() ?>/assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url() ?>/assets/js/jquery.validate.js">
    </script>
    <script src="<?php echo base_url() ?>/assets/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/animsition/animsition.min.js"></script>
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url() ?>/assets/js/main.js"></script>

    <script>
        $("#frmLogin").validate({
                rules: {
                    username: "required",
                    password: "required"
                }
            });
    </script>

</body>

</html>
<!-- end document-->