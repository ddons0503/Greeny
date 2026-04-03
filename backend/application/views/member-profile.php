<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="template" content="greeny" />
        <meta name="title" content="greeny - Ecommerce Food Store HTML Template" />
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online" />
        <title>Member Profile - greeny</title>


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
                                <div class="account-title">
                                    <h4>Member Profile</h4>
                                </div>
                                <div class="account-content">
                                    <form action="" method="post" enctype="multipart/form-data">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label class="form-label">Name</label>
                                                    <input class="form-control <?php
                                                    if (form_error('name')) {
                                                        echo 'invalid';
                                                    }
                                                    ?>" name="name" type="text" placeholder="Your Name" value="<?php
                                                           if (!isset($success) && set_value('name')) {
                                                               echo set_value('name');
                                                           } else {
                                                               echo $profile->name;
                                                           }
                                                           ?>">
                                                    <p class="errmsg">
                                                        <?php
                                                        if (form_error('name')) {
                                                            echo form_error('name');
                                                        }
                                                        ?>
                                                    </p>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label">Email</label>
                                                    <input class="form-control email <?php
                                                    if (form_error('email')) {
                                                        echo 'invalid';
                                                    }
                                                    ?>" name="email" type="text" placeholder="Your Email" value="<?php
                                                           echo $profile->email;
                                                           ?>">
                                                    <p class="errmsg">
                                                        <?php
                                                        if (form_error('email')) {
                                                            echo form_error('email');
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="row form-group mb-4">
                                                    <label class="form-label">Gender</label>
                                                    <div class="form-check col-6">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php
                                                        if (!isset($success) && set_select('gender', 'male')) {
                                                            echo 'checked';
                                                        } else {
                                                            if ($profile->gender == "male") {
                                                                echo "checked";
                                                            }
                                                        }
                                                        ?>>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-6">
                                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php
                                                        if (!isset($success) && set_select('gender', 'female')) {
                                                            echo 'checked';
                                                        } else {
                                                            if ($profile->gender == "female") {
                                                                echo "checked";
                                                            }
                                                        }
                                                        ?>>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Female
                                                        </label>
                                                    </div>
                                                    <p class="errmsg">
                                                        <?php
                                                        if (form_error('gender')) {
                                                            echo form_error('gender');
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="form-label">Phone Number</label>
                                                    <input class="form-control <?php
                                                    if (form_error('mobile')) {
                                                        echo 'invalid';
                                                    }
                                                    ?>" name="mobile" type="text" placeholder="Phone Number" value="<?php
                                                           if (!isset($success) && set_value('mobile')) {
                                                               echo set_value('mobile');
                                                           } else {
                                                               echo $profile->mobile;
                                                           }
                                                           ?>">
                                                    <p class="errmsg">
                                                        <?php
                                                        if (form_error('mobile')) {
                                                            echo form_error('mobile');
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="formrow-firstname-input" class="form-label">Birth Date</label>
                                                    <input name="birth_date"  type="date" class="form-control <?php
                                                    if (form_error('birth_date') || (isset($birth_date_err))) {
                                                        echo 'invalid';
                                                    }
                                                    ?>" id="formrow-firstname-input"  value="<?php
                                                           if (!isset($success) && set_value('birth_date')) {
                                                               echo set_value('birth_date');
                                                           } else {
                                                               echo $profile->birth_date;
                                                           }
                                                           ?>">
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('birth_date');
                                                        ?>
                                                    </p>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <button name="update" value="yes" class="form-btn-group" style="margin-right: 10px">Update</button>
                                                    <button type="button"  class="form-btn-group">Cancel</button>
                                                </div>
                                            </div>
                                            <?php
//                                                                    }
                                            ?>


                                            <div class="col-md-6">

                                                <center style="padding-top: 35px;padding-bottom: 35px;">
                                                    <?php
                                                    if (strlen($profile->profile_pic) > 0) {
                                                        ?>
                                                        <img class="rounded-circle" src="<?php echo base_url() . $profile->profile_pic; ?>" id="blah" style="width:250px;height: 250px;"/>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img class="rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" id="blah" style="width:250px;height: 250px;border-radius: 250px;"/>
                                                        <?php
                                                    }
                                                    ?>
                                                </center>

                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Select Profile</label>
                                                    <input class="form-control" name="profile" type="file" id="imgInp">
                                                </div>

                                                <div class="d-grid gap-2 col-6 mx-auto mt-3 pt5">
                                                    <button class="form-btn-group" type="submit" value="yes" name="change_profile">Change Now</button>
                                                </div>

                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>
        <!--        <div class="modal fade" id="contact-add">
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
                </div>-->

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
    </body>

</html> 