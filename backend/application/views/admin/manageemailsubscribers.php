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
                        <li class="breadcrumb-item"><span>Email Subscribers</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <form action="" method="post">
                        <div class="content-i">
                            <div class="content-box">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="element-wrapper">
                                            <h6 class="element-header">Email Subscribers</h6>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="element-wrapper">
                                                        <div class="element-box">
                                                            <h5 class="form-header">View All Email Subscribers</h5>

                                                            <div class="table-responsive">
                                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                                    <thead>
                                                                        <tr align="center" >
                                                                            <th><input type="checkbox"></th>
                                                                            <th>Email</th>  
                                                                            <th>Remove</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        <?php
                                                                        foreach ($subscriber as $data) {
                                                                            ?>
                                                                            <tr>
                                                                                <td class="center hidden-xs">
                                                                                    <input type="checkbox" name="receiver[]" 
                                                                                           value="<?php echo $data->email; ?>">
                                                                                </td>
                                                                                <td><?php echo $data->email; ?></td>
                                                                                <td style="vertical-align: middle" class="center hidden-xs"><a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash" style="color: red" data-toggle="tooltip" data-placement="bottom" title="Remove" data-toggle="modal" data-target="#exampleModal"  ></i></a></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
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
                                                <div class="col-lg-6">
                                                    <div class="element-wrapper">
                                                        <div class="element-box">

                                                            <h5 class="form-header">Send Email</h5>
                                                            <div class="form-group ">
                                                                <label  for=""> Subject</label>
                                                                <input type="text" name="subject" placeholder="Enter Subject"
                                                                       class="form-control" value="<?php
                                                                       if (!isset($success) && set_value('subject')) {
                                                                           echo set_value('subject');
                                                                       }
                                                                       ?>"><br />
                                                                <p class="errmsg">
                                                                    <?php
                                                                    echo form_error('subject');
                                                                    ?>
                                                                </p>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label for=""> Message</label>
                                                                <textarea name="message" id="editor1"><?php
                                                                    if (!isset($success) && set_value('message')) {
                                                                        echo set_value('message');
                                                                    }
                                                                    ?></textarea>
                                                                <p class="errmsg">
                                                                    <?php
                                                                    echo form_error('message');
                                                                    ?>
                                                                </p>
                                                            </div>

                                                            <div >
                                                                <button class="btn btn-primary" name="send" value="yes">Send Email</button>
                                                                <button class="btn btn-defult" type="reset">Clear</button>
                                                                <?php
                                                                echo "</br>";
                                                                if (isset($error)) {
                                                                    ?>
                                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <strong>Oops!</strong> <?php echo $error; ?>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                if (isset($success)) {
                                                                    ?>
                                                                    <div class="alert alert-success alert-dismissible" role="alert">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <strong>Okay!</strong> <?php echo $success; ?>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
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
                    </form>
                </div>


            </div>
        </div>
        <div class="display-type"></div>
    </div>
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <script type="text/javascript">
        CKEDITOR.replace("editor1");
    </script>

    <?php
    $this->load->view('admin/footerjs');
    ?>  

</body>
</html>