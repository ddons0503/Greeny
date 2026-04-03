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
                        <li class="breadcrumb-item"><span>Order</span></li>
                        <li class="breadcrumb-item"><span>Pending Order</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">View All Pending Order</h6>
                                        <div class="element-box">

                                            <div class="table-responsive">
                                                <table id="order_data" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr align="center" >
                                                            <th>No.</th>
                                                            <th>Order Details</th>
                                                            <th>Product Details</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($bill as $bill_data) {
                                                            $i++;
                                                            $shipment = $this->md->my_select('tbl_shipment', '*', array('shipment_id' => $bill_data->shipment_id))[0];
                                                            ?>
                                                            <tr align="center">
                                                                <td><?php echo $i ?></td>
                                                                <td align="left" >
                                                                    <b>Name: </b><?php echo $shipment->name ?><br/>
                                                                    <b>Address: </b><?php echo $shipment->address ?><br/>
                                                                    <b>Date: </b><?php echo date('d-m-Y', strtotime($bill_data->bill_date)) ?><br/>
                                                                    <b>Order ID: </b><?php echo $bill_data->order_id ?><br/>
                                                                    <?php
                                                                    if ($bill_data->pay_type == "cod") {
                                                                        ?>
                                                                        <b>Payment Mode: </b>Cash On Delivery<br/>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <b>Payment Mode: </b>Online Payment<br/>
                                                                        <b>Payment Id : </b><?php echo $bill_data->payment_id ?><br/>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <b>Shipping Charge: </b>Rs.100/-<br/>
                                                                    <?php
                                                                    if ($bill_data->promocode_id > 0) {
                                                                        $code = $this->md->my_select('tbl_promocode', '*', array('promocode_id' => $bill_data->promocode_id))[0];
                                                                        ?>
                                                                        <b>Promocode  (<?php echo $code->code ?>) : </b><?php echo $code->amount ?><br/>
                                                                    <?php }
                                                                    ?>

                                                                    <b>Total: </b>Rs. <?php echo $bill_data->amount; ?> /-<br/>
                                                                </td>
                                                                <td align="left">
                                                                    <?php
                                                                    $whh['bill_id'] = $bill_data->bill_id;
                                                                    $trans = $this->md->my_select('tbl_transaction', '*', $whh);
                                                                    foreach ($trans as $trans_data) {
                                                                        $product = $this->md->my_select('tbl_product', '*', array('product_id' => $trans_data->product_id))[0];
                                                                        $image = $this->md->my_select('tbl_product_image', '*', array('image_id' => $trans_data->image_id))[0];
                                                                        $allimages = explode(",", $image->path);
                                                                        $single = $allimages[0];
                                                                        ?>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <a href="<?php echo base_url() ?>product-detail/<?php echo base64_encode(base64_encode($trans_data->product_id)); ?>">
                                                                                    <img src="<?php echo base_url() . $single; ?>" style="height: 220px; width:200px ;margin-right: 20px " data-toggle="tooltip"  data-placement="bottom" title="<?php echo $product->name; ?>"/>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <a class="cart_title" href="<?php echo base_url() ?>product-detail/<?php echo base64_encode(base64_encode($trans_data->product_id)); ?>">
                                                                                    <b><?php echo $product->name; ?></b><br/>
                                                                                    <b>Gross Price: </b>Rs. <?php echo $trans_data->gross_id; ?> /-<br/>
                                                                                    <b>Qty: </b><?php echo $trans_data->qty ?> <br/>
                                                                                    <b>Total: </b>Rs. <?php echo $trans_data->total_price; ?> /-<br/>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" onclick="change_order_status(<?php echo $bill_data->bill_id?>,1)"  class="btn btn-success" >Accept</button><br/><br/>
                                                                    <button type="button" onclick="change_order_status(<?php echo $bill_data->bill_id?>,2)" class="btn btn-danger" >Cancel</button>
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