
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Fill Chemist Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add Chemist
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <form method="POST" action="ProcessAddChemist" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Medical Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Medical Name" required>
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess" >Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-offset-1">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Office Phone</label>
                            <input type="text" class="form-control" id="office" name="office" placeholder="Enter phone number" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Probable Stockist</label>
                            <input type="text" class="form-control" id="Stockist" name="Stockist" placeholder="Enter Stockists">
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Shipping Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Station Name</label>
                            <input type="text" class="form-control" id="station" name="station" placeholder="Enter Station name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                                <label>Relation to doctor</label>
                                <select class="form-control" name="relation">
                                    <option>Owned by doctor</option>
                                    <option>Rented by doctor</option>
                                    <option>Nearby doctors</option>
                                    <option>Relatives</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Birthday</label>
                            <input type="text" class="form-control" id="office" name="bday" placeholder="Enter Birthday (DD/MM/YY)">
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Anniversary</label>
                            <input type="text" class="form-control" id="assistant" name="anniversary" placeholder="Enter Anniversary (DD/MM/YY)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                                <label>MR Core</label><br>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="mr" id="mr" value="1" checked>Yes
                                </div>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="mr" id="mr" value="0">No
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Contact Person Name</label>
                            <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Name" required>
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