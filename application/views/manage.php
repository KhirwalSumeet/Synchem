
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
                        <th>User Id</th>
                        <th>HQ</th>
                        <th>Person</th>
                        <th>Head</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="x in set">
                        <th id="{{x.user_id}}user">{{x.user_id}}</th>
                        <td id="{{x.user_id}}hq">{{x.HQ}}</td>
                        <td id="{{x.user_id}}person_name">{{x.person_name}} </td>
                        <td id="{{x.user_id}}person_id" style="display:none">{{x.person_id}} </td>
                        <td id="{{x.user_id}}head">{{x.head_id}}</td>
                        <th><button ng-click="edit(x.user_id)">Edit</button></th>
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
                                    <label class="control-label" for="inputSuccess">User id</label>
                                    <input type="text" class="form-control"  id="user" name="user" placeholder="Enter User id" value="{{user}}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">HQ</label>
                                    <input type="text" class="form-control" ng-model="hq" id="hq" name="hq" placeholder="Enter description" value="{{hq}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-1 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Person</label>
                                    <select class="form-control" ng-model="person" name="person" id="person">
                                        <option value="{{person_id}}">{{person_name}}</option>
                                        <option ng-repeat="x in persondata" value="{{x.person_id}}">{{x.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Head</label>
                                    <select class="form-control" ng-model="head" name="head" id="head">
                                        <option value="{{head_assigned}}">{{head_assigned}}</option>
                                        <option ng-repeat="x in headdata" value="{{x.user_id}}">{{x.user_id}}</option>
                                    </select>
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

    </div>
    <!-- /.container-fluid -->

</div>

<!-- /#page-wrapper -->
<script type="text/javascript">
    app.controller("manage", function($scope) {
        $scope.profile= <?php echo $_SESSION["profile"]; ?> ;
        $scope.head_profile= <?php echo $_SESSION["head_profile"]; ?> ;

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
                  url: "http://localhost/Pharma/"+$scope.profile+"/profiles/",
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
            $scope.user=$('#'+id+'user').html();
            $scope.hq=$('#'+id+'hq').html();
            $scope.person_id=$('#'+id+'person_id').html();
            $scope.person_name=$('#'+id+'person_name').html();
            $scope.head_assigned=$('#'+id+'head').html();
            $scope.head=$scope.head_assigned;
            $('#head').val($scope.head_assigned);
            $('#person').val($scope.person_id);
            $("#edit").modal('show');
        }

        $scope.getperson = function (){
            $.ajax
            ({
                  type: "GET",
                  url: "http://localhost/Pharma/Person/unassigned",
                  dataType: 'json',
                  async: true,
                  headers: {
                    "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                  },
                  success: function (data){
                    $scope.persondata=data["data"];
                  }
            });
        }
        $scope.headset = function (){
            $.ajax
            ({
                  type: "GET",
                  url: "http://localhost/Pharma/"+$scope.head_profile+"/Profiles",
                  dataType: 'json',
                  async: true,
                  headers: {
                    "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                  },
                  success: function (data){
                    $scope.headdata=data["data"];
                    $scope.$apply();
                  }
            });
        }
        $scope.getperson();
        $scope.headset();
        $scope.submit = function (){
                    //Submit code
                    $.ajax
                    ({
                          type: "POST",
                          url: "http://localhost/Pharma/"+$scope.profile+"/edit",
                          dataType: 'json',
                          async: false,
                          data: { "user_id": $scope.user, "HQ": $scope.hq, "person_id": $scope.person, "head_id": $scope.head},
                          headers: {
                            "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                          },
                          success: function (data){
                            console.log(data);
                            location.reload();
                          },
                          error: function (textStatus, errorThrown) {
                            console.log(textStatus);
                            console.log(errorThrown);
                          }
                    });
                }
    });
</script>



