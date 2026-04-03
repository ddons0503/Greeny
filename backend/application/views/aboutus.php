<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="_new - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>About Us - greeny</title>


        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/about.css" />
    </head>

    <body>

        <?php
        $this->load->view('header');
        ?>
        <?php
        $this->load->view('menu');
        ?>

        <?php
        $this->load->view('mobileslider');
        ?>
        <?php
        $this->load->view('mobilemenu');
        ?>
        <section class="inner-section single-banner" style="background: url(<?php echo base_url(); ?>assets/images/single-banner.jpg) no-repeat center;">
            <div class="container">
                <h2>About Us</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="   <?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">about us</li>
                </ol>
            </div>
        </section>
        <section class="inner-section about-company">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-content">
                            <h2>WHO WE ARE</h2>
                            <p>
                                greeny is founded by a team of avid entrepreneurs in the year 2015. greeny is India’s leading Agri Digital Platform transforming the agriculture value chain from pre-harvest to post-harvest leveraging science, data and technology. It is impacting millions of farmers across the country by providing accessibility of extensive range of high quality inputs, end to end crop guidance and market linkages for various commodities, thus offering 360 degree solution to farmers with a very unique approach. 
                                greeny Technology Platform is driving efficiencies of Agri Inputs manufacturers in the areas of distribution, marketing and operations with data-driven business intelligence. Our data strategy enables various stakeholders of Agri value chain to come together and build end to end ecosystem for farming community and driving sustainable agriculture.
                            </p>
                        </div>
                        <ul class="about-list">
                            <li>
                                <h3>3473</h3>
                                <h6>registered users</h6>
                            </li>
                            <li> 
                                <h3>262</h3>
                                <h6>per day visitors</h6>
                            </li>
                            <li>
                                <h3>189</h3>
                                <h6>total products</h6>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-img"><img src="<?php echo base_url(); ?>assets/images/about/01.jpg" alt="about" /><img src="<?php echo base_url(); ?>assets/images/about/02.jpg" alt="about" /><img src="<?php echo base_url(); ?>assets/images/about/03.jpg" alt="about" /><img src="<?php echo base_url(); ?>assets/images/about/04.jpg" alt="about" /></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-choose">
            <div class="container">
                <div class="row">
                    <div class="col-11 col-md-9 col-lg-7 col-xl-6 mx-auto">
                        <div class="section-heading"><h2>Why People Choose Their Daily Organic Life With Us</h2></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="choose-card">
                            <div class="choose-icon"><i class="icofont-fruits"></i></div>
                            <div class="choose-text">
                                <h4>100% genuine product</h4>
                                <p>Quality is more than quantity, we provide that quality.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose-card">
                            <div class="choose-icon"><i class="icofont-vehicle-delivery-van"></i></div>
                            <div class="choose-text">
                                <h4>Delivery within one hour</h4>
                                <p>After despatch we deliver your order within few moments.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose-card">
                            <div class="choose-icon"><i class="icofont-loop"></i></div>
                            <div class="choose-text">
                                <h4>quickly return policy</h4>
                                <p>You can also return the product within 10 days of delivery for full refund.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose-card">
                            <div class="choose-icon"><i class="icofont-support"></i></div>
                            <div class="choose-text">
                                <h4>instant support team</h4>
                                <p>Within 24hrs you have any query related to your order your team is always ready to solve your query.</p>
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