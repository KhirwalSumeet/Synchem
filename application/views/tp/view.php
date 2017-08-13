
<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>
<script type="text/javascript">
var app = angular.module("synchem", []);
</script>
<div id="page-wrapper" ng-app="synchem">

    <div class="container-fluid"  ng-controller="showtp">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    View Tour plan
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                    </li>
                    <li>
                        <a href="./landing">TourPlanner</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> View Tour plan
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form action="tourplan" method="POST">
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
                    <button href="change" class="btn btn-primary">Show</button>
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



