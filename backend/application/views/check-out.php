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
        <title>Check out - greeny</title>

        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/user-auth.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/checkout.css" />
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
                <h2>check out</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">check out</li>
                </ol>
            </div>
        </section>
        <section class="inner-section checkout-part">
            <div class="container">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>delivery address</h4>
                                    <a href="<?php echo base_url('member-address'); ?>" class="btn btn-outline mb-2 me-2" target="_blank">add address</a>

                                </div>
                                <div class="account-content">
                                    <div class="row" id="ship_data">
                                        <?php
                                        $shipment = $this->md->my_select('tbl_shipment', '*', array('register_id' => $this->session->userdata('member')));

                                        if (count($shipment) > 0 && !$this->session->userdata("shipment_id")) {
                                            $this->session->set_userdata('shipment_id', $shipment[0]->shipment_id);
                                        }
                                        foreach ($shipment as $data) {
                                            ?>
                                            <div class="col-md-3 col-lg-4 alert fade show">
                                                <div class="profile-card address">
                                                    <p><h3><?php echo $data->name ?></h3></p>
                                                    <h6>(<?php echo $data->address_type ?>)</h6>
                                                    <p style="min-height: 100px;"><?php echo substr($data->address, 0, 70) ?></p>
                                                    <?php
                                                    if ($data->shipment_id == $this->session->userdata('shipment_id')) {
                                                        ?>
                                                        <button type="button" class="btn btn-inline" style="background: black;color: white;border: black">Selected</button>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <button type="button" onclick="change_shipment(<?php echo $data->shipment_id ?>)" class="btn btn-inline">Select</button>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="account-card mb-0">
                                <div class="account-title">
                                    <h4>payment option</h4>
                                </div>
                                <div class="account-content">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <label><input type="radio" name="payment_type" value="cod"<?php
                                                if (!$this->session->userdata('pay_type') || ($this->session->userdata('pay_type') == "cod")) {
                                                    echo "checked";
                                                }
                                                ?>><span style="margin-left: 10px">Cash On Delivery</span></label>
                                        </div>
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <label><input type="radio" value="card" name="payment_type"<?php
                                                if (!$this->session->userdata('pay_type') || ($this->session->userdata('pay_type') == "card")) {
                                                    echo "checked";
                                                }
                                                ?>><span style="margin-left: 10px">Online Payment</span></label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="account-card mb-0">

                                <div class="account-content">
                                    <br/>
                                    
                                    <form class="coupon-form">
                                        <input type="text"  style="border: 1px solid black; width: 210px;"  placeholder="Enter your coupon code" id="promocode" name="name" type="text" />
                                        <button style="margin-left: 15px; color: green" onclick="apply_code();" type="button"><span>apply</span></button>
                                    </form>
                                    <p class="errmsg" id="msg"></p>
                                    <ul>

                                        <li>
                                            <table >
                                                <?php
                                                $total_bill = $this->session->userdata('total_amount');

                                                $where['min_bill_price <='] = $total_bill;
                                                $where['status'] = 1;

                                                $all_code = $this->md->my_select('tbl_promocode', '*', $where);

                                                foreach ($all_code as $data) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <p style="padding: 5px;">
                                                                Rs.<?php echo $data->amount ?>/- off on purchasing Rs.<?php echo $data->min_bill_price ?>/-.
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <a class=" btn btn-outline mb-2 me-2"
                                                               style="width: 120px; border-radius: 20px; padding: 5px; text-align: center;"
                                                               href=""><?php echo $data->code ?></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="account-card" id="checkout_cartdata">
                                <div class="account-title"><h4>Your order</h4></div>
                                <div class="account-content">
                                    <div class="table-scroll">
                                        <table class="table-list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Price</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                $i = 0;
                                                foreach ($cart as $cart_data) {
                                                    $i++;
                                                    $product_details = $this->md->my_select('tbl_product', '*', array('product_id' => $cart_data->product_id))[0]->name;
                                                    $img = $this->md->my_select('tbl_product_image', '*', array('image_id' => $cart_data->image_id))[0];
                                                    $allimg = explode(",", $img->path);
                                                    $path = $allimg[0];
                                                    $color = $img->unit;
                                                    $price = $cart_data->price;
                                                    $qty = $cart_data->qty;

                                                    $total = $total + $cart_data->total_price;
                                                    ?>
                                                    <tr>
                                                        <td class="table-image " ><img src="<?php echo base_url() . $allimg[0] ?>" style="height: 60px;width: 60px" alt="product" /></td>
                                                        <td class="table-name"><h6><?php echo substr($product_details, 0, 10) ?>..</h6></td>
                                                        <td class="table-price">
                                                            <h6>Rs. <?php echo $price; ?> /-</h6>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="checkout-charge">
                                        <ul class="col-md-7">
                                            <li><span>Sub total</span><span>Rs. <?php echo $total; ?> /-</span></li>
                                            <?php $total+=100; ?>
                                            <li><span>(+) Shippping</span><span>Rs. 100 /-</span></li>
                                            <?php
                                            if ($this->session->userdata('promocode_id')) {
                                                $code = $this->md->my_select('tbl_promocode', '*', array('promocode_id' => $this->session->userdata('promocode_id')))[0];
                                                $total -= ($code->amount);
                                                ?>
                                                <li><span>(-) Promocode </span><span>Rs. <?php echo $code->amount; ?> /-</span></li>
                                                <?php
                                            }
                                            ?>
                                            <li>
                                                <span>Total<small>(Incl. VAT)</small></span><span>Rs. <?php echo $total; ?> /-</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="checkout-proced"><button type="submit" value="yes" name="place_order" class="btn btn-inline">proced to checkout</button></div>

                                </div>  
                            </div>
                        </div>
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
