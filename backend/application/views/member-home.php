<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Member Homes - greeny</title>


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
                <h2>Member</h2> 
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

                    <div class="col-lg-9 col-md-8">
                        <div class="dashboard-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-title-tab">
                                        <h4><i class="uil uil-apps"></i>Dashboard</h4>
                                    </div>
                                    <div class="welcome-text" style="margin-top: 30px;">

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div style="background: white;padding: 30px;">
                                                    <h3 class="text-center">Total Address</h3>
                                                    <p class="text-center" style="font-size: 30px;font-weight:bold; ">
                                                        <?php
                                                        $count_address = count($this->md->my_select('tbl_shipment', '*', array('register_id' => $this->session->userdata('member'))));
                                                        echo $count_address;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div style="background: white;padding: 30px;">
                                                    <h3 class="text-center">Item in Wishlist</h3>
                                                    <p class="text-center" style="font-size: 30px;font-weight:bold; ">
                                                        <?php
                                                        $count_wish = count($this->md->my_select('tbl_wishlist', '*', array('register_id' => $this->session->userdata('member'))));
                                                        echo $count_wish;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div style="background: white;padding: 30px;">
                                                    <h3 class="text-center">Total Orders</h3>
                                                    <p class="text-center" style="font-size: 30px;font-weight:bold; ">
                                                        <?php
                                                        $count_order = count($this->md->my_select('tbl_bill', '*', array('register_id' => $this->session->userdata('member'))));
                                                        echo $count_order;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="margin-top: 30px">

                                            <div class="col-md-4">
                                                <div style="background: white;padding: 30px;">
                                                    <h3 class="text-center">Total Reviews</h3>
                                                    <p class="text-center" style="font-size: 30px;font-weight:bold; ">
                                                        <?php
                                                        $count_review = count($this->md->my_select('tbl_review', '*', array('register_id' => $this->session->userdata('member'))));
                                                        echo $count_review;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div style="background: white;padding: 30px;">
                                                    <h3 class="text-center">Active Reviews</h3>
                                                    <p class="text-center" style="font-size: 30px;font-weight:bold; ">
                                                        <?php
                                                        $count_review = count($this->md->my_select('tbl_review', '*', array('register_id' => $this->session->userdata('member'), 'status' => 1)));
                                                        echo $count_review;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div style="background: white;padding: 30px;">
                                                    <h3 class="text-center">Pending Reviews</h3>
                                                    <p class="text-center" style="font-size: 30px;font-weight:bold; ">
                                                        <?php
                                                        $count_review = count($this->md->my_select('tbl_review', '*', array('register_id' => $this->session->userdata('member'), 'status' => 0)));
                                                        echo $count_review;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
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