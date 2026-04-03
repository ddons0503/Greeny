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
        <title>Order Success - greeny</title>

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
                <h2>Success</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Success</li>
                </ol>
            </div>
        </section>
        <section class="coming-part">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/check.png" alt="coming-soon" /></div>

                    <div class="col-lg-7">
                        <div class="coming-content">
                            <h2 class="coming-title" style="font-style: italic;">Thank you for order with us</h2>

                            <h6 class="coming-subtitle">Your order place successfully and order status is updated shortly by our staff.</h6>
                            <ul class="address-placed-dt1">
                                 <?php
                                    if (isset($payment_id)) {
                                        ?>
                                        <li>
                                            <p><i class="uil uil-card-atm"></i>Payment Type :<span>Online Payment</span>
                                            </p>
                                            <p><i class="uil uil-card-atm"></i>Payment Id :<span><?php echo $payment_id; ?></span>
                                            </p>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <p><i class="uil uil-card-atm"></i>Payment Type :<span>Cash On delivery</span>
                                        </p>
                                        <?php
                                    }
                                    ?>
                                    <li>
                                        <p><i class="uil uil-phone-alt"></i>Order ID :<span><?php echo $order_id; ?></span></p>
                                    </li>
                                    <li>
                                        <p><i class="uil uil-phone-alt"></i>Estimated Delivery :<span>4-7 Working Days</span></p>
                                    </li>
                                </ul>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center mt-5">
                                            <a class="btn btn-outline" href="<?php echo base_url('product-list'); ?>">Continue Shopping</a>
                                            <a class="btn btn-outline" href="<?php echo base_url('member-order'); ?>">View Order</a>
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
