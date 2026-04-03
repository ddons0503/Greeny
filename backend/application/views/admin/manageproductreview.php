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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin-home'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><span>Product</span></li>
                        <li class="breadcrumb-item"><span>Product Review</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Product Review</h6>
                                        <div class="row">
                                            <div class="col-lg-12">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="element-wrapper">
                                                    <div class="element-box">
                                                        <h5 class="form-header">View All Product Reviews</h5>

                                                        <div class="table-responsive">
                                                            <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                                <thead>
                                                                    <tr align="center" >
                                                                        <th>No.</th>
                                                                        <th>Member Profile</th>
                                                                        <th>Product</th>
                                                                        <th>Rate</th>
                                                                        <th>Review</th>
                                                                        <th>Status</th>
                                                                       
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <?php
                                                                    $i = 0;
                                                                    foreach ($review as $data) {
                                                                        $i++;
                                                                        $product = $this->md->my_select('tbl_product', '*', array('product_id' => $data->product_id))[0];
                                                                        $image = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                                                        $allimages = explode(",", $image->path);
                                                                        $single = $allimages[0];
                                                                        $user = $this->md->my_select('tbl_register', '*', array('register_id' => $data->register_id))[0];
                                                                        ?>
                                                                        <tr align="center" >                     
                                                                            <td><?php echo $i ?></td>
                                                                            <td>
                                                                                <?php
                                                                                if (strlen($user->profile_pic) > 0) {
                                                                                    ?>
                                                                                    <div class="avatar-w" data-toggle="tooltip" data-placement="bottom" >
                                                                                        <a href="<?php echo base_url() . $user->profile_pic; ?>" target="_blank" >
                                                                                            <img src="<?php echo base_url() . $user->profile_pic; ?>" style="width: 100px" title="<?php echo $user->name; ?>">
                                                                                        </a>
                                                                                    </div>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <div class="avatar-w" data-toggle="tooltip" data-placement="bottom" >
                                                                                        <a href="<?php echo base_url(); ?>/admin_assets/img/blank.pngimg/blank.png" target="_blank" >
                                                                                            <img src="<?php echo base_url(); ?>/admin_assets/img/blank.png" style="width: 100px" title="<?php echo $user->name; ?>">
                                                                                        </a>
                                                                                    </div>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <a href="<?php echo base_url(); ?>product-details/<?php echo base64_encode(base64_encode($data->product_id)); ?>" target="_blank" >
                                                                                    <img src="<?php echo base_url() . $single; ?>" style="width: 100px" data-toggle="tooltip" data-placement="bottom" title="<?php echo $product->name; ?>"> 
                                                                                </a>
                                                                            </td>
                                                                            <td><?php echo $data->message; ?></td>
                                                                            <td>
                                                                                <?php
                                                                                $fill_star = $data->rating;
                                                                                $blank_star = 5 - $fill_star;
                                                                                ?>

                                                                                <?php
                                                                                for ($j = 1; $j <= $fill_star; $j++) {
                                                                                    ?>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <?php
                                                                                }
                                                                                for ($j = 1; $j <= $blank_star; $j++) {
                                                                                    ?>
                                                                                    <i class="fa-regular fa-star"></i>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </td>   

                                                                            <td> 
                                                                                <a onclick="change_status('review', <?php echo $data->review_id; ?>)" id="status_<?php echo $data->review_id; ?>" data-toggle="tooltip" data-placement="bottom" title="Active" >
                                                                                    <?php
                                                                                    if ($data->status == 1) {
                                                                                        ?>
                                                                                        <i class="fa fa-toggle-on" style="color: green;cursor: pointer;" data-toggle="tooltip" data-placement="bottom" title="Active"   ></i>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                        <i class="fa fa-toggle-off" style="color: green;cursor: pointer;"    ></i>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </a>
                                                                            </td>                                                                            
                                                                            
                                                                        </tr>
                                                                    <?php }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-warning " style="color:red"></i>Confirmation</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure want to delete ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-defult" data-dismiss="modal">No cancel it ?</button>
                                                                            <a id="delete_link" class="btn btn-danger">Yes, Delete It!</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                      
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