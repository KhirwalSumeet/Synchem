
<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>
<script type="text/javascript">
var app = angular.module("synchem", []);
</script>
<div id="page-wrapper" ng-app="synchem">

    <div class="container-fluid"  ng-controller="tp">

        <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            TourPlanner
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> TourPlanner Landing
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row" >
                    <div class="col-lg-12">
                        <a href="show" class="btn btn-primary">View your Tour Plan</a>
                        <a href="add" class="btn btn-primary">Add new Tour Plan</a>
                        <a href="update" class="btn btn-primary">Update status of Tour plan</a>
                        <a href="change" class="btn btn-primary">Change existing Tour plan</a>
                    </div>
                </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
   
</script>



