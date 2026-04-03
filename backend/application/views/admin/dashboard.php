<!DOCTYPE html>
<html>


    <?php
    $this->load->view('admin/headerlink');
    ?>

    <body class="menu-position-side menu-side-left full-screen with-content-panel">
        <div class="all-wrapper with-side-panel solid-bg-all">
            <div class="layout-w">

                <?php
                $this->load->view('admin/sliderpanel');
                ?>   

                <div class="content-w">
                    <?php
                    $this->load->view('admin/header');
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin-home'); ?>">Home</a></li>
                        <!--                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>-->
                        <li class="breadcrumb-item"><span>Dashboard</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <div class="element-actions">

                                        </div>
                                        <h2 class="element-header">Pages</h2>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-contact-us'); ?>">
                                                        <div class="label"><h3>Contact Us</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-address-book fa-2x" ></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $contactus ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-feedback'); ?>">
                                                        <div class="label"><h3>Feedback</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-comment fa-2x" ></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $feedback ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-email-subscriber'); ?>">
                                                        <div class="label"><h3>Email Subcribers</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-envelope fa-2x" ></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $emailsubcriber; ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                              <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-banner'); ?>">
                                                        <div class="label"><h3>Banner</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-tv fa-2x"></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $banner ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-member'); ?>">
                                                        <div class="label"><h3>Member</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-user fa-2x"></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $member ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        </br>
                                        <h2 class="element-header">Location</h2>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-country'); ?>">
                                                        <div class="label"><h3>Country</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-globe fa-2x" ></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $country ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-state'); ?>">
                                                        <div class="label"><h3>State</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-mountain fa-2x" ></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $state ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-city'); ?>">
                                                        <div class="label"><h3>City</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-city fa-2x" ></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $city ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        </br>
                                        <h2 class="element-header">Category</h2>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-main-category'); ?>">
                                                        <div class="label"><h3>Main Category</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-chart-simple fa-2x" ></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $main ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-sub-category'); ?>">
                                                        <div class="label"><h3>Sub Category</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-chart-simple fa-2x"></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $sub ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-peta-category'); ?>">
                                                        <div class="label"><h3>Peta Category</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-chart-simple fa-2x" ></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $peta ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        </br>
                                        <h2 class="element-header">Product</h2>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-add-new-product'); ?>">
                                                        <div class="label"><h3>Add New Product</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-seedling fa-2x" ></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $allproduct ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-view-all-products'); ?>">
                                                        <div class="label"><h3>View All Product</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fas fa-search fa-2x"></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $contactus ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-product-review'); ?>">
                                                        <div class="label"><h3>Product Review</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="far fa-file-alt fa-2x"></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $allreviews ?></h1></div></span></div>
                                                    </a>
                                                </div>
<!--                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-offer'); ?>">
                                                        <div class="label"><h3>Offer</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-address-book fa-2x" ></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $offer ?></h1></div></span></div>
                                                    </a>
                                                </div>-->
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-coupon'); ?>">
                                                        <div class="label"><h3>Coupon</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="far fa-sticky-note fa-2x"></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $coupon ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        </br>
                                        <h2 class="element-header">Order</h2>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-pending-order'); ?>">
                                                        <div class="label"><h3>Pending Order</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-clock-rotate-left fa-2x"></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $pending ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-confirm-order'); ?>">
                                                        <div class="label"><h3>Confirm Order</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-circle-check fa-2x"></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $confirm ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="<?php echo base_url('manage-cancel-order'); ?>">
                                                        <div class="label"><h3>Cancel Order</h3></div>
                                                        <div class="value" style="margin-right: 50px"><i class="fa-solid fa-ban fa-2x"></i></div>
                                                        <div class="trending trending-down-basic"><span>
                                                                <div class="label"><h1><?php echo $cancel ?></h1></div></span></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        </br>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="floated-colors-btn second-floated-btn">
                        <div class="os-toggler-w">
                            <div class="os-toggler-i"><div class="os-toggler-pill"></div></div>
                        </div>
                        <span>Dark </span><span>Colors</span>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
</div>
<?php
$this->load->view('admin/footerjs');
?>  
</body>
</html>