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
                        <li class="breadcrumb-item"><span>Banner</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Banners</h6>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="element-wrapper">
                                                    <div class="element-box">
                                                        <h5 class="form-header">Add New Banner</h5>
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-md-6">

                                                                    <div class="form-group ">
                                                                        <label for="">Title</label>
                                                                        <input type="text" name="title" placeholder="Enter Title" class=" form-control <?php
                                                                        if (form_error('title')) {
                                                                            echo 'invalid';
                                                                        }
                                                                        ?>"  value="<?php
                                                                               if (!isset($success) && set_value('title')) {
                                                                                   echo set_value('title');
                                                                               }
                                                                               ?>" >
                                                                        <p class="errmsg">
                                                                            <?php
                                                                            echo form_error('title');
                                                                            ?>
                                                                        </p>
                                                                    </div>

                                                                    <div class="form-group ">
                                                                        <label for=""> Sub Title</label>
                                                                        <input type="text" name="subtitle" placeholder="Enter SubTitle"class=" form-control <?php
                                                                        if (form_error('subtitle')) {
                                                                            echo 'invalid';
                                                                        }
                                                                        ?>"  value="<?php
                                                                               if (!isset($success) && set_value('subtitle')) {
                                                                                   echo set_value('subtitle');
                                                                               }
                                                                               ?>" >
                                                                        <p class="errmsg">
                                                                            <?php
                                                                            echo form_error('subtitle');
                                                                            ?>
                                                                        </p>
                                                                    </div>


                                                                    <div >
                                                                        <button type="submit" name="add" value="yes" class="btn btn-primary" style="margin-right:10px";>Add</button>
                                                                        <button type="clear" class="btn m-b-5 mt-1 mb-0">Clear</button>
                                                                    </div>


                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <center>
                                                                        <div class="card-body">
                                                                            <div class="input-group mb-3">
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="banner" class="custom-file-input" id="imgInp" aria-describedby="inputGroupFileAddon01">
                                                                                    <label class="custom-file-label">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                            <img id="blah" style="width: 300px"/>
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div>
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
                                                                        if (isset($success)) {
                                                                            ?>
                                                                            </br>
                                                                            <div class="alert alert-success   alert-dismissible fade show" role="alert">
                                                                                <strong>Ok!</strong> <?php echo $success; ?>
                                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="element-wrapper">
                                                    <div class="element-box">
                                                        <div class="row">
                                                            <div class="card-header col-8">
                                                                <h4>View All Countries</h4>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                                <thead>
                                                                    <tr align="center" >
                                                                        <th>No.</th>
                                                                        <th>Title</th>
                                                                        <th>Sub-title</th>
                                                                        <th>Banner</th>
                                                                        <th>Status</th>
                                                                        <th>Remove</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <?php
                                                                    $i = 0;
                                                                    foreach ($banner as $data) {
                                                                        $i++;
                                                                        ?>
                                                                        <tr align="center">
                                                                            <td style="vertical-align: middle"><?php echo $i ?></td>
                                                                            <td style="vertical-align: middle"><?php echo $data->title; ?></td>
                                                                            <td style="vertical-align: middle"><?php echo $data->subtitle; ?></td>
                                                                            <td style="vertical-align: middle"><a href="<?php echo base_url() . $data->path; ?>" target="_blank" ><img src="<?php echo base_url() . $data->path; ?>" height="150" width="150" /></td>
                                                                            <td style="vertical-align: middle" class="center hidden-xs">
                                                                                <a onclick="change_status('banner', <?php echo $data->banner_id; ?>)" id="status_<?php echo $data->banner_id; ?>" data-toggle="tooltip" data-placement="bottom" title="Active">
                                                                                    <?php
                                                                                    if ($data->status == 1) {
                                                                                        ?>
                                                                                        <i class="fa fa-toggle-on" style="color: green;cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Active"  ></i>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                        <i class="fa-solid fa-toggle-off" style="cursor: pointer;"></i>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </a>
                                                                            </td>                                                                            <td style="vertical-align: middle"><a href="" onclick="delete_record('banner', '<?php echo base64_encode(base64_encode($data->banner_id)); ?>')" data-toggle="modal" data-target="#staticBackdrop">
                                                                                    <i class="fa fa-trash" style="color: red" data-toggle="tooltip"  data-placement="bottom" title="Remove" ></i>
                                                                                </a></td>
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
                                                                            <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-warning " style="color:red"></i>Confirmation</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure want to delete ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-defult" data-dismiss="modal">No cancel it ?</button>
                                                                            <a id="delete_link" class="btn btn-danger">Yes delete it !</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
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