<?php
if ($this->uri->segment(2) == "") {
    $title = "All Products";
} else {
    if ($this->uri->segment(2) != "search") {
        $twh['category_id'] = base64_decode(base64_decode($this->uri->segment(3)));
        $title = $this->md->my_select('tbl_category', '*', $twh)[0]->name;
    } else {
        $title = str_replace("-", " ", $this->uri->segment(3));
    }
}
?>﻿
<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title><?php echo $title; ?>- greeny</title>


        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/contact.css">
    </head>

    <body onload="product_data('<?php echo $this->uri->segment(2); ?>', '<?php echo $this->uri->segment(3); ?>', 12)">

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
                <h2>Product List</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product List</li>
                </ol>
            </div>
        </section>
        <section class="inner-section shop-part">
            <div class="container">
                <div class="row content-reverse">
                    <div class="col-md-3">
                        <form id="filter-data">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="product-left-title" style="margin-top:40px;">
                                            <h2>Filter By</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">

                                        <!--Category Wise-->
                                        <?php
                                            $collection = $this->uri->segment(2);
                                            $id = base64_decode(base64_decode($this->uri->segment(3)));
                                            
                                            if( $collection == "main-collection" || $collection == "sub-collection" ){
                                        ?>
                                        <div style="background: #fff;margin-top: 45px;padding: 15px;">
                                            <h4 style="color:#454B1B">By Category</h4>
                                            <div style="height:300px;overflow-y: scroll;">
                                                <ul>
                                                    <?php

                                                        if( $collection == "" ){
                                                            $category = $this->md->my_select('tbl_category','*',array('label'=>'main category'));
                                                            $type = "main-collection";
                                                        }
                                                        else if( $collection == "main-collection" ){
                                                            $category = $this->md->my_select('tbl_category','*',array('parent_id'=>$id));
                                                            $type = "sub-collection";
                                                        }
                                                        else if( $collection == "sub-collection" ){
                                                            $category = $this->md->my_select('tbl_category','*',array('parent_id'=>$id));
                                                            $type = "peta-collection";
                                                        }

                                                        if( isset($category) && count($category) > 0 ){
                                                            foreach($category as $data){
                                                        ?>
                                                        <li style="margin: 10px;">
                                                            <a href="<?php echo base_url(); ?>product-list/<?php echo $type; ?>/<?php echo base64_encode(base64_encode($data->category_id)); ?>" style="color:black;margin-left: 15px"><?php echo $data->name; ?></a>
                                                        </li>
                                                        <?php
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>

                                        <!--Qty Wise-->
                                        <div style="background: #fff;margin-top: 45px;padding: 15px;">
                                            <h4 style="color:#454B1B">By Quantity</h4>
                                            <div style="height:300px;overflow-y: scroll;">
                                                <ul>
                                                    <?php
                                                        $qty = $this->md->my_query("SELECT DISTINCT(`unit`) FROM `tbl_product_image`");

                                                        foreach($qty as $single){
                                                    ?>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="qty[]" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" value="<?php echo $single->unit; ?>" />
                                                            <a style="color:black;margin-left: 10px"><?php echo $single->unit; ?></a>
                                                        </label>
                                                    </li>
                                                    <?php
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <!--Price Wise-->
                                        <div style="background: #fff;margin-top: 45px;padding: 15px;">
                                            <h4 style="color:#454B1B">By Price</h4>
                                            <div style="height:300px;overflow-y: scroll;">
                                                <ul>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="0" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">Less Then 100</a>
                                                        </label>
                                                    </li>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="1000" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">100 - 200</a>
                                                        </label>
                                                    </li>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="2000" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">200 - 300</a>
                                                        </label>
                                                    </li>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="3000" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">300 - 400</a>
                                                        </label>
                                                    </li>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="4000" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">400 - 500</a>
                                                        </label>
                                                    </li>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="5000" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">500 - 600</a>
                                                        </label>
                                                    </li>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="6000" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">600 - 700</a>
                                                        </label>
                                                    </li>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="7000" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">700 - 800</a>
                                                        </label>
                                                    </li>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="8000" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">200 - 300</a>
                                                        </label>
                                                    </li>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="8000" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">800 - 900</a>
                                                        </label>
                                                    </li>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="9000" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">900 - 1000</a>
                                                        </label>
                                                    </li>
                                                    <li style="margin: 10px;">
                                                        <label>
                                                            <input type="checkbox" name="price[]" value="10000" onchange="product_data('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12)" />
                                                            <a style="color:black;margin-left: 10px">More Then 1000</a>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-9" id="product-data"></div>
                </div>
            </div>
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