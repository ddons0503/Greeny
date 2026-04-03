<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Member Setting - greeny</title>


        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/contact.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/profile.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home-standard.css" />
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
                <h2>Member Setting</h2> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Member</li>
                </ol>
            </div>
        </section>
        
            <?php
            $this->load->view('memberpic');
            ?>
        <section class="inner-section profile-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        <?php
                        $this->load->view('membermenu');
                        ?>

                    </div>

                    <div class="col-lg-9">

                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>Change Password</h4>
                                </div>
                                <div class="account-content">
                                    <form action="" method="post">
                                        <div class="row">
                                            <!--                                        <div class="form-group">
                                                                                            <p class="d-flex-center">
                                                                                                <label>Current Password</label>
                                                                                                <input type="password" name="ps" placeholder="Password" id="box" class="form-control <?php
                                            if (form_error('ps')) {
                                                echo 'invalid';
                                            }
                                            ?>" value="<?php
                                            if (!isset($success) && set_value('ps')) {
                                                echo set_value('ps');
                                            }
                                            ?>"/>
                                                                                                <span><i id="eye" class="fa-solid fa-eye-slash"></i></span>
                                                                                            <p class="errmsg">
                                            <?php
                                            echo form_error('ps');
                                            ?>
                                                                                            </p>
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <p class="d-flex-center">
                                                                                                <label>New Password</label>
                                                                                                <input type="password" name="nps" placeholder="Password" id="box1" class="form-control <?php
                                            if (form_error('nps')) {
                                                echo 'invalid';
                                            }
                                            ?>" value="<?php
                                            if (!isset($success) && set_value('nps')) {
                                                echo set_value('nps');
                                            }
                                            ?>"/>
                                                                                                <span><i id="eye1" class="fa-solid fa-eye-slash"></i></span>
                                                                                            <p class="errmsg">
                                            <?php
                                            echo form_error('nps');
                                            ?>
                                                                                            </p>
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <p class="d-flex-center">
                                                                                                <label>Confirm Password</label>
                                                                                                <input type="password" name="cps" placeholder="Password" id="box2" class="form-control <?php
                                            if (form_error('cps')) {
                                                echo 'invalid';
                                            }
                                            ?>" value="<?php
                                            if (!isset($success) && set_value('cps')) {
                                                echo set_value('cps');
                                            }
                                            ?>"/>
                                                                                                <span><i id="eye2" class="fa-solid fa-eye-slash "></i></span>
                                                                                            <p class="errmsg">
                                            <?php
                                            echo form_error('cps');
                                            ?>
                                                                                            </p>
                                                                                            </p>
                                                                                        </div> 
                                            -->
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" name="ps" class="form-control" placeholder="**********" id="box" value="<?php
                                                    if (!isset($success) && set_value('ps')) {
                                                        echo set_value('ps');
                                                    }
                                                    ?>">                                                        
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye" id="eye" style="cursor: pointer"></i></span>
                                                    </div>
                                                </div>
                                                <label>New Password</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" name="nps" class="form-control <?php
                                                    if (form_error('nps')) {
                                                        echo 'invalid';
                                                    }
                                                    ?>" placeholder="**********" id="box1">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye" id="eye1" style="cursor: pointer"></i></span>
                                                    </div>
                                                </div>
                                                <p class="errmsg">
                                                    <?php
                                                    if (form_error('nps')) {
                                                        echo form_error('nps');
                                                    }
                                                    ?>
                                                </p>
                                                <label>Confirm Password</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" name="cps" class="form-control <?php
                                                    if (form_error('cps')) {
                                                        echo 'invalid';
                                                    }
                                                    ?>" placeholder="**********" id="box2">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye" id="eye2" style="cursor: pointer"></i></span>
                                                    </div>
                                                </div>
                                                <p class="errmsg">
                                                    <?php
                                                    if (form_error('cps')) {
                                                        echo form_error('cps');
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" name="change_ps" value="yes" class="form-btn-group">Change Now</button>
                                            </div>
                                            <div>
                                                <?php
                                                if (isset($error)) {
                                                    ?>
                                                    </br>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>Oops!</strong> <?php echo $error; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }

                                                if (isset($success)) {
                                                    ?>
                                                    </br>
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong>Ok!</strong> <?php echo $success; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="contact-add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form">
                    <div class="form-title"><h3>add new contact</h3></div>
                    <div class="form-group">
                        <label class="form-label">title</label>
                        <select class="form-select">
                            <option selected>choose title</option>
                            <option value="primary">primary</option>
                            <option value="secondary">secondary</option>
                        </select>
                    </div>
                    <div class="form-group"><label class="form-label">number</label><input class="form-control" type="text" placeholder="Enter your number" /></div>
                    <button class="form-btn" type="submit">save contact info</button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="address-add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form">
                    <div class="form-title"><h3>add new address</h3></div>
                    <div class="form-group">
                        <label class="form-label">title</label>
                        <select class="form-select">
                            <option selected>choose title</option>
                            <option value="home">home</option>
                            <option value="office">office</option>
                            <option value="Bussiness">Bussiness</option>
                            <option value="academy">academy</option>
                            <option value="others">others</option>
                        </select>
                    </div>
                    <div class="form-group"><label class="form-label">address</label><textarea class="form-control" placeholder="Enter your address"></textarea></div>
                    <button class="form-btn" type="submit">save address info</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="payment-add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form">
                    <div class="form-title"><h3>add new payment</h3></div>
                    <div class="form-group"><label class="form-label">card number</label><input class="form-control" type="text" placeholder="Enter your card number" /></div>
                    <button class="form-btn" type="submit">save card info</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form">
                    <div class="form-title"><h3>edit profile info</h3></div>
                    <div class="form-group"><label class="form-label">profile image</label><input class="form-control" type="file" /></div>
                    <div class="form-group"><label class="form-label">name</label><input class="form-control" type="text" value="Miron Mahmud" /></div>
                    <div class="form-group"><label class="form-label">email</label><input class="form-control" type="text" value="mironcoder@gmail.com" /></div>
                    <button class="form-btn" type="submit">save profile info</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="contact-edit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form">
                    <div class="form-title"><h3>edit contact info</h3></div>
                    <div class="form-group">
                        <label class="form-label">title</label>
                        <select class="form-select">
                            <option value="primary" selected>primary</option>
                            <option value="secondary">secondary</option>
                        </select>
                    </div>
                    <div class="form-group"><label class="form-label">number</label><input class="form-control" type="text" value="+8801838288389" /></div>
                    <button class="form-btn" type="submit">save contact info</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="address-edit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form">
                    <div class="form-title"><h3>edit address info</h3></div>
                    <div class="form-group">
                        <label class="form-label">title</label>
                        <select class="form-select">
                            <option value="home" selected>home</option>
                            <option value="office">office</option>
                            <option value="Bussiness">Bussiness</option>
                            <option value="academy">academy</option>
                            <option value="others">others</option>
                        </select>
                    </div>
                    <div class="form-group"><label class="form-label">address</label><textarea class="form-control" placeholder="jalkuri, fatullah, narayanganj-1420. word no-09, road no-17/A"></textarea></div>
                    <button class="form-btn" type="submit">save address info</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    $this->load->view('footer');
    ?>
    <?php
    $this->load->view('footerjs');
    ?>
</body>

</html> 