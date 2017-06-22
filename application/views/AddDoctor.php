
        <div id="page-wrapper">
        <form method="POST" action="ProcessAddDoctor" enctype="multipart/form-data">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Fill Doctor Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add Doctor
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Doctor Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Doctor Name" required>
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" required>
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Qualifications</label>
                            <input type="text" class="form-control" id="Qualifications" name="Qualifications" placeholder="Enter Qualifications">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Specialization</label>
                            <input type="text" class="form-control" id="Specialization" name="Specialization" placeholder="Enter Specializations">
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Number of Points per day</label>
                            <input type="text" class="form-control" id="points" name="points" placeholder="Enter Number of Patients per day">
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Total Buisness</label>
                            <input type="text" class="form-control" id="buisness" name="buisness" placeholder="Enter Total buisness">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Visit Day</label>
                            <input type="text" class="form-control" id="day" name="day" placeholder="Enter visiting day" required>
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Visit Time</label>
                            <input type="text" class="form-control" id="time" name="time" placeholder="Enter Visit time" required>
                        </div>
                    </div>
                    <div class=" col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                                <label>Class</label><br>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="class" id="class" value="A" checked>A
                                </div>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="class" id="class" value="B">B
                                </div>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="class" id="class" value="C">C
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess" >Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Primary Address</label>
                            <input type="text" class="form-control" id="primary" name="primary" placeholder="Enter address" required>
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Other Address</label>
                            <input type="text" class="form-control" id="other" name="other" placeholder="Enter address">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Office Phone</label>
                            <input type="text" class="form-control" id="office" name="office" placeholder="Enter phone number">
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Assistant Phone</label>
                            <input type="text" class="form-control" id="assistant" name="assistant" placeholder="Enter Phone number">
                        </div>
                    </div>
                    <div class=" col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                                <label>Gender</label><br>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="gender" id="gender" value="M" checked>Male
                                </div>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="gender" id="gender" value="F">Female
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                                <label>MR Core</label><br>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="mr" id="gender" value="1">Yes
                                </div>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="mr" id="gender" value="0" checked>No
                                </div>
                        </div>
                    </div>
                    <div class=" col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                                <label>AM Core</label><br>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="am" id="gender" value="1">Yes
                                </div>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="am" id="gender" value="0" checked>No
                                </div>
                        </div>
                    </div>
                    <div class=" col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                                <label>RM Core</label><br>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="rm" id="gender" value="1">Yes
                                </div>
                                <div class="radio-inline" style="padding-top:10px">
                                    <input type="radio" name="rm" id="gender" value="0" checked>No
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Birthday</label>
                            <input type="text" class="form-control" id="office" name="bday" placeholder="Enter Birthday (DD/MM/YY)">
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Anniversary</label>
                            <input type="text" class="form-control" id="assistant" name="anniversary" placeholder="Enter Anniversary (DD/MM/YY)">
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Station Name</label>
                            
                            <input type="text" class="form-control" id="assistant" name="station" placeholder="Enter Station Name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Set Number</label>
                            <select type="text" class="form-control" name="set_no">
                            <?php
                                $data='{"data":[{"set_no":"1","station_name":"Test"}]}';
                                $data=json_decode($data,true);
                                $i=0;
                                $authorization= "Authorization: Bearer ".$_SESSION['access_token'];
                                $url = "http://localhost/Pharma/index.php/MR/set";

                                //open connection
                                $ch = curl_init();

                                //set the url, number of POST vars, POST data
                                curl_setopt($ch,CURLOPT_URL,$url);
                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                curl_setopt($ch, CURLOPT_VERBOSE, 1);
                                curl_setopt($ch, CURLOPT_HEADER, 1);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));

                                //execute post
                                $result = curl_exec($ch);
                                $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                                $header = substr($result, 0, $header_size);
                                $body = substr($result, $header_size);
                                $data = json_decode($body,true);
                                if($data["status"] != false){
                                    if(!count($data["data"])){

                                        echo '<option value=""> Please Make Sets first</option>';
                                    }
                                    while($i< count($data["data"]))
                                    {
                                        echo '<option  value="'.$data["data"][$i]["set_no"].'">'.$data["data"][$i]["set_no"].' - '.$data["data"][$i]["station_name"].'</option>';
                                        $i++;
                                    }
                                }
                                else{
                                    echo '<p> Please Make Sets first</p>';
                                    echo '<p>'.$data["status"].'</p>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess">Assosciate Chemist</label>
                            <select type="text" multiple class="form-control" name="chemist[]">
                            <?php
                                
                                $data=json_decode($data,true);
                                $i=0;

                                $authorization= "Authorization: Bearer ".$_SESSION['access_token'];
                                $url = "http://localhost/Pharma/index.php/Chemist/info";

                                //open connection
                                $ch = curl_init();

                                //set the url, number of POST vars, POST data
                                curl_setopt($ch,CURLOPT_URL,$url);
                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                curl_setopt($ch, CURLOPT_VERBOSE, 1);
                                curl_setopt($ch, CURLOPT_HEADER, 1);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));

                                //execute post
                                $result = curl_exec($ch);
                                $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                                $header = substr($result, 0, $header_size);
                                $body = substr($result, $header_size);
                                $data = json_decode($body,true);
                                if($data["status"] != false){
                                    // $data='{"data":[{"chem_id":"1","name":"Test"},{"chem_id":"1","name":"Test1"}]}';
                                    // $data = json_decode($data,true);
                                    while($i< count($data["data"]))
                                    {
                                        echo '<option  value="'.$data["data"][$i]["chem_id"].'">'.$data["data"][$i]["name"].'</option>';
                                        $i++;
                                    }
                                }
                                else{
                                    echo '<p> Please Make Sets first</p>';
                                    echo '<p>'.$data["status"].'</p>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Visit Frequency</label>
                            <select type="text" class="form-control" name="visit_freq">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Upload Doctor pic</label><br>
                            <p class=" error" style="visibility:hidden;color:red"> Image size must be less than 1 Mb</p>
                            <input type="file" name="doctor" id="uploadPic" accept=".jpg,.png,.jpeg">
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Upload Clinic pic</label>
                            <p class=" error1" style="visibility:hidden;color:red"> Image size must be less than 1 Mb</p>
                            <input type="file" name="clinic" id="uploadPic1" accept=".jpg,.png,.jpeg">
                        </div>
                    </div>
                    <div class="col-sm-offset-1 col-lg-3">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Upload Pad pic</label>
                            <p class=" error11" style="visibility:hidden;color:red"> Image size must be less than 1 Mb</p>
                            <input type="file" name="pad" id="uploadPic11" accept=".jpg,.png,.jpeg">
                        </div>
                    </div>
                </div>
                <div class="row col-lg-12">
                    <br><br>
                    <button type="submit" class="btn btn-success" id="submit">Submit Button</button>
                    <button type="reset" class="btn btn-danger">Reset Button</button>
                    <br><br><br>
                </div>
                

            </div>
            <!-- /.container-fluid -->
        </form>
        </div>
        <!-- /#page-wrapper -->
        <script type="text/javascript">
            $("#uploadPic").on("change", function (e) {

                var files = e.currentTarget.files; // puts all files into an array
                for(i=0;i< files.length;i++){
                    var filesize = ((files[i].size/1024)/1024).toFixed(4); // MB
                    if(filesize < 1){
                        $("#submit").removeAttr('disabled');
                        $(".error").attr('style','visibility:hidden;color:red');
                    }
                    else{
                        $("#submit").attr('disabled','disabled');
                        $(".error").attr('style','visibility:show;color:red');
                    }
                }

            });
            $("#uploadPic1").on("change", function (e) {

                var files = e.currentTarget.files; // puts all files into an array
                for(i=0;i< files.length;i++){
                    var filesize = ((files[i].size/1024)/1024).toFixed(4); // MB
                    if(filesize < 1){
                        $("#submit").removeAttr('disabled');
                        $(".error1").attr('style','visibility:hidden;color:red');
                    }
                    else{
                        $("#submit").attr('disabled','disabled');
                        $(".error1").attr('style','visibility:show;color:red');
                    }
                }

            });
            $("#uploadPic11").on("change", function (e) {

                var files = e.currentTarget.files; // puts all files into an array
                for(i=0;i< files.length;i++){
                    var filesize = ((files[i].size/1024)/1024).toFixed(4); // MB
                    if(filesize < 1){
                        $("#submit").removeAttr('disabled');
                        $(".error11").attr('style','visibility:hidden;color:red');
                    }
                    else{
                        $("#submit").attr('disabled','disabled');
                        $(".error11").attr('style','visibility:show;color:red');
                    }
                }

            });

        </script>