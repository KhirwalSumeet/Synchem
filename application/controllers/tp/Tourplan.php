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
			
			$data['json'] = $this->get_plan("MSD1",$data['month_index'],$data['year']);

	        $data['title'] = $data['month']."-".$data['year']." | ".ucfirst($page) ; // Capitalize the first letter
	        $this->load->helper('url');
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/navbar');
	        $this->load->view("tp/tourplan", $data);
	        $this->load->view('templates/footer');
	}

	public function get_plan($user_id,$tour_month,$tour_year){
		$url = "http://localhost:5000/test/get_tour";
		$url = $url."?"."user_id=".$user_id."&"."tour_month=".$tour_month."&"."tour_year=".$tour_year;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}

	public function index(){   // default for view
		$this->view("View Tour Plan",false,"Tour Plan");
	}

	public function add(){
		$this->view("Add new Tour plan",true,"Submit Plan");
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

		$ch = curl_init("http://localhost:5000/test/set_tour");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);
		if(1){
	        $this->load->view("tp/success");
		}
	}

}