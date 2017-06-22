<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/api/add.php");
class Add extends CI_Controller {

	public function index(){
		if($_POST["head"] == "NULL")
			$_POST["head"] = NULL;
        $fields = array(
        	"device" => urlencode("web"),
			"user_id" => urlencode($_POST["user"]),
			"person_id" => urlencode($_POST["person"]),
			"HQ" => urlencode($_POST["hq"]),
			"head_id" => urlencode($_POST["head"])
		);
        $result=postrequest("AM",$fields);
        $result=json_decode($result,true);
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
