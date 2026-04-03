<!DOCTYPE html>
<html>
    <head>
        <title>Administration Department- greeny </title>
        <meta charset="utf-8" />
        <meta content="ie=edge" http-equiv="x-ua-compatible" />
        <meta content="template language" name="keywords" />
        <meta content="Tamerlan Soziev" name="author" />
        <meta content="Admin dashboard html template" name="description" />
        <meta content="width=device-width,initial-scale=1" name="viewport" />
        <link href="<?php echo base_url(); ?>admin_assets/leaf.png" rel="shortcut icon" />
        <link href="<?php echo base_url(); ?>admin_assets/apple-touch-icon.png" rel="apple-touch-icon" />
        <link href="<?php echo base_url(); ?>admin_assets/../fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>admin_assets/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>admin_assets/bower_components/dropzone/dist/dropzone.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>admin_assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>admin_assets/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>admin_assets/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>admin_assets/bower_components/slick-carousel/slick/slick.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>admin_assets/css/main5739.css?version=4.5.0" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/fonts\fontawesome\fontawesome-free-6.2.1-web\css\all.min.css">
    </head>
    <body class="auth-wrapper">
        <div class="all-wrapper menu-side with-pattern">
            <div class="auth-box-w">
                <div class="logo-w">
                    <a href="<?php echo base_url('home'); ?>"><img alt="" src="<?php echo base_url(); ?>admin_assets/img/logo.png" /></a>
                </div>
                <h4 class="auth-header">Login Form</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Email</label><input class="form-control" name="email" placeholder="Enter email" value="<?php
                        if ($this->input->cookie('admin_password')) {
                            echo $this->input->cookie('admin_email');
                        }
                        ?>"/>
                        <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                    </div>

                    <label for="">Password</label>

                    <div class="form-group">
                        <div class="pre-icon os-icon os-icon-fingerprint"></div>
                        <div class="password-container">
                            <input type="password" id="password" name="ps" class="form-control" placeholder="Enter your password" value="<?php
                            if ($this->input->cookie('admin_password')) {
                                echo $this->input->cookie('admin_password');
                            }
                            ?>">
                            <a class="" id="toggle-password">
                                <span class="password-icon hide" id="open-eye"><i class="fa-solid fa-eye"></i></span>
                                <span class="password-icon" id="closed-eye"><i class="fa-solid fa-eye-slash"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <label> <input type="checkbox" name="svp" class="form-check-input" value="yes" <?php
                        if ($this->input->cookie('admin_password')) {
                            echo "checked";
                        }
                        ?>>
                       Remember Me</label>
                    </div>
                    <div>
                        <button type="submit" name="login" value="yes" class="btn btn-primary" style="margin-right:25px";>Log In</button>
                        <a href="<?php echo base_url('forgot-password'); ?>">Forgot your password?</a>
                    </div><br/>
                    <div>
                        <?php
                        if (isset($error)) {
                            ?>
                            <div class="alert alert-danger   alert-dismissible fade show" role="alert">
                                <strong>Opps!</strong> <?php echo $error; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>admin_assets/js/script.js"></script>
    </body>
</html>
