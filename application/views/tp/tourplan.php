


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
                    <li>
                        <a href="./show">View Tour plan</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i>Tour plan <?php echo $month."-".$year; ?>
                    </li>
                </ol>
            </div>
        </div>

        <div class="embed-responsive embed-responsive-4by3">
        <iframe class="embed-responsive-item" src="<?php echo base_url();?>tp/calendar?month=<?php echo $month_index; ?>&year=<?php echo $year; ?>"></iframe>
        </div>
        <!-- /.row -->
        
        <!-- Edit Popup -->
        <!-- Modal -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->



