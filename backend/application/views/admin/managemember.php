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
                        <li class="breadcrumb-item"><span>Pages</span></li>
                        <li class="breadcrumb-item"><span>Member</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Member</h6>
                                        <div class="element-box">
                                            <h5 class="form-header">View All Members</h5>

                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr align="center" >
                                                            <th>No.</th>
                                                            <th>Profile</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Register Date</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($member as $data) {
                                                            $i++;
                                                            ?>
                                                            <tr align="center">
                                                                <td style="vertical-align: middle"><?php echo $i ?></td>
                                                                <td>
                                                                    <?php
                                                                    if (strlen($data->profile_pic) > 0) {
                                                                        ?>
                                                                        <div class="avatar-w" data-toggle="tooltip" data-placement="bottom" >
                                                                            <a href="<?php echo base_url() . $data->profile_pic; ?>" target="_blank" >
                                                                                <img src="<?php echo base_url() . $data->profile_pic; ?>" style="width: 100px" title="<?php echo $data->name; ?>">
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <div class="avatar-w" data-toggle="tooltip" data-placement="bottom" >
                                                                            <a href="<?php echo base_url(); ?>/admin_assets/img/blank.png" target="_blank" >
                                                                                <img src="<?php echo base_url(); ?>/admin_assets/img/blank.png" style="width: 100px" title="<?php echo $data->name; ?>">
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="vertical-align: middle"><?php echo $data->name ?></td>
                                                                <td style="vertical-align: middle"><a href="mailto:<?php echo $data->email ?>"><?php echo $data->email ?></a></td>
                                                                <td style="vertical-align: middle"><?php echo $data->join_date ?></td>
                                                                <td style="vertical-align: middle" class="center hidden-xs">
                                                                    <a onclick="change_status('register', <?php echo $data->register_id; ?>)" id="status_<?php echo $data->register_id; ?>" data-toggle="tooltip" data-placement="bottom" title="Active">
                                                                        <?php
                                                                        if ($data->status == 1) {
                                                                            ?>
                                                                            <i class="fa fa-toggle-on fa-lg" style="color: green;cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Active"  ></i>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <i class="fa fa-toggle-off fa-lg" style="cursor: pointer;"></i>
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
                                                                <button type="button" class="btn btn-danger">Yes delete it !</button>
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