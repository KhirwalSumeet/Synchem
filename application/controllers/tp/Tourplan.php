<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Tourplan extends CI_Controller {

	public function view($page_header,$edit,$button_title)
	{
			$page = 'Tour plan';
			$month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

			$data['month'] = $this->input->post('month');
			$data['year'] = $this->input->post('year');
			$data['month_index'] = array_search($data['month'],$month);
			$data['page_header'] = $page_header;
			$data['editable'] = $edit == true ? "true" : "false";
			$data['button_title'] = $button_title;
			if(!in_array($data['month'], $month,TRUE) || !($data['year']>2000 && $data['year']<3000)){
				show_404();
			}
			if($_SESSION['role'] == 'MR'){
				$data['json'] = $this->get_plan($_SESSION['user_id'],$data['month_index'],$data['year']);	
			}else{
				$data['json'] = $this->get_plan($this->input->post('user_id'),$data['month_index'],$data['year']);
			}
			if($_SESSION['role'] != 'MR'){
				$data['user_id'] = $this->input->post('user_id');	
			}else{
				$data['user_id'] = "" ;
			}
			if($_SESSION['role'] == 'MR'){
				$data['sets'] = $this->get_sets();
			}else{
				$data['sets'] ='';
			}
			
	        $data['title'] = $data['month']."-".$data['year']." | ".ucfirst($page) ; // Capitalize the first letter
	        $this->load->helper('url');
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/navbar');
	        $this->load->view("tp/tourplan", $data);
	        $this->load->view('templates/footer');
	}

	public function get_plan($user_id,$tour_month,$tour_year){
		$url = "http://localhost:5000/tourplanner/get_tour_details";
		$url = $url."?"."user_id=".$user_id."&"."tour_month=".$tour_month."&"."tour_year=".$tour_year;
		$authorization = "Bearer ".$_SESSION['access_token'];
		$person_id = $_SESSION['user_id'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: ".$authorization, 'person_id: '.$_SESSION['person_id']));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);
		if(isset(json_decode($response)->data[0])){
			return json_encode(json_decode($response)->data[0]->tour_plan);	
		}
		else{
			return "";
		}
		
	}

	public function index(){   // default for view
		$this->view("View Tour Plan",false,"Tour Plan");
	}

	public function add(){
		$this->view("Add new Tour plan",true,"Submit Plan");
	}

	public function change(){
		$this->view("Change existing Tour plan",true,"Change Plan");
	}

	public function update(){
		$this->view("Update status of Tour plan",false,"Update Status");
	}

	public function change_plan(){
		$user_id = $this->input->post("user_id");
		$tour_month = $this->input->post("tour_month");
		$tour_year = $this->input->post("tour_year");
		$tour_plan = $this->input->post("tour_plan");

		$post = [
			'user_id' => $user_id,
			'tour_month' => $tour_month,
			'tour_plan' => $tour_plan,
			'tour_year' => $tour_year,
		];

		$ch = curl_init("http://localhost:5000/tourplanner/change_tour_plan");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		$authorization = "Bearer ".$_SESSION['access_token'];
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: ".$authorization, 'person_id: '.$_SESSION['person_id']));
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);
		if(json_decode($response)->status_code != 401){
			$data['msg'] = "Tour plan succesfully changed";
	        $this->load->view("tp/success",$data);
		}
		else{
			$data['error_msg'] = "Error occured";
	        $this->load->view("tp/error",$data);	
		}
	}

	public function update_status(){
		$user_id = $this->input->post("user_id_update");
		$tour_month = $this->input->post("tour_month");
		$tour_year = $this->input->post("tour_year");
		$status = $this->input->post("status");

		$post = [
			'user_id' => $user_id,
			'tour_month' => $tour_month,
			'status' => $status,
			'tour_year' => $tour_year,
		];

		$ch = curl_init("http://localhost:5000/tourplanner/update_status");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		$authorization = "Bearer ".$_SESSION['access_token'];
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: ".$authorization, 'person_id: '.$_SESSION['person_id']));
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);
		if(json_decode($response)->status_code != 401){
			$data['msg'] = "Tour plan status succesfully added";
	        $this->load->view("tp/success",$data);
		}
		else{
			$data['error_msg'] = "Error occured";
	        $this->load->view("tp/error",$data);	
		}
	}

	public function add_plan(){
		$user_id = $this->input->post("user_id");
		$tour_month = $this->input->post("tour_month");
		$tour_year = $this->input->post("tour_year");
		$tour_plan = $this->input->post("tour_plan");
		$status = $this->input->post("status");

		$post = [
			'user_id' => $user_id,
			'tour_month' => $tour_month,
			'tour_plan' => $tour_plan,
			'tour_year' => $tour_year,
			'status' => $status,
		];

		$ch = curl_init("http://localhost:5000/tourplanner/set_tour_details");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		$authorization = "Bearer ".$_SESSION['access_token'];
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: ".$authorization, 'person_id: '.$_SESSION['person_id']));
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);
		if(json_decode($response)->status_code != 401){
			$data['msg'] = "Tour plan succesfully added";
	        $this->load->view("tp/success",$data);
		}
		else{
			$data['error_msg'] = "Error occured";
	        $this->load->view("tp/error",$data);	
		}
	}

	public function get_sets(){
		$user_id = $_SESSION['user_id'];
		$ch = curl_init("http://localhost:5000/sets/list?user_id=".$user_id);
		$authorization = "Bearer ".$_SESSION['access_token'];
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('person_id : '.$_SESSION['person_id'] , "Authorization : ".$authorization ));
		$response = curl_exec($ch);
		curl_close($ch);
		return json_encode((json_decode($response,TRUE)['data']));
	}

}