<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller {

    public function Security() {
        if (!$this->session->userdata('member')) {
            redirect('sign-in');
        }
    }

    public function index() {
        $this->load->view('index');
    }

    public function aboutus() {
        $this->load->view('aboutus');
    }

    public function contactus() {
        $data = [];

        if ($this->input->post('send')) {


            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('email', '', 'required|valid_email', array('required' => 'Please Enter Email.', 'valid_email' => 'Please Enter Valid Email.'));
            $this->form_validation->set_rules('phone', '', 'required|numeric', array('required' => 'Please Enter Mobile.', 'numeric' => 'Please Enter Valid Mobile Number.'));
            $this->form_validation->set_rules('subject', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Subject.', 'regex_match' => 'Please Enter Valid Subject.'));
            $this->form_validation->set_rules('message', '', 'required', array('required' => 'Please Enter Message.'));
            if ($this->form_validation->run() == TRUE) {



                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('name');
                    $ins['email'] = $this->input->post('email');
                    $ins['mobile'] = $this->input->post('phone');
                    $ins['subject'] = $this->input->post('subject');
                    $ins['message'] = $this->input->post('message');

                    $result = $this->md->my_insert('tbl_contact_us', $ins);
                    if ($result == 1) {
                        $data['success'] = 'Thank You For Contact Us.';
                    }
                }
            }
        }
        $this->load->view('contactus', $data);
    }

    public function term() {
        $this->load->view('term');
    }

    public function feedback() {
        $data = [];

        if ($this->input->post('send')) {

            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('message', '', 'required', array('required' => 'Please Enter Message.'));

            if ($this->form_validation->run() == TRUE) {



                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('name');
                    $ins['message'] = $this->input->post('message');

                    $result = $this->md->my_insert('tbl_feedback', $ins);
                    if ($result == 1) {
                        $data['success'] = 'Thank You For Feedback.';
                    }
                }
            }
        }
        $this->load->view('feedback', $data);
    }

    public function privacypolicy() {
        $this->load->view('privacypolicy');
    }

    public function pagenotfound() {
        $this->load->view('pagenotfound');
    }
    
    public function orderinvoice() {
        if ($this->uri->segment(2) == "") {

            redirect('member-order');
        }
        $wh['bill_id'] = base64_decode(base64_decode($this->uri->segment(2)));

        $data['bill'] = $this->md->my_select('tbl_bill', '*', $wh)[0];

        $this->load->view('order-invoice',$data);
    }

    public function checkout() {
        $data = [];

        if (!$this->session->userdata('member')) {
            redirect('login');
        }

        $wh['register_id'] = $this->session->userdata('member');

        $data['cart'] = $this->md->my_select('tbl_cart', '*', $wh);

        if ($this->input->post('place_order')) {
            if ($this->session->userdata('shipment_id') && $this->input->post('payment_type')) {

                $this->session->set_userdata('pay_type', $this->input->post('payment_type'));

                if ($this->input->post('payment_type') == "cod") {
//                    echo 'ek otxp mokalo';
                    $otp = rand(100000, 999999);
                    $this->session->set_userdata('otp', $otp);

                    $user = $this->md->my_select('tbl_register', '*', $wh)[0];
                    $subject = "One Time Password For Order Confirmation.";
                    $message = "Hello" . $user->name . ",<br/><br/> Your One Time Password For Cash On Delivery Order is <b>$otp</b>.<p>Please Do Not Shere OTP Anyone.";

                    $this->md->my_mailer($user->email, $subject, $message);
                }
                redirect('order-confirmation');
            }
        }
        $this->load->view('check-out', $data);
    }

    public function emptycart() {
        $this->load->view('emptycart');
    }

    public function ordersuccess() {
        $data = [];

        $wh['register_id'] = $this->session->userdata('member');
        $cart = $this->md->my_select('tbl_cart', '*', $wh);
        $item = count($cart);

        if ($item == 0) {
            redirect('view-cart');
        }

        if (!$this->session->userdata('order_status')) {
            redirect('checkout');
        }

        if ($this->session->userdata('order_status' != 1)) {
            redirect('fail');
        }

        if ($this->session->userdata('order_status') == 1) {
            $bins['register_id'] = $this->session->userdata('member');
            $bins['shipment_id'] = $this->session->userdata('shipment_id');

            if ($this->session->userdata('promocode_id')) {
                $bins['promocode_id'] = $this->session->userdata('promocode_id');
            }

            $bins['bill_date'] = date('Y-m-d');
            $bins['amount'] = ($this->session->userdata('total_amount') + 100);
            $bins['pay_type'] = $this->session->userdata('pay_type');

            if ($bins['pay_type'] == "card") {
                $bins['payment_id'] = $this->session->userdata('razorpay_payment_id');
                $bins['order_id'] = $this->session->userdata('merchant_order_id');
            } else {
                $bins['order_id'] = 'SI_' . date('Ymd') . time();
            }

            $result = $this->md->my_insert('tbl_bill', $bins);

            if ($result == 1) {
                $bill_id = $this->md->my_query("SELECT MAX(`bill_id`) AS mx FROM `tbl_bill`")[0]->mx;
                $cart = $this->md->my_select('tbl_cart', '*', array('register_id' => $this->session->userdata('member')));

                foreach ($cart as $cart_data) {
                    $tins['bill_id'] = $bill_id;
                    $tins['product_id'] = $cart_data->product_id;
                    $tins['image_id'] = $cart_data->image_id;
                    $tins['gross_id'] = $cart_data->price;
                    $tins['qty'] = $cart_data->qty;
                    $tins['total_price'] = $cart_data->total_price;

                    $this->md->my_insert('tbl_transaction', $tins);

                    $qty = $cart_data->qty;
                    $this->md->my_upquery("UPDATE `tbl_product_image` SET `qty` = `qty` - " . $qty . " WHERE `image_id` = " . $cart_data->image_id . " ");
                }

                $output = $this->md->my_delete('tbl_cart', array('register_id' => $this->session->userdata('member')));
                if ($output == 1) {

                    if ($this->session->userdata('pay_type') == "cod") {
                        $data['order_id'] = $bins['order_id'];
                    } else {
                        $data['order_id'] = $this->session->userdata('merchant_order_id');
                        $data['payment_id'] = $this->session->userdata('razorpay_payment_id');
                    }

                    $this->session->unset_userdata('total_amount');
                    $this->session->unset_userdata('shipment_id');
                    $this->session->unset_userdata('promocode_id');
                    $this->session->unset_userdata('pay_type');
                    $this->session->unset_userdata('otp');
                    $this->session->unset_userdata('order_status');
                    $this->session->unset_userdata('order_id');
                    $this->session->unset_userdata('payment_id');
                }
            }
        }

        $this->load->view('order-success',$data);
    }

    public function orderconfirmation() {

        $wh['register_id'] = $this->session->userdata('member');

        $cart = $this->md->my_select('tbl_cart', '*', $wh);
        $item = count($cart);

        if ($item == 0) {
            redirect('viewcart');
        } else {
            $data['cart'] = $cart;
        }

        if ($this->input->post('verify_cod')) {
//            echo 'hii';
//            die();

            if ($this->input->post('otp')) {
                $user_otp = $this->input->post('otp');
                $original_otp = $this->session->userdata('otp');

                if ($user_otp == $original_otp) {
                    $this->session->set_userdata('order_status', 1);
                    redirect('order-success');
                } else {
                    $data['error'] = 'OTP Not Match. Try Again!';
                }
            }
        }

        $data['callback_url'] = base_url() . 'pages/callback';
        $data['surl'] = base_url() . 'order-success';
        $data['furl'] = base_url() . 'order-fail';
        $this->load->view('orderconfirmation', $data);
    }

    public function orderfail() {
        
        if( $this->session->userdata('order_status') == 1 ){
            redirect('order-success');
        }
        $this->load->view('order-fail');
    }

    public function faqs() {
        $this->load->view('faqs');
    }

    public function signin() {
        $data = [];

        if ($this->input->post('signin')) {
            $email = $this->input->post('email');
            $wh['email'] = $email;
            $record = $this->md->my_select('tbl_register ', '*', $wh);
            $count = count($record);

            if ($count == 1) {
                $ops = $this->encryption->decrypt($record[0]->password);
                if ($ops == $this->input->post('ps')) {
                    $st = $record[0]->status;
                    if ($st == 1) {
                        if ($this->input->post('svp')) {
                            set_cookie('member_email', $this->input->post('email'), (60 * 60 * 24 * 365));
                            set_cookie('member_password', $this->input->post('ps'), (60 * 60 * 24 * 365));
                        } else {
                            if ($this->input->cookie('member_password')) {
                                delete_cookie('member_email');
                                delete_cookie('member_password');
                            }
                        }
                        $this->session->set_userdata('member', $record[0]->register_id);
                        $this->session->set_userdata('member_lastlogin', date('Y-m-d h:i:s'));

                        redirect('member-home');
                    } else {
                        $data['error'] = 'Your Account Disable Please Contact Administration Department..!';
                    }
                } else {
                    $data['error'] = 'Invalid Email or Password.';
                }
            } else {
                $data['error'] = 'Invalid Email or Password.';
            }
        }
        $this->load->view('signin', $data);
    }

    public function memberlogout() {

        $wh['register_id'] = $this->session->userdata('member');
        $ins['last_login'] = $this->session->userdata('member_lastlogin');
        $this->md->my_update('tbl_register', $ins, $wh);

        $this->session->unset_userdata('member');
        $this->session->unset_userdata('member_lastlogin');

        redirect('sign-in');
    }

    public function signup() {
        $data = [];

        if ($this->input->post('register')) {

            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('email', '', 'required|is_unique[tbl_register.email]', array('required' => 'Please Enter Email.', 'is_unique' => 'Email Already Exists'));
            $this->form_validation->set_rules('ps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please Enter Password.', 'min_length' => 'Please Enter Password Between 8-16 character.', 'max_length' => 'Please Enter Password Between 8-16 character.'));
            $this->form_validation->set_rules('cps', '', 'required|matches[ps]', array('required' => 'Please Enter Confirm Password.', 'matches' => 'Password Does Not Match',));

            if ($this->form_validation->run() == TRUE) {

                if ($count == 0) {
                    $ins['name'] = $this->input->post('name');
                    $ins['email'] = $this->input->post('email');
                    $ins['password'] = $this->encryption->encrypt($this->input->post('ps'));
                    $ins['join_date'] = date('Y-m-d');
                    $ins['status'] = 1;

                    $result = $this->md->my_insert('tbl_register', $ins);
                    if ($result == 1) {
                        $mx = $this->md->my_query("SELECT MAX(`register_id`) AS mx FROM `tbl_register`")[0]->mx;
                        $this->session->set_userdata('member', $mx);
                        $this->session->set_userdata('member_lastlogin', date('Y-m-d h:i:s'));
                        redirect('member-home');
                    }
                    $data['success'] = 'Thank You For Register';
                }
            }
        }
        
        $this->load->view('signup', $data);
    }

    public function forgetpassword() {
        $data = [];

        if ($this->input->post('send')) {
            $email = $this->input->post('email');

            $record = $this->md->my_select('tbl_register', '*', array('email' => $email));
            $count = count($record);

            if ($count == 1) {
                $ps = $this->encryption->decrypt($record[0]->password);

                $receipent = $record[0]->email;
                $subject = "Password Recover For Farmington Account.";
                $message = "<p>Hello " . $record[0]->name . ", <br/> Your Password for authentication is <b>$ps</b>.<br/> Please Next time be care and this password is not share with anyone.</p>";

                $result = $this->md->my_mailer($receipent, $subject, $message);

                if ($result == 1) {
                    $data['success'] = 'Please Check Your Email Inbox.';
                } else {
                    $data['error'] = 'Something Went Wrong. Please Try After Sometime.';
                }
            } else {
                $data['error'] = 'This Email is Not Registered with us.';
            }
        }

        $this->load->view('forgetpassword',$data);
    }

    public function productlist() {

        $data['allproducts'] = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status` = 1 ORDER BY `product_id` DESC");
        $this->load->view('productlist', $data);
    }

    public function productdetails() {

        if ($this->uri->segment(2) == "") {
            redirect('product-list');
        } else {
            $data['allproducts'] = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status` = 1 ORDER BY `product_id` DESC");
            $wh['product_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['details'] = $this->md->my_select('tbl_product', '*', $wh)[0];
        }

        $this->load->view('productdetails', $data);
    }

    public function memberhome() {
        $this->Security();
        $this->load->view('member-home');
    }

    public function memberdashboard() {

        $this->load->view('member-dashboard');
    }

    public function membersetting() {
        $this->security();
        $data = [];

        if ($this->input->post('change_ps')) {
            $wh['register_id'] = $this->session->userdata('member');
            $detail = $this->md->my_select('tbl_register', '*', $wh)[0];
            $ops = $this->encryption->decrypt($detail->password);
            if ($ops == $this->input->post('ps')) {

                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please Enter New Password.', 'min_length' => 'Please Enter Password Between 8-16 character.', 'max_length' => 'Please Enter Password Between 8-16 character.'));
                $this->form_validation->set_rules('cps', '', 'required|matches[nps]', array('required' => 'Please Enter Confifrm Password.', 'matches' => 'Password Does Not Match',));

                if ($this->form_validation->run() == TRUE) {
                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));
                    $result = $this->md->my_update('tbl_register', $ins, $wh);

                    if ($result == 1) {
                        if ($this->input->cookie('member_password')) {
                            set_cookie('member_password', $this->input->post('nps'), (60 * 60 * 24 * 365));
                        }

                        $data['success'] = 'Password Change Successfully.';
                    }
                }
            } else {
                $data['error'] = 'Password Does Not Match.';
            }
        }
        $this->load->view('member-setting', $data);
    }

    public function memberprofile() {

        $this->security();
        //change profile
        $whh['register_id'] = $this->session->userdata('member');
        if ($this->input->post('change_profile')) {
            $config['upload_path'] = './assets/member/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024 * 4;
            $config['file_name'] = 'profile_' . $this->session->userdata('member');
            $config['overwrite'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('profile')) {


                $ins['profile_pic'] = 'assets/member/' . $this->upload->data('file_name');

                $result = $this->md->my_update('tbl_register', $ins, $whh);

                if ($result == 1) {
                    redirect('member-profile');
                }
            } else {
                $data['perror'] = $this->upload->display_errors();
            }
        }

        if ($this->input->post('update')) {

            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Enter Valid Name.'));
            $this->form_validation->set_rules('email', '', 'required|valid_email', array('required' => 'Please Enter Email Name.', 'valid_email' => 'Enter Valid Email.'));
            $this->form_validation->set_rules('gender', '', 'required', array('required' => 'Please Select Gender.'));
            $this->form_validation->set_rules('mobile', '', 'required|regex_match[/^[0-9]+$/]|min_length[10]|max_length[10]', array('required' => 'Please Enter Mobile Number.', 'regex_match' => 'Enter Valid Mobile Number.', 'min_length' => 'Enter Valid Moblie Number.', 'max_length' => 'Enter Valid Moblie Number.'));
            $this->form_validation->set_rules('birth_date', '', 'required', array('required' => 'Please Enter Birth Date.'));

            if ($this->form_validation->run() == true) {
                $up['name'] = $this->input->post('name');
                $up['email'] = $this->input->post('email');
                $up['gender'] = $this->input->post('gender');
                $up['mobile'] = $this->input->post('mobile');
                $up['birth_date'] = $this->input->post('birth_date');

                $result = $this->md->my_update('tbl_register', $up, $whh);
                if ($result == 1) {
                    redirect('member-profile');
                }
            }
        }
        $data['profile'] = $this->md->my_select('tbl_register', '*', $whh)[0];

        $this->load->view('member-profile', $data);
    }

    public function memberaddress() {
        $this->security();
        $data = [];

        if ($this->input->post('add')) {

            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Please Enter Name.'));
            $this->form_validation->set_rules('address', '', 'required', array('required' => 'Please Enter Address.'));
            $this->form_validation->set_rules('type', '', 'required', array('required' => 'Please Select One.'));
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Please select Country Name.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please select State Name.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'Please Select City Name.'));

            if ($this->form_validation->run() == TRUE) {

                $ins['address'] = $this->input->post('address');
                $ins['name'] = $this->input->post('name');
                $ins['address_type'] = $this->input->post('type');
                $ins['location_id'] = $this->input->post('city');
                $ins['register_id'] = $this->session->userdata('member');

                $result = $this->md->my_insert('tbl_shipment', $ins);
                if ($result == 1) {
                    $data['success'] = 'Address Added Successfully.';
                }
            }
        }
        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $wh['register_id'] = $this->session->userdata('member');
        $data['address'] = $this->md->my_select('tbl_shipment', '*', $wh);
        $this->load->view('member-address', $data);
    }

    public function memberreview() {
        $this->security();

//         $data['review'] = $this->md->my_query("SELECT * FROM `tbl_review` WHERE `register_id` = $this->session->userdata('member') ORDER BY `review_id` DESC");

        $wh['register_id'] = $this->session->userdata('member');
        $data['review'] = $this->md->my_select('tbl_review', '*', $wh);
        $this->load->view('member-review', $data);
    }

    public function memberwishlist() {
        $this->security();

        $data['wish'] = $this->md->my_select('tbl_wishlist', '*');
        $this->load->view('member-wishlist', $data);
    }

    public function memberorder() {
        $this->security();
        $data['bill'] = $this->md->my_query("SELECT * FROM `tbl_bill` WHERE `register_id`=" . $this->session->userdata('member') . " ORDER BY `bill_id` DESC");

        $this->load->view('member-order',$data);
    }
    
     

    public function membermenu() {
        $this->load->view('member-menu');
    }

    public function viewcart() {
        $this->load->view('view-cart');
    }
    // initialized cURL Request
    private function curl_handler($payment_id, $amount) {
        $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
        $key_id = RAZORPAY_API_KEY;
        $key_secret = RAZORPAY_API_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        return $ch;
    }

    // callback method
    public function callback() {
        //print_r($this->input->post());
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');

//            $this->session->set_flashdata('razorpay_payment_id', $this->input->post('razorpay_payment_id'));
//            $this->session->set_flashdata('merchant_order_id', $this->input->post('merchant_order_id'));

            $this->session->set_userdata('razorpay_payment_id', $this->input->post('razorpay_payment_id'));
            $this->session->set_userdata('merchant_order_id', $this->input->post('merchant_order_id'));

            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {
                $ch = $this->curl_handler($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                if ($http_status == 200) {
                    $this->session->set_userdata('order_status', 1);
                    redirect('order-success');
                } else {
                    $this->session->set_userdata('order_status', 0);
                }


                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: ' . curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                    //Check success response
                    if ($http_status === 200 and isset($response_array['error']) === false) {
                        $success = true;
                    } else {
                        $success = false;
                        if (!empty($response_array['error']['code'])) {
                            $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
                        } else {
                            $error = 'RAZORPAY_ERROR:Invalid Response <br/>' . $result;
                        }
                    }
                }
                //close curl connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'Request to Razorpay Failed';
            }

            if ($success === true) {
                if (!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                }
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }
            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    }

}

