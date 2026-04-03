<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="template" content="greeny">
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template">
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
        <title>greeny - Transforming the Future of Farmers</title>
        <?php
        $this->load->view('headerlink');
        ?>
    </head>

    <body>

        <?php
        $this->load->view('header');
        ?>
        <?php
        $this->load->view('menu');
        ?>
        <?php
        $this->load->view('mobileslider');
        ?>
        <?php
        $this->load->view('mobilemenu');
        ?>



        <section class="home-classic-slider slider-arrow">
            <?php
//                                $c=0;
            $banner = $this->md->my_select('tbl_banner', '*',
                    array('status' => 1));
            foreach ($banner as $single) {
//                                    $c++;
                ?>
                <div class="banner-part" style="background: url(<?php echo base_url().$single->path; ?>) no-repeat center;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-lg-6">
                                <div class="banner-content">
                                    <h1><?php echo $single->title; ?></h1>
                                    <h3 style="color: white";><?php echo $single->subtitle; ?></h3>
                                    <br/>
                                    <div class="banner-btn"><a class="btn btn-inline" href="<?php echo base_url('product-list'); ?>"><i class="fas fa-shopping-basket"></i><span>shop now</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </section>
        <section class="section suggest-part">
            <div class="container">
                <ul class="suggest-slider slider-arrow">
                    <?php
                    $i = 0;
                    $sub = $this->md->my_select('tbl_category', '*',
                            array('label' => 'sub category'));
                    foreach ($sub as $data) {
                        $i++;
                        ?>
                        <li>
                            <a class="suggest-card" href="<?php echo base_url() ?>product-list/sub-collection/<?php echo base64_encode(base64_encode($data->category_id)); ?>">
                                <img src="<?php echo base_url(); ?>assets/images/suggest/0<?php echo $i; ?>.jpg" alt="suggest">
                                <h5><?php echo $data->name; ?></h5>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </section>



        <section class="section newitem-part">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-heading">
                            <h2>Most Selling Product</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="new-slider slider-arrow">
                            <?php
                            $allproducts = $this->md->my_query("SELECT * FROM tbl_product WHERE product_id IN ( SELECT product_id FROM `tbl_transaction` GROUP BY `product_id` ORDER BY COUNT(*) DESC );");
                            foreach ($allproducts as $data) {
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

        <div class="section promo-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="promo-img"><a href="#"><img src="<?php echo base_url(); ?>assets/images/promo/home/03.jpg" alt="promo"></a></div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section newitem-part">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-heading">
                            <h2>Added New Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="new-slider slider-arrow">
                            <?php
                            $latest = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status`= 1 ORDER BY `product_id` DESC LIMIT 0,10");
                            foreach ($latest as $data) {
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


        <div class="section promo-part">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                        <div class="promo-img"><a href="#"><img src="<?php echo base_url(); ?>assets/images/promo/home/01.jpg" alt="promo"></a></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                        <div class="promo-img"><a href="#"><img src="<?php echo base_url(); ?>assets/images/promo/home/02.jpg" alt="promo"></a></div>
                    </div>
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