
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Fill Gift Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add Gift
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <form method="POST" action="ProcessAddGifts" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Description</label>
                            <input type="text" class="form-control" id="name" name="desc" placeholder="Enter Description" required>
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
                        <div class="form-group">
                                <label>In Practice ?</label>
                                <select class="form-control" name="inp">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
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