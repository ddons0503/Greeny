<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Sign in - greeny</title>

        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/user-auth.css" />
    </head>

    <body>
        <?php
        $this->load->view('header');
        ?>
        <?php
        $this->load->view('menu');
        ?>

        <?php
        $this->load->view('mobilemenu');
        ?>
        <?php
        $this->load->view('mobileslider');
        ?>
        <section class="inner-section single-banner" style="background: url(<?php echo base_url(); ?>assets/images/single-banner.jpg) no-repeat center;">
            <div class="container">
                <h2>Sign in</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sign in</li>
                </ol>
            </div>
        </section>
        <section class="user-form-part">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 col-md-12 col-lg-12 col-xl-10">
                        <div class="user-form-card">
                            <div class="user-form-title">
                                <h2>welcome!</h2>
                                <p>Use your credentials to access panel</p>
                            </div>
                            <div class="user-form-group">
                                <form method="post" action="#" class="user-form">
                                    <div class="form-group"><input type="email" name="email" placeholder="Enter your email" class="form-control <?php
                                        if (form_error('email')) {
                                            echo 'invalid';
                                        }
                                        ?>" value="<?php
                                       if ($this->input->cookie('admin_password')) {
                                           echo $this->input->cookie('admin_email');
                                       }
                                       ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="password-container">
                                            <input type="password" name="ps" placeholder="Enter your password" id="box" class="form-control <?php
                                            if (form_error('ps')) {
                                                echo 'invalid';
                                            }
                                            ?>" value="<?php
                                                   if ($this->input->cookie('member_password')) {
                                                       echo $this->input->cookie('member_password');
                                                   }
                                                   ?>"/>
                                            <span style="position: relative;top:-35px;left:530px;"><i id="eye" class="fa-solid fa-eye-slash "></i></span>
                                        </div>
                                    </div> 
                                    <div class="form-check mb-3">
                                        <input type="checkbox" name="svp" value="yes" <?php
                                        if ($this->input->cookie('member_password')) {
                                            echo "checked";
                                        }
                                        ?>> Remember Me

                                    </div>
                                    <div class="form-button">
                                        <button type="submit" name="signin" value="yes">login</button>
                                        <p>Forgot your password?<a href="<?php echo base_url('forgot-password'); ?>">reset here</a></p>
                                        <div>
                                            <?php
                                                if (isset($success)) {
                                                    ?>
                                                    </br>
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong>Thanks!</strong> <?php echo $success; ?>
                                                    </div>
                                                    <?php
                                                }
                                                if (isset($error)) {
                                                    ?>
                                                    </br>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>Oops!</strong> <?php echo $error; ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="user-form-remind">
                            <p>Don't have any account?<a href="<?php echo base_url('sign-up'); ?>">register here</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <?php
        $this->load->view('footer');
        ?>
        <?php
        $this->load->view('footerjs');
        ?>

    </body>
</html>
