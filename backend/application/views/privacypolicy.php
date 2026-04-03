<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Privacy Policy - greeny</title>


        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/privacy.css" />
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
                <h2>Privacy Policy</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">privacy policy</li>
                </ol>
            </div>
        </section>

        <section class="inner-section privacy-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <nav class="nav nav-pills flex-column" id="scrollspy">
                            <a class="nav-link" href="#item-1">Collection of Personally Identifiable Information and other Information?</a>
                            <a class="nav-link" href="#item-2">Use of Demographic / Profile Data / Your Information</a>
                            <a class="nav-link" href="#item-3">Website reponse taking time, how to improve?</a>
                            <a class="nav-link" href="#item-4"> Links to Other Sites?</a>
                            <a class="nav-link" href="#item-5">Choice/Opt-Out</a>
                        </nav>
                    </div>
                    <div class="col-lg-9">
                        <div data-bs-spy="scroll" data-bs-target="#scrollspy" data-bs-offset="0" tabindex="0">
                            <div class="scrollspy-content" id="item-1">
                                <h3>Collection of Personally Identifiable Information and other Information?</h3>
                                <p>
                                    When you use our Website, we collect and store your personal information, which is provided by you from time to time. Our primary goal in doing so is to provide you a safe, efficient, smooth and customized experience. This allows us to provide services and features that most likely meet your needs, and to customize our Website to make your experience safer and easier. More importantly, while doing so we collect personal information from you that we consider necessary for achieving this purpose.
                                </p>
                            </div>
                            <div class="scrollspy-content" id="item-2">
                                <h3>Use of Demographic / Profile Data / Your Information</h3>
                                <p>
                                    We use personal information to provide the services you request. To the extent we use your personal information to market to you, we will provide you the ability to opt-out of such uses. We use your personal information to resolve disputes; troubleshoot problems; help promote a safe service; collect money; measure consumer interest in our products and services, inform you about online and offline offers, products, services, and updates; customize your experience; detect and protect us against error, fraud and other criminal activity; enforce our terms and conditions; and as otherwise described to you at the time of collection.
                                </p>
                            </div>
                            <div class="scrollspy-content" id="item-3">
                                <h3>Website reponse taking time, how to improve?</h3>
                                <p>
                                    We may share personal information with our other corporate entities and affiliates to help detect and prevent identity theft, fraud and other potentially illegal acts; correlate related or multiple accounts to prevent abuse of our services; and to facilitate joint or co-branded services that you request where such services are provided by more than one corporate entity. Those entities and affiliates may not market to you as a result of such sharing unless you explicitly opt-in.
                                </p>
                            </div>
                            <div class="scrollspy-content" id="item-4">
                                <h3>Links to Other Sites?</h3>
                                <p>
                                    Our Website links to other websites that may collect personally identifiable information about you. greeny is not responsible for the privacy practices or the content of those linked websites.
                                </p>
                            </div>
                            <div class="scrollspy-content" id="item-5">
                                <h3>Choice/Opt-Out</h3>
                                <p>
                                    We provide all users with the opportunity to opt-out of receiving non-essential (promotional, marketing-related) communications after setting up an account with us. If you do not wish to receive promotional communications from us, then please email to info@greeny
                                </p>
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