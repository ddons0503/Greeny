<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title><?php echo $details->name; ?></title>


        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/contact.css">
        <style>
            .product-spec{
                padding: 20px;
            }
            .product-spec table{
                width:90% ;
            }
            .product-spec tr td{
                padding: 5px;
            }
            .product-spec tr:nth-child(even){
                background-color: #c5f0c0;
            }
            .product-spec tr td:first-child{
                font-weight: bold;

            }

        </style>
        <style type="text/css">
            /* Rating Star Widgets Style */
            .rating-stars ul {
                list-style-type:none;
                padding:0;

                -moz-user-select:none;
                -webkit-user-select:none;
            }
            .rating-stars ul > li.star {
                display:inline-block;

            }

            /* Idle State of the stars */
            .rating-stars ul > li.star > i.fa {
                font-size:2.5em; /* Change the size of the stars */
                color:#ccc; /* Color on idle state */
            }

            /* Hover state of the stars */
            .rating-stars ul > li.star.hover > i.fa {
                color:#FFCC36;
            }

            /* Selected state of the stars */
            .rating-stars ul > li.star.selected > i.fa {
                color:#FF912C;
            }
        </style>
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
                <h2>Product Detail </h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('product-list'); ?>">Product List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                </ol>
            </div>
        </section>
        <section class="inner-section">
            <div class="container">
                <div class="row">
                    <?php
                    $allimages = $this->md->my_select('tbl_product_image', '*', array('product_id' => $details->product_id))[0];
                    $this->session->set_userdata('image_id', $allimages->image_id);
                    $path = explode(",", $allimages->path);
                    ?>
                    <div class="col-lg-6">
                        <div class="details-gallery">
                            

                            <ul id="sync1" class="details-preview">
                                <?php
                                foreach ($path as $single) {
                                    ?>
                                    <li>
                                        <img src="<?php echo base_url() . $single; ?>" style="height: 550px;width: 550px;object-fit: cover" alt="<?php echo $details->name; ?>">
                                    </li>

                                    <?php
                                }
                                ?>
                            </ul>
                            <ul id="sync1" class="details-thumb">
                                <?php
                                foreach ($path as $single) {
                                    ?>
                                    <li>
                                        <img src="<?php echo base_url() . $single; ?>" style="width:120px;height: 120px;object-fit: cover"  alt="">
                                    </li>

                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="details-content">
                            <h3 class="details-name"><a href="#"><?php echo $details->name; ?></a></h3>
                            <div class="details-meta">
                                <p>Product No.<span><?php echo $details->code; ?></span></p>

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
                                </p>
                            </div>
                            <div class="details-list-group">

                                <ul class="details-tag-list">

                                    <?php
                                    $qty = $this->md->my_select('tbl_product_image', '*', array('product_id' => $details->product_id));
                                    foreach ($qty as $color) {
                                        ?>
                                        <span class="tooltip-label top">
                                            <li>
                                                <label onclick="change_price(<?php echo $color->image_id; ?>)" for="p1<?php echo $color->image_id ?>" style="cursor: pointer">
                                                    <a><?php echo $color->unit; ?></a>
                                                </label>
                                            </li>
                                        </span>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>

                            <div class="details-rating" >
                                <?php
                                $total_rate = 0;
                                $total_person = 0;
                                $review = $this->md->my_select('tbl_review', '*', array('product_id' => $details->product_id, 'status' => 1));

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

                                for ($i = 1; $i <= $fill_star; $i++) {
                                    ?>
                                    <i class="fa-solid fa-star" style="color:yellow;"></i>
                                    <?php
                                }
                                for ($i = 1; $i <= $blank_star; $i++) {
                                    ?>
                                    <i class="fa-regular fa-star" ></i>
                                    <?php
                                }
                                ?>

                                <span style="color:black">( <?php echo $total_person; ?> Reviews )</span>
                            </div>
                            <h3 class="details-price" id="price">
                                <span>Rs. <?php echo $allimages->price ?>/-</span>
                            </h3>

                            <p class="details-desc"><?php echo $details->description; ?></p>


                            <div class="details-add-group" >
                                <?php
                                if ($this->session->userdata('member')) {


                                    $cwh['register_id'] = $this->session->userdata('member');
                                    $cwh['product_id'] = $details->product_id;
                                    $cwh['image_id'] = $this->session->userdata('image_id');

                                    $cart = $this->md->my_select('tbl_cart', '*', $cwh);
                                    $cart_item = count($cart);

                                    if ($cart_item > 0) {
                                        ?>
                                        <a style="width:100%">
                                            <button class="product-add">
                                                <i class="fas fa-shopping-basket"></i><span>Added in Cart</span>
                                            </button>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a style="width:100%" id="cart-btn">
                                            <button onclick="add_cart(<?php echo $details->product_id; ?>);" class="product-add">
                                                <i class="fas fa-shopping-basket"></i><span>Add to cart</span>
                                            </button>
                                        </a>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <a style="width:100%" href="<?php echo base_url('sign-in') ?>">
                                        <button class="product-add">
                                            <i class="fas fa-shopping-basket"></i><span>Add to Cart</span>
                                        </button>
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>
                            <div class="details-action-group">

                                <?php
                                if ($this->session->userdata('member')) {

                                    $wh1['register_id'] = $this->session->userdata('member');
                                    $wh1['product_id'] = $details->product_id;
                                    $wish = $this->md->my_select('tbl_wishlist', '*', $wh1);
                                    $wish_added = count($wish);

                                    if ($wish_added == 1) {
                                        ?>
                                        <a class="details-wish wish" href="<?php echo base_url('member-wishlist') ?>" id="wish-<?php echo $details->product_id; ?>" title="WISH ADDED"><i class="icofont-heart"></i><span>Wish Added</span></a>
                                        <?php
                                    } else {
                                        ?>
                                        <a class="details-wish wish" style="cursor: pointer" onclick="add_wish(<?php echo $details->product_id; ?>)" id="wish-<?php echo $details->product_id; ?>" title="Add Your Wishlist"><i class="icofont-heart"></i><span>Add Your Wishlist</span></a>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <a class="details-wish wish" href="<?php echo base_url('sign-in') ?>" title="Add Your Wishlist"><i class="icofont-heart"></i><span>Add Your Wishlist</span></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#tab-desc" class="tab-link active" data-bs-toggle="tab">descriptions</a></li>
                            <li><a href="#tab-spec" class="tab-link" data-bs-toggle="tab">Specifications</a></li>
                            <li><a href="#tab-reve" class="tab-link" data-bs-toggle="tab"> View reviews</a></li>
                            <?php
                            if ($this->session->userdata('member')) {
                                $user = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('member')))[0];
                                ?> 
                                <li><a href="#add-reve" class="tab-link" data-bs-toggle="tab">Add reviews </a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="tab-desc">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-frame">
                                <div class="tab-descrip">
                                    <p>
                                        <?php echo $details->description; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-spec">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-frame product-spec">
                                <table class="table table-bordered">
                                    <tbody align="left">
                                        <?php
                                        echo $details->specification;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-reve">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $rwh['product_id'] = $details->product_id;
                            $rwh['status'] = 1;
                            $review = $this->md->my_select('tbl_review', '*', $rwh);
                            foreach ($review as $rdata) {
                                $user = $this->md->my_select('tbl_register', '*', array('register_id' => $rdata->register_id))[0];
                                ?>
                                <div class="product-details-frame">

                                    <ul class="review-list">
                                        <li class="review-item">
                                            <div class="review-media">
                                                <?php
                                                if (strlen($user->profile_pic) > 0) {
                                                    ?>
                                                    <a class="review-avatar" href="#"><img src="<?php echo base_url() . $user->profile_pic; ?>" title="<?php echo $user->name; ?>"></a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="review-avatar" href="#"><img src="<?php echo base_url() ?>admin_assets/photo/th.jpg" title="<?php echo $user->name; ?>"></a>
                                                    <?php
                                                }
                                                ?>
                                                <h5 class="review-meta"><a href="#"><?php echo $user->name; ?></a><span><?php echo date('d-m-Y h:i:s', strtotime($rdata->date)); ?></span></h5>
                                            </div>
                                            <ul class="review-rating">
                                                <?php
                                                $fill_star = $rdata->rating;
                                                $blank_star = 5 - $fill_star;
                                                ?>

                                                <?php
                                                for ($j = 1; $j <= $fill_star; $j++) {
                                                    ?>
                                                    <i class="fa-solid fa-star"></i>
                                                    <?php
                                                }
                                                for ($j = 1; $j <= $blank_star; $j++) {
                                                    ?>
                                                    <i class="fa-regular fa-star"></i>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                            <p class="review-desc">
                                                <?php echo $rdata->message; ?>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="add-reve">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-frame">
                                <h3 class="frame-title">add your review</h3>
                                <form class="review-form">
                                    <div class="row">
                                        <center>
                                            <?php
                                            if (strlen($user->profile_pic) > 0) {
                                                ?>
                                                <img src="<?php echo base_url() . $user->profile_pic; ?>" class="img img-rounded mt-3 mb-0" style="width:200px;height: 200px; border-radius: 250px;" title="<?php echo $user->name; ?>" />
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo base_url(); ?>assets/images/user.png" class="img img-rounded mt-3 mb-0" style="width:200px;height: 200px; border-radius: 250px;" title="<?php echo $user->name; ?>" />
                                                <?php
                                            }
                                            ?>
                                            <h3><?php echo $user->name; ?></h3> 
                                        </center>

                                        <ul style="margin-left 100px;">
                                            <div class="rate">
                                                <input type="hidden" id="rate-value" />
                                                <div class='rating-stars'>
                                                    <ul id='stars'>
                                                        <li class='star' title='Poor' data-value='1'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='Fair' data-value='2'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='Good' data-value='3'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='Excellent' data-value='4'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='WOW!!!' data-value='5'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </ul>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea id="review-msg" class="form-control" placeholder="Write review,"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="button" onclick="add_review(<?php echo $details->product_id; ?>);" class="btn btn-inline"><i class="icofont-water-drop"></i><span>drop your review</span></button>
                                            <p id="review-output" class="my-2"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section newitem-part">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-heading">
                            <h2>Related Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="new-slider slider-arrow">
                            <?php
                                        $relatedwh['peta_id'] = $details->peta_id;
                                        $relatedwh['product_id !='] = $details->product_id;
                                    
                                        $related = $this->md->my_select('tbl_product','*',$relatedwh);
                                        
                                        foreach($related as $data){
                                            
                                            $allimages = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                            $allpath = explode(",", $allimages->path);
                                            $single = $allpath[0];
                                    ?>
                                <div class="col" style="margin: 5px">
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

                                                for ($i = 1; $i <= $fill_star; $i++) {
                                                    ?>
                                                    <i class="fa-solid fa-star" style="color:yellow"></i>
                                                    <?php
                                                }
                                                for ($i = 1; $i <= $blank_star; $i++) {
                                                    ?>
                                                    <i class="fa-regular fa-star"></i>
                                                    <?php
                                                }
                                                ?>
                                                <a href="product-video.html">( <?php echo $total_person; ?> reviews )</a>
                                            </div>
                                            <h6 class="product-name"><a href="<?php echo base_url() ?>product-details/<?php echo base64_encode(base64_encode($data->product_id)) ?>"><?php echo substr($data->name, 0, 20); ?>...</a></h6>
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
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section newitem-part">
            <?php
            if ($this->session->userdata('member')) {

                //insert
                $wh['product_id'] = $details->product_id;
                $wh['register_id'] = $this->session->userdata('member');

                $recent = $this->md->my_select('tbl_recent_view', '*', $wh);
                $count = count($recent);

                if ($count == 0) {
                    $this->md->my_insert('tbl_recent_view', $wh);
                }
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="section-heading">
                                <h2>Recently View Products</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <ul class="new-slider slider-arrow">
                                <?php
                                $recent_product = $this->md->my_query("SELECT `product_id` FROM `tbl_recent_view` WHERE `register_id` = " . $this->session->userdata('member') . " AND `product_id` != " . $details->product_id . " ORDER BY `view_id` DESC");
                                foreach ($recent_product as $single) {
                                    $data = $this->md->my_select('tbl_product', '*', array('product_id' => $single->product_id))[0];
                                    $allimages = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                    $allpath = explode(",", $allimages->path);
                                    $path = $allpath[0];
                                    ?>
                                    <div class="col" style="margin: 5px">
                                        <div class="product-card">
                                            <div class="product-media" align="center">

                                                <div class="product-label">
                                                </div>
                                                <!--Wishlist Button-->
                                                
                                                <!--End Wishlist Button-->


                                                <a href="<?php echo base_url() ?>product-details/<?php echo base64_encode(base64_encode($data->product_id)) ?>" class="product-img">
                                                    <img src="<?php echo base_url() . $path; ?>" style="width:180px;height:180px;object-fit: contain;" alt="<?php echo $data->name; ?>">
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

                                                    for ($i = 1; $i <= $fill_star; $i++) {
                                                        ?>
                                                        <i class="fa-solid fa-star" style="color:yellow"></i>
                                                        <?php
                                                    }
                                                    for ($i = 1; $i <= $blank_star; $i++) {
                                                        ?>
                                                        <i class="fa-regular fa-star"></i>
                                                        <?php
                                                    }
                                                    ?>
                                                    <a href="product-video.html">( <?php echo $total_person; ?> reviews )</a>
                                                </div>
                                                <h6 class="product-name"><a href="<?php echo base_url() ?>product-details/<?php echo base64_encode(base64_encode($data->product_id)) ?>"><?php echo substr($data->name, 0, 20); ?>...</a></h6>
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
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </section>
        <?php
        $this->load->view('footer');
        ?>
        <?php
        $this->load->view('footerjs');
        ?>

        <script type="text/javascript">

            $(document).ready(function () {

                /* 1. Visualizing things on Hover - See next part for action on click */
                $('#stars li').on('mouseover', function () {
                    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                    // Now highlight all the stars that's not after the current hovered star
                    $(this).parent().children('li.star').each(function (e) {
                        if (e < onStar) {
                            $(this).addClass('hover');
                        } else {
                            $(this).removeClass('hover');
                        }
                    });

                }).on('mouseout', function () {
                    $(this).parent().children('li.star').each(function (e) {
                        $(this).removeClass('hover');
                    });
                });


                /* 2. Action to perform on click */
                $('#stars li').on('click', function () {
                    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                    var stars = $(this).parent().children('li.star');

                    for (i = 0; i < stars.length; i++) {
                        $(stars[i]).removeClass('selected');
                    }

                    for (i = 0; i < onStar; i++) {
                        $(stars[i]).addClass('selected');
                    }

                    // JUST RESPONSE (Not needed)
                    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                    $("#rate-value").attr('value', ratingValue);

                });

            });

        </script>

    </body>

</html> 