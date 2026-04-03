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
        <title>Sign up - greeny</title>

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
                <h2>Sign up</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sign up</li>
                </ol>
            </div>
        </section>
        <section class="user-form-part">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 col-md-12 col-lg-12 col-xl-10">

                        <div class="user-form-card">
                            <div class="user-form-title">
                                <h2>Join Now!</h2>
                                <p>Setup A New Account In A Minute</p>
                            </div>
                            <div class="user-form-group">

                                <form method="post" action="#" class="user-form">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Enter your name" class="form-control <?php
                                        if (form_error('name')) {
                                            echo 'invalid';
                                        }
                                        ?>" value="<?php
                                               if (!isset($success) && set_value('name')) {
                                                   echo set_value('name');
                                               }
                                               ?>"/>
                                        <p class="errmsg">
                                            <?php
                                            echo form_error('name');
                                            ?>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Enter your email" class="form-control <?php
                                        if (form_error('email')) {
                                            echo 'invalid';
                                        }
                                        ?>" value="<?php
                                               if (!isset($success) && set_value('email')) {
                                                   echo set_value('email');
                                               }
                                               ?>"/>
                                        <p class="errmsg">
                                            <?php
                                            echo form_error('email');
                                            ?>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <div class="password-container">
                                            <input type="password" name="ps" placeholder="Enter your password" id="box" class="form-control <?php
                                            if (form_error('ps')) {
                                                echo 'invalid';
                                            }
                                            ?>" value="<?php
                                                   if (!isset($success) && set_value('ps')) {
                                                       echo set_value('ps');
                                                   }
                                                   ?>"/>
                                            <span style="position: relative;top:-35px;left:530px;"><i id="eye" class="fa-solid fa-eye-slash "></i></span>
                                            <p class="errmsg">
                                                <?php
                                                echo form_error('ps');
                                                ?>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <div class="password-container">
                                            <input type="password" name="cps" placeholder="Confirm your password" id="box1" class="form-control <?php
                                            if (form_error('cps')) {
                                                echo 'invalid';
                                            }
                                            ?>" value="<?php
                                                   if (!isset($success) && set_value('cps')) {
                                                       echo set_value('cps');
                                                   }
                                                   ?>"/>
                                            <span style="position: relative;top:-35px;left:530px;"><i id="eye1" class="fa-solid fa-eye-slash "></i></span>
                                            <p class="errmsg">
                                                <?php
                                                echo form_error('cps');
                                                ?>
                                            </p>
                                        </div>
                                    </div>      



                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="check" /><label class="form-check-label" for="check">Accept all the <a href="<?php echo base_url('terms-and-conditions'); ?>" target="_blank">Terms & Conditions</a></label>
                                    </div>
                                    <div class="form-button">
                                        <button type="submit" name="register" value="yes">register</button>
                                    </div>
                                    <div>
                                        <?php
                                        if (isset($success)) {
                                            ?>
                                            </br>
                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                <strong>Thanks!</strong> <?php echo $success; ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="user-form-remind">
                            <p>Already Have An Account?<a href="<?php echo base_url('sign-in'); ?>">Sign in</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <br>
        <br>
        <br >

        <?php
        $this->load->view('footer');
        ?>
        <?php
        $this->load->view('footerjs');
        ?>
    </body>
</html>
