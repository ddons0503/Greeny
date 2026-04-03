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
                        <li class="breadcrumb-item"><span>Coupon</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Coupons</h6>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="element-wrapper">
                                                    <div class="element-box">
                                                        <h5 class="form-header">Add New Coupon</h5>
                                                        <form action="" method="post" >
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="card-body">
                                                                        <div class="">
                                                                            <div class="form-group">
                                                                                <label>Code</label>
                                                                                <input type="text" name="code" style="padding-top: 22px;padding-bottom: 22px"  class="form-control <?php
                                                                                if (form_error('code')) {
                                                                                    echo 'invalid';
                                                                                }
                                                                                ?>" placeholder="Enter Code" value="<?php
                                                                                       if (!isset($success) && set_value('code')) {
                                                                                           echo set_value('code');
                                                                                       }
                                                                                       ?>" >
                                                                                <p class="errmsg">
                                                                                    <?php
                                                                                    echo form_error('code');
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit" name="add" value="yes" class="btn btn-primary" style="margin-right:10px";>Add</button>
                                                                        <button type="clear" class="btn m-b-5 mt-1 mb-0">Clear</button>
                                                                        <div>
                                                                            <?php
                                                                            if (isset($error)) {
                                                                                ?>
                                                                                </br>
                                                                                <div class="alert alert-danger   alert-dismissible fade show" role="alert">
                                                                                    <strong>Oops!</strong> <?php echo $error; ?>
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                            if (isset($success)) {
                                                                                ?>
                                                                                </br>
                                                                                <div class="alert alert-success   alert-dismissible fade show" role="alert">
                                                                                    <strong>Ok!</strong> <?php echo $success; ?>
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="card-body">
                                                                        <div class="">
                                                                            <div class="form-group">
                                                                                <label>Amount</label>
                                                                                <input type="text" name="amount" style="padding-top: 22px;padding-bottom: 22px;" class="form-control <?php
                                                                                if (form_error('amount')) {
                                                                                    echo 'invalid';
                                                                                }
                                                                                ?>" placeholder="Enter Amount" value="<?php
                                                                                       if (!isset($success) && set_value('amount')) {
                                                                                           echo set_value('amount');
                                                                                       }
                                                                                       ?>" >
                                                                                <p class="errmsg">
                                                                                    <?php
                                                                                    echo form_error('amount');
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="card-body">

                                                                        <div class="">
                                                                            <div class="form-group">
                                                                                <label>Minimum Bill Price</label>
                                                                                <input type="text" name="min_price" style="padding-top: 22px;padding-bottom: 22px;" class="form-control <?php
                                                                                if (form_error('min_price')) {
                                                                                    echo 'invalid';
                                                                                }
                                                                                ?>" placeholder="Enter Minimum Bill Price" value="<?php
                                                                                       if (!isset($success) && set_value('min_price')) {
                                                                                           echo set_value('min_price');
                                                                                       }
                                                                                       ?>" >
                                                                                <p class="errmsg">
                                                                                    <?php
                                                                                    echo form_error('min_price');
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="element-wrapper">
                                                    <div class="element-box">
                                                        <div class="row">
                                                            <div class="card-header col-8">
                                                                <h4>View All Coupons</h4>
                                                            </div>
                                                            <div class="col-4" style="text-align:right;">
                                                                <button class="btn btn-danger" onclick="delete_record('coupon', '<?php echo base64_encode(base64_encode(0)); ?>')" data-toggle="modal" data-target="#staticBackdrop" style="margin-top: 15px">Delete All Records</button>
                                                            </div>
                                                        </div>
                                                        </br>
                                                        <div class="table-responsive">
                                                            <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                                <thead>
                                                                    <tr align="center" >
                                                                        <th>No.</th>
                                                                        <th>Code</th>
                                                                        <th>Amount</th>
                                                                        <th>Min Bill Price</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <?php
                                                                    $i = 0;
                                                                    foreach ($code as $data) {
                                                                        $i++;
                                                                        ?>
                                                                        <tr align="center">
                                                                            <td style="vertical-align: middle"><?php echo $i ?></td>
                                                                            <td style="vertical-align: middle"><?php echo $data->code; ?></td>

                                                                            <td style="vertical-align: middle"><?php echo $data->amount; ?></td>
                                                                            <td style="vertical-align: middle"><?php echo $data->min_bill_price; ?></td>
                                                                            <td style="vertical-align: middle" class="center hidden-xs">
                                                                                <a onclick="change_status('promocode', <?php echo $data->promocode_id; ?>)" id="status_<?php echo $data->promocode_id; ?>" data-toggle="tooltip" data-placement="bottom" title="Active" >
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
                                                                            <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-warning " style="color:red"></i> Confirmation</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure want to delete ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-defult" data-dismiss="modal">No cancel it ?</button>
                                                                            <a id="delete_link" class="btn btn-danger">Yes delete it !</a>
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