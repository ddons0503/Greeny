<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Member Address - greeny</title>


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
                <h2>Member Profile</h2> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Member</li>
                </ol>
            </div>
        </section>
        
            <?php
            $this->load->view('memberpic');
            ?>
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
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="account-title">
                                            <h4>Member Address</h4>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">


                                                <div class="form-group ">
                                                    <label>Name</label>
                                                    <input type="text" name="name"class="form-control <?php
                                                    if (form_error('name')) {
                                                        echo 'invalid';
                                                    }
                                                    ?>" placeholder="Enter Name" value="<?php
                                                           if (!isset($success) && set_value('name')) {
                                                               echo set_value('name');
                                                           } else if (isset($product_info)) {
                                                               echo $product_info->name;
                                                           }
                                                           ?>">
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('name');
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group ">
                                                    <label>Select Country</label>
                                                    <select name="country" onchange="set_combo('state', this.value)" class="form-control <?php
                                                    if (form_error('country')) {
                                                        echo 'invalid';
                                                    }
                                                    ?>">
                                                        <option value="">Select Country</option>
                                                        <?php
                                                        foreach ($country as $data) {
                                                            ?>
                                                            <option value="<?php echo $data->location_id; ?>" <?php
                                                            if (!isset($success) && set_select('country', $data->location_id)) {
                                                                echo set_select('country', $data->location_id);
                                                            }
                                                            ?> >
                                                                        <?php echo $data->name; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('country');
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group ">
                                                    <label>Select State</label>
                                                    <select name="state" id="state" onchange="set_combo('city', this.value)" class="form-control <?php
                                                    if (form_error('state')) {
                                                        echo 'invalid';
                                                    }
                                                    ?>">
                                                        <option value="">Select State</option>
                                                        <?php
                                                        if ($this->input->post('country')) {
                                                            $wh['parent_id'] = $this->input->post('country');
                                                            $records = $this->md->my_select('tbl_location', '*', $wh);
                                                            foreach ($records as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->location_id; ?>"  <?php
                                                                if (!isset($success) && set_select('state', $data->location_id)) {
                                                                    echo set_select('state', $data->location_id);
                                                                }
                                                                ?> >
                                                                            <?php echo $data->name; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('state');
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Select City</label>
                                                    <select name="city" id="city" class="form-control <?php
                                                    if (form_error('city')) {
                                                        echo 'invalid';
                                                    }
                                                    ?>">
                                                        <option value="">Select City</option>
                                                        <?php
                                                        if ($this->input->post('state')) {
                                                            $wh['parent_id'] = $this->input->post('state');
                                                            $records = $this->md->my_select('tbl_location', '*', $wh);
                                                            foreach ($records as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->location_id; ?>"  <?php
                                                                if (!isset($success) && set_select('city', $data->location_id)) {
                                                                    echo set_select('city', $data->location_id);
                                                                }
                                                                ?>>
                                                                            <?php echo $data->name; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('city');
                                                        ?>
                                                    </p> 
                                                </div>

                                                <div class="col-lg-4">
                                                    <button type="submit" name="add" value="yes" class="form-btn-group" style="margin-right: 10px">Add</button>
                                                    <button type="clear"  class="form-btn-group">clear</button>
                                                </div>
                                                <div>
                                                    <?php
                                                    if (isset($error)) {
                                                        ?>
                                                        </br>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <strong>Oops!</strong> <?php echo $error; ?>
                                                          
                                                        </div>
                                                        <?php
                                                    }

                                                    if (isset($success)) {
                                                        ?>
                                                        </br>
                                                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                                            <strong>Ok! </strong> <?php echo $success; ?>
                                                            
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>       
                                            </div>
                                            <div class="col-lg-6">  
                                                <div class="form-group ">
                                                    <label>Address Type</label></br>
                                                    <label>
                                                        <input type="radio" name="type" value="office" <?php
                                                        if (!isset($success) && set_radio('type', 'office')) {
                                                            echo set_radio('type', 'office');
                                                        }
                                                        ?>/> Office
                                                    </label> 
                                                    <label>
                                                        <input type="radio" name="type" value="home" <?php
                                                        if (!isset($success) && set_radio('type', 'home')) {
                                                            echo set_radio('type', 'home');
                                                        }
                                                        ?>/> Home
                                                    </label>
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('type');
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group ">
                                                    <label>Address</label>
                                                    <textarea name="address" class="form-control <?php
                                                    if (form_error('city')) {
                                                        echo 'invalid';
                                                    }
                                                    ?>"><?php
                                                                  if (!isset($success) && set_value('address')) {
                                                                      echo set_value('address');
                                                                  }
                                                                  ?></textarea>
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('address');
                                                        ?>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <h3>View All Address</h3>
                        <div class="row">
                            <div class="col-4" style="text-align:right;">
                                <!--<button class="btn btn-danger" onclick="delete_record('sub_category', '<?php echo base64_encode(base64_encode(0)); ?>')" data-toggle="modal" data-target="#staticBackdrop" style="margin-top: 15px">Delete All Records</button>-->
                                          </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered border-t0 w-100" >
                                    <thead>
                                        <tr align="center">
                                            <th class="wd-10p">No.</th>
                                            <th class="wd-15p">Name</th>
                                            <th class="wd-20p">Address Type</th>
                                            <th class="wd-20p">Address</th>
                                            <th class="wd-20p">City</th>
                                            <th class="wd-20p">State</th>
                                            <th class="wd-10p">Country</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($address as $data) {
                                            $i++;
                                            ?>
                                            <tr align="center">
                                                <td style="vertical-align: middle"><?php echo $i; ?></td>
                                                <td style="vertical-align: middle"><?php echo $data->name ?></td>
                                                <td style="vertical-align: middle"><?php echo $data->address_type ?></td>
                                                <td style="vertical-align: middle"><?php echo $data->address; ?></td>
                                                <?php
                                                $name = $this->md->my_query('SELECT c.`name` as country , s.`name` as state ,ct.`name` as city from `tbl_location` as c,`tbl_location` as s,`tbl_location` as ct where c.`location_id`  = s.`parent_id` and s.`location_id` = ct.`parent_id` and ct  .`location_id` =' . $data->location_id)[0];
                                                ?>
                                                <td style="vertical-align: middle"><?php echo $name->city ?></td>
                                                <td style="vertical-align: middle"><?php echo $name->state ?></td>
                                                <td style="vertical-align: middle"><?php echo $name->country ?></td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>

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
        <?php
        $this->load->view('footer');
        ?>
        <?php
        $this->load->view('footerjs');
        ?>
    </body>

</html> 