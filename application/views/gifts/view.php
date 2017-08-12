
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
                    Manage Gifts
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Manage Gifts
                    </li>
                </ol>
            </div>
        </div>
        
        <!-- /.row -->
        <div class="row col-lg-offset-2 col-lg-4"> 
        <br><br>   
            <table class="table table-hover ">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>In Practice?</th>
                        <th>Price</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="x in set">
                        <th id="{{x.id}}name">{{x.name}}</th>
                        <td id="{{x.id}}desc">{{x.description}}</td>
                        <td id="{{x.id}}inp">{{x.inp}}</td>
                        <td id="{{x.id}}price">{{x.price}}</td>
                        <th><button ng-click="edit(x.id)">Edit</button></th>
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
                        <h4 class="modal-title">Edit Product</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row" >
                            <div class="col-lg-offset-1 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Name</label>
                                    <input type="text" class="form-control" ng-model="name" id="name" name="name" placeholder="Enter Name" value="{{name}}" required>
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Description</label>
                                    <input type="text" class="form-control" ng-model="desc" id="desc" name="desc" placeholder="Enter description" value="{{desc}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-1 col-lg-4">
                                <div class="form-group">
                                        <label>In Practice ?</label>
                                        <select class="form-control" name="inp" ng-model="inp" id="inp">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Price</label>
                                    <input type="text" class="form-control" ng-model="price" id="price" name="price" placeholder="Enter Price" value="{{price}}" required>
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
    app.controller("addset", function($scope) {
        let data= { "data": [{"id" : "check", "name" : "Sumeet", "description" : "Sam", "inp" : "1", "price":"200"}]};
        function set(data){
            $scope.set=data["data"];
        }
        set(data);
        $scope.getgifts = function (){
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
                    // set(data);
                  }
            });
        }
        $scope.getgifts();

        $scope.edit= function(id){
            $scope.id=id;
            $scope.desc=$('#'+id+'desc').html();
            $scope.name=$('#'+id+'name').html();
            $scope.inp=$('#'+id+'inp').html();
            $scope.price=$('#'+id+'price').html();
            $("#inp").val($scope.inp);
            $("#edit").modal('show');
        }

        $scope.submit = function (){
                    //Submit code
                    $.ajax
                    ({
                          type: "POST",
                          url: "/Pharma/",
                          dataType: 'json',
                          async: false,
                          data: { "id": $scope.id, "name": $scope.name, "description": $scope.desc, "in_practice": $sscope.inp, "price": $scope.price },
                          headers: {
                            "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                          },
                          success: function (data){
                            window.reload();
                          }
                    });
                    $scope.getgifts();
                }
    });
</script>



