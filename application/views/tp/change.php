
<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>

<div id="page-wrapper" >

    <div class="container-fluid" >

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Change existing Tour plan
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                    </li>
                    <li>
                        <a href="./landing">TourPlanner</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Change existing Tour plan
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form action="tourplan/change" method="POST">
                   <div class="form-group">
                   <?php if($_SESSION['role'] != 'MR'){
                            echo "<div class='form-group'>
                                  <label for='user_id'>User ID of the MR:- </label>
                                  <input type='text' class='form-control' id='user_id' name='user_id'>
                                </div>";
                            } ?>
                      <label for="month">Month:</label>
                      <input type="text" class="form-control" id="month" name="month">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Year:</label>
                      <input type="text" class="form-control" id="year" name="year">
                    </div>
                    <button  class="btn btn-primary">Proceed to change the tour plan</button>
                </form>
            </div> 
        </div>
        
        
        <!-- /.row -->
        
        <!-- Edit Popup -->
        <!-- Modal -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->



