<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/api/login.php");
class Processlogin extends CI_Controller {

	public function index(){
		$result=login($_POST['username'],$_POST['password']);
		$result=json_decode($result,true);
		echo $result;
		if($result["status"] == false){
			if($result["status_code"] == 401){
				// Logiin credentials invalid	
				echo "Failed";	
			}
			else{
				//Unknown error
				echo $result;
			}
		}
		else{
			//Login success
			echo "<br>";
			echo "Success";
			$_SESSION["name"]=$result["data"]["name"];
			$_SESSION["role"]=$result["data"]["role"];
			$_SESSION['user_id']=$result["data"]["user_id"];
			$_SESSION['email']=$result["data"]["email"];
			$_SESSION['profile_pic']=$result["data"]["profile_pic"];
			$_SESSION['phone']=$result["data"]["phone"];
			$_SESSION['DOB']=$result["data"]["DOB"];
			$_SESSION['sex']=$result["data"]["sex"];
			$_SESSION['employe_id']=$result["data"]["employe_id"];
			$_SESSION['company']=$result["data"]["company"];
			$_SESSION['access_token']=$result["data"]["access_token"];
			$_SESSION['token_type']=$result["data"]["token_type"];
			header("Location: home");
		}
	}
}
