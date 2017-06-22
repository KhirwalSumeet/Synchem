

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Fill Product Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add Product
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php
                    if(isset($_GET['added'])){
                        echo '
                        <div class="row">
                            <div class="alert alert-success alert-dismissable fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Message : </strong> '.$_GET["message"].'
                            </div>
                        </div> ';
                    }
                ?>
                <form method="POST" action="ProcessAddProduct" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Product Group</label>
                            <input type="text" class="form-control" id="name" name="group" placeholder="Enter group" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Price</label>
                            <input type="number" class="form-control" id="name" name="price" placeholder="Enter price" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Scheme</label>
                            <input type="number" class="form-control" id="name" name="scheme" placeholder="Enter Scheme" >
                        </div>
                    </div>
                    <!-- <div class="col-lg-3">
                        <div class="form-group">
                                <label>In Practice ?</label>
                                <select class="form-control" name="inp">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                    </div> -->
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Pack</label>
                            <input type="text" class="form-control" id="name" name="pack" placeholder="Enter pack" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">PTS</label>
                            <input type="number" class="form-control" id="name" name="pts" placeholder="Enter PTS" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Remarks</label>
                            <input type="text" class="form-control" id="name" name="remarks" placeholder="Enter Remarks" >
                        </div>
                    </div>
                </div>
                <div class="row col-lg-12">
                    <br><br>
                    <button type="submit" class="btn btn-success">Submit Button</button>
                    <button type="reset" class="btn btn-danger">Reset Button</button>
                    <br><br><br>
                </div>
                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->