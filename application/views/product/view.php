
<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>
<script type="text/javascript">
var app = angular.module("synchem", []);
</script>
<div id="page-wrapper" ng-app="synchem">

    <div class="container-fluid"  ng-controller="addproduct">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Manage Products
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Manage Products
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
                        <th>Group</th>
                        <th>Pack</th>
                        <th>PTS</th>
                        <th>Scheme</th>
                        <th>In Practice?</th>
                        <th>Price</th>
                        <th>Remarks</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="x in set">
                        <th id="{{x.product_id}}name">{{x.product_name}}</th>
                        <td id="{{x.product_id}}group">{{x.product_group}}</td>
                        <td id="{{x.product_id}}pack">{{x.pack}}</td>
                        <td id="{{x.product_id}}pts">{{x.PTS}}</td>
                        <td id="{{x.product_id}}scheme">{{x.scheme}}</td>
                        <td id="{{x.product_id}}inp">{{x.in_practice}}</td>
                        <td id="{{x.product_id}}price">{{x.price}}</td>
                        <td id="{{x.product_id}}remarks">{{x.remarks}}</td>
                        <th><button ng-click="edit(x.product_id)">Edit</button></th>
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
                                    <label class="control-label" for="inputSuccess">Group</label>
                                    <input type="text" class="form-control" ng-model="group" id="group" name="group" placeholder="Enter description" value="{{group}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-1 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Price</label>
                                    <input type="text" class="form-control" ng-model="price" id="price" name="price" placeholder="Enter Price" value="{{price}}" required>
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4">
                                <div class="form-group">
                                        <label>In Practice ?</label>
                                        <select class="form-control" name="inp" ng-model="inp" id="inp">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-1 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">PTS</label>
                                    <input type="text" class="form-control" ng-model="pts" id="pts" name="pts" placeholder="Enter pts" value="{{pts}}" required>
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Pack</label>
                                    <input type="text" class="form-control" ng-model="pack" id="pack" name="pack" placeholder="Enter Pack" value="{{pack}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-1 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Scheme</label>
                                    <input type="text" class="form-control" ng-model="scheme" id="scheme" name="scheme" placeholder="Enter scheme" value="{{scheme}}" required>
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4">
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputSuccess">Remarks</label>
                                    <input type="text" class="form-control" ng-model="remarks" id="scheme" name="scheme" placeholder="Enter remarks" value="{{remarks}}" required>
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
    app.controller("addproduct", function($scope) {
        function set(data){
            $scope.set=data["data"];
            $scope.$apply();
        }
        $scope.getproducts = function (){
            $.ajax
            ({
                  type: "GET",
                  url: "http://localhost/Pharma/Products/list/",
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
        $scope.getproducts();

        $scope.edit= function(id){
            $scope.id=id;
            $scope.group=$('#'+id+'group').html();
            $scope.name=$('#'+id+'name').html();
            $scope.pts=$('#'+id+'pts').html();
            $scope.pack=$('#'+id+'pack').html();
            $scope.scheme=$('#'+id+'scheme').html();
            $scope.price=$('#'+id+'price').html();
            $scope.inp = $('#'+id+'inp').html();
            $scope.remarks = $('#'+id+'remarks').html();
            $("#inp").val($scope.inp);
            $("#edit").modal('show');
        }

        $scope.submit = function (){
                    //Submit code
                    $.ajax
                    ({
                          type: "POST",
                          url: "http://localhost/Pharma/Products/edit",
                          dataType: 'json',
                          async: false,
                          data: { "product_id": $scope.id, "product_name": $scope.name, "product_group": $scope.group, "in_practice": $scope.inp, "price": $scope.price, "PTS": $scope.pts, "pack":$scope.pack, "scheme":$scope.scheme, "remarks":$scope.remarks },
                          headers: {
                            "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                          },
                          success: function (data){
                            console.log(data);
                            $("#edit").modal('toggle');
                            $scope.getproducts();
                          },
                          error: function (textStatus, errorThrown) {
                            console.log(textStatus);
                            console.log(errorThrown);
                          }
                    });
                }
    });
</script>



