
<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>
<script type="text/javascript">
var app = angular.module("synchem", []);
</script>
<div id="page-wrapper" ng-app="synchem">

    <div class="container-fluid"  ng-controller="addwcp">

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
                                <i class="fa fa-edit"></i> WCP Add
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <form method="POST" enctype="multipart/form-data">
                    
                        <table class="table table-bordered">
                            <tr>
                                <td>Sl No.</td>
                                <td>Core Type</td>
                                <td>D.O.T</td>
                                <td>Station</td>
                                <td>Set No.</td>
                                <td>Doctors Name</td>
                                <td>Qualification</td>
                                <td>1st Product</td>
                                <td>Sample UP</td>
                                <td>Sales UP</td>
                                <td>2nd Product</td>
                                <td>Sample UP</td>
                                <td>Sales UP</td>
                                <td>3rd Product</td>
                                <td>Sample UP</td>
                                <td>Sales UP</td>
                            </tr>
                            <tr ng-repeat="x in doctorList" id="{{x.doc_id}}">
                                
                                <td>{{$index+1}}</td>
                                <td>
                                    <select  class="type">
                                        <option>Core</option>
                                        <option>Non-core</option>
                                    </select>
                                </td>
                                <td></td>
                                <td>{{x.station_name}}</td>
                                <td>{{x.set_no}}</td>
                                <td>{{x.name}}</td>
                                <td>{{x.qualification}}</td>
                                <td>
                                    <select  class="product1">
                                        <option ng-repeat="y in productList" value="{{y.product_id}}">{{y.product_name}}</option>
                                    </select>
                                </td>
                                <td> <input type="number" class="sample_plan_unit1 form-control" value="0"></td>
                                <td> <input type="number" class="sale_plan_unit1 form-control" value="0"></td>
                                <td>
                                    <select  class="product2" >
                                        <option ng-repeat="y in productList" value="{{y.product_id}}">{{y.product_name}}</option>
                                    </select>
                                </td>
                                <td> <input type="number" class="sample_plan_unit2 form-control" value="0"></td>
                                <td> <input type="number" class="sale_plan_unit2 form-control" placeholder="Sales Unit Plan" value="0"></td>
                                <td>
                                    <select  class="product3">
                                        <option ng-repeat="y in productList" value="{{y.product_id}}">{{y.product_name}}</option>
                                    </select>
                                </td>
                                <td> <input type="number" class="sample_plan_unit3 form-control" value="0"></td>
                                <td> <input type="number" class="sale_plan_unit3 form-control" value="0"></td>
                            </tr>
                        </table>
                        <div class="row col-lg-6">
                <span style="color:red">{{message}}</span>
                    <br><br>
                    <button type="submit" class="btn btn-success" ng-click="submit()">Submit Button</button>
                    <button type="reset" class="btn btn-danger">Reset Button</button>
                    <br><br><br>
                </div>
                </form>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
    app.controller("addwcp", function($scope) {
        doctorList();
        function doctorList(){
            $.ajax
            ({
                type: "GET",
                url: "http://localhost/Pharma/doctor/profiles",
                dataType: 'json',
                async: true,
                headers: {
                "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                },
                success: function (data){
                    //console.log(data);
                    $scope.doctorList=data["data"];
                    productList();
                }
            });
        }
        function productList(){
            $.ajax
            ({
                type: "GET",
                url: "http://localhost/Pharma/products/activelist",
                dataType: 'json',
                async: true,
                headers: {
                "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                },
                success: function (data){
                    //console.log(data);
                    $scope.productList=data["data"];
                    $scope.$apply();
                }
            });
        }
        $scope.submit=function(){
            mydata=fetchdata();
            $.ajax({
                url:'http://localhost/Pharma/WCP/addWCP',
                data: JSON.stringify(mydata),
                type: 'POST',
                processData: false,
                contentType: 'application/json' ,
                headers: {
                "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                },
                success: function (data){
                    $scope.message=data["msg"];
                    if(data["status"]==200){
                        window.location.assign(view);
                    }
                }
            });
        }
        function fetchdata(){

            id=$scope.doctorList[0]["doc_id"];
            mydata=[];
            WCPList=[];
            $(".type").each(function() {
                mydata.push($(this).val());
            });
            $(".product1").each(function() {
                mydata.push($(this).val());
            });
            $(".sample_plan_unit1").each(function() {
                mydata.push($(this).val());
            });
            $(".sale_plan_unit1").each(function() {
                mydata.push($(this).val());
            });

            $(".product2").each(function() {
                mydata.push($(this).val());
            });
            $(".sample_plan_unit2").each(function() {
                mydata.push($(this).val());
            });
            $(".sale_plan_unit2").each(function() {
                mydata.push($(this).val());
            });

            $(".product3").each(function() {
                mydata.push($(this).val());
            });
            $(".sample_plan_unit3").each(function() {
                mydata.push($(this).val());
            });
            $(".sale_plan_unit3").each(function() {
                mydata.push($(this).val());
            });
            for(i=0;i<$scope.doctorList.length;i++){
                obj={};
                obj["type"]=mydata[i];
                obj["DOT"]="MR";
                obj["doc_id"]=$scope.doctorList[i]["doc_id"];
                var productList=[];
                for(j=0;j<3;j++){
                    product={};
                    product["product_id"]=mydata[(2*(3*j+1))+i];
                    product["sample_plan_unit"]=mydata[(2*(3*j+1))+2+i];
                    product["sale_plan_unit"]=mydata[(2*(3*j+1))+4+i];
                    productList.push(product);
                }
                obj["productList"]=productList;
                WCPList.push(obj);
            }
            data={};
            data["month"]= "<?php echo $_SESSION["wcp_month"];  ?>";
            data["year"]= "<?php echo $_SESSION["wcp_year"];  ?>";
            data["WCPList"]=WCPList;
            return data;
        }
    });
</script>



