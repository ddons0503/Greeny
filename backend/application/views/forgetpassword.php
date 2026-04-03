<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Forget password- greeny</title>


        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/user-auth.css" />    </head>

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
                <h2>Forget Password</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Forget Password</li>
                </ol>
            </div>
        </section>
        <section class="user-form-part">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">

                        <div class="user-form-card">
                            <form action="" method="post" >
                                <div class="user-form-title">
                                    <h2>Forget Password ?</h2>
                                    <p>Enter your register email we will sent password recover link on your email.</p>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email" />
                                </div>
                                <div class="form-button">
                                    <button type="submit" name="send" value="yes">get reset link</button>
                                </div>
                                <?php
                                if (isset($error)) {
                                    ?>
                                    <br/><br/>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Warning!</strong> <?php echo $error; ?>
                                    </div>
                                    <?php
                                }
                                if (isset($success)) {
                                    ?>
                                    <br/><br/>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Ok!</strong> <?php echo $success; ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </form>
                        </div>
                        <div class="user-form-remind">
                            <p>Go Back To<a href="<?php echo base_url('sign-in'); ?>">Sign in</a></p>
                        </div>
                        <div class="user-form-footer">
                            <p>Copyright © 2025 greeny.  </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <?php
        require_once 'footer.php';
        ?>
        <?php
        require_once 'footerjs.php';
        ?>
    </body>

</html> 