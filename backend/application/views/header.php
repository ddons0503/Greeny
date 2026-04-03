<div class="backdrop"></div>
<a class="backtop fas fa-arrow-up" href="#"></a>
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-5">
                <div class="header-top-welcome">
                    <p>Welcome to greeny - Transforming the Future of Farmers</p>
                </div>
            </div>

            <div class="col-md-7 col-lg-7">
                <ul class="header-top-list">
                    <?php
                    if ($this->session->userdata('member')) {
                        ?>
                        <li>
                            <a href="<?php echo base_url('member-wishlist'); ?>" ><i class="fas fa-heart"></i> My Wish List</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('member-home'); ?>" ><i class="fas fa-user"></i> My Account</a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li>
                            <a href="<?php echo base_url('sign-in'); ?>"><i class="fas fa-heart"></i> My Wish List</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('sign-in'); ?>"><i class="fas fa-user"></i> My Account</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="header-part">
    <div class="container">
        <div class="header-content">
            <!--Mobile Menu-->
            <div class="header-media-group">

                <a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" /></a>
                <button class="header-src"><i class="fas fa-search"></i></button>
            </div>
            <!--Main Menu-->
            <a href="<?php echo base_url('home'); ?>" class="header-logo">
                <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" />
            </a>
            <span class="header-form">
            </span>
            <div class="header-widget-group">

                <a class="header-widget " href="<?php echo base_url('view-cart'); ?>">
                    <i class="fas fa-cart-plus"></i><span>View Cart</span>
                </a>
            </div>
        </div>
    </div>
</header>