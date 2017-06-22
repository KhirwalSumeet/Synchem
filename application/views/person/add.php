
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Fill Person Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add Person
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
                <form method="POST" action="process/add" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
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
                            <label class="control-label" for="inputSuccess">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                                <label>Gender</label><br>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="gender" id="gender" value="male" checked>Male
                                </div>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="gender" id="gender" value="female">Female
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-offset-1">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">DOB ( in DD-MM-YYYY ) format</label>
                            <input type="text" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth" required>
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