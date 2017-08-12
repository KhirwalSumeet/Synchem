
<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>
<script type="text/javascript">
var app = angular.module("synchem", []);
</script>
<div id="page-wrapper" ng-app="synchem">

    <div class="container-fluid"  ng-controller="wcp">

        <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add WCP
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> WCP Landing
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-offset-2 col-lg-1">
                        <div class="form-group has-success">
                                <label>Choose Month</label><br>
                                <select class="form-control" ng-model="month">
                                    <option value="{{x}}" ng-repeat="x in monthList">{{x}}</option>
                                </select>  
                        </div>
                    </div>
                    <div class=" col-lg-1">
                        <div class="form-group has-success">
                                <label>Choose Year</label><br>
                                <select class="form-control" ng-model="year" >
                                    <option value="{{x}}" ng-repeat="x in yearList">{{x}}</option>
                                </select>  
                        </div>
                    </div>
                </div>
                <div class="row col-lg-offset-2 col-lg-6">
                <span style="color:red">{{message}}</span>
                    <br><br>
                    <button type="submit" class="btn btn-success" ng-click="permissions()">Submit Button</button>
                    <button type="reset" class="btn btn-danger">Reset Button</button>
                    <br><br><br>
                </div>
                </form>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
    app.controller("wcp", function($scope) {
        $scope.monthList =["January","February","March","April","May","June","July","August","September","October","November","December"]
        var d = new Date();
        $scope.month= $scope.monthList[d.getMonth()];
        $scope.year=d.getFullYear();
        $scope.yearList=[];
        for(i=$scope.year-3;i<$scope.year+3;i++){
            $scope.yearList.push(i);
        }
        $scope.permissions=function(){
            $.ajax
            ({
                  type: "POST",
                  url: "/Pharma/WCP/permissionadd",
                  dataType: 'json',
                  async: true,
                  headers: {
                    "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                  },
                  data: { "month":$scope.month, "year":$scope.year},
                  success: function (data){
                    $scope.message=data["msg"];
                    $scope.$apply();
                    if(data["status"]){
                        window.location.assign("add?month="+$scope.month+"&&year="+$scope.year);
                    }
                  }
            });
        }
    });
</script>



