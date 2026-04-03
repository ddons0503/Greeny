<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <center>
                    <div class="user-dt">
                        <div class="user-img">

                            <?php
                            if ($this->session->userdata('member')) {
                                $details = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('member')))[0];

                                if (strlen($details->profile_pic) > 0) {
                                    ?>
                                    <img src="<?php echo base_url() . $details->profile_pic ?>" class="rounded-circle" style=" width:220px; height: 200px;"  />

                                    <?php
                                } else {
                                    ?>
                                    <img src="<?php echo base_url(); ?>assets/images/user.png" class="rounded-circle" style=" width:220px; height: 200px;" />
                                    <?php
                                }
                            }
                            ?>


                        </div>
                        <h4><?php echo $details->name; ?></h4>
                        
                    </div>
                    <br/>
                </center>
            </div>
        </div>
    </div>