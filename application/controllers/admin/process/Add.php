<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/api/add.php");
class Add extends CI_Controller {

	public function index(){
        $fields = array(
        	"device" => urlencode("web"),
			"user_id" => urlencode($_POST["user"]),
			"person_id" => urlencode($_POST["person"]),
			"head_id" => urlencode("DUMMY"),
			"HQ" => urlencode($_POST["hq"])
		);
        $result=postrequest("Admin",$fields);
        $result=json_decode($result,true);
        echo $result;
        exit();
        if($result["status"] == false){
			if($result["status_code"] == 401){
				// Logiin credentials invalid	
				header("Location: ../add?added=1&&message=".$result["data"]);	
			}
			else{
				//Unknown error
				header("Location: ../add?added=1&&message=".$result["error"]);
			}
		}
		else{
			//Login success
			header("Location: ../add?added=1&&message=".$result["data"]);
		}
	}
}
