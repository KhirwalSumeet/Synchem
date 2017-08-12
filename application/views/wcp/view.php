
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
                            Get WCP Details
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

                <div class="alert alert-success">
                    <strong>{{msg}}</strong>
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
                        <button type="submit" class="btn btn-success " ng-click="validate()">Submit button</button>
                    </div>
                    <div class=" col-lg-4 form-group ">
                    <bbr><br>
                        <span style="color:red"  class="form-group">{{message}}</span>
                    </div>
                </div>
                <hr>
                <div id ="wcp-data">
                    <h3> WCP for {{ wcpData.month }} {{ wcpData.year }} </h3> <h5> Approval status : <b>{{ wcpData.approval_status }} </b>  </h5>
                    <br>
                    <table class="table table-hover table-condensed" style= "background-color:white">
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
                            <tr ng-repeat="x in wcpList">
                                
                                <td> {{$index+1}} </td>
                                <td> {{x.type}} </td>
                                <td> {{x.DOT}} </td>
                                <td> {{x.doc_id.station_name}} </td>
                                <td> {{x.doc_id.station_name}} </td>
                                <td> {{x.doc_id.name}} </td>
                                <td> {{x.doc_id.qualification }} </td>
                                <td ng-repeat="y in x.products"> {{y}} </td>
                            </tr>
                        </table>
                        <?php 
                            if ($_SESSION["role"] != "MR") {
                                echo '
                                    <button class="btn-warning btn approve" ng-click="approve()">Approve</button> 
                                ';
                            }
                        ?>
                        <br>
                        <div class="alert alert-warning">
                            <strong>{{wcpmsg}}</strong>
                        </div>

                </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
    app.controller("wcp", function($scope) {
        <?php
            if($_SESSION["role"]=="MR") {
                echo '$scope.mrId = "'.$_SESSION['user_id'].'";';
                echo 'doctorList();';
                echo 'getWCPList([{ user_id:"'.$_SESSION['user_id'].'"}]);';
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
                            console.log(data)
                            info = data["data"];
                            getWCPList(info);
                          }
                    });
                ';
            }
        ?>
        $('#wcp-data').css('display','none');
        $('.alert-success').css('display','none');
        $('.alert-warning').css('display','none');
        var url = window.location.href;
        url = url.split("=");
        if( url.length > 1 ){
            var msg = url[1].split("%20").join(" ");
            $('.alert-success').css('display','block');
            $scope.msg = msg;

        }
        $scope.doctorData = {};
        $scope.monthList =["January","February","March","April","May","June","July","August","September","October","November","December"]
        var d = new Date();
        $scope.month= $scope.monthList[d.getMonth()];
        $scope.year=d.getFullYear();
        $scope.yearList=[];
        for(i=$scope.year-3;i<$scope.year+3;i++){
            $scope.yearList.push(i);
        }

        $scope.month = 'January';
        var wcpList = [];
        productList();
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
        function getWCPList(mrId) {
            $.ajax
            ({
                  type: "GET",
                  url: "/Pharma/WCP/WCPWrap?mr_id=" + mrId[ mrId.length - 1]["user_id"],
                  async: true,
                  headers: {
                    "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
                  },
                  success: function (data){
                    $scope.mrId = mrId[ mrId.length - 1]["user_id"];
                    doctorList();
                    wcpList.push.apply(wcpList, data["data"]);
                    mrId.pop();
                    if (mrId.length) {
                        getWCPList(mrId);
                    }
                  }
            });
        }
        $scope.validate = function() {
            var id, present = 0;
            for( i=0; i<wcpList.length; i++ ) {
                if( $scope.month == wcpList[i]["month"] && $scope.year == wcpList[i]["year"] && $scope.mrId == wcpList[i]["mr_id"]) {
                    present = 1;
                    id = wcpList[i]["wcp_wrap_id"];
                    break;
                }
            }
            if(present) {
                $scope.message = '';
                $('#wcp-data').css('display','block');
                getwcp(id);
            } else {
                $('#wcp-data').css('display','none');
                $scope.message = "WCP not present for "+ $scope.month + " " + $scope.year;
            }
        }
        function getwcp(id) {
            $scope.wrap_id = id;
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
                        temp = wcpData["WCP_list"][i][ 'product_list' ];
                        product = [];
                        for( j=0; j<temp.length; j++) {
                            temp[j]['product_id'] =  $scope.productData[ temp[j]['product_id'] ];
                            product.push( temp[j]['product_id'] );
                            product.push( temp[j]['sample_plan_unit'] );
                            product.push( temp[j]['sale_plan_unit'] );
                        }
                        wcpData["WCP_list"][i][ 'product_list' ] = temp;
                        wcpData["WCP_list"][i][ 'products' ] = product;
                    }
                    if(wcpData["approval_status"] == 0){
                        $('.approve').css('display','');
                        wcpData["approval_status"] = "No";
                    }
                    else {
                        $('.approve').css('display','none');
                        wcpData["approval_status"] = "Yes"; 
                    }
                    $scope.wcpData = wcpData;
                    $scope.wcpList = wcpData['WCP_list'];
                    $scope.$apply();
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
                    var obj = {};
                    for( i=0; i<data["data"].length; i++){
                        obj[ data["data"][i]["doc_id"] ] = {};
                        obj[ data["data"][i]["doc_id"] ]["name"] = data["data"][i]["name"];
                        obj[ data["data"][i]["doc_id"] ]["station_name"] = data["data"][i]["station_name"];
                        obj[ data["data"][i]["doc_id"] ]["qualification"] = data["data"][i]["qualification"];
                    }
                    for( key in obj) {
                        $scope.doctorData[ key ] = obj[key];
                    }
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
                    var obj = {};
                    for( i=0; i<data["data"].length; i++)
                        obj[ data["data"][i]["product_id"] ] = data["data"][i]["product_name"];
                    $scope.productData=obj;
                }
            });
        }

        <?php 
        if ($_SESSION["role"] != "MR") {
            echo '
                $scope.approve = function() {

                    $(".alert-warning").css("display","");
                    $.ajax
                    ({
                        type: "POST",
                        url: "/Pharma/WCP/approve",
                        dataType: "json",
                        data: { "wcp_wrap_id": $scope.wrap_id },
                        async: true,
                        headers: {
                        "Authorization": "Bearer '.$_SESSION["access_token"].'"
                        },
                        success: function (data){
                            if(status) {
                                $(".approve").css("display","none");
                                $scope.wcpData["approval_status"] = "Yes";
                            }
                            $scope.wcpmsg = data["msg"];
                            $scope.$apply();
                        }
                    });
                }
            ';
        }
        ?>
    });
</script>



