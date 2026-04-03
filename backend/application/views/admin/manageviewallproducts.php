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
                        <li class="breadcrumb-item"><span>View All Product</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">View All Products</h6>
                                        <div class="element-box">

                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr align="center" >
                                                            <th>No.</th>
                                                            <th>Product</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($allproducts as $data) {
                                                            $i++;
                                                            ?>
                                                            <tr class="center hidden-xs">
                                                                <td style="vertical-align: middle;"><?php echo $i; ?></td>
                                                                <td style="vertical-align: middle;"> <?php
                                                                    $allimages = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                                                    $path = explode(",", $allimages->path);
                                                                    $single = $path[0];
                                                                    ?><a href="<?php echo base_url() . $single; ?>" target="_blank" >
                                                                        <img src="<?php echo base_url() . $single; ?>" style="width: 100px;" data-toggle="tooltip" data-placement="bottom" 
                                                                             title="<?php echo $data->name ?>"> 
                                                                    </a>
                                                                </td>
                                                                <td style="vertical-align: middle;"><?php echo $data->name; ?></td>
                                                                <td style="vertical-align: middle;">Rs. <?php echo $allimages->price; ?> /-</td>
                                                                <td style="vertical-align: middle" class="center hidden-xs">
                                                                    <a onclick="change_status('product', <?php echo $data->product_id; ?>)" id="status_<?php echo $data->product_id; ?>" data-toggle="tooltip" data-placement="bottom" title="Active">
                                                                        <?php
                                                                        if ($data->status == 1) {
                                                                            ?>
                                                                            <i class="fa fa-toggle-on" style="color: green;cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Active"  ></i>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <i class="fa fa-toggle-off" style="color: green;cursor: pointer;"></i>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </a>
                                                                </td>

                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <!-- Modal -->

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