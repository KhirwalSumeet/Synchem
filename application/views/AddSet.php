<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>
<script type="text/javascript">
    var app = angular.module("synchem", []);
</script>
        <div id="page-wrapper" ng-app="synchem">

            <div class="container-fluid"  ng-controller="addset">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Sets
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Manage Sets
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row" >
                    <div class="col-lg-2">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Set Number</label>
                            <input type="text" class="form-control" id="set_no" name="name" placeholder="Enter Set Number" required>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-2">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Station Name</label>
                            <input type="text" class="form-control" id="station_name" name="name" placeholder="Enter Station Name" required>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-3">
                    <br>
                        <button type="submit" ng-click="submit()" class="btn btn-success">Submit Button</button>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row col-lg-offset-2 col-lg-4"> 
                <br><br>   
                    <table class="table table-hover ">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Set Number</th>
                                <th>Station Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="x in set">
                                <th>{{x.set_no}}</th>
                                <td>{{x.station_name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <script type="text/javascript">
            app.controller("addset", function($scope) {
                function set(data){
                    $scope.set=data["data"];
                    $scope.$apply();
                }
                $scope.getset = function (){
                    $.ajax
                    ({
                          type: "GET",
                          url: "/Pharma/index.php/MR/Set",
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
                $scope.getset();
                $scope.submit = function (){
                    set_no = $("#set_no").val();
                    station_name = $("#station_name").val();
                    //Submit code
                    alert("Submitted");
                    $.ajax
                    ({
                          type: "POST",
                          url: "/Pharma/index.php/MR/Set",
                          dataType: 'json',
                          async: false,
                          data: { "set_no":set_no, "station_name":station_name},
                          headers: {
                            "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                          },
                          success: function (data){
                            console.log(data); 
                          }
                    });
                    $scope.getset();
                }

            });
        </script>