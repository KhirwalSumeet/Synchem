<script src="<?php echo base_url(); ?>resources/js/angular.min.js"></script>
<script type="text/javascript">
    var app = angular.module("doctor", []);
</script>
<div id="page-wrapper" ng-app="doctor">
    <div ng-controller="viewdoctor">
        <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Doctor List
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> View Doctors
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">  
                <button class="btn btn-primary" ng-click="generate()"> Export</button><br><br>
                    
                <table class="table table-hover ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Phone</th>
                            <th>Station name</th>
                            <th>Qualifications</th>
                            <th>Specialization</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="x in data">
                            <th scope="row">{{x.name}}</th>
                            <td>{{x.sex}}</td>
                            <td>{{x.phone}}</td>
                            <td>{{x.station_name}}</td>
                            <td>{{x.qualification}}</td>
                            <td>{{x.specialization}}</td>
                            <td>{{x.}}</td>
                            <td>{{x.}}</td>
                            <td>{{x.}}</td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
            
    </div>

</div>
        <!-- /#page-wrapper -->
<script type="text/javascript">
app.controller("viewdoctor", function($scope) {
    $.ajax
    ({
          type: "GET",
          url: "<?php echo base_url(); ?>t/Pharma/index.php/Doctor/info/",
          dataType: 'json',
          async: false,
          headers: {
            "Authorization": "Bearer <?php echo $_SESSION['access_token']; ?>"
          },
          success: function (data){
            $scope.data= data["data"];
            console.log(data); 
          }
    });
    
    $scope.export =function (JSONData, ReportTitle, ShowLabel) {
        //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
        var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
        
        var CSV = '';    
        //Set Report title in first row or line
        
        CSV += ReportTitle + '\r\n\n';

        //This condition will generate the Label/Header
        if (ShowLabel) {
            var row = "";
            
            //This loop will extract the label from 1st index of on array
            for (var index in arrData[0]) {
                
                //Now convert each value to string and comma-seprated
                row += index + ',';
            }

            row = row.slice(0, -1);
            
            //append Label row with line break
            CSV += row + '\r\n';
        }
        
        //1st loop is to extract each row
        for (var i = 0; i < arrData.length; i++) {
            var row = "";
            
            //2nd loop will extract each column and convert it in string comma-seprated
            for (var index in arrData[i]) {
                row += '"' + arrData[i][index] + '",';
            }

            row.slice(0, row.length - 1);
            
            //add a line break after each row
            CSV += row + '\r\n';
        }

        if (CSV == '') {        
            alert("Invalid data");
            return;
        }   
        
        //Generate a file name
        var fileName = "MyReport_";
        //this will remove the blank-spaces from the title and replace it with an underscore
        fileName += ReportTitle.replace(/ /g,"_");   
        
        //Initialize file format you want csv or xls
        var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
        
        // Now the little tricky part.
        // you can use either>> window.open(uri);
        // but this will not work in some browsers
        // or you will not get the correct file extension    
        
        //this trick will generate a temp <a /> tag
        var link = document.createElement("a");    
        link.href = uri;
        
        //set the visibility hidden so it will not effect on your web-layout
        link.style = "visibility:hidden";
        link.download = fileName + ".csv";
        
        //this part will append the anchor tag and remove it after automatic click
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    };
    $scope.generate=function (){
        $scope.export($scope.data,"DoctorReport",true);
    };
});
</script>

