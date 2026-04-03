<?php

class Edit extends CI_Controller {

    public function Security() {
        if (!$this->session->userdata('admin')) {
            redirect('admin-login');
        }
    }

    public function editcountry() {
        $this->security();
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['location_id'] = $id;

        $data = [];

        if ($this->input->post('update')) {
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

                    $result = $this->md->my_update('tbl_location', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-country');
                    }
                } else {
                    $data['error'] = $this->input->post('country') . ' Already Exist.';
                }
            }
        }
        $data['editcountry'] = $this->md->my_select('tbl_location', '*', $whh)[0];
        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $this->load->view('admin/managecountry', $data);
    }

    public function editstate() {
        $this->security();
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['location_id'] = $id;

        $data = [];

        if ($this->input->post('update')) {
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

                    $result = $this->md->my_update('tbl_location', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-state');
                    }
                } else {
                    $data['error'] = $this->input->post('state') . ' Already Exist.';
                }
            }
        }
        $data['editstate'] = $this->md->my_select('tbl_location', '*', $whh)[0];
        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['state'] = $this->md->my_query("SELECT s.* , c.name AS country FROM `tbl_location` AS s , `tbl_location` AS c WHERE c.`location_id` = s.`parent_id` AND s.`label` = 'state' ");
        $this->load->view('admin/managestate', $data);
    }

    public function editcity() {
        $this->security();
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['location_id'] = $id;

        $data = [];

        if ($this->input->post('update')) {

            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Please select Country Name.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please select State Name.'));
            $this->form_validation->set_rules('city', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter City Name.', 'regex_match' => 'Please Enter Valid City Name.'));

            if ($this->form_validation->run() == TRUE) {

                //Unique
                $wh['name'] = $this->input->post('city');
                $wh['parent_id'] = $this->input->post('state');
                $wh['label'] = 'city';
                $data = $this->md->my_select('tbl_location', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    
                    $ins['name'] = $this->input->post('city');
                    $ins['parent_id'] = $this->input->post('state');
                    
                    $result = $this->md->my_update('tbl_location', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-city');
                    }
                } else {
                    $data['error'] = $this->input->post('city') . ' Already Exist.';
                }
            }
        }

        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['city'] = $this->md->my_query("SELECT c.`name` AS country , s.`name` AS state , ct.* FROM `tbl_location` AS c , `tbl_location` AS s , `tbl_location` AS ct WHERE c.`location_id` = s.`parent_id` AND s.`location_id` = ct.`parent_id`");
        $data['editcity'] = $this->md->my_select('tbl_location', '*', $whh)[0];
        $data['statedata'] = $this->md->my_select('tbl_location', '*', array('location_id' => $data['editcity']->parent_id))[0];

        $this->load->view('admin/managecity', $data);
    }

    public function editsubcategory() {
        $this->security();
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['category_id'] = $id;

        $data = [];

        if ($this->input->post('update')) {
            $this->form_validation->set_rules('main_category', '', 'required', array('required' => 'Please select Main Category.'));
            $this->form_validation->set_rules('sub_category', '', 'required|regex_match[/^[a-zA-Z -]+$/]', array('required' => 'Please Enter Sub Category.', 'regex_match' => 'Please Enter Valid Sub Category.'));

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

                    $result = $this->md->my_update('tbl_category', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-sub-category');
                    }
                } else {
                    $data['error'] = $this->input->post('sub_category') . ' Already Exist.';
                }
            }
        }
        $data['editsubcategory'] = $this->md->my_select('tbl_category', '*', $whh)[0];
        $data['main_category'] = $this->md->my_select('tbl_category', '*', array('label' => 'main category'));
        $data['sub_category'] = $this->md->my_query("SELECT s.* , m.name AS main_category FROM `tbl_category` AS m , `tbl_category` AS s WHERE m.`category_id` = s.`parent_id` AND s.`label` = 'sub category' ");
        $this->load->view('admin/managesubcategory', $data);
    }

    public function editpetacategory() {
        $this->security();
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['category_id'] = $id;

        $data = [];

        if ($this->input->post('update')) {

            $this->form_validation->set_rules('main_category', '', 'required', array('required' => 'Please select Main Category Name.'));
            $this->form_validation->set_rules('sub_category', '', 'required', array('required' => 'Please select Sub Category Name.'));
            $this->form_validation->set_rules('peta_category', '', 'required|regex_match[/^[a-zA-Z -]+$/]', array('required' => 'Please Enter Peta Category Name.', 'regex_match' => 'Please Enter Valid Peta Category Name.'));

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

                    $result = $this->md->my_update('tbl_category', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-peta-category');
                    }
                } else {
                    $data['error'] = $this->input->post('peta_category') . ' Already Exist.';
                }
            }
        }
        $data['editpetacategory'] = $this->md->my_select('tbl_category', '*', $whh)[0];
        $data['main_category'] = $this->md->my_select('tbl_category', '*', array('label' => 'main category'));
        $data['peta_category'] = $this->md->my_query("SELECT m.`name` AS main_category , s.name AS sub_category, p.* FROM `tbl_category` AS m , `tbl_category` AS s, `tbl_category` AS p WHERE m.`category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id`");
        $data['subcategorydata'] = $this->md->my_select('tbl_category', '*', array('category_id' => $data['editpetacategory']->parent_id))[0];

        $this->load->view('admin/managepetacategory', $data);
    }

}
