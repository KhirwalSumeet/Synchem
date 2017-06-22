<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>
<script type="text/javascript">
    var app = angular.module("synchem", []);
</script>
        <div id="page-wrapper" ng-app="synchem">

            <div class="container-fluid" ng-controller="hierarchy">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View Hierarchial Structured Employee
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Hierarchy
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="alert alert-info col-sm-12" ng-repeat="x in data" ng-click="setnext(x.person_id)">
                    <div class="col-sm-2"> <strong>User Id : </strong> {{x.user_id}} </div>
                    <div class="col-sm-2"> <strong>HQ : </strong> {{x.HQ}} </div>
                    <div class="col-sm-2"> <strong>Person : </strong> {{x.person_id}} </div>
                    <div class="col-sm-2"> <strong>Head Id : </strong> {{x.head_id}} </div>
                </div>
                <div class="alert alert-danger col-sm-12" align="center" ng-click="setback()" id="back">
                    Back
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <script type="text/javascript">
            app.controller("hierarchy", function($scope) {
                $currentHead="";
                $headRole="";
                $currentUser="";
                $userRole="";
                var info;
                $scope.hy=[];
                $('#back').css("visibility","hidden");
                function set(data){
                    i=0;
                    if(data!= null){
                        $currentHead=data[i]["head_id"];
                        $headRole=data[i]["head_role"];
                        $scope.data=data;
                        $scope.hy.push(data);
                        $scope.$apply();
                    }
                        
                    
                }
                $scope.getperson = function (){
                    $.ajax
                    ({
                          type: "GET",
                          url: "http://localhost/Pharma/Admin/myhierarchy",
                          dataType: 'json',
                          async: true,
                          headers: {
                            "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                          },
                          success: function (data){
                            info=data["data"]["Hierarchy"]["children_node"];
                            set(info);
                            console.log(info);
                          }
                    });
                }
                $scope.getperson();

                $scope.setnext=function (person){
                    i=0;
                    while(i<$scope.data.length){
                        if($scope.data[i]["person_id"]== person){
                            if($scope.data[i]["children_node"]!=null){
                                $scope.hy.push($scope.data);
                                $scope.parent=$scope.data;
                                $scope.data=$scope.data[i]["children_node"];
                            }
                            console.log($scope.data);
                        }
                        i++;
                    }
                    $('#back').css("visibility","initial");
                }
                $scope.setback=function (){
                    $scope.data=$scope.parent;
                    $scope.hy.pop();
                    $scope.parent=$scope.hy[$scope.hy.length - 1];
                    if($scope.data[0]["role"]=="MSD"){
                        $('#back').css("visibility","hidden");
                    }else{

                        $('#back').css("visibility","initial");
                    }
                }
            });
        </script>