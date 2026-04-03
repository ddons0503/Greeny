<?php

class Authorize extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index() {

        $data = [];

        if ($this->input->post('login')) {
            $email = $this->input->post('email');
            $wh['email'] = $email;
            $record = $this->md->my_select('tbl_admin_login', '*', $wh);
            $count = count($record);
//            $ops = $this->encryption->decrypt($record[0]->password);
//            echo $ops;
//            die();
//            

            if ($count == 1) {
                $ops = $this->encryption->decrypt($record[0]->password);
                if ($ops == $this->input->post('ps')) {
                    if ($this->input->post('svp')) {
                        set_cookie('admin_email', $this->input->post('email'), (60 * 60 * 24 * 365));
                        set_cookie('admin_password', $this->input->post('ps'), (60 * 60 * 24 * 365));
                    } else {
                        if ($this->input->cookie('admin_password')) {
                            delete_cookie('admin_email');
                            delete_cookie('admin_password');
                        }
                    }

                    $this->session->set_userdata('admin', $record[0]->admin_id);
                    $this->session->set_userdata('admin_lastlogin', date('Y-m-d h:i:s'));

                    redirect('admin-home');
                } else {
                    $data['error'] = 'Invalid Email or Password.';
                }
            } else {
                $data['error'] = 'Invalid Email or Password.';
            }
        }
        $this->load->view('admin/index', $data);
    }

    public function Security() {
        if (!$this->session->userdata('admin')) {
            redirect('admin-login');
        }
    }

    public function Logout() {
        $this->security();

        $wh['admin_id'] = $this->session->userdata('admin');

        $ins['last_login'] = $this->session->userdata('admin_lastlogin');
        $this->md->my_update('tbl_admin_login', $ins, $wh);

        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('admin_lastlogin');

        redirect('admin-login');
    }

    public function dashboard() {
        $this->security();

        $data['contactus'] = $this->md->my_query("select count(*) as cc from tbl_contact_us")[0]->cc;
        $data['feedback'] = $this->md->my_query("select count(*) as fc from tbl_feedback")[0]->fc;
        $data['emailsubcriber'] = $this->md->my_query("select count(*) as ec from tbl_email_subscriber")[0]->ec;
        $data['banner'] = $this->md->my_query("select count(*) as bc from tbl_banner")[0]->bc;
        $data['member'] = $this->md->my_query("select count(*) as cc from tbl_register")[0]->cc;
        $data['country'] = $this->md->my_query("select count(*) as cc from tbl_location where `label` = 'country'")[0]->cc;
        $data['state'] = $this->md->my_query("select count(*) as cc from tbl_location where `label` = 'state'")[0]->cc;
        $data['city'] = $this->md->my_query("select count(*) as cc from tbl_location where `label` = 'city'")[0]->cc;
        $data['main'] = $this->md->my_query("select count(*) as cc from tbl_category where `label` = 'main category'")[0]->cc;
        $data['sub'] = $this->md->my_query("select count(*) as cc from tbl_category where `label` = 'sub category'")[0]->cc;
        $data['peta'] = $this->md->my_query("select count(*) as cc from tbl_category where `label` = 'peta category'")[0]->cc;
        $data['allproduct'] = $this->md->my_query("select count(*) as cc from tbl_product")[0]->cc;
        $data['allreviews'] = $this->md->my_query("select count(*) as cc from tbl_review")[0]->cc;
        $data['offer'] = $this->md->my_query("select count(*) as cc from tbl_offer")[0]->cc;
        $data['coupon'] = $this->md->my_query("select count(*) as cc from tbl_promocode")[0]->cc;
        $data['pending'] = $this->md->my_query("select count(*) as cc from tbl_bill where `status` = 0")[0]->cc;
        $data['confirm'] = $this->md->my_query("select count(*) as cc from tbl_bill where `status` = 1")[0]->cc;
        $data['cancel'] = $this->md->my_query("select count(*) as cc from tbl_bill where `status` = 2")[0]->cc;

        $this->load->view('admin/dashboard', $data);
    }

    public function managesetting() {
        $this->security();
        $data = [];

        if ($this->input->post('change_ps')) {
            $wh['admin_id'] = $this->session->userdata('admin');
            $detail = $this->md->my_select('tbl_admin_login', '*', $wh)[0];
            $ops = $this->encryption->decrypt($detail->password);

//            echo $ops;
//            die();

            if ($ops == $this->input->post('ps')) {

                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please Enter New Password.', 'min_length' => 'Password Between 8-16 character.', 'max_length' => 'Password Between 8-16 character.'));
                $this->form_validation->set_rules('cps', '', 'required|matches[nps]', array('required' => 'Please Enter Confifrm Password.', 'matches' => 'Password Does Not Match',));

                if ($this->form_validation->run() == TRUE) {
                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));
                    $result = $this->md->my_update('tbl_admin_login', $ins, $wh);

                    if ($result == 1) {
                        if ($this->input->cookie('admin_password')) {
                            set_cookie('admin_password', $this->input->post('nps'), (60 * 60 * 24 * 365));
                        }

                        $data['success'] = 'Password Change Successfully.';
                    }
                }
            } else {
                $data['error'] = 'Password Does Not Match.';
            }
        }

        if ($this->input->post('change_profile')) {
            $config['upload_path'] = './admin_assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024 * 4;
            $config['file_name'] = 'profile';
            $config['overwrite'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('profile')) {

                $whh['admin_id'] = $this->session->userdata('admin');
                $ins['profile_pic'] = 'admin_assets/images/' . $this->upload->data('file_name');

                $result = $this->md->my_update('tbl_admin_login', $ins, $whh);

                if ($result == 1) {
                    redirect('admin-setting');
                }
            } else {
                $data['perror'] = $this->upload->display_errors();
            }
        }

        $data['profile'] = $this->md->my_select('tbl_admin_login')[0];

        $this->load->view('admin/managesetting', $data);
    }

    public function managecontactus() {
        $data['contact_us'] = $this->md->my_select('tbl_contact_us', '*');

        $this->load->view('admin/managecontactus', $data);
    }

    public function managefeedback() {
        $data['feedback'] = $this->md->my_select('tbl_feedback', '*');

        $this->load->view('admin/managefeedback', $data);
    }

    public function manageemailsubscribers() {
        $this->security();

        if ($this->input->post('send')) {

            $this->form_validation->set_rules('subject', '', 'required', array('required' => 'Please Enter Email Subject.'));
            $this->form_validation->set_rules('message', '', 'required', array('required' => 'Please Enter Email Message.'));

            if ($this->form_validation->run() == TRUE) {

                if ($this->input->post('receiver')) {

                    $receiver = $this->input->post('receiver');
                    $subject = $this->input->post('subject');
                    $message = $this->input->post('message');

                    $success = 0;
                    foreach ($receiver as $single) {
                        $success = $this->md->my_mailer($single, $subject, $message);
                    }

                    if ($success == 1) {
                        $data['success'] = 'Email Send Successfully.';
                    } else {
                        $data['error'] = 'Something Went Wrong.';
                    }
                } else {
                    $data['error'] = 'Please Select Atleast One Email Subscriber.';
                }
            }
        }

        $data['subscriber'] = $this->md->my_select('tbl_email_subscriber');
        $this->load->view('admin/manageemailsubscribers', $data);
    }

    public function managebanner() {
        $this->Security();
        $data = [];
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('title', '', 'required', array('required' => 'Please Enter Title.'));
            $this->form_validation->set_rules('subtitle', '', 'required', array('required' => 'Please Enter SubTitle.'));
            if ($this->form_validation->run() == TRUE) {

                //unique
                $config['upload_path'] = './assets/banner/';
                $config['allowed_types'] = 'jpg|jpeg';
                $config['max_size'] = 1024 * 4;
                $config['file_name'] = 'banner_' . time();
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('banner')) {

                    $ins['path'] = 'assets/banner/' . $this->upload->data('file_name');
                    $ins['title'] = $this->input->post('title');
                    $ins['subtitle'] = $this->input->post('subtitle');
                    $ins['status'] = 1;

                    $result = $this->md->my_insert('tbl_banner', $ins);

                    if ($result == 1) {
                        $data['success'] = 'Banner Upload Successfully.';
                    }
                } else {
                    $data['error'] = $this->upload->display_errors();
                }
            }
        }
        $data['banner'] = $this->md->my_select('tbl_banner');
        $this->load->view('admin/managebanner', $data);
    }

    public function managemember() {
        $this->security();
        $data['member'] = $this->md->my_select('tbl_register', '*');
        $this->load->view('admin/managemember', $data);
    }

    public function managecountry() {

        $data = [];

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('country', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Country Name.', 'regex_match' => 'Enter Valid Country Name.'));

            if ($this->form_validation->run() == TRUE) {


                //unique
                $wh['name'] = $this->input->post('country');
                $wh['label'] = 'country';
                $data = $this->md->my_select('tbl_location', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('country');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'country';

                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = $this->input->post('country') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('country') . ' Already Exist.';
                }
            }
        }
        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $this->load->view('admin/managecountry', $data);
    }

    public function managestate() {
        $data = [];

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Please select Country Name.'));
            $this->form_validation->set_rules('state', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter State Name.', 'regex_match' => 'Please Enter Valid State Name.'));

            if ($this->form_validation->run() == TRUE) {

                //unique
                $wh['name'] = $this->input->post('state');
                $wh['parent_id'] = $this->input->post('country');
                $wh['label'] = 'state';
                $data = $this->md->my_select('tbl_location', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('state');
                    $ins['parent_id'] = $this->input->post('country');
                    $ins['label'] = 'state';

                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = $this->input->post('state') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('state') . ' Already Exist.';
                }
            }
        }
        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['state'] = $this->md->my_query("SELECT s.* , c.name AS country FROM `tbl_location` AS s , `tbl_location` AS c WHERE c.`location_id` = s.`parent_id` AND s.`label` = 'state' ");
        $this->load->view('admin/managestate', $data);
    }

    public function managecity() {
        $this->security();
        $data = [];

        if ($this->input->post('add')) {

            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Please select Country Name.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please select State Name.'));
            $this->form_validation->set_rules('city', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter City Name.', 'regex_match' => 'Please Enter Valid City Name.'));

            if ($this->form_validation->run() == TRUE) {
                //unique
                $wh['name'] = $this->input->post('city');
                $wh['parent_id'] = $this->input->post('state');
                $wh['label'] = 'city';
                $data = $this->md->my_select('tbl_location', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('city');
                    $ins['parent_id'] = $this->input->post('state');
                    $ins['label'] = 'city';

                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = $this->input->post('city') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('city') . ' Already Exist.';
                }
            }
        }
        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['city'] = $this->md->my_query("SELECT c.`name` AS country , s.`name` AS state , ct.* FROM `tbl_location` AS c , `tbl_location` AS s, `tbl_location` AS ct WHERE c.`location_id` = s.`parent_id` AND s.`location_id` = ct.`parent_id` ");
        $this->load->view('admin/managecity', $data);
    }

    public function managemaincategory() {
        $data = [];

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('main_category', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Main Category.', 'regex_match' => 'Enter Valid Main Category.'));

            if ($this->form_validation->run() == TRUE) {


                //unique
                $wh['name'] = $this->input->post('main_category');
                $wh['label'] = 'main category';
                $data = $this->md->my_select('tbl_category', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('main_category');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'main category';

                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = $this->input->post('main_category') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('main_category') . ' Already Exist.';
                }
            }
        }
        $data['main_category'] = $this->md->my_select('tbl_category', '*', array('label' => 'main category'));
        $this->load->view('admin/managemaincategory', $data);
    }

    public function managesubcategory() {
        $data = [];

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('main_category', '', 'required', array('required' => 'Please select Main Category Name.'));
            $this->form_validation->set_rules('sub_category', '', 'required|regex_match[/^[a-zA-Z -&]+$/]', array('required' => 'Please Enter Sub Category Name.', 'regex_match' => 'Please Enter Valid Sub Category Name.'));

            if ($this->form_validation->run() == TRUE) {

                //unique
                $wh['name'] = $this->input->post('sub_category');
                $wh['parent_id'] = $this->input->post('main_category');
                $wh['label'] = 'sub category';
                $data = $this->md->my_select('tbl_category', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('sub_category');
                    $ins['parent_id'] = $this->input->post('main_category');
                    $ins['label'] = 'sub category';

                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = $this->input->post('sub_category') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('sub_category') . ' Already Exist.';
                }
            }
        }
        $data['main_category'] = $this->md->my_select('tbl_category', '*', array('label' => 'main category'));
        $data['sub_category'] = $this->md->my_query("SELECT s.* , m.name AS main_category FROM `tbl_category` AS m , `tbl_category` AS s WHERE m.`category_id` = s.`parent_id` AND s.`label` = 'sub category' ");

        $this->load->view('admin/managesubcategory', $data);
    }

    public function managepetacategory() {
        $this->security();
        $data = [];

        if ($this->input->post('add')) {

            $this->form_validation->set_rules('main_category', '', 'required', array('required' => 'Please select Main Category Name.'));
            $this->form_validation->set_rules('sub_category', '', 'required', array('required' => 'Please select Sub Category Name.'));
            $this->form_validation->set_rules('peta_category', '', 'required|regex_match[/^[a-zA-Z -&]+$/]', array('required' => 'Please Enter Peta Category Name.', 'regex_match' => 'Please Enter Valid Peta Category Name.'));

            if ($this->form_validation->run() == TRUE) {
                //unique
                $wh['name'] = $this->input->post('peta_category');
                $wh['parent_id'] = $this->input->post('sub_category');
                $wh['label'] = 'peta category';
                $data = $this->md->my_select('tbl_category', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('peta_category');
                    $ins['parent_id'] = $this->input->post('sub_category');
                    $ins['label'] = 'peta category';

                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = $this->input->post('peta_category') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('peta_category') . ' Already Exist.';
                }
            }
        }
        $data['main_category'] = $this->md->my_select('tbl_category', '*', array('label' => 'main category'));
        $data['peta_category'] = $this->md->my_query("SELECT m.`name` AS main_category , s.name AS sub_category, p.* FROM `tbl_category` AS m , `tbl_category` AS s, `tbl_category` AS p WHERE m.`category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id`");

        $this->load->view('admin/managepetacategory', $data);
    }

    public function manageaddnewproduct() {
        $this->security();
        $data = [];

//        $this->session->sess_destroy();

        if (!$this->session->userdata('productform')) {
            $this->session->set_userdata('productform', 1);
        }

        if ($this->input->post('previous')) {
            $this->session->set_userdata('productform', 1);
        }

        if ($this->input->post('next')) {

            $this->form_validation->set_rules('main_category', '', 'required', array('required' => 'Please Select Main Category Name.'));
            $this->form_validation->set_rules('sub_category', '', 'required', array('required' => 'Please Select Sub Category Name.'));
            $this->form_validation->set_rules('peta_category', '', 'required', array('required' => 'Please Select Peta Category Name.'));
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Please Enter Name.'));
            $this->form_validation->set_rules('code', '', 'required', array('required' => 'Please Enter Code.'));
            $this->form_validation->set_rules('description', '', 'required|min_length[50]', array('required' => 'Please Enter Description.', 'min_length' => 'Please Enter Minimum 50 Characters.'));
            $this->form_validation->set_rules('specification', '', 'required|min_length[50]', array('required' => 'Please Enter Specification.', 'min_length' => 'Please Enter Minimum 50 Characters.'));

            if ($this->form_validation->run() == TRUE) {

                $ins['main_id'] = $this->input->post('main_category');
                $ins['sub_id'] = $this->input->post('sub_category');
                $ins['peta_id'] = $this->input->post('peta_category');
                $ins['code'] = $this->input->post('code');
                $ins['name'] = $this->input->post('name');
                $ins['description'] = $this->input->post('description');
                $ins['specification'] = $this->input->post('specification');
                $ins['status'] = 1;
                $ins['offer_id'] = 0;

                if (!$this->session->userdata('last_product')) {
                    $this->md->my_insert('tbl_product', $ins);

                    $mx = $this->md->my_query("SELECT MAX(`product_id`) AS mx FROM `tbl_product`")[0]->mx;
                    $this->session->set_userdata('last_product', $mx);
                    $this->session->set_userdata('productform', 2);
                } else {
                    $whhh['product_id'] = $this->session->userdata('last_product');
                    $this->md->my_update('tbl_product', $ins, $whhh);
                    $this->session->set_userdata('productform', 2);
                }
            }
        }

        //finish
        if ($this->input->post('finish')) {
            $wh['product_id'] = $this->session->userdata('last_product');
            $image = $this->md->my_select('tbl_product_image', '*', $wh);
            $count = count($image);

            if ($count > 0) {
                $this->session->unset_userdata('last_product');
                $this->session->set_userdata('productform', 1);
            } else {
                $data['finish_error'] = 'Please Upload Atleast One Product Image,';
            }
        }

        if ($this->input->post('add_image')) {
            $this->form_validation->set_rules('unit', '', 'required', array('required' => 'Please Select Product Unit.'));
            $this->form_validation->set_rules('price', '', 'required|numeric', array('required' => 'Please Enter Product Price.', 'numeric' => 'Please Enter Valid Product Price.'));
            $this->form_validation->set_rules('qty', '', 'required|numeric', array('required' => 'Please Enter Product Quantity.', 'numeric' => 'Please Enter Valid Product Quantity.'));

            if ($this->form_validation->run() == TRUE) {

                if (strlen($_FILES['photo']['name'][0]) > 0) {
                    // count no of file

                    $count = count($_FILES['photo']['name']);

                    $img_path = "";

                    // access one by one file

                    for ($i = 0; $i < $count; $i++) {

                        //store in single string

                        $_FILES['single']['name'] = $_FILES['photo']['name'][$i];
                        $_FILES['single']['size'] = $_FILES['photo']['size'][$i];
                        $_FILES['single']['type'] = $_FILES['photo']['type'][$i];
                        $_FILES['single']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
                        $_FILES['single']['error'] = $_FILES['photo']['error'][$i];

                        //upload photo
                        $config['upload_path'] = './assets/products/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $config['max_size'] = 1024 * 10;
                        $config['file_name'] = 'product_' . time();
                        $config['encrypt_name'] = true;

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('single')) {
                            $path = "assets/products/" . $this->upload->data('file_name');
                            $img_path = $img_path . $path . ",";
                            $data['img_report'][$i] = 'Product Image Upload Successfully';
                            $imgsuccess = 1;
                        } else {
                            $data['img_report'][$i] = $this->upload->display_errors('img_report');
                            $imgsuccess = 0;
                        }
                    }

                    //store image detail into database
                    if ($imgsuccess == 1) {
                        $img_path = rtrim($img_path, ",");
                        $insimg['product_id'] = $this->session->userdata('last_product');
                        $insimg['unit'] = $this->input->post('unit');
                        $insimg['price'] = $this->input->post('price');
                        $insimg['path'] = $img_path;
                        $insimg['qty'] = $this->input->post('qty');

                        $result = $this->md->my_insert('tbl_product_image', $insimg);

                        if ($result == 1) {
                            $data['img_success'] = 'product Image Upload Successfully.';
                        }
                    }
                } else {
                    $data['img_error'] = 'Please Select Atlest One Product Image.';
                }
            }
        }

        if ($this->session->userdata('last_product')) {
            $data['product_info'] = $this->md->my_select('tbl_product', '*', array('product_id' => $this->session->userdata('last_product')))[0];
        }

        $data['main_category'] = $this->md->my_select('tbl_category', '*', array('label' => 'main category'));
        $this->load->view('admin/manageaddnewproduct', $data);
    }

    public function forgot_password() {

        $record = $this->md->my_select('tbl_admin_login')[0];
        $ps = $this->encryption->decrypt($record->password);

        $receipent = $record->email;
        $subject = "Password Recover For Greeny.";
        $message = "<p>Hello Greeny, <br/> Your Password for authentication is <b>$ps</b></p>";

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'novamailer2023@gmail.com', // change it to yours
            'smtp_pass' => 'ohrzammqukdalttn', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('novamailer2023@gmail.com'); // change it to yours
        $this->email->to($receipent); // change it to yours
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            redirect('admin-login/1');
        }
    }

    public function manageviewallproducts() {
        $this->security();

        $data['allproducts'] = $this->md->my_select('tbl_product');
        $this->load->view('admin/manageviewallproducts', $data);
    }

    public function manageproductreview() {

        $data['review'] = $this->md->my_query("SELECT * FROM `tbl_review` ORDER BY `review_id` DESC");
        $this->load->view('admin/manageproductreview', $data);
    }

    public function manageoffer() {
        $data = [];
        $this->security();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('offer', '', 'required', array('required' => 'Please Enter Offer Name.'));
            $this->form_validation->set_rules('rate', '', 'required|numeric', array('required' => 'Please Enter Offer Rate Name.', 'numeric' => 'Please Enter Valid Offer Rate'));
            $this->form_validation->set_rules('start', '', 'required', array('required' => 'Please Select Offer Start Date.'));
            $this->form_validation->set_rules('end', '', 'required', array('required' => 'Please Select Offer End Date.'));
            $this->form_validation->set_rules('minimum', '', 'required|numeric', array('required' => 'Please Enter Offer Minimum Price.', 'numeric' => 'Please Enter Valid Minimum Price'));
            $this->form_validation->set_rules('maximum', '', 'required|numeric', array('required' => 'Please Enter Offer Maximum Price.', 'numeric' => 'Please Enter Valid Maximum Price'));

            if ($this->form_validation->run() == TRUE) {
                //startdate
                if ($this->input->post('start') < date('Y-m-d')) {
                    $data['start_date_err'] = 'Please Select Offer Valid Start Date.';
                } else {
                    //end date
                    if ($this->input->post('end') < $this->input->post('start')) {
                        $data['end_date_err'] = 'Please Select Offer Valid end Date.';
                    } else {
                        //min_price
                        if ($this->input->post('minimum') < 0) {
                            $data['min_price_err'] = 'Minimum Price Greater Then 0.';
                        } else {
                            //max_price
                            if ($this->input->post('maximum') < $this->input->post('minimum')) {
                                $data['max_price_err'] = 'Maxmim Price Greater Then Minimum Price.';
                            } else {

                                //insert

                                $ins['name'] = $this->input->post('offer');
                                $ins['rate'] = $this->input->post('rate');
                                $ins['start_date'] = $this->input->post('start');
                                $ins['end_date'] = $this->input->post('end');
                                $ins['min_price'] = $this->input->post('minimum');
                                $ins['max_price'] = $this->input->post('maximum');
                                $ins['status'] = 0;

                                if ($this->input->post('main_category') == "" && $this->input->post('sub_category') == "" && $this->input->post('peta_category') == "") {
                                    $ins['category_id'] = 0;
                                    $ins['label'] = 'all';
                                } else if ($this->input->post('main_category') != "" && $this->input->post('sub_category') == "" && $this->input->post('peta_category') == "") {
                                    $ins['category_id'] = $this->input->post('main_category');
                                    $ins['label'] = 'main category';
                                } else if ($this->input->post('main_category') != "" && $this->input->post('sub_category') != "" && $this->input->post('peta_category') == "") {
                                    $ins['category_id'] = $this->input->post('sub_category');
                                    $ins['label'] = 'sub category';
                                } else if ($this->input->post('main_category') != "" && $this->input->post('sub_category') != "" && $this->input->post('peta_category') != "") {
                                    $ins['category_id'] = $this->input->post('peta_category');
                                    $ins['label'] = 'peta category';
                                }

                                $result = $this->md->my_insert('tbl_offer', $ins);
                                if ($result == 1) {
                                    $data['success'] = $this->input->post('offer') . ' Offer Added Successfully.';
                                }
                            }
                        }
                    }
                }
            }
        }

        $data['main_category'] = $this->md->my_select('tbl_category', '*', array('label' => 'main category'));

        $data['offer'] = $this->md->my_select('tbl_offer');
        $this->load->view('admin/manageoffer', $data);
    }

    public function managecoupon() {
        $data = [];

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('code', '', 'required|regex_match[/^[a-zA-Z0-9]+$/]', array('required' => 'Please Enter promocode.', 'regex_match' => 'Enter Valid promocode.'));
            $this->form_validation->set_rules('amount', '', 'required|regex_match[/^[0-9]+$/]', array('required' => 'Please Enter Amount.', 'regex_match' => 'Enter Valid Amount.'));
            $this->form_validation->set_rules('min_price', '', 'required|regex_match[/^[0-9]+$/]', array('required' => 'Please Enter Minimum Bill Price.', 'regex_match' => 'Enter Valid Minimum Bill Price.'));

            if ($this->form_validation->run() == TRUE) {

                $wh['code'] = $this->input->post('code');
                $record = $this->md->my_select('tbl_promocode', '*', $wh);
                $count = count($record);

                if ($count == 0) {
                    $ins['code'] = $this->input->post('code');
                    $ins['amount'] = $this->input->post('amount');
                    $ins['min_bill_price'] = $this->input->post('min_price');
                    $ins['status'] = 1;

                    $result = $this->md->my_insert('tbl_promocode', $ins);
                    if ($result == 1) {
                        $data['success'] = 'Added Successfully';
                    }
                } else {
                    $data['error'] = 'Already Exist ';
                }
            }
        }
        $data['code'] = $this->md->my_select('tbl_promocode', '*');
        $this->load->view('admin/managecoupon', $data);
    }

    public function managependingorder() {
        $data['bill'] = $this->md->my_select('tbl_bill', '*', array('status' => 0));
        $this->load->view('admin/managependingorder', $data);
    }

    public function manageconfirmorder() {
        $data['bill'] = $this->md->my_select('tbl_bill', '*', array('status' => 1));
        $this->load->view('admin/manageconfirmorder', $data);
    }

    public function managecancelorder() {
        $data['bill'] = $this->md->my_select('tbl_bill', '*', array('status' => 2));
        $this->load->view('admin/managecancelorder', $data);
    }

    public function delete() {
        $this->security();
        $action = $this->uri->segment(2);
        $id = base64_decode(base64_decode($this->uri->segment(3)));

        if ($action == 'country') {
            if ($id == 0) {
                $this->md->truncate('tbl_location');
            } else {
                $wh['location_id'] = $id;
                $this->md->my_delete('tbl_location', $wh);
            }
            redirect('manage-country');
        } elseif ($action == 'state') {
            if ($id == 0) {
                $this->md->my_delete('tbl_location', array('label' => 'state'));
                $this->md->my_delete('tbl_location', array('label' => 'city'));
            } else {
                $wh['location_id'] = $id;
                $this->md->my_delete('tbl_location', $wh);
            }
            redirect('manage-state');
        } else if ($action == 'city') {
            if ($id == 0) {
                $this->md->my_delete('tbl_location', array('label' => 'city'));
            } else {
                $wh['location_id'] = $id;
                $this->md->my_delete('tbl_location', $wh);
            }
            redirect('manage-city');
        } else if ($action == 'main_category') {
            if ($id == 0) {
                $this->md->truncate('tbl_category');
            } else {
                $wh['category_id'] = $id;
                $this->md->my_delete('tbl_category', $wh);
            }
            redirect('manage-main-category');
        } else if ($action == 'sub_category') {
            if ($id == 0) {
                $this->md->my_delete('tbl_category', array('label' => 'sub category'));
                $this->md->my_delete('tbl_category', array('label' => 'peta category'));
            } else {
                $wh['category_id'] = $id;
                $this->md->my_delete('tbl_category', $wh);
            }
            redirect('manage-sub-category');
        } else if ($action == 'peta_category') {
            if ($id == 0) {
                $this->md->my_delete('tbl_category', array('label' => 'peta category'));
            } else {
                $wh['category_id'] = $id;
                $this->md->my_delete('tbl_category', $wh);
            }
            redirect('manage-peta-category');
        } elseif ($action == 'banner') {
            if ($id == 0) {
                $record = $this->md->my_select('tbl_banner');
                foreach ($record as $data) {
                    unlink($record->$path);
                }
                $this->md->truncate('tbl_banner');
            } else {
                $wh['banner_id'] = $id;
                $path = $this->md->my_select('tbl_banner', '*', $wh)[0]->path;
                unlink($path);
                $this->md->my_delete('tbl_banner', $wh);
            }
            redirect('manage-banner');
        } else if ($action == 'coupon') {
            if ($id == 0) {
                $this->md->truncate('tbl_promocode');
            }
            redirect('manage-coupon');
        }

        if ($action == 'feedback') {
            if ($id == 0) {
                $this->md->truncate('tbl_feedback');
            } else {
                $wh['feedback_id'] = $id;
                $this->md->my_delete('tbl_feedback', $wh);
            }
            redirect('manage-feedback');
        }

        if ($action == 'contact_us') {
            if ($id == 0) {
                $this->md->truncate('tbl_contact_us');
            } else {
                $wh['contact_id'] = $id;
                $this->md->my_delete('tbl_contact_us', $wh);
            }
            redirect('manage-contact-us');
        }
    }

}

?>