<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Member Order - greeny</title>


        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/contact.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/profile.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home-standard.css" />
    </head>

    <body>

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
                <h2>Member Order</h2> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Member</li>
                </ol>
            </div>
        </section>
        <section class="inner-section profile-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        <?php
                        $this->load->view('membermenu');
                        ?>

                    </div>

                    <div class="col-lg-9">

                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>User Order</h4>
                                </div>

                                <div class="all-product-grid">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="pdpt-bg mt-0">
                                                    <div class="pdpt-title">
                                                        <h4 style="text-align: center; font-size: 30px; ">Invoice</h4>
                                                    </div>
                                                    <section class="our-invoice bgc-gmart-gray pb200">
                                                       

                                                        <div class="col-xl-12 col-lg-10 col-md-12" id="idata">
                                                            <?php
                                                            $shipment = $this->md->my_select('tbl_shipment', '*', array('shipment_id' => $bill->shipment_id))[0];
                                                            ?>
                                                            <div class="container" class="col-md-12">
                                                                <br/><br/><br/>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="invoice_table" >
                                                                            <div class="row mb20">
                                                                                <div class="col-lg-9">
                                                                                    <div class=""><span class="">Sold By : greeny Private Ltd <span class="text-thm">.</span></span></div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div class="">
                                                                                        <h6 class="">Invoice #<?php echo $bill->order_id; ?></h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row ">
                                                                                <div class="col-5">
                                                                                    <div class="invoice_date mb2">
                                                                                        <div class="title">Order Id:
                                                                                            <span class="sub_title  mb0"><?php echo $bill->order_id; ?></span>
                                                                                        </div>
                                                                                        <div class="title">Order date:
                                                                                            <span class="sub_title mb0"><?php echo date('d-m-Y', strtotime($bill->bill_date)) ?></span>
                                                                                        </div>
                                                                                        <?php
                                                                                        if ($bill->pay_type == "cod") {
                                                                                            ?>
                                                                                            <div class="title">Payment Mode:
                                                                                                <span class="sub_title mb0">Cash On Delivery</span>
                                                                                            </div>
                                                                                            <?php
                                                                                        } else {
                                                                                            ?>
                                                                                            <div class="title">Payment Mode:
                                                                                                <span class="sub_title mb0">Online payment</span>
                                                                                            </div>
                                                                                            <div class="title">Payment Id:
                                                                                                <span class="sub_title mb0"><?php echo $bill->payment_id ?></span>
                                                                                            </div>
                                                                                            <?php
                                                                                        }
                                                                                        ?>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4" style="margin-left:150px ">
                                                                                    <div class="invoice_date mb20">
                                                                                        <div class="title">Bill To:
                                                                                            <h6 class="sub_title  mb0">Name: <?php echo $shipment->name ?></h6>
                                                                                            <br>
                                                                                            <h6 class="sub_title  mb0">Address: <?php echo substr($shipment->address, 0, 70) ?>...</h6><br>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <hr>
                                                                            <div class="row mt50">
                                                                                <div class="col-lg-12">
                                                                                    <div class="table-responsive invoice_table_list">
                                                                                        <table class="table">
                                                                                            <thead class="thead-light">
                                                                                                <tr class="tblh_row">
                                                                                                    <th class="tbleh_title" scope="col">NO</th>
                                                                                                    <th class="tbleh_title" scope="col">Description</th>
                                                                                                    <th class="tbleh_title" scope="col">Gross Price</th>
                                                                                                    <th class="tbleh_title" scope="col">Qty</th>
                                                                                                    <th class="tbleh_title" scope="col">Total</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                $wh['bill_id'] = $bill->bill_id;
                                                                                                $trans = $this->md->my_select('tbl_transaction', '*', $wh);

                                                                                                $i = 0;
                                                                                                $total = 0;
                                                                                                foreach ($trans as $trans_data) {
                                                                                                    $i++;

                                                                                                    $product = $this->md->my_select('tbl_product', '*', array('product_id' => $trans_data->product_id))[0];

                                                                                                    $total += $trans_data->total_price;
                                                                                                    ?>
                                                                                                    <tr class="bb1">
                                                                                                        <th class="tbl_title" scope="row"><?php echo $i; ?></th>
                                                                                                        <td class="tbl_title"><?php echo $product->name; ?></td>
                                                                                                        <td class="tbl_title">Rs. <?php echo $trans_data->gross_id; ?> /-</td>
                                                                                                        <td class="tblpr_title"><?php echo $trans_data->qty; ?></td>
                                                                                                        <td class="tblpr_title">Rs. <?php echo $trans_data->total_price; ?> /-</td>
                                                                                                    </tr>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row mt20">
                                                                                <div class="col-10" style="text-align: right">
                                                                                    <div class="invoice_date mb20">

                                                                                        <div class="title">Sub Total:</div>
                                                                                        <div class="title">+ Shipping Charge:</div>
                                                                                        <?php
                                                                                        $promocode = 0;
                                                                                        if ($bill->promocode_id > 0) {
                                                                                            $code = $this->md->my_select('tbl_promocode', '*', array('promocode_id' => $bill->promocode_id))[0];
                                                                                            $promocode = $code->amount;
                                                                                            ?>
                                                                                            <div class="title">- PromoCode( <?php echo $code->code ?> ) :</div>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2">
                                                                                    <div class="invoice_date mb20">

                                                                                        <div class="title">Rs. <?php echo $total; ?> /-</div>
                                                                                        <div class="title">Rs.100/-</div>
                                                                                        <?php
                                                                                        if ($bill->promocode_id > 0) {
                                                                                            ?>
                                                                                            <div class="title">Rs. <?php echo $code->amount; ?> /-</div>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                        
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <hr>
                                                                            <div class="row mt20">

                                                                                <div class="col-10" style="text-align: right">
                                                                                    <div class="invoice_date mb20">
                                                                                        <div class="title">Grand Total:</div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2">
                                                                                    <div class="invoice_date mb20">
                                                                                        <div class="title">Rs. <?php echo ($total + 100)-$promocode; ?> /-</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div><br/><br/>
                                                                        <div class="invoice_footer">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-lg-8">
                                                                                    <div class="invoice_footer_content text-center">
                                                                                        <ul>
                                                                                            <li class="list-inline-item"><a href="<?php echo base_url(); ?>">www.greenyagro2023.com</a></li></br>
                                                                                            <li class="list-inline-item"><a style="background:#000; color:#fff; border:1px solid #000; font-family:'Roboto',Arial, Helvetica, sans-serif; font-size:14px; font-weight:600; line-height:1.5; text-align:center; margin-right: 90px; text-decoration:none; padding:8px 22px; display:inline-block; letter-spacing:0.5px; border-radius:4px; text-transform:uppercase;cursor: pointer" onclick="printDiv()">print</a></li>

                                                                                        </ul>
                                                                                        <br/><br/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>
        <div class="modal fade" id="contact-add">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title"><h3>add new contact</h3></div>
                        <div class="form-group">
                            <label class="form-label">title</label>
                            <select class="form-select">
                                <option selected>choose title</option>
                                <option value="primary">primary</option>
                                <option value="secondary">secondary</option>
                            </select>
                        </div>
                        <div class="form-group"><label class="form-label">number</label><input class="form-control" type="text" placeholder="Enter your number" /></div>
                        <button class="form-btn" type="submit">save contact info</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="address-add">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title"><h3>add new address</h3></div>
                        <div class="form-group">
                            <label class="form-label">title</label>
                            <select class="form-select">
                                <option selected>choose title</option>
                                <option value="home">home</option>
                                <option value="office">office</option>
                                <option value="Bussiness">Bussiness</option>
                                <option value="academy">academy</option>
                                <option value="others">others</option>
                            </select>
                        </div>
                        <div class="form-group"><label class="form-label">address</label><textarea class="form-control" placeholder="Enter your address"></textarea></div>
                        <button class="form-btn" type="submit">save address info</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="payment-add">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title"><h3>add new payment</h3></div>
                        <div class="form-group"><label class="form-label">card number</label><input class="form-control" type="text" placeholder="Enter your card number" /></div>
                        <button class="form-btn" type="submit">save card info</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="profile-edit">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title"><h3>edit profile info</h3></div>
                        <div class="form-group"><label class="form-label">profile image</label><input class="form-control" type="file" /></div>
                        <div class="form-group"><label class="form-label">name</label><input class="form-control" type="text" value="Miron Mahmud" /></div>
                        <div class="form-group"><label class="form-label">email</label><input class="form-control" type="text" value="mironcoder@gmail.com" /></div>
                        <button class="form-btn" type="submit">save profile info</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="contact-edit">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title"><h3>edit contact info</h3></div>
                        <div class="form-group">
                            <label class="form-label">title</label>
                            <select class="form-select">
                                <option value="primary" selected>primary</option>
                                <option value="secondary">secondary</option>
                            </select>
                        </div>
                        <div class="form-group"><label class="form-label">number</label><input class="form-control" type="text" value="+8801838288389" /></div>
                        <button class="form-btn" type="submit">save contact info</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="address-edit">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title"><h3>edit address info</h3></div>
                        <div class="form-group">
                            <label class="form-label">title</label>
                            <select class="form-select">
                                <option value="home" selected>home</option>
                                <option value="office">office</option>
                                <option value="Bussiness">Bussiness</option>
                                <option value="academy">academy</option>
                                <option value="others">others</option>
                            </select>
                        </div>
                        <div class="form-group"><label class="form-label">address</label><textarea class="form-control" placeholder="jalkuri, fatullah, narayanganj-1420. word no-09, road no-17/A"></textarea></div>
                        <button class="form-btn" type="submit">save address info</button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }
        </script>
        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerjs');
        ?>
        
    <script>
        function printDiv() {
            var printContents = document.getElementById('idata').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    </body>

</html> 