<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/api/upload.php");
class ProcessAddDoctor extends CI_Controller {

	public function index(){
		$this->load->library("upload");
		

		$dpic=upload_check($this,"doctor","./uploads/doctor_pic");
		$cpic=upload_check($this,"clinic","./uploads/clinic_pic");
		$ppic=upload_check($this,"pad","./uploads/pad_pic");

		$name= $_POST['name'];
		if($_POST['mobile'])
			$mobile= $_POST['mobile'];
		else
			$mobile= "";
		if($_POST['Qualifications'])
			$qual= $_POST['Qualifications'];
		else
			$qual= "";
		if($_POST['Specialization'])
			$Specialization= $_POST['Specialization'];
		else
			$Specialization= "";
		if($_POST['points'])
			$pointss= $_POST['points'];
		else
			$pointss= "";
		if($_POST['buisness'])
			$total= $_POST['buisness'];
		else
			$total= "";
		if($_POST['other'])
			$otherAdd= $_POST['other'];
		else
			$otherAdd= "";
		if($_POST['office'])
			$officePhone= $_POST['office'];
		else
			$officePhone= "";
		if($_POST['assistant'])
			$assistantPhone= $_POST['assistant'];
		else
			$assistantPhone= "";
		$gender= $_POST["gender"];
		$email= $_POST["email"];
		$day = $_POST["day"];
		$time= $_POST["time"];
		$primary= $_POST["primary"];
		$class= $_POST["class"];
		$mr=$_POST["mr"];
		$am=$_POST["am"];
		$rm=$_POST["rm"];
		$bday=$_POST["bday"];
		$anniversary=$_POST["anniversary"];
		$station= $_POST["station"];
		$set_no=$_POST["set_no"];
		$chemist=$_POST["chemist"];
		$visit_freq=$_POST["visit_freq"];
		if(!count($chemist))
			$chemist= implode(',',$chemist);
		else 
			$chemist="";
        $authorization= "Authorization: Bearer ".$_SESSION['access_token'];
        $url = "http://localhost/Pharma/index.php/Doctor/add";
        $geotag= '[{"loc_1":{"lat":"","lon":"","address":"'.$primary.'"},"loc_2":{"lat":"","lon":"","address":"'.$otherAdd.'"}}]';
        $fields = array(
        	"device" => urlencode("web"),
			"name" => urlencode($name),
			"sex" => urlencode($gender),
			"email" => urlencode($email),
			"phone" => urlencode($mobile),
			"specialization" => urlencode($Specialization),
			"qualification" => urlencode($qual),
			"geotag" => urlencode($geotag),
			"pat_freq" => urlencode($pointss),
			"monthly_business" => urlencode($total),
			"visit_freq" => urlencode($visit_freq),
			"office_phone" => urlencode($officePhone),
			"assistant_phone" => urlencode($assistantPhone),
			"visit_day" => urlencode($day),
			"class" => urlencode($class),
			"station_name" => urlencode($station),
			"meeting_time" => urlencode($time),
			"MR_core" => urlencode($mr),
			"AM_core" => urlencode($am),
			"RM_core" => urlencode($rm),
			"inactive_date" => urlencode($_POST["inactive"]),
			"anniversary" => urlencode($anniversary),
			"profile_pic" => urlencode($dpic),
			"DOB" => urlencode($bday),
			"ass_chem_id" => urlencode($chemist),
			"pad_image" => urlencode($ppic),
			"clinic_image" => urlencode($cpic),
			"set_no" => urlencode("11")
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
		curl_setopt($ch,CURLOPT_POST, true);
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