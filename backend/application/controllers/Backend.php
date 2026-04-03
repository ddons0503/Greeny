<?php

class Backend extends CI_Controller {

    public function product_data() {
//        echo "<pre>";
//        print_r($this->input->post('filter_data'));
//        echo "</pre>";
//        die();

        $collection = $this->input->post('action');
        $id = base64_decode(base64_decode($this->input->post('id')));
        $limit = $this->input->post('limit');
        $filter_data = $this->input->post('filter_data');

        $qty = array();
        $price = array();
        $offer = array();

        if (isset($filter_data) && count($filter_data) > 0) {
            foreach ($filter_data as $single) {

                if ($single['name'] == "qty[]") {
                    array_push($qty, $single['value']);
                } else if ($single['name'] == "price[]") {
                    array_push($price, $single['value']);
                } else if ($single['name'] == "offer[]") {
                    array_push($offer, $single['value']);
                }
            }
        }

//        echo "<br/> Qty";
//        print_r($qty);
//                echo "<br/> Price";
//                print_r($price);
//        die();
//        echo "<br/> Offer";
//        print_r($offer);
//        die();

        $sql = "SELECT * FROM `tbl_product` WHERE `status` = 1";

        if ($collection == "main-collection") {
            $sql .= " AND `main_id` = $id";
        } else if ($collection == "sub-collection") {
            $sql .= " AND `sub_id` = $id";
        } else if ($collection == "peta-collection") {
            $sql .= " AND `peta_id` = $id";
        } else if ($collection == "search") {
            $sql .= " AND `name` LIKE '%" . $this->input->post('id') . "%'";
        }

// qty
        if (count($qty) > 0) {
            $qty_str = implode("','", $qty);
            $sql .= " AND `product_id` IN ( SELECT `product_id` FROM `tbl_product_image` WHERE `unit` IN( '" . $qty_str . "' ) )";
        }

// price
        if (count($price) > 0) {
            $sql .= " AND ( ";
            foreach ($price as $single) {
                if ($single >= 10000) {
                    $min_price = $single;
                    $max_price = 50000;
                } else {
                    $min_price = $single;
                    $max_price = $single + 1000;
                }

                $sql .= "( `price` BETWEEN $min_price AND $max_price ) OR ";
            }
            $sql = rtrim($sql, " OR ");
            $sql .= " )";
        }
//        
//        // offer 
        if (count($offer) > 0) {
            $sql .= " AND ( ";
            if (in_array("1", $offer)) {
                $sql .= " `offer_id` > 0 OR ";
            }
            if (in_array("0", $offer)) {
                $sql .= " `offer_id` = 0 OR ";
            }
            $sql = rtrim($sql, " OR ");
            $sql .= " )";
        }

        $sql .= " ORDER BY `product_id` DESC LIMIT 0,$limit";

        $allproducts = $this->md->my_query($sql);
        $total_product = count($allproducts);
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="top-filter">
                    <div class="product-top-dt">
                        <div class="product-left-title">
                        </div>
                        <a href="#" class="filter-label">Filters</a>
                        <div class="">
                            <select class="form-select filter-select"" onchange="product_data('<?php echo $collection ?>', '<?php echo $this->input->post('id'); ?>', this.value);">
                                <option <?php
                                if ($limit == "12") {
                                    echo "selected";
                                }
                                ?> >12</option>
                                <option <?php
                                if ($limit == "15") {
                                    echo "selected";
                                }
                                ?> >15</option>
                                <option <?php
                                if ($limit == "18") {
                                    echo "selected";
                                }
                                ?> >18</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3">
            <?php
            foreach ($allproducts as $data) {
                $allimages = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                $allpath = explode(",", $allimages->path);
                $single = $allpath[0];
                ?>
                <div class="col">
                    <div class="product-card">
                        <div class="product-media" align="center">

                            <div class="product-label">
                            </div>
                            <!--Wishlist Button-->
                            <!--End Wishlist Button-->


                            <a href="<?php echo base_url() ?>product-details/<?php echo base64_encode(base64_encode($data->product_id)) ?>" class="product-img">
                                <img src="<?php echo base_url() . $single; ?>" style="width:180px;height:180px;object-fit: contain;" alt="<?php echo $data->name; ?>">
                            </a>

                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <?php
                                $total_rate = 0;
                                $total_person = 0;
                                $review = $this->md->my_select('tbl_review', '*', array('product_id' => $data->product_id, 'status' => 1));

                                foreach ($review as $rdata) {
                                    $total_rate += $rdata->rating;
                                    $total_person++;
                                }

                                if ($total_person > 0) {
                                    $avg_rate = round($total_rate / $total_person);

                                    $fill_star = $avg_rate;
                                    $blank_star = 5 - $fill_star;
                                } else {
                                    $fill_star = 0;
                                    $blank_star = 5;
                                }

                                for ($i = 1;
                                        $i <= $fill_star;
                                        $i++) {
                                    ?>
                                    <i class="fa-solid fa-star" style="color:yellow"></i>
                                    <?php
                                }
                                for ($i = 1;
                                        $i <= $blank_star;
                                        $i++) {
                                    ?>
                                    <i class="fa-regular fa-star"></i>
                                    <?php
                                }
                                ?>
                                <a href="product-video.html">( <?php echo $total_person; ?> reviews )</a>
                            </div>
                            <h6 class="product-name"><a href="<?php echo base_url() ?>product-details/<?php echo base64_encode(base64_encode($data->product_id)) ?>"><?php echo substr($data->name, 0, 23); ?>...</a></h6>
                            <h6 class="product-price" style="margin-bottom: 0px;">
                                <!--<del></del>-->
                                <span>Rs. <?php echo $allimages->price; ?> /-<!--<small>piece</small>-->
                                </span>
                            </h6>
                            <?php
                            if ($allimages->qty > 0) {
                                ?>
                                <b style="color: green">Available In Stock</b>
                                <?php
                            } else {
                                ?>
                                <b style="color: red">Out Of Stock</b>
                                <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>   
        <?php
    }

    public function change_order_status() {

        $data['status'] = $this->input->post('status');
        $wh['bill_id'] = $this->input->post('bill_id');

        $result = $this->md->my_update('tbl_bill', $data, $wh);
        if ($result == 1) {
            $bill = $this->md->my_select('tbl_bill', '*', array('status' => 0));
            ?>
            <thead>
                <tr align="center" >
                    <th>No.</th>
                    <th>Order Details</th>
                    <th>Product Details</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 0;
                foreach ($bill as $bill_data) {
                    $i++;
                    $shipment = $this->md->my_select('tbl_shipment', '*', array('shipment_id' => $bill_data->shipment_id))[0];
                    ?>
                    <tr align="center">
                        <td><?php echo $i ?></td>
                        <td align="left" >
                            <b>Name: </b><?php echo $shipment->name ?><br/>
                            <b>Address: </b><?php echo $shipment->address ?><br/>
                            <b>Date: </b><?php echo date('d-m-Y', strtotime($bill_data->bill_date)) ?><br/>
                            <b>Order ID: </b><?php echo $bill_data->order_id ?><br/>
                            <?php
                            if ($bill_data->pay_type == "cod") {
                                ?>
                                <b>Payment Mode: </b>Cash On Delivery<br/>
                                <?php
                            } else {
                                ?>
                                <b>Payment Mode: </b>Online Payment<br/>
                                <b>Payment Id : </b><?php echo $bill_data->payment_id ?><br/>
                                <?php
                            }
                            ?>
                            <b>Shipping Charge: </b>Rs.100/-<br/>
                            <?php
                            if ($bill_data->promocode_id > 0) {
                                $code = $this->md->my_select('tbl_promocode', '*', array('promocode_id' => $bill_data->promocode_id))[0];
                                ?>
                                <b>Promocode  (<?php echo $code->code ?>) : </b><?php echo $code->amount ?><br/>
                            <?php }
                            ?>

                            <b>Total: </b>Rs. <?php echo $bill_data->amount; ?> /-<br/>
                        </td>
                        <td align="left">
                            <?php
                            $whh['bill_id'] = $bill_data->bill_id;
                            $trans = $this->md->my_select('tbl_transaction', '*', $whh);
                            foreach ($trans as $trans_data) {
                                $product = $this->md->my_select('tbl_product', '*', array('product_id' => $trans_data->product_id))[0];
                                $image = $this->md->my_select('tbl_product_image', '*', array('image_id' => $trans_data->image_id))[0];
                                $allimages = explode(",", $image->path);
                                $single = $allimages[0];
                                ?>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a href="<?php echo base_url() ?>product-detail/<?php echo base64_encode(base64_encode($trans_data->product_id)); ?>">
                                            <img src="<?php echo base_url() . $single; ?>" style="height: 220px; width:200px ;margin-right: 20px " data-toggle="tooltip"  data-placement="bottom" title="<?php echo $product->name; ?>"/>
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a class="cart_title" href="<?php echo base_url() ?>product-detail/<?php echo base64_encode(base64_encode($trans_data->product_id)); ?>">
                                            <b><?php echo $product->name; ?></b><br/>
                                            <b>Gross Price: </b>Rs. <?php echo $trans_data->gross_id; ?> /-<br/>
                                            <b>Qty: </b><?php echo $trans_data->qty ?> <br/>
                                            <b>Total: </b>Rs. <?php echo $trans_data->total_price; ?> /-<br/>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <button type="button" onclick="change_order_status(<?php echo $bill_data->bill_id ?>, 1)"  class="btn btn-success" >Accept</button><br/><br/>
                            <button type="button" onclick="change_order_status(<?php echo $bill_data->bill_id ?>, 2)" class="btn btn-danger" >Cancel</button>
                        </td>

                    </tr>
                <?php }
                ?>
            </tbody>    
            <?php
        }
    }

    public function subscribe() {
        $email = $this->input->post('email');

        $wh['email'] = $email;

        $record = $this->md->my_select('tbl_email_subscriber', '*', $wh);
        $count = count($record);

        if ($count == 0) {

            echo $this->md->my_insert('tbl_email_subscriber', $wh);
        } else {
            echo 2;
        }
    }

    public function checkout_cartdata() {
        ?>
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
                        $wh['register_id'] = $this->session->userdata('member');

                        $cart = $this->md->my_select('tbl_cart', '*', $wh);

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
                                <td class="table-image"><img src="<?php echo base_url() . $allimg[0] ?>" style="height: 60px;width: 60px" alt="product" /></td>
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
                    <?php $total += 100; ?>
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
        <?php
    }

    public function add_wish() {
        $ins['register_id'] = $this->session->userdata('member');
        $ins['product_id'] = $this->input->post('pid');

        echo $this->md->my_insert('tbl_wishlist', $ins);
    }

    public function change_stock_status() {
        $allimages = $this->md->my_select('tbl_product_image', '*', array('image_id' => $this->input->post('img_id')))[0];
        $qty = $allimages->qty;

        if ($qty > 0) {
            ?>
            <div class="status m10"><span class="style1111">In Stock</span></div>

            <?php
        } else {
            ?>
            <div class="status m10"><span class="style2222">Out Of Stock</span></div>

            <?php
        }
    }

    public function add_cart() {

        $cart['product_id'] = $this->input->post('pid');
        $cart['register_id'] = $this->session->userdata('member');

        $cart['image_id'] = $this->session->userdata('image_id');

        $wh['image_id'] = $this->session->userdata('image_id');
        $price = $this->md->my_select('tbl_product_image', '*', $wh)[0]->price;

        $cart['price'] = $price;
        $cart['qty'] = 1;

        $cart['total_price'] = $cart['price'];

        echo $this->md->my_insert('tbl_cart', $cart);
    }

    public function add_review() {
//         echo '<pre>';
//         print_r($this->input->post());
//         die();
        $wh['register_id'] = $this->session->userdata('member');
        $wh['product_id'] = $this->input->post('pid');

        $review = $this->md->my_select('tbl_review', '*', $wh);
        $count = count($review);

        if ($count == 0) {

            $ins['register_id'] = $this->session->userdata('member');
            $ins['product_id'] = $this->input->post('pid');
            $ins['rating'] = $this->input->post('rate');
            $ins['message'] = $this->input->post('msg');
            $ins['date'] = date('Y-m-d h:i:s');
            $ins['status'] = 0;

            echo $this->md->my_insert('tbl_review', $ins);
        } else {
            echo 2;
        }
    }

    public function change_price() {
        $wh['image_id'] = $this->input->post('img_id');
        $img = $this->md->my_select('tbl_product_image', '*', $wh)[0];

        $this->session->set_userdata('image_id', $this->input->post('img_id'));
        ?>
        <h3 class="details-price" id="price"><span>Rs. <?php echo $img->price ?>/-</span></h3>           
        <?php
    }

    public function change_cart() {
        $wh['cart_id'] = $this->input->post('cart_id');

        $data = $this->md->my_select('tbl_cart', '*', $wh)[0];

        $qty = $this->input->post('qty');
        $up['qty'] = $qty;
        $up['total_price'] = $data->price * $qty;

        echo $this->md->my_update('tbl_cart', $up, $wh);
    }

    public function cartdata() {
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
                                                                    <span class="fz16" style="color: black;text-transform: lowercase"><?php echo substr($product_info->name, 0, 40); ?></span>
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
                                                        $total = $total + $cart_data->total_price;
                                                        ;
                                                    }
                                                    $this->session->set_userdata('total_amount', $total);
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
    }

    public function shipment_id() {

        $shipment_id = $this->input->post('shipment_id');

        $this->session->set_userdata('shipment_id', $shipment_id);
        $shipment = $this->md->my_select('tbl_shipment', '*', array('register_id' => $this->session->userdata('member')));

        if (count($shipment) > 0 && !$this->session->userdata("shipment_id")) {
            $this->session->userdata('shipment_id', $shipment[0]->shipment_id);
        }
        foreach ($shipment as $data) {
            ?>
            <div class="col-md-3 col-lg-4 alert fade show">
                <div class="profile-card address">
                    <p><h3><?php echo $data->name ?></h3></p>
                    <h6>(<?php echo $data->address_type ?>)</h6>
                    <p><?php echo substr($data->address, 0, 70) ?></p>
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
    }

    public function apply_code() {
        $code = $this->input->post('code');

        $wh['min_bill_price <='] = $this->session->userdata('total_amount');
        $wh['status'] = 1;
        $wh['code'] = $code;

        $valid_code = $this->md->my_select('tbl_promocode', '*', $wh);
        if (count($valid_code) > 0) {
            $this->session->set_userdata('promocode_id', $valid_code[0]->promocode_id);
            echo 1;
        } else {
            echo 2;
        }
    }

    public function change_cart_btn() {

        $img = $this->md->my_select('tbl_product_image', '*', array('image_id' => $this->session->userdata('image_id')))[0];

        if ($img->qty > 0) {

            if ($this->session->userdata('member')) {

                $cwh['register_id'] = $this->session->userdata('member');
                $cwh['product_id'] = $details->product_id;
                $cwh['image_id'] = $this->session->userdata('image_id');

                $cart = $this->md->my_select('tbl_cart', '*', $cwh);
                $cart_item = count($cart);

                if ($cart_item > 0) {
                    ?>
                    <a>
                        <button class="product-add">
                            <i class="fas fa-shopping-basket"></i><span>Added in Cart</span>
                        </button>
                    </a>
                    <?php
                } else {
                    ?>
                    <a id="cart-btn">
                        <button onclick="add_cart(<?php echo $details->product_id;
                    ?>);" class="product-add">
                            <i class="fas fa-shopping-basket"></i><span>Add to cart</span>
                        </button>
                    </a>
                    <?php
                }
            } else {
                ?>
                <a href="<?php echo base_url('sign-in') ?>">
                    <button class="product-add">
                        <i class="fas fa-shopping-basket"></i><span>Add to Cart</span>
                    </button>
                </a>
                <?php
            }
        }
    }

    public function state() {
        $wh['parent_id'] = $this->input->post('id');
        $records = $this->md->my_select('tbl_location', '*', $wh);
        echo '<option value="">Select State</option>';
        foreach ($records as $data) {
            echo '<option value="' . $data->location_id . '">' . $data->name . '</option>';
        }
    }

    public function city() {
        $wh['parent_id'] = $this->input->post('id');
        $records = $this->md->my_select('tbl_location', '*', $wh);
        echo '<option value="">Select city</option>';
        foreach ($records as $data) {
            echo '<option value="' . $data->location_id . '">' . $data->name . '</option>';
        }
    }

    public function sub_category() {
        $wh['parent_id'] = $this->input->post('id');
        $records = $this->md->my_select('tbl_category', '*', $wh);
        echo '<option value="">Select Sub Category</option>';
        foreach ($records as $data) {
            echo '<option value="' . $data->category_id . '">' . $data->name . '</option>';
        }
    }

    public function peta_category() {
        $wh['parent_id'] = $this->input->post('id');
        $records = $this->md->my_select('tbl_category', '*', $wh);
        echo '<option value="">Select Peta Category</option>';
        foreach ($records as $data) {
            echo '<option value="' . $data->category_id . '">' . $data->name . '</option>';
        }
    }

    public function change_status() {

        $action = $this->input->post('action');
        $id = $this->input->post('id');

        if ($action == 'banner') {
            $wh['banner_id'] = $id;
            $status = $this->md->my_select('tbl_banner', '*', $wh)[0]->status;

            if ($status == 1) {
                $up['status'] = 0;
            } else {
                $up['status'] = 1;
            }
            $this->md->my_update('tbl_banner', $up, $wh);
        }

        $action = $this->input->post('action');
        $id = $this->input->post('id');

        if ($action == 'offer') {
            $wh['offer_id'] = $id;
            $status = $this->md->my_select('tbl_offer', '*', $wh)[0]->status;

            if ($status == 1) {
                $up['status'] = 0;
            } else {
                $up['status'] = 1;
            }
            $this->md->my_update('tbl_offer', $up, $wh);
        } else if ($action == 'promocode') {
            $wh['promocode_id'] = $id;
            $status = $this->md->my_select('tbl_promocode', '*', $wh)[0]->status;

            if ($status == 1) {
                $up['status'] = 0;
            } else {
                $up['status'] = 1;
            }
            $this->md->my_update('tbl_promocode', $up, $wh);
        } else if ($action == 'register') {
            $wh['register_id'] = $id;
            $status = $this->md->my_select('tbl_register', '*', $wh)[0]->status;

            if ($status == 1) {
                $up['status'] = 0;
            } else {
                $up['status'] = 1;
            }

            $this->md->my_update('tbl_register', $up, $wh);
        } else if ($action == 'product') {
            $wh['product_id'] = $id;
            $status = $this->md->my_select('tbl_product', '*', $wh)[0]->status;

            if ($status == 1) {
                $up['status'] = 0;
            } else {
                $up['status'] = 1;
            }

            $this->md->my_update('tbl_product', $up, $wh);
        } else if ($action == 'review') {
            $wh['review_id'] = $id;
            $status = $this->md->my_select('tbl_review', '*', $wh)[0]->status;

            if ($status == 1) {
                $up['status'] = 0;
            } else {
                $up['status'] = 1;
            }

            $this->md->my_update('tbl_review', $up, $wh);
        }
    }

    public function delete_review() {
        $wh['review_id'] = $this->input->post('rid');
        $this->md->my_delete('tbl_review', $wh);

        $review = $this->md->my_select('tbl_review', '*', array('register_id' => $this->session->userdata('member')));

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
        <?php
    }
    
    public function remove_cart() {
        $wh['cart_id'] = $this->input->post('cart_id');
        echo $this->md->my_delete('tbl_cart',$wh);
    }
    
    
    public function delete_wishlist() {
        $wh['wish_id'] = $this->input->post('wid');
        $this->md->my_delete('tbl_wishlist', $wh);

        $wishlist = $this->md->my_select('tbl_wishlist', '*', array('register_id' => $this->session->userdata('member')));

        $i = 0;
        foreach ($wishlist as $data) {
            $i++;
            $whhhh['product_id'] = $data->product_id;
            $product_details = $this->md->my_select('tbl_product', '*', $whhhh)[0];
            $allimages = $this->md->my_select('tbl_product_image', '*', $whhhh)[0];
            $path = explode(",", $allimages->path);
            $single = $path[0];
            ?>
            <tr align="center">
                <td><?php echo $i; ?></td>
                <td><a href="<?php echo base_url() . $single; ?>" target="_blank" ><img src="<?php echo base_url() . $single; ?>" style="height: 150px" width="150px" data-toggle="tooltip"  data-placement="bottom"/></a></td>
                <td><?php echo $product_details->name ?></td>
                <td>RS.<?php echo $allimages->price ?>/-</td>
                <td><a href="<?php echo base_url() ?>product-details/<?php echo base64_encode(base64_encode($data->product_id)) ?>">View More</a></td>
                <td style="vertical-align: middle"><a onclick="delete_wishlist(<?php echo $data->wish_id; ?>);" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-trash-alt" style="color: red" data-toggle="tooltip"  data-placement="bottom" title="Remove" data-toggle="modal" data-target="#exampleModal" ></i></a></td>
            </tr>
        <?php }
        ?>
        <?php
    }

}
