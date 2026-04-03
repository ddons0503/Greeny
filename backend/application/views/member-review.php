<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Member Review - greeny</title>


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
                <h2>Member Review</h2> 
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
                                    <h4>User Review</h4>
                                </div>
                                <section class="inner-section wishlist-part">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-scroll">
                                                    <table class="table-list">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">No.</th>
                                                                <th scope="col">Product</th>
                                                                <th scope="col">Message</th>
                                                                <th scope="col">Rating</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Remove</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody id="review-data">
                                                            <?php
                                                            $i = 0;
                                                            foreach ($review as $data) {
                                                                $i++;
                                                                      $product = $this->md->my_select('tbl_product', '*', array('product_id' => $data->product_id))[0];
                                                                        $image = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                                                        $allimages = explode(",", $image->path);
                                                                        $single = $allimages[0];

                                                                        $user = $this->md->my_select('tbl_register', '*', array('register_id' => $data->register_id))[0];
                                                                ?>
                                                            <tr align="center">
                                                                    <td style="vertical-align: middle"><?php echo $i; ?></td>
                                                                    <td style="vertical-align: middle">
                                                                     <a href="<?php echo base_url(); ?>product-details/<?php echo base64_encode(base64_encode($data->product_id)); ?>" target="_blank" >
                                                                                    <img src="<?php echo base_url() . $single; ?>" style="width: 100px" data-toggle="tooltip" data-placement="bottom" title="<?php echo $product->name; ?>"> 
                                                                                </a>
                                                                    </td>
                                                                    <td style="vertical-align: middle"><?php echo $data->message; ?></td>
                                                                    <td style="vertical-align: middle"><?php
                                                                        for ($s = 1; $s <= 3; $s++) {
                                                                            ?>
                                                                            <i class="fa-solid fa-star"></i>
                                                                        <?php }
                                                                        ?><?php
                                                                        for ($s = 1; $s <= 2; $s++) {
                                                                            ?>
                                                                            <i class="fa-regular fa-star"></i>
                                                                        <?php }
                                                                        ?></td>
                                                                    <td style="vertical-align: middle" class="center hidden-xs">Active</td>
                                                                    <td style="vertical-align: middle"><a onclick="delete_review(<?php echo $data->review_id; ?>);" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-trash-alt" style="color: red" data-toggle="tooltip"  data-placement="bottom" title="Remove" data-toggle="modal" data-target="#exampleModal" ></i></a></td>

                                                                </tr>
                                                            <?php }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
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
        <script>
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }
        </script>
        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerjs');
        ?>
    </body>

</html> 