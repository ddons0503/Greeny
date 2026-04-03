<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Feedback - greeny</title>


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
                <h2>Feedback</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                </ol>
            </div>
        </section>
        <section class="inner-section contact-part">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-map"><img src="<?php echo base_url(); ?>assets/images/tree.jpg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></img></div>
                    </div>
                    <div class="col-lg-6">
                        <form class="contact-form <?php
                        if (form_error('name')) {
                            echo 'invalid';
                        }
                        ?>"  action="" method="post">
                            <h4>Drop Your Suggestion</h4>
                            <div class="form-group">
                                <div class="form-input-group">
                                    <input class="form-control <?php
                                    if (form_error('name')) {
                                        echo 'invalid';
                                    }
                                    ?>"  name="name" type="text" placeholder="Your Name" value="<?php
                                           if (!isset($success) && set_value('name')) {
                                               echo set_value('name');
                                           }
                                           ?>">

                                    <p class="errmsg">
                                        <?php
                                        echo form_error('name');
                                        ?>
                                    </p><i class="icofont-user-alt-3"></i></div>

                            </div>

                            <div class="form-group">
                                <div class="form-input-group <?php
                                if (form_error('message')) {
                                    echo 'invalid';
                                }
                                ?>"><textarea class="form-control <?php
                                     if (form_error('name')) {
                                         echo 'invalid';
                                     }
                                     ?>" name="message"
                                           placeholder="Your Message" value="<?php
                                           if (!isset($success) && set_value('message')) {
                                               echo set_value('message');
                                           }
                                           ?>"></textarea>
                                    <p class="errmsg">
                                        <?php
                                        echo form_error('message');
                                        ?>
                                    </p><i class="icofont-paragraph"></i></div>
                            </div>


                            <button type="submit" name="send" value="yes" class="form-btn-group"><i class="fas fa-envelope"></i><span>send
                                    message</span></button>
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