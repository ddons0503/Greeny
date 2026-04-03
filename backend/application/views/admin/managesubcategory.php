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
                        <li class="breadcrumb-item"><span>Category</span></li>
                        <li class="breadcrumb-item"><span>Sub Category</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <?php
                                if (isset($editsubcategory)) {
                                    ?>
                                    <div class="col-sm-12">
                                        <div class="element-wrapper">
                                            <h6 class="element-header">Edit Sub Category</h6>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="element-wrapper">
                                                        <div class="element-box">
                                                            <h5 class="form-header">Edit Sub Category</h5>
                                                            <form action="" method="post">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group ">
                                                                            <label for=""> Select Main Category</label>
                                                                            <select name="main_category" class="form-control <?php
                                                                            if (form_error('main_category')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>">
                                                                                <option value="">Select Main Category</option>
                                                                                <?php
                                                                                foreach ($main_category as $data) {
                                                                                    ?>
                                                                                    <option value="<?php echo $data->category_id; ?>"<?php
                                                                                    if (!isset($success) && set_select('main_category', $data->category_id)) {
                                                                                        echo set_select('main_category', $data->category_id);
                                                                                    } else {
                                                                                        if ($data->category_id == $editsubcategory->parent_id) {
                                                                                            echo 'selected';
                                                                                        }
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
                                                                                echo form_error('main_category');
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div><button type="submit" name="update" value="yes" class="btn btn-primary" style="margin-right:10px";>Edit</button>
                                                                            <button type="clear" class="btn m-b-5 mt-1 mb-0">Clear</button>
                                                                            <a href="<?php echo base_url('manage-sub-category') ?>" class="btn m-b-5 mt-1 mb-0">cancel</a>
                                                                        </div>
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
                                                                    <div class="col-lg-6">  
                                                                        <div class="form-group ">
                                                                            <label for="">Sub Category Name</label>
                                                                            <input name="sub_category" placeholder="Enter State Name" type="text" class="form-control <?php
                                                                            if (form_error('sub_category')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>"  value="<?php
                                                                                   if (!isset($success) && set_value('sub_category')) {
                                                                                       echo set_value('sub_category');
                                                                                   } else {
                                                                                       echo $editsubcategory->name;
                                                                                   }
                                                                                   ?>" >
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('sub_category');
                                                                                ?>
                                                                            </p>
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
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-sm-12">
                                        <div class="element-wrapper">
                                            <h6 class="element-header">Sub Category</h6>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="element-wrapper">
                                                        <div class="element-box">
                                                            <h5 class="form-header">Add Sub Category</h5>
                                                            <form action="" method="post">
                                                                <div class="row">
                                                                    <div class="col-md-6">


                                                                        <div class="form-group ">
                                                                            <label for=""> Select Main Category</label>
                                                                            <select name="main_category" class="form-control <?php
                                                                            if (form_error('main_category')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>">
                                                                                <option value="">Select Main Category</option>
                                                                                <?php
                                                                                foreach ($main_category as $data) {
                                                                                    ?>
                                                                                    <option value="<?php echo $data->category_id; ?>" <?php
                                                                                    if (!isset($success) && set_select('main_category', $data->category_id)) {
                                                                                        echo set_select('main_category', $data->category_id);
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
                                                                                echo form_error('main_category');
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div><button type="submit" name="add" value="yes" class="btn btn-primary" style="margin-right:10px";>Add</button>
                                                                            <button type="clear" class="btn m-b-5 mt-1 mb-0">Clear</button>
                                                                        </div>
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
                                                                    <div class="col-lg-6">  
                                                                        <div class="form-group ">
                                                                            <label for="">Sub Category Name</label>
                                                                            <input name="sub_category" placeholder="Enter State Name" type="text" class="form-control <?php
                                                                            if (form_error('sub_category')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>"  value="<?php
                                                                                   if (!isset($success) && set_value('sub_category')) {
                                                                                       echo set_value('sub_category');
                                                                                   }
                                                                                   ?>" >
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('sub_category');
                                                                                ?>
                                                                            </p>
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
                                <?php }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <div class="element-box">
                                            <div class="row">
                                                <div class="card-header col-8">
                                                    <h4>View All Sub Category</h4>
                                                </div>
                                                <div class="col-4" style="text-align:right;">
                                                    <button class="btn btn-danger" onclick="delete_record('sub_category', '<?php echo base64_encode(base64_encode(0)); ?>')" data-toggle="modal" data-target="#staticBackdrop" style="margin-top: 15px">Delete All Records</button>
                                                              </div>
                                            </div>
                                            </br>
                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr align="center" >
                                                            <th>No.</th>
                                                            <th>Country</th>
                                                            <th>State</th>
                                                            <th>Status</th>
                                                            <th>Remove</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($sub_category as $data) {
                                                            $i++;
                                                            ?>
                                                            <tr align="center">
                                                                <td style="vertical-align: middle"><?php echo $i; ?></td>
                                                                <td style="vertical-align: middle"><?php echo $data->main_category; ?></td>
                                                                <td style="vertical-align: middle"><?php echo $data->name; ?></td>
                                                                <td style="vertical-align: middle"><a href="<?php base_url() ?>edit-sub-category/<?php echo base64_encode(base64_encode($data->category_id)); ?>"><i class="fa fa-pencil" style="color: blue" data-toggle="tooltip"  data-placement="bottom" title="Edit" data-toggle="modal" data-target="#exampleModal" ></i></a></td>
                                                                <td style="vertical-align: middle"><a href="" onclick="delete_record('sub_category', '<?php echo base64_encode(base64_encode($data->category_id)); ?>')" data-toggle="modal" data-target="#staticBackdrop">
                                                                        <i class="fa fa-trash" style="color: red" data-toggle="tooltip"  data-placement="bottom" title="Remove" data-toggle="modal" data-target="#exampleModal" ></i>
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