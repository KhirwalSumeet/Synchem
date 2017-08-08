<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>
<script type="text/javascript">
    var app = angular.module("synchem", []);
</script>
        <div id="page-wrapper" ng-app="synchem">

            <div class="container-fluid" ng-controller="add">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Fill {{profile}} Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add {{profile}}
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
                            <label class="control-label" for="inputSuccess">User id</label>
                            <input type="text" class="form-control" id="user" name="user" placeholder="Enter User Id" required>
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess" >HQ</label>
                            <input type="text" class="form-control" id="hq" name="hq" placeholder="Enter hq" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-offset-1">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Person</label>
                            <select class="form-control" ng-model="person" name="person" id="person">
                                <option ng-repeat="x in set" value="{{x.person_id}}">{{x.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Head</label>
                            <select class="form-control" ng-model="head" name="head" id="head">
                                <option value="NULL" selected>None</option>
                                <option ng-repeat="x in headdata" value="{{x.user_id}}">{{x.user_id}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row col-lg-12">
                    <br><br>
                    <div id="btn">
                        <button type="submit" class="btn btn-success">Submit Button</button>
                        <button type="reset" class="btn btn-danger">Reset Button</button>
                    </div>
                    <span style="color:red" id="error">Please add persons firstly.</span>
                    <br><br><br>
                </div>
                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <script type="text/javascript">
            app.controller("add", function($scope) {
                $scope.profile= <?php echo $_SESSION["profile"]; ?> ;
                $scope.head_profile= <?php echo $_SESSION["head_profile"]; ?> ;
                $("#error").css("display","none");
                function set(data){
                    $scope.set=data["data"];
                    if($scope.set.length != 0)
                        $scope.person=$scope.set[0]["person_id"];
                    $scope.$apply();
                    if($scope.set.length==0){
                        $("#btn").css("display","none");
                        $("#error").css("display","block");
                    }
                }
                $scope.getperson = function (){
                    $.ajax
                    ({
                          type: "GET",
                          url: "/Pharma/Person/unassigned",
                          dataType: 'json',
                          async: true,
                          headers: {
                            "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                          },
                          success: function (data){
                            set(data);
                          }
                    });
                }
                $scope.head = function (){
                    $.ajax
                    ({
                          type: "GET",
                          url: "/Pharma/"+$scope.head_profile+"/activeProfiles",
                          dataType: 'json',
                          async: true,
                          headers: {
                            "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                          },
                          success: function (data){
                            $scope.headdata=data["data"];
                            $scope.head="NULL";
                            $scope.$apply();
                          }
                    });
                }
                $scope.getperson();
                $scope.head();
            });
        </script>