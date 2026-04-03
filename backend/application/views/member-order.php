<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Member Order - greeny</title>


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
                <h2>Member Order</h2> 
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
                                    <h4>User Order</h4>
                                </div>
                                <section class="inner-section wishlist-part">
                                    <div class="container" style="padding-left: 0px;padding-right: 0px;">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-scroll">
                                                    <table class="table-list">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">No.</th>
                                                                <th scope="col">Order Date</th>
                                                                <th scope="col">Order Details</th>
                                                                <th scope="col">Payment Mode</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">View  More</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            foreach ($bill as $bill_data) {
                                                                $i++;
                                                                ?>
                                                                <tr align="center">
                                                                    <td style="vertical-align: middle"><?php echo $i; ?></td>
                                                                    <td style="vertical-align: middle"><?php echo date('d-m-Y', strtotime($bill_data->bill_date)) ?></td>
                                                                    <td style="vertical-align: middle">
                                                                        <table>
                                                                            <?php
                                                                            $trans = $this->md->my_select('tbl_transaction', '*', array('bill_id' => $bill_data->bill_id));
                                                                            foreach ($trans as $trans_data) {
                                                                                $product = $this->md->my_select('tbl_product', '*', array('product_id' => $trans_data->product_id))[0];
                                                                                $image = $this->md->my_select('tbl_product_image', '*', array('image_id' => $trans_data->image_id))[0];

                                                                                $allimages = explode(',', $image->path);
                                                                                $single = $allimages[0];
                                                                                ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <a href="<?php echo base_url() ?>product-detail/<?php echo base64_encode(base64_encode($trans_data->product_id)); ?>">
                                                                                            <img src="<?php echo base_url() . $single; ?>" style="height: 100px; width:100px ;margin-right: 20px ;padding: 5px" data-toggle="tooltip"  data-placement="bottom" title="<?php echo $product->name; ?>"/>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <p><?php echo substr($product->name, 0, 20); ?>...</p>
                                                                                        <p>Color.<?php echo $image->unit; ?></p>
                                                                                        <p>Qty.<?php echo $trans_data->qty; ?></p>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </table>
                                                                    </td>
                                                                    <td style="vertical-align: middle">
                                                                        <?php
                                                                        if ($bill_data->pay_type == "cod") {
                                                                            echo "Cash On Delivery";
                                                                        } else {
                                                                            echo "Online Payment";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td style="vertical-align: middle">
                                                                        <?php
                                                                        if ($bill_data->status == 0) {
                                                                            echo '<b><span style="color:black">pending</span></b>';
                                                                        } elseif ($bill_data->status == 1) {
                                                                            echo '<b><span style="color:green">Confirm</span></b>';
                                                                        } elseif ($bill_data->status == 2) {
                                                                            echo '<b><span style="color:red">Cancel</span></b>';
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td style="vertical-align: middle">
                                                                        <a href="<?php echo base_url(); ?>member-order-detail/<?php echo base64_encode(base64_encode($bill_data->bill_id)) ?>"><u>View More</u>
                                                                        </a>
                                                                    </td>

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