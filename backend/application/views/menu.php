<nav class="navbar-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-content">
                    <ul class="navbar-list">
                        <li class="navbar-item dropdown"><a class="navbar-link" href="<?php echo base_url('home'); ?>">home</a>

                        </li>
                         <?php
                        $main_category = $this->md->my_select('tbl_category', '*', array('label' => 'main category'));
                        foreach ($main_category as $main) {
                            ?>
                            <li class="navbar-item dropdown-megamenu"><a class="navbar-link dropdown-arrow" href="<?php echo base_url(); ?>product-list/main-collection/<?php echo base64_encode(base64_encode($main->category_id)); ?>"><?php echo $main->name; ?></a>
                                <div class="megamenu">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $swh['parent_id'] = $main->category_id;
                                            $sub_category = $this->md->my_select('tbl_category', '*', $swh);
                                            foreach ($sub_category as $sub) {
                                                ?>
                                                <div class="col-lg-3">
                                                    <div class="megamenu-wrap">
                                                        <a href="<?php echo base_url(); ?>product-list/sub-collection/<?php echo base64_encode(base64_encode($sub->category_id)); ?>">
                                                        <h5 class="megamenu-title"><?php echo $sub->name; ?></h5>
                                                        </a>
                                                        <ul class="megamenu-list">
                                                            <?php
                                                            $pwh['parent_id'] = $sub->category_id;
                                                            $peta_category = $this->md->my_select('tbl_category', '*', $pwh);
                                                            foreach ($peta_category as $peta) {
                                                                ?>
                                                                <li><a href="<?php echo base_url(); ?>product-list/peta-collection/<?php echo base64_encode(base64_encode($peta->category_id)); ?>"><?php echo $peta->name; ?></a></li>

                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php }
                        ?>
                        <li class="navbar-item dropdown"><a class="navbar-link" href="<?php echo base_url('about-us'); ?>">About Us</a>

                        </li>
                        <li class="navbar-item dropdown"><a class="navbar-link" href="<?php echo base_url('contact-us'); ?>">Contact Us</a>

                        </li>
                        <li class="navbar-item dropdown"><a class="navbar-link" href="<?php echo base_url('feedback'); ?>">Feedback</a>

                    </ul>
                    </li>
                    </ul>
                    <div class="navbar-info-group">
                        <div class="navbar-info"><i class="icofont-ui-touch-phone"></i>
                            <p><small>call us</small><span>+91 93160 82841</span></p>
                        </div>
                        <div class="navbar-info"><i class="icofont-ui-email"></i>
                            <p><small>email us</small><span>greenyagro2025@gmail.com</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>