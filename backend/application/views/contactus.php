<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Contact Us - greeny</title>


        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/contact.css">
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
                <h2>Contact Us</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">contact us</li>
                </ol>
            </div>
        </section>
        <section class="inner-section contact-part">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card"><i class="icofont-location-pin"></i>
                            <h4>head office</h4>
                            <p>Mota-Varachha, Surat-394 101, Gujarat, India.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card active"><i class="icofont-phone"></i>
                            <h4>phone number</h4>
                            <p><a href="#">+91 9924891535 </a><a href="#">+91 9316082841</a><a href="#">+91 8849955196</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card"><i class="icofont-email"></i>
                            <h4>Support mail</h4>
                            <p><a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSMVJJvxnWJlcwRThgmKnbHHbpGRrwnmKRqFrZxvPDJwcpkhnBxJpLWrrxnzJKQpMZwBbJWT" target="_blank" title="Email">greenyagro2025@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.9052836839096!2d72.84992747508682!3d21.23560418046597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f27ee8159e3%3A0xf6defb4d03e81080!2sSutex%20Bank%20College%20of%20Computer%20Applications%20%26%20Science!5e0!3m2!1sen!2sin!4v1758951140326!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                    </div>
                    <div class="col- lg-6">
                        <form class="contact-form <?php
                        echo 'invalid';
                        if (form_error('name')) {
                            
                        }
                        ?>"  action="" method="post">
                            <h4>Drop Your Thoughts</h4>
                            <div class="form-group  ">
                                <div class="form-input-group"><input class="form-control <?php
                                    if (form_error('name')) {
                                        echo 'invalid';
                                    }
                                    ?>" type="text" name="name"
                                                                     placeholder="Your name"><p class="errmsg">
                                                                         <?php
                                                                         echo form_error('name');
                                                                         ?>
                                    </p><i class="icofont-user-alt-3"></i></div>
                            </div>
                            <div class="form-group">
                                <div class="form-input-group"><input class="form-control <?php
                                    if (form_error('name')) {
                                        echo 'invalid';
                                    }
                                    ?>" type="text" name="email"
                                                                     placeholder="Your email"><p class="errmsg">
                                                                         <?php
                                                                         echo form_error('email');
                                                                         ?>
                                    </p><i class="icofont-email"></i></div>
                            </div>
                            <div class="form-group">
                                <div class="form-input-group"><input class="form-control <?php
                                    if (form_error('name')) {
                                        echo 'invalid';
                                    }
                                    ?>" type="text" name="phone"
                                    placeholder="Your Phone No"><p class="errmsg">
                                        <?php
                                        echo form_error('phone');
                                        ?>
                                    </p><i class="icofont-phone"></i></div>
                            </div>
                            <div class="form-group">
                                <div class="form-input-group"><input class="form-control <?php
                                    if (form_error('name')) {
                                        echo 'invalid';
                                    }
                                    ?>" type="text" name="subject"
                                     placeholder="Your Subject"><p class="errmsg">
                                         <?php
                                         echo form_error('subject');
                                         ?>
                                    </p><i class="icofont-book-mark"></i></div>
                            </div>
                            <div class="form-group">
                                <div class="form-input-group"><textarea class="form-control <?php
                                    if (form_error('name')) {
                                        echo 'invalid';
                                    }
                                    ?>" name="message"
                                    placeholder="Your Message"></textarea><p class="errmsg">
                                        <?php
                                        echo form_error('message');
                                        ?>
                                    </p><i class="icofont-paragraph"></i></div>
                            </div>
                            <button type="submit"name="send" value="yes" class="form-btn-group">
                                <i class="fas fa-envelope"></i>
                                <span>Send Message</span>
                            </button>
                            <div>
                                <?php
                                if (isset($success)) {
                                    ?>
                                    </br>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Ok!</strong> <?php echo $success; ?>

                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </form>
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