<?php
function setCheck(){
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
                if(count($data["data"])){

                    $doctorcheck="AddDoctor";
                }
                else
                	$doctorcheck="AddSet";
                
            }
            else{
                $doctorcheck="AddSet";
            }  
            return $doctorcheck;   
}