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
                        <li class="breadcrumb-item"><a  href="<?php echo base_url('admin-home'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><span>Setting</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Profile</h6>
                                        <div class="element-box" >
                                            <h5 class="form-header" >Change Profile</h5>

                                            <form method="post" action="" enctype="multipart/form-data">
                                                <center>
                                                    <?php
                                                    if (strlen($profile->profile_pic) > 0) {
                                                        ?>
                                                        <img src="<?php echo base_url() . $profile->profile_pic; ?>" id="blah" style="width:250px;height: 250px; border-radius: 250px;"/>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img  src="<?php echo base_url(); ?>admin_assets/img/blank useer.png" id="blah" style="width:250px;height: 250px; border-radius: 250px;"/>
                                                        <?php
                                                    }
                                                    ?>
                                                </center>
                                                <div class="col-lg-12">
                                                    <div class="card-body">
                                                        <div class="input-group mb-3">
                                                            <div class="custom-file">
                                                                <input type="file" name="profile" class="custom-file-input" id="imgInp" aria-describedby="inputGroupFileAddon01">
                                                                <label class="custom-file-label">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" value="yes" name="change_profile" class="btn btn-primary btn-block">Change Now</button>
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
                                                ?>

                                            </form>

                                        </div>
                                    </div>                                   
                                </div>
                            <div class="col-lg-6">
                                <div class="element-wrapper">
                                    <h6 class="element-header">Password</h6>
                                    <div class="element-box">
                                        <div class="card-body">
                                            <form action="" method="post">
                                                <div class="">
                                                    <div class="form-group">
                                                        <label>Current Password</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" name="ps" class="form-control" placeholder="**********" id="box" value="<?php
                                                            if (!isset($success) && set_value('ps')) {
                                                                echo set_value('ps');
                                                            }
                                                            ?>">                                                        
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye" id="eye" style="cursor: pointer"></i></span>
                                                            </div>
                                                        </div>
                                                        <label>New Password</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" name="nps" class="form-control <?php
                                                            if (form_error('nps')) {
                                                                echo 'invalid';
                                                            }
                                                            ?>" placeholder="**********" id="box1">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye" id="eye1" style="cursor: pointer"></i></span>
                                                            </div>
                                                        </div>
                                                        <p class="errmsg">
                                                            <?php
                                                            if (form_error('nps')) {
                                                                echo form_error('nps');
                                                            }
                                                            ?>
                                                        </p>
                                                        <label>Confirm Password</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" name="cps" class="form-control <?php
                                                            if (form_error('cps')) {
                                                                echo 'invalid';
                                                            }
                                                            ?>" placeholder="**********" id="box2">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye" id="eye2" style="cursor: pointer"></i></span>
                                                            </div>
                                                        </div>
                                                        <p class="errmsg">
                                                            <?php
                                                            if (form_error('cps')) {
                                                                echo form_error('cps');
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <button type="submit" name="change_ps" value="yes" class="btn btn-primary btn-block">Change Now</button><br/>
                                                <div>
                                                    <?php
                                                    if (isset($error)) {
                                                        ?>
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
                                                        <div class="alert alert-success   alert-dismissible fade show" role="alert">
                                                            <strong>Oops!</strong> <?php echo $success; ?>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="floated-colors-btn second-floated-btn">
                        <div class="os-toggler-w">
                            <div class="os-toggler-i">
                                <div class="os-toggler-pill"></div>
                            </div>
                        </div><span>Dark </span><span>Colors</span>
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
 <script>
                    $(function (e) {
                        $('#example').DataTable();
                    });
                </script>
                <script>
                    imgInp.onchange = evt => {
                        const [file] = imgInp.files
                        if (file) {
                            blah.src = URL.createObjectURL(file)
                        }
                    }
                </script>
</body>
</html>