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
        <title>Cart - greeny</title>

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
                <h2>cart</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                </ol>
            </div>
        </section>
        <span id="cartdata">
        <?php
        if (!$this->session->userdata('member')) {
            ?>
            <section class="coming-part">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/sad.png" alt="coming-soon" /></div>

                        <div class="col-lg-7">
                            <div class="coming-content">
                                <h3 class="coming-title" style="font-style: italic;">LOGIN, First To View Cart !</h3>
                                <br/>

                                <p><a href="<?php echo base_url('sign-in'); ?>" class="btn btn-outline mb-2 me-2">SIGN IN</a></p>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </section>
            <br/>
            <br/>
            <br/>
            <br/>
        <?php
    } else {
        $wh['register_id'] = $this->session->userdata('member');
        $user = $this->md->my_select('tbl_register', '*', $wh)[0];

        $cart = $this->md->my_select('tbl_cart', '*', $wh);
        $total_data = count($cart);

        if ($total_data == 0) {
            ?>
            <section class = "coming-part">
                <div class = "container">
                    <div class = "row align-items-center">
                        <div class = "col-lg-5"><img class = "img-fluid" src = "<?php echo base_url(); ?>assets/images/sad.png" alt = "coming-soon" /></div>

                        <div class = "col-lg-7">
                            <div class = "coming-content">
                                <h3 class = "coming-title" style = "font-style: italic;">SORRY, YOUR SHOPPING CART IS EMPTY!</h3>
                                <br/>
                                <h6 class = "coming-subtitle">You have no items in your shopping cart.</h6>
                                <br/>


                                <p><a href = "<?php echo base_url('home'); ?>" class = "btn btn-outline mb-2 me-2">GO Back</a><a href = "<?php echo base_url('product-list'); ?>" class = "btn btn-outline mb-2 text-capitalize">Continue shopping</a></p>
                            </div>

                        </div>
                    </div>
                </div>

            </section>
            <br/>
            <br/>
            <br/>
            <br/>
            <?php
        } else {
            ?>  
        <section class="inner-section checkout-part">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title"><h4>Your order</h4></div>
                                <div class="account-content">
                                    <div class="table-scroll">
                                        <table class="table-list">
                                            <thead>
                                                <tr>
                                                    <th class="action">Remove</th>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Net Price</th>
                                                    <th scope="col">quantity</th>
                                                    <th scope="col">Total Price</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                $i = 0;
                                                foreach ($cart as $cart_data) {
                                                    $i++;

                                                    $product_info = $this->md->my_select('tbl_product', '*', array('product_id' => $cart_data->product_id))[0];
                                                    $image = $this->md->my_select('tbl_product_image', '*', array('image_id' => $cart_data->image_id))[0];
                                                    $allimages = explode(",", $image->path);
                                                    $path = $allimages[0];

                                                    ?>
                                                    <tr>
                                                        <td class="cart-delete text-center small--hide"><a onclick="remove_cart(<?php echo $cart_data->cart_id; ?>);"  data-bs-toggle="tooltip" data-bs-placement="top" title="Remove item"><i class="fa-solid fa-xmark-circle fa-2x"></i></a></td>

                                                        <td class="table-image">
                                                            <a href="<?php echo base_url(); ?>product-details/<?php echo base64_encode(base64_encode($cart_data->product_id)); ?>" target="_blank">
                                                                <img src="<?php echo base_url() . $path; ?>">
                                                            </a>
                                                        </td>
                                                        <td class="table-name">
                                                            <a class="cart_title"  href="<?php echo base_url(); ?>product-details/<?php echo base64_encode(base64_encode($cart_data->product_id)); ?>" target="_blank" >
                                                                <span class="fz16" style="color: black;text-transform: lowercase"><?php echo substr($product_info->name, 0,40); ?></span>
                                                                <br/>
                                                                <span class="fz14">
                                                                    <span class="fw500 text-uppercase" style="color:black;">[ <?php echo $image->unit; ?> ]</span>
                                                                </span>
                                                            </a>
                                                        </td>
                                                        <td class="table-price">
                                                            <h6>Rs. <?php echo $cart_data->price; ?> /-</h6>
                                                        </td>
                                                        <td class="table-quantity">
                                                            <h6>
                                                                <?php
                                                                if ($image->qty > 5) {
                                                                    $max = 5;
                                                                } else {
                                                                    $max = $image->qty;
                                                                }
                                                                ?>
                                                                <input class="cart_count" type="number" onchange="change_cart(<?php echo $cart_data->cart_id ?>, this.value);" style="width:70px;padding: 5px;" value="<?php echo $cart_data->qty; ?>" min="1" max="<?php echo $max; ?>" /> 

                                                            </h6>
                                                        </td>
                                                        <td class="table-price">
                                                            <h6> Rs. <?php echo $cart_data->total_price; ?> /-</h6>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                    $total = $total + $cart_data->total_price;;
                                                }
                                                $this->session->set_userdata('total_amount',$total);
                                                ?>
                                                <tr>
                                                    <td colspan="5" class="text-end fw-bolder">Grand Total :</td>
                                                    <td class="fw-bolder">Rs.<?php echo $total ?>.00/-</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><br/>
                        <p><a href="<?php echo base_url('product-list'); ?>" class="btn btn-outline mb-2 me-2">Continue shopping</a><a href="<?php echo base_url('check-out'); ?>" class="btn btn-outline mb-2 text-capitalize">Check Out</a></p>
                    </div>
                </div>
            </section>
            <?php
        }
    }
    ?>
        </span>

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

    <?php
    $this->load->view('footer');
    ?>
    <?php
    $this->load->view('footerjs');
    ?>

</body>
</html>
