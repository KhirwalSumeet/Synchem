<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/api/postrequest.php");
class MR extends CI_Controller {

	public function index(){
		
		$url="http://localhost/Pharma/MR/add/";
        $fields = array(
        	"device" => urlencode("web"),
			"user_id" => urlencode($_POST["user"]),
			"person_id" => urlencode($_POST["person"]),
			"HQ" => urlencode($_POST["hq"])
		);
        $result=postrequest($url,$fields);
        $result=json_decode($result,true);
        console.log($result);
        if($result["status"] == false){
			if($result["status_code"] == 401){
				// Logiin credentials invalid	
				header("Location: ../MR?added=1&&message=".$result["data"]);	
			}
			else{
				//Unknown error
				header("Location: ../MR?added=1&&message=".$result["data"]);
			}
		}
		else{
			//Login success
			header("Location: ../MR?added=1&&message=".$result["data"]);
		}
	}
}
