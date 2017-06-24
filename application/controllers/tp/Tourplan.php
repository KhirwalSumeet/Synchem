<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Tourplan extends CI_Controller {

	public function view($page = 'Tour plan')
	{
			$month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

			$data['month'] = $this->input->post('month');
			$data['year'] = $this->input->post('year');
			$data['month_index'] = array_search($data['month'],$month);

			if(!in_array($data['month'], $month,TRUE) || !($data['year']>2000 && $data['year']<3000)){
				show_404();
			}
	      	
	        $data['title'] = $data['month']."-".$data['year']." | ".ucfirst($page) ; // Capitalize the first letter
	        $this->load->helper('url');
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/navbar');
	        $this->load->view("tp/tourplan", $data);
	        $this->load->view('templates/footer');
	}

	public function index(){
		$this->view();
	}

}