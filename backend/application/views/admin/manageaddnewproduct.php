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
                        <li class="breadcrumb-item"><span>Product</span></li>
                        <li class="breadcrumb-item"><span>Add New Product</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <?php
                    if ($this->session->userdata('productform') == 1) {
                        ?>
                        <div class="content-i">
                            <div class="content-box">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="element-wrapper">
                                            <h6 class="element-header">Add Product Basic Details</h6>
                                            <form action="" method="post">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="element-wrapper">
                                                            <div class="element-box">
                                                                <div class="row">
                                                                    <div class="col-md-6">


                                                                        <div class="form-group ">
                                                                            <label  for="">Select Main Category</label>
                                                                            <select name="main_category" onchange="set_combo('sub_category', this.value)" class="form-control <?php
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
                                                                                    } else if (isset($product_info)) {
                                                                                        if ($product_info->main_id == $data->category_id) {
                                                                                            echo "selected";
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
                                                                        <div class="form-group ">
                                                                            <label for="">Select Sub Category</label>
                                                                            <select name="sub_category" onchange="set_combo('peta_category', this.value)" id="sub_category" class="form-control <?php
                                                                            if (form_error('sub_category')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>">
                                                                                <option value="">Select Sub Category</option>
                                                                                <?php
                                                                                if ($this->input->post('main_category')) {
                                                                                    $wh['parent_id'] = $this->input->post('main_category');
                                                                                    $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                                    foreach ($records as $data) {
                                                                                        ?>
                                                                                        <option value="<?php echo $data->category_id; ?>"  <?php
                                                                                        if (!isset($success) && set_select('sub_category', $data->category_id)) {
                                                                                            echo set_select('sub_category', $data->category_id);
                                                                                        }
                                                                                        ?>>
                                                                                                    <?php echo $data->name; ?>
                                                                                        </option>
                                                                                        <?php
                                                                                    }
                                                                                } else if (isset($product_info)) {
                                                                                    $wh['parent_id'] = $product_info->main_id;
                                                                                    $sub_category = $this->md->my_select('tbl_category', '*', $wh);
                                                                                    foreach ($sub_category as $data) {
                                                                                        ?>
                                                                                        <option value="<?php echo $data->category_id ?>" <?php
                                                                                        if (!isset($success) && set_select('sub_category', $data->category_id)) {
                                                                                            echo set_select('sub_category', $data->category_id);
                                                                                        } else {
                                                                                            if ($product_info->sub_id == $data->category_id) {
                                                                                                echo "selected";
                                                                                            }
                                                                                        }
                                                                                        ?> ><?php echo $data->name; ?></option>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                            </select>
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('sub_category');
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <label  for="">Select Peta Category</label>
                                                                            <select name="peta_category" id="peta_category" class="form-control <?php
                                                                            if (form_error('peta_category')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>">
                                                                                <option value="">Peta Category</option>
                                                                                <?php
                                                                                if ($this->input->post('sub_category')) {
                                                                                    $wh['parent_id'] = $this->input->post('sub_category');
                                                                                    $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                                    foreach ($records as $data) {
                                                                                        ?>
                                                                                        <option value="<?php echo $data->category_id; ?>"  <?php
                                                                                        if (!isset($success) && set_select('peta_category', $data->category_id)) {
                                                                                            echo set_select('peta_category', $data->category_id);
                                                                                        }
                                                                                        ?>>
                                                                                                    <?php echo $data->name; ?>
                                                                                        </option>
                                                                                        <?php
                                                                                    }
                                                                                } else if (isset($product_info)) {
                                                                                    $wh['parent_id'] = $product_info->sub_id;
                                                                                    $peta_category = $this->md->my_select('tbl_category', '*', $wh);
                                                                                    foreach ($peta_category as $data) {
                                                                                        ?>
                                                                                        <option value="<?php echo $data->category_id ?>" <?php
                                                                                        if (!isset($success) && set_select('peta_category', $data->category_id)) {
                                                                                            echo set_select('peta_category', $data->category_id);
                                                                                        } else {
                                                                                            if ($product_info->peta_id == $data->category_id) {
                                                                                                echo "selected";
                                                                                            }
                                                                                        }
                                                                                        ?> ><?php echo $data->name; ?></option>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                            </select>
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('peta_category');
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <label  for="">Product Description</label>
                                                                            <textarea id="editor1" name="description" class="form-control"><?php
                                                                                if (!isset($success) && set_value('description')) {
                                                                                    echo set_value('description');
                                                                                } else if (isset($product_info)) {
                                                                                    echo $product_info->description;
                                                                                }
                                                                                ?></textarea>
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('description');
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div >
                                                                            <button type="submit" name="next" value="yes" class="btn btn-primary" style="margin-right:10px";>Next <i class="fa fa-chevron-right"></i></button>
                                                                            <button type="clear" class="btn m-b-5 mt-1 mb-0">Clear</button>    
                                                                        </div>


                                                                    </div>
                                                                    <div class="col-lg-6">  
                                                                        <div class="form-group ">
                                                                            <label for="">Product Name</label>
                                                                            <input type="text" name="name"class="form-control <?php
                                                                            if (form_error('name')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>" placeholder="Enter Product Name" style="padding-top: 22px;padding-bottom: 22px;" value="<?php
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
                                                                            <label for="">Product Code</label>
                                                                            <input type="text" name="code" class="form-control <?php
                                                                            if (form_error('code')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>" placeholder="Enter Product Code" style="padding-top: 22px;padding-bottom: 22px;" value="<?php
                                                                                   if (!isset($success) && set_value('code')) {
                                                                                       echo set_value('code');
                                                                                   } else if (isset($product_info)) {
                                                                                       echo $product_info->code;
                                                                                   }
                                                                                   ?>">
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('code');
                                                                                ?>
                                                                            </p>
                                                                        </div>

                                                                        <div class="form-group ">
                                                                            <label  for="">Product Specification</label>
                                                                            <textarea id="editor2" name="specification"><?php
                                                                                if (!isset($success) && set_value('specification')) {
                                                                                    echo set_value('specification');
                                                                                } else if (isset($product_info)) {
                                                                                    echo $product_info->specification;
                                                                                }
                                                                                ?></textarea>
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('specification');
                                                                                ?>
                                                                            </p>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
                        <?php
                    } else if ($this->session->userdata('productform') == 2) {
                        ?>
                        <div class="content-i">
                            <div class="content-box">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="element-wrapper">
                                            <h6 class="element-header">Add Product Images Details</h6>
                                            <form method="post" action="" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="element-wrapper">
                                                            <div class="element-box">
                                                                <div class="row">
                                                                    <div class="col-md-6">


                                                                        <div class="form-group ">
                                                                            <label>Product Name</label>
                                                                            <input type="text" class="form-control" placeholder="Enter Product Name" disabled="" style="padding-top: 22px;padding-bottom: 22px;" value="<?php echo $product_info->name; ?>">
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <label>Product Unit</label>
                                                                            <select name="unit" class="form-control <?php
                                                                            if (form_error('unit')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>">
                                                                                <option value="" >Select Quantity</option>
                                                                                <option <?php
                                                                                if (!isset($imgsuccess) && set_select('unit', '100g')) {
                                                                                    echo set_select('unit', '100g');
                                                                                }
                                                                                ?>>100g</option>
                                                                                <option <?php
                                                                                if (!isset($imgsuccess) && set_select('unit', '250g')) {
                                                                                    echo set_select('unit', '250g');
                                                                                }
                                                                                ?>>250g</option>
                                                                                <option <?php
                                                                                if (!isset($imgsuccess) && set_select('unit', '500g')) {
                                                                                    echo set_select('unit', '500g');
                                                                                }
                                                                                ?>>500g</option>
                                                                                <option <?php
                                                                                if (!isset($imgsuccess) && set_select('unit', '1kg')) {
                                                                                    echo set_select('unit', '1kg');
                                                                                }
                                                                                ?>>1kg</option>
                                                                                <option <?php
                                                                                if (!isset($imgsuccess) && set_select('unit', '5kg')) {
                                                                                    echo set_select('unit', '5kg');
                                                                                }
                                                                                ?>>5kg</option>

                                                                                <option <?php
                                                                                if (!isset($imgsuccess) && set_select('unit', '10kg')) {
                                                                                    echo set_select('unit', '10kg');
                                                                                }
                                                                                ?>>10kg</option>
                                                                                <option <?php
                                                                                if (!isset($imgsuccess) && set_select('unit', '20kg')) {
                                                                                    echo set_select('unit', '20kg');
                                                                                }
                                                                                ?>>20kg</option>
                                                                                <option <?php
                                                                                if (!isset($imgsuccess) && set_select('unit', '50kg')) {
                                                                                    echo set_select('unit', '50kg');
                                                                                }
                                                                                ?>>50kg</option>
                                                                            </select>
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('unit');
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="form-group">
                                                                <label>Product Price</label>
                                                                <input type="text" name="price" class="form-control <?php
                                                                if (form_error('price')) {
                                                                    echo 'invalid';
                                                                }
                                                                ?>" placeholder="Enter Product price" style="padding-top: 22px;padding-bottom: 22px;" value="<?php
                                                                       if (!isset($imgsuccess) && set_value('price')) {
                                                                           echo set_value('price');
                                                                       }
                                                                       ?>">
                                                                <p class="errmsg">
                                                                    <?php
                                                                    echo form_error('price');
                                                                    ?>
                                                                </p>
                                                            </div>
                                                                        <div class="form-group ">
                                                                            <label>Product Quantity</label>
                                                                            <input type="text" name="qty" class="form-control <?php
                                                                            if (form_error('qty')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>" placeholder="Enter Product Quantity" style="padding-top: 22px;padding-bottom: 22px;" value="<?php
                                                                                   if (!isset($imgsuccess) && set_value('qty')) {
                                                                                       echo set_value('qty');
                                                                                   }
                                                                                   ?>">
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('qty');
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <button type="submit" name="previous" value="yes" class="btn btn-primary" style="margin-right:10px";><i class="fa fa-chevron-left"></i> Previous</button>
                                                                        <button type="submit" name="add_image" value="yes" class="btn btn-primary" style="margin-right:10px">Add</button>
                                                                        <button type="submit" name="finish" value="yes" class="btn btn-primary" style="margin-right:10px">Finish</button>
                                                                        <button type="reset" class="btn m-b-5 mt-1 mb-0">Clear</button>
                                                                        <div class="col-12">
                                                                            <?php
                                                                            if (isset($finish_error)) {
                                                                                ?>
                                                                                </br>
                                                                                <div class="alert alert-danger   alert-dismissible fade show" role="alert">
                                                                                    <strong>Oops!</strong> <?php echo $finish_error; ?>
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <?php
                                                                            } else if (isset($img_success)) {
                                                                                ?>
                                                                                </br>
                                                                                <div class="alert alert-success   alert-dismissible fade show" role="alert">
                                                                                    <strong>Oops!</strong> <?php echo $img_success; ?>
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <?php
                                                                            } else if (isset($img_error)) {
                                                                                ?>
                                                                                </br>
                                                                                <div class="alert alert-danger   alert-dismissible fade show" role="alert">
                                                                                    <strong>Oops!</strong> <?php echo $img_error; ?>
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
                                                                            <label>Choose Photo</label>
                                                                            <br/><br/>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="photo[]" class="custom-file-input" id="gallery-photo-add" multiple="" >
                                                                                <label class="custom-file-label">Choose file</label>
                                                                            </div>
                                                                            <div class="gallery">

                                                                            </div>
                                                                            <div>
                                                                                <?php
                                                                                if (isset($img_report)) {
                                                                                    ?>
                                                                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                                        <?php
                                                                                        $cc = 0;
                                                                                        foreach ($img_report as $msg) {
                                                                                            $cc++;
                                                                                            echo "<br/> $cc. $msg";
                                                                                        }
                                                                                        ?>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="display-type"></div>
        </div>
        <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript">CKEDITOR.replace("editor1");</script>
        <script type="text/javascript">CKEDITOR.replace("editor2");</script>
        <?php
        $this->load->view('admin/footerjs');
        ?>  
        <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript">CKEDITOR.replace("editor1");</script>
        <script type="text/javascript">CKEDITOR.replace("editor2");</script>
        <script>
            $(function (e) {
                $('#example').DataTable();
            });
        </script>
        <script>
            $(function () {
                // Multiple images preview in browser
                var imagesPreview = function (input, placeToInsertImagePreview) {

                    if (input.files) {
                        var filesAmount = input.files.length;

                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();

                            reader.onload = function (event) {
                                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                            }

                            reader.readAsDataURL(input.files[i]);
                        }
                    }

                };

                $('#gallery-photo-add').on('change', function () {
                    imagesPreview(this, 'div.gallery');
                });
            });
        </script>


    </body>
</html>