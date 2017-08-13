<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Update extends CI_Controller {

	public function view($page = 'Update status of tour plan')
	{
			if($_SESSION['role'] == 'MR'){  //only MR is able to add new Tour plan
				$data['error_msg'] = "MRs cannot update status of the tour plans";
				$this->load->view('tp/error',$data);
				return;
			}
	        $data['title'] = ucfirst($page); // Capitalize the first letter
	        $this->load->helper('url');
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/navbar');
	        $this->load->view("tp/update");
	        $this->load->view('templates/footer');
	}
	public function index(){
		$this->view();
	}
}