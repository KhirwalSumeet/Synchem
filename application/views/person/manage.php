
<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>
<script type="text/javascript">
var app = angular.module("synchem", []);
</script>
<div id="page-wrapper" ng-app="synchem">

    <div class="container-fluid"  ng-controller="manage">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Manage {{profile}}
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Manage {{profile}}
                    </li>
                </ol>
            </div>
        </div>
        
        <!-- /.row -->
        <div class="row col-lg-offset-2 col-lg-8"> 
        <br><br>   
            <table class="table table-hover ">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="x in set">
                        <td id="{{x.person_id}}name">{{x.name}} </td>
                        <td id="{{x.person_id}}email">{{x.email}} </td>
                        <td id="{{x.person_id}}phone">{{x.phone}} </td>
                        <td id="{{x.person_id}}DOB">{{x.DOB}} </td>
                        <td id="{{x.person_id}}sex">{{x.sex}} </td>
                        <th><button ng-click="edit(x.person_id)">Edit</button></th>
                        <th><button ng-click="disppassinp(x.person_id)">Change Password</button></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Edit Popup -->
        <!-- Modal -->
        <div id="edit" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit {{profile}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row" >
                            <div class="col-lg-offset-1 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Name</label>
                                    <input type="text" class="form-control"  ng-model="name" id="name" name="name" placeholder="Enter name" value="{{name}}">
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Email</label>
                                    <input type="text" class="form-control" ng-model="email" id="email" name="email" placeholder="Enter email" value="{{email}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-lg-offset-1 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Password</label>
                                    <input type="text" class="form-control"  ng-model="password" id="password" name="password" placeholder="Enter Password" value="{{password}}">
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">DOB</label>
                                    <input type="text" class="form-control" ng-model="dob" id="dob" name="dob" placeholder="Enter dob" value="{{dob}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-lg-offset-1 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Sex</label>
                                    <select class="form-control" ng-model="sex" name="sex" id="sex">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Phone</label>
                                    <input type="text" class="form-control"  ng-model="phone" id="phone" name="phone" placeholder="Enter Phone" value="{{phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-4 col-lg-4">
                            <br>
                                <button type="submit" ng-click="submit()" class="btn btn-success">Submit Button</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ChangePass Popup -->
        <!-- Modal -->
        <div id="changepass" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change Password</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row" >
                            <div class="col-lg-offset-1 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">New Password for {{passuser}}</label><br>
                                    <input type="text" class="form-control"  ng-model="newpass" placeholder="Enter password">
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Your Password</label><br><br>
                                    <input type="text" class="form-control"  ng-model="adminpass" placeholder="Enter password">
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-lg-offset-2 col-lg-8">
                                    <label class="control-label" for="inputSuccess">{{message}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-4 col-lg-4">
                            <br>
                                <button type="submit" ng-click="change()" class="btn btn-success">Change</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>

<!-- /#page-wrapper -->
<script type="text/javascript">
    app.controller("manage", function($scope) {
        function set(data){
            $scope.set=data["data"];
            manip(0);
            function manip(i){
                if(i<$scope.set.length){
                    id=$scope.set[i]["person_id"];
                    $.ajax
                    ({
                          type: "GET",
                          url: "http://localhost/Pharma/Person/info/person_id/"+id,
                          dataType: 'json',
                          async: true,
                          headers: {
                            "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                          },
                          success: function (data){
                            if(data["data"]!= null)
                                $scope.set[i]["person_name"]=data["data"]["name"];
                            else
                                $scope.set[i]["person_name"]="";
                            
                            i++;
                            manip(i);
                          },
                          error: function (data){
                          }
                    });
                }else 
                    $scope.$apply();
            }
        }
        $scope.getprofiles = function (){
            $.ajax
            ({
                  type: "GET",
                  url: "http://localhost/Pharma/Person/profiles/",
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
        $scope.getprofiles();

        $scope.edit= function(id){
            $scope.id=id;
            $scope.name=$('#'+id+'name').html();
            $scope.phone=$('#'+id+'phone').html();
            $scope.email=$('#'+id+'email').html();
            $scope.dob=$('#'+id+'DOB').html();
            $scope.sex1=$('#'+id+'sex').html();
            $('#sex').val($scope.sex1);
            $("#edit").modal('show');
        }
        $scope.submit = function (){
                    //Submit code
                    $.ajax
                    ({
                          type: "POST",
                          url: "http://localhost/Pharma/Person/edit",
                          dataType: 'json',
                          async: false,
                          data: { "person_id": $scope.id, "name": $scope.name, "phone": $scope.phone, "email": $scope.email,"DOB":$scope.dob, "sex": $scope.sex},
                          headers: {
                            "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                          },
                          success: function (data){
                            console.log(data);
                            //location.reload();
                          },
                          error: function (textStatus, errorThrown) {
                            console.log(textStatus);
                            console.log(errorThrown);
                          }
                    });
                }
        $scope.disppassinp=function(id){
            $scope.passid=id;
            $scope.passuser=$('#'+id+'name').html();
            $("#changepass").modal('show');
        }

        $scope.change=function(){
            $.ajax
            ({
                  type: "POST",
                  url: "http://localhost/Pharma/Person/passwordchange",
                  dataType: 'json',
                  async: false,
                  data: { "person_id": $scope.passid, "password": $scope.adminpass, "new_password": $scope.newpass},
                  headers: {
                    "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                  },
                  success: function (data){
                    console.log(data);
                    $scope.message=data["data"];
                    if($scope.message == "")
                        $scope.message=data["error"];
                    //location.reload();
                  },
                  error: function (textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                  }
            });
        }
    });
</script>



