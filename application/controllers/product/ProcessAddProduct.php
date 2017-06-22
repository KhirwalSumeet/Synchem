<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/api/addproduct.php");
class ProcessAddProduct extends CI_Controller {

	public function index(){
        $result=add();
        $result=json_decode($result,true);
        if($result["status"] == false){
			if($result["status_code"] == 401){
				// Logiin credentials invalid	
				header("Location: add?added=1&&message=".$result["data"]);	
			}
			else{
				//Unknown error
				header("Location: add?added=1&&message=".$result["data"]);
			}
		}
		else{
			//Login success
			header("Location: add?added=1&&message=".$result["data"]);
		}
	}
}
