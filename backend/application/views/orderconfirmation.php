<?php
$description = APPLICATION_NAME;
$txnid = date("YmdHis");
$key_id = RAZORPAY_API_KEY;
$currency_code = 'INR';

if ($this->session->userdata('promocode_id')) {

    $amount = $this->md->my_select('tbl_promocode', '*', array('promocode_id' => $this->session->userdata('promocode_id')))[0]->amount;
    $total_rs = ($this->session->userdata('total_amount') + 100) - $amount;
} else {
    $total_rs = $this->session->userdata('total_amount') + 100;
}
$total = ($total_rs * 100);  // 100 = 1 indian rupees  // change
$amount = $total;
$merchant_order_id = "SH_" . date("Ymd") . time();

$user_info = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('member')))[0];

$card_holder_name = $user_info->name; // change
$email = $user_info->email;  // change
$name = APPLICATION_NAME;
?>

<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Order Confirmation - greeny</title>

        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/user-auth.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/error.css" />

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
                <h2>Order Confirmation</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Confirmation</li>
                </ol>
            </div>
        </section>
        <?php
        if ($this->session->userdata('pay_type') == "card") {
            ?>
            <form name="razorpay-form" id="razorpay-form" action="<?php echo $callback_url; ?>" method="POST">
                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
                <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
                <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $description; ?>"/>
                <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
                <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
                <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
                <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
                <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
            </form>
            <!--Container-->
            <div class="row" style="margin-top: 100px">
                <div class="offset-3 col-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="card border-0 rounded-0">
                        <div class="card-body text-center" style="border: 2px solid #000000">
                            <h4 class="card-title">ORDER CONFIRMATION</h4>
                            <p class="card-text mb-1">Click on this button. we will redirect you to payment page and pay and confirm</p>
                            <p class="card-text mb-1">and pay and confirm your order. Male sure while page will processing</p>
                            <p class="card-text mb-1">please do not refresh on payment page.</p>
                            <button href="home" class="btn btn-outline" id="pay-btn" onclick="razorpaySubmit(this);" value="Pay Now">Pay Now</button><br/><br/>
                            <a href="home"><u>Back To Checkout</u></a>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    <script type="text/javascript">
                                        var options = {
                                            key: "<?php echo $key_id; ?>",
                                            amount: "<?php echo $total; ?>",
                                            name: "<?php echo $name; ?>",
                                            description: "Order # <?php echo $merchant_order_id; ?>",
                                            netbanking: true,
                                            currency: "<?php echo $currency_code; ?>", // INR
                                            prefill: {
                                                name: "<?php echo $card_holder_name; ?>",
                                                email: "<?php echo $email; ?>",
                                            },
                                            notes: {
                                                soolegal_order_id: "<?php echo $merchant_order_id; ?>",
                                            },
                                            handler: function (transaction) {
                                                document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
                                                document.getElementById('razorpay-form').submit();
                                            },
                                            "modal": {
                                                "ondismiss": function () {
                                                    //location.reload();
                                                    base_url = '<?php echo base_url(); ?>';
                                                    window.location.href = base_url + 'order-fail'
                                                }
                                            }
                                        };

                                        var razorpay_pay_btn, instance;
                                        function razorpaySubmit(el) {
                                            if (typeof Razorpay == 'undefined') {
                                                setTimeout(razorpaySubmit, 300);
                                                if (!razorpay_pay_btn && el) {
                                                    razorpay_pay_btn = el;
                                                    el.disabled = true;
                                                    el.value = 'Please wait...';
                                                }
                                            } else {
                                                if (!instance) {
                                                    instance = new Razorpay(options);
                                                    if (razorpay_pay_btn) {
                                                        razorpay_pay_btn.disabled = false;
                                                        razorpay_pay_btn.value = "Pay Now";
                                                    }
                                                }
                                                instance.open();
                                            }
                                        }
                    </script>
            <?php
        } else if ($this->session->userdata('pay_type') == "cod") {
            $email = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('member')))[0]->email;
            ?>

            <!--Container-->
            <div class="row" style="margin-top: 100px">
                <form action="" method="post">
                    <div class="offset-3 col-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="card border-0 rounded-0">
                            <div class="card-body text-center" style="border: 2px solid #000000">
                                <h4 class="card-title">ORDER CONFIRMATION</h4>
                                <p class="card-text mb-1">Please enter one time password for confirm order. We send one time password on</p>
                                <p class="card-text mb-1">your register email <spam style="color: green"><?php echo $email ?></spam></p>
                                <input type="text" name="otp" placeholder="Enter OTP" style="width: 30%;border: 1px solid;padding: 10px">
                                <p style="color: red">
                                    <?php
                                    if (isset($error))
                                        echo $error;
                                    ?>
                                </p>
                                <p class="card-text mb-1"><a href="">Resend OTP?</a></p>

                                <button type="submit" name="verify_cod" value="yes" class="btn btn-outline">VERIFY</button><br/><br/>
                                <a href="<?php echo base_url('check-out'); ?>"><u>Back To Checkout</u></a>
                            </div><br/>
                        </div>
                    </div>
                </form>
            </div>
            <br/>
            <?php
        }
        ?>

    </div>


    <?php
    $this->load->view('footer');
    ?>
    <?php
    $this->load->view('footerjs');
    ?>

</body>
</html>
