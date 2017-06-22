

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Upload Gifts Excel File
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add Gifts
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <form method="POST" action="ProcessBulkUpload" enctype="multipart/form-data">
                <div class="row">
                	<div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Upload Gifts file</label>
                            <input type="file" name="gifts" >
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