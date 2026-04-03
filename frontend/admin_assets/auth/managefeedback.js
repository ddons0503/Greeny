<!DOCTYPE html>
<html>


    <?php
    require_once 'headerlink.php'
    ?>

    <body class="menu-position-side menu-side-left full-screen with-content-panel">
        <div class="all-wrapper with-side-panel solid-bg-all">
            <div class="layout-w">


                <?php
                require_once 'sliderpanel.php'
                ?>   

                <div class="content-w">
                    <?php
                    require_once 'header.php'
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashbord.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><span>Pages</span></li>
                        <li class="breadcrumb-item"><span>Contact Us</span></li>
                    </ul>

                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Contacts Us</h6>
                                        <div class="element-box">
                                            <h5 class="form-header">View All Contacts</h5>

                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr align="center" >
                                                            <th>No.</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Mobile no</th>
                                                            <th>Subject</th>
                                                            <th>Message</th>
                                                            <th>Remove</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php 
                                                        for($i=1;$i<=50;$i++){
                                                        ?>
                                                        <tr align="center" >                     
                                                            <td><?php echo $i ?></td>
                                                            <td>heet</td>
                                                            <td>heetgoti74@gmail.com</td>
                                                            <td>9099750406</td>
                                                            <td>apple</td>
                                                            <td>An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.</td>
                                                            <td style="vertical-align: middle;">
                                                                <a href="" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-trash" style="color: red;" data-toggle="tooltip" data-placement="bottom" title="Remove" data-toggle="modal" data-target="#exampleModal"></i></a>
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
                                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ...
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Understood</button>
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
        require_once 'footerjs.php'
        ?>  
    </body>
</html>