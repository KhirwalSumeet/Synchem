<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/api/postrequest.php");
class Person extends CI_Controller {

	public function index(){
		$url="http://localhost/Pharma/Person/add/";
        $fields = array(
        	"device" => urlencode("web"),
			"name" => urlencode($_POST["name"]),
			"email" => urlencode($_POST["email"]),
			"password" => urlencode($_POST["password"]),
			"DOB" => urlencode($_POST["dob"]),
			"sex" => urlencode($_POST["gender"]),
			"phone" => urlencode($_POST["mobile"])
		);
        $result=postrequest($url,$fields);
        $result=json_decode($result,true);
        console.log($result);
        if($result["status"] == false){
			if($result["status_code"] == 401){
				// Logiin credentials invalid	
				header("Location: ../Person?added=1&&message=".$result["data"]);	
			}
			else{
				//Unknown error
				header("Location: ../Person?added=1&&message=".$result["data"]);
			}
		}
		else{
			//Login success
			header("Location: ../Person?added=1&&message=".$result["data"]);
		}
	}
}
