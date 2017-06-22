<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/api/login.php");
class ProcessAddChemist extends CI_Controller {

	public function index(){
        $authorization= "Authorization: Bearer ".$_SESSION['access_token'];
        $url = "http://localhost/Pharma/index.php/Chemist/add";

        $fields = array(
        	"device" => urlencode("web"),
			"name" => urlencode($_POST["name"]),
			"contact_person" => urlencode($_POST["cname"]),
			"email" => urlencode($_POST["email"]),
			"phone" => urlencode($_POST["office"]),
			"DOB" => urlencode($_POST["bday"]),
			"anniversary" => urlencode($_POST["anniversary"]),
			"MR_core" => urlencode($_POST["mr"]),
			"geotag" => urlencode(""),
			"station_name" => urlencode($_POST["station"]),
			"doctor_relation" => urlencode($_POST["relation"]),
			"probable_stocklist" => urlencode($_POST["Stockist"]),
			"shipping_address" => urlencode($_POST["address"])
		);

		//url-ify the data for the POST
		$fields_string="";
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');


        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded' , $authorization ));
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //execute post
        $result = curl_exec($ch);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($result, 0, $header_size);
		$body = substr($result, $header_size);
		echo $body;
	

        //close connection
		curl_close($ch);
	}
}
