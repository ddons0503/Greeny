<div class="top-bar color-scheme-transparent">
    <div class="top-menu-controls">
        

        <div class="logged-user-w">
            <div class="logged-user-i">
                <div class="avatar-w">
                    <?php
                    $details = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];

                    if (strlen($details->profile_pic) > 0) {
                        ?>
                        <img src="<?php echo base_url() . $details->profile_pic; ?>" />
                        <?php
                    } else {
                        ?>
                        <img  src="<?php echo base_url(); ?>admin_assets/img/blank useer.png"/>
                        <?php
                    }
                    ?>
                </div><div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info">
                        <div class="avatar-w">
                            <?php
                            $details = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];

                            if (strlen($details->profile_pic) > 0) {
                                ?>
                                <img src="<?php echo base_url() . $details->profile_pic; ?>" />
                                <?php
                            } else {
                                ?>
                                <img  src="<?php echo base_url(); ?>admin_assets/img/blank useer.png"/>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name">Admin Panel</div>
                            
                        </div>
                    </div>
                    <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('admin-setting'); ?>"><i class="os-icon os-icon-settings"></i><span>Setting</span></a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('admin-logout'); ?>"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
