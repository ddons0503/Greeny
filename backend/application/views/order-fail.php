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
        <title>Order Fail - greeny</title>

        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/user-auth.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/error.css" />

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
                <h2>Fail</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Fail</li>
                </ol>
            </div>
        </section>
        <section class="coming-part">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/cancel.png" alt="coming-soon" /></div>

                    <div class="col-lg-7">
                        <div class="coming-content">
                            <h2 class="coming-title" style="font-style: italic;">Oops! Your order has been failed.</h2>
                            <br/>
                            <h6 class="coming-subtitle">Click on the following button and retry for payment, if payment is deduct from your bank then don't worry it will refunded within 7 working days and contact our administration department.</h6>


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center mt-5">
                                        <a class="btn btn-outline" href="<?php echo base_url('order-confirmation'); ?>">Retry Payment</a>

                                    </div>
                                </div>
                            </div>
                        </div>

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
