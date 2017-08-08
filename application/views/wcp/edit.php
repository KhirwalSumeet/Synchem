<style type="text/css">
    .myinput{
        max-width:50px;
    }
</style>
<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>
<script type="text/javascript">
var app = angular.module("synchem", []);
</script>
<div id="page-wrapper" ng-app="synchem">

    <div class="container-fluid"  ng-controller="editwcp">

        <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit WCP 
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> WCP Edit
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-offset-2 col-lg-2">
                        <div class="form-group has-success">
                                <label>Choose Month</label><br>
                                <select class="form-control" name='month' ng-model="month">
                                    <option value="{{x}}" ng-repeat="x in monthList">{{x}}</option>
                                </select>  
                        </div>
                    </div>
                    <div class=" col-lg-2">
                        <div class="form-group has-success">
                                <label>Choose Year</label><br>
                                <select class="form-control" name='year' ng-model="year" >
                                    <option value="{{x}}" ng-repeat="x in yearList">{{x}}</option>
                                </select>  
                        </div>
                    </div>

                    <?php
                        if ($_SESSION["role"] != "MR") {
                            echo '
                                <div class=" col-lg-2">
                                    <div class="form-group has-success">
                                            <label>Choose MR</label><br>
                                            <select class="form-control" name="mrId" ng-model="mrId" >
                                                <option value="{{x.user_id}}" ng-repeat="x in mrList">{{x.user_id}}</option>
                                            </select>  
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                    <div class=" col-lg-1 form-group ">
                    <BR>
                        <button type="submit" class="btn btn-success " ng-click="permissions()">Submit button</button>
                    </div>
                    <div class=" col-lg-4 form-group ">
                    <bbr><br>
                        <span style="color:red"  class="form-group">{{message}}</span>
                    </div>
                </div>

                <!-- /.row -->
                <div class="row" id="wcp-data">
                    <form method="POST" enctype="multipart/form-data">
                        
                            <table class="table table-bordered col-sm-12" style= "background-color:white">
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
                                <tr ng-repeat="x in wcpList" id="{{x.doc_id.doc_id}}">
                                    <td style="display:none" id="pid1"> <input type="number" class="pid1 myinput" value="0"> </td>
                                    <td style="display:none" id="pid2"> <input type="number" class="pid2 myinput" value="0"> </td>
                                    <td style="display:none" id="pid3"> <input type="number" class="pid3 myinput" value="0"> </td>
                                    <td>{{$index+1}}</td>
                                    <td>
                                        <select  class="type">
                                            <option value="Core">Core</option>
                                            <option value="S Core">Non-core</option>
                                        </select>
                                    </td>
                                    <td>{{x.DOT}}</td>
                                    <td>{{x.doc_id.station_name}}</td>
                                    <td>{{x.set_no}}</td>
                                    <td>{{x.doc_id.name}}</td>
                                    <td>{{x.doc_id.qualification}}</td>
                                    <td id='product1'>
                                        <select  class="product1">
                                            <option ng-repeat="y in productList" value="{{y.product_id}}">{{y.product_name}}</option>
                                        </select>
                                    </td>
                                    <td id='sup1' > <input type="number" class="sample_plan_unit1 myinput" value="0"></td>
                                    <td id='spu1'> <input type="number" class="sale_plan_unit1 myinput" value="0"></td>
                                    <td id='product2'>
                                        <select  class="product2" >
                                            <option ng-repeat="y in productList" value="{{y.product_id}}">{{y.product_name}}</option>
                                        </select>
                                    </td>
                                    <td id='sup2'> <input type="number" class="sample_plan_unit2 myinput" value="0"></td>
                                    <td id='spu2'> <input type="number" class="sale_plan_unit2 myinput" placeholder="Sales Unit Plan" value="0"></td>
                                    <td id='product3'>
                                        <select  class="product3">
                                            <option ng-repeat="y in productList" value="{{y.product_id}}">{{y.product_name}}</option>
                                        </select>
                                    </td>
                                    <td id='sup3'> <input type="number" class="sample_plan_unit3 myinput" value="0"></td>
                                    <td id='spu3'> <input type="number" class="sale_plan_unit3 myinput" value="0"></td>
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

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
    app.controller("editwcp", function($scope) {
        
        $('#wcp-data').css('display','none');
        $scope.monthList =["January","February","March","April","May","June","July","August","September","October","November","December"]
        var d = new Date();
        $scope.month= $scope.monthList[d.getMonth()];
        $scope.year=d.getFullYear();
        $scope.yearList=[];
        for(i=$scope.year-3;i<$scope.year+3;i++){
            $scope.yearList.push(i);
        }
        $scope.month = 'January';
        var wcpData;
        $scope.permissions = function () {
            $.ajax
            ({
                  type: "POST",
                  url: "/Pharma/WCP/permissionedit",
                  dataType: 'json',
                  async: true,
                  headers: {
                    "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                  },
                  data: { "month":$scope.month, "year":$scope.year},
                  success: function (data){
                    $scope.message=data["msg"];
                    $scope.$apply();
                    if(data["status"]) {
                        <?php
                            if($_SESSION["role"] == "MR") {
                                echo '$scope.mrId = "'.$_SESSION['user_id'].'";';
                                echo 'getwcpwrap([ { user_id: "'.$_SESSION['user_id'].'"}]);';
                            } else {
                                echo '
                                    $.ajax
                                    ({
                                          type: "GET",
                                          url: "/Pharma/employee/myJuniors/user_role/MR",
                                          dataType: "json",
                                          async: true,
                                          headers: {
                                            "Authorization": "Bearer '. $_SESSION["access_token"] . '"
                                          },
                                          success: function (data){
                                            info = data["data"];
                                            getwcpwrap(info);
                                          }
                                    });
                                ';
                            }
                        ?>
                    }
                    doctorList();
                  }
            });
        }

        
        function doctorList(){
            $.ajax
            ({
                type: "GET",
                url: "/Pharma/doctor/profiles?mr_id="+ $scope.mrId,
                dataType: 'json',
                async: true,
                headers: {
                "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                },
                success: function (data){
                    console.log(data)
                    var obj = {};
                    for( i=0; i<data["data"].length; i++){
                        obj[ data["data"][i]["doc_id"] ] = {};
                        obj[ data["data"][i]["doc_id"] ]["doc_id"] = data["data"][i]["doc_id"];
                        obj[ data["data"][i]["doc_id"] ]["name"] = data["data"][i]["name"];
                        obj[ data["data"][i]["doc_id"] ]["station_name"] = data["data"][i]["station_name"];
                        obj[ data["data"][i]["doc_id"] ]["qualification"] = data["data"][i]["qualification"];
                    }
                    $scope.doctorData=obj;
                    productList();
                }
            });
        }
        
        function productList(){
            $.ajax
            ({
                type: "GET",
                url: "/Pharma/products/activelist",
                dataType: 'json',
                async: true,
                headers: {
                "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                },
                success: function (data){
                    $scope.productList=data["data"];
                    $scope.$apply();
                }
            });
        }

        mrList();
        function mrList(){
            $.ajax
            ({
                type: "GET",
                url: "/Pharma/MR/activeprofiles",
                dataType: 'json',
                async: true,
                headers: {
                "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                },
                success: function (data){
                    $scope.mrList = data["data"];
                    $scope.$apply();
                }
            });
        }

        var wcpList = [];
        function getwcpwrap(mrId) {
            $.ajax
            ({
                  type: "GET",
                  url: "/Pharma/WCP/WCPWrap?mr_id=" + mrId[ mrId.length - 1]["user_id"],
                  async: true,
                  headers: {
                    "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                  },
                  success: function (data){
                    wcpList.push.apply(wcpList, data["data"]);
                    mrId.pop();
                    if (mrId.length) {
                        getwcpwrap(mrId);
                    } else {
                        validate();
                    }
                  }
            });
        }

        function validate() {
            present = 0;
            for( i=0; i<wcpList.length; i++ ) {
                if( $scope.month == wcpList[i]["month"] && $scope.year == wcpList[i]["year"] && $scope.mrId == wcpList[i]["mr_id"]) {
                    present = 1;
                    id = wcpList[i]["wcp_wrap_id"];
                    status = wcpList[i]["approval_status"]; 
                    break;
                }
            }
            if(present) {
                $scope.message = '';
                if(status == 0){
                    $('#wcp-data').css('display','block');
                    getwcp(id);
                }
                else{
                    $scope.message = "WCP has been approved and cannot be edited ";
                    $scope.$apply();
                }

            } else {
                $('#wcp-data').css('display','none');
                $scope.message = "WCP not present for "+ $scope.month + " " + $scope.year;
                $scope.$apply();
            }
        }

        function getwcp(id) {
            $.ajax
            ({
                type: "GET",
                url: "/Pharma/WCP/WCP?wcp_wrap_id="+id,
                async: true,
                headers: {
                    "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                },
                success: function (data){
                    wcpData = data["data"]["WCP_Wrap"];
                    for( i=0; i<wcpData["WCP_list"].length; i++){
                        wcpData["WCP_list"][i][ 'doc_id' ] = $scope.doctorData[ wcpData["WCP_list"][i][ 'doc_id' ] ];
                    }
                    if(wcpData["approval_status"] == 0)
                       wcpData["approval_status"] = "No";
                    else
                        wcpData["approval_status"] = "Yes"; 
                    $scope.wcpData = wcpData;
                    $scope.wcpList = wcpData['WCP_list'];
                    $scope.$apply();
                    for( i=0; i<wcpData["WCP_list"].length; i++){
                        doc_id = wcpData["WCP_list"][i][ 'doc_id' ]['doc_id'];
                        temp = wcpData["WCP_list"][i][ 'product_list' ];
                        for( j=1; j<temp.length+1; j++) {
                            $('#'+doc_id).find('#sup'+j).find('input').val(temp[j-1]['sample_plan_unit']);
                            $('#'+doc_id).find('#spu'+j).find('input').val(temp[j-1]['sale_plan_unit']);
                            $('#'+doc_id).find('#product'+j).find('select').val(temp[j-1]['product_id']);
                            $('#'+doc_id).find('#pid'+j).find('input').val(temp[j-1]['p_id']);
                        }
                    }

                }
            });
        }

        $scope.submit = function(){
            mydata = fetchdata();
            $.ajax({
                url:'/Pharma/WCP/editWCP',
                data: JSON.stringify(mydata),
                type: 'POST',
                processData: false,
                contentType: 'application/json' ,
                headers: {
                "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                },
                success: function (data){
                    window.location.assign('manage?msg=WCP edited successfully');
                }, 
                error: function (data){
                    console.log(error);
                    console.log(data);
                }
            });
        }

        function fetchdata(){
            $scope.doctorList = [];
            $scope.wcpList.forEach( function( value ){
                $scope.doctorList.push( value['doc_id'] );
            })
            id = $scope.doctorList[0]["doc_id"];
            mydata = [];
            WCPList = [];
            type = [];
            smpu = [];
            productData = [];
            pid = [];
            slpu = [];
            $(".type").each(function() {
                type.push($(this).val());
            });
            $(".product1").each(function() {
                productData.push($(this).val());
            });
            $(".sample_plan_unit1").each(function() {
                smpu.push($(this).val());
            });
            $(".sale_plan_unit1").each(function() {
                slpu.push($(this).val());
            });
            $(".pid1").each(function() {
                pid.push($(this).val());
            });

            $(".product2").each(function() {
                productData.push($(this).val());
            });
            $(".sample_plan_unit2").each(function() {
                smpu.push($(this).val());
            });
            $(".sale_plan_unit2").each(function() {
                slpu.push($(this).val());
            });
            $(".pid2").each(function() {
                pid.push($(this).val());
            });

            $(".product3").each(function() {
                productData.push($(this).val());
            });
            $(".sample_plan_unit3").each(function() {
                smpu.push($(this).val());
            });
            $(".sale_plan_unit3").each(function() {
                slpu.push($(this).val());
            });
            $(".pid3").each(function() {
                pid.push($(this).val());
            });
            var indexCount = $scope.doctorList.length;
            for(i=0;i<$scope.doctorList.length;i++){
                obj={};
                obj["type"]=type[i];
                obj["DOT"]="MR";
                obj["doc_id"]=$scope.doctorList[i]["doc_id"];
                obj["WCP_wrap_id"] =  $scope.wcpData.wcp_wrap_id;
                obj["WCP_id"] =  $scope.wcpList[i].WCP_id;
                var productList=[];
                for(j=0;j<3;j++){
                    product={};
                    product["product_id"]=productData[i+indexCount*j];
                    product["sample_plan_unit"]=smpu[i+indexCount*j];
                    product["sale_plan_unit"]=slpu[i+indexCount*j];
                    product["p_id"]=pid[i+indexCount*j]
                    productList.push(product);
                }
                obj["productList"]=productList;
                WCPList.push(obj);
            }
            data={};
            data["month"]= $scope.wcpData.month;
            data["year"]= $scope.wcpData.year;
            data["WCPList"]=WCPList;
            data["wcp_wrap_id"] =  $scope.wcpData.wcp_wrap_id;
            data["mr_id"] =  $scope.wcpData.mr_id;
            return data;
        }
    });
</script>



