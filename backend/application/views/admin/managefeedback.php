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
                        <li class="breadcrumb-item"><span>Feedback</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Feedback</h6>
                                        <div class="element-box">

                                            <div class="row">
                                                <div class="card-header col-8">
                                                    <h4>View All Feedbacks</h4>
                                                </div>
                                                <div class="col-4" style="text-align:right;">
                                                    <button class="btn btn-danger" onclick="delete_record('feedback', '<?php echo base64_encode(base64_encode(0)); ?>')" data-toggle="modal" data-target="#staticBackdrop" style="margin-top: 15px">Delete All Records</button>
                                                              </div>
                                            </div>       
                                            </br>

                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr align="center" >
                                                            <th style="width: 100px">No.</th>
                                                            <th style="width: 200px">Name</th>  
                                                            <th>Message</th>
                                                            <th>Remove</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($feedback as $data) {
                                                            $i++;
                                                            ?>
                                                            <tr align="center" >                     
                                                                <td><?php echo $i ?></td>
                                                                <td><?php echo $data->name ?></td>
                                                                <td><?php echo $data->message ?></td>
                                                                <td style="vertical-align: middle;">
                                                                    <a href="" onclick="delete_record('feedback', '<?php echo base64_encode(base64_encode($data->feedback_id)); ?>')"     data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-trash" style="color: red;" data-toggle="tooltip" data-placement="bottom" title="Remove" data-toggle="modal" data-target="#exampleModal"></i></a>
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
                                                                <a id="delete_link" class="btn btn-danger">Yes, Delete It!</a>

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