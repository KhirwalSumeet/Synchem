<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Add extends CI_Controller {

	public function view($page = 'Add new Tour plan')
	{		
			if($_SESSION['role'] != 'MR'){  //only MR is able to add new Tour plan
				$data['error_msg'] = "Only the MR is able to create Tour plan";
				$this->load->view('tp/error',$data);
				return;
			}
	        $data['title'] = ucfirst($page); // Capitalize the first letter
	        $this->load->helper('url');
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/navbar');
	        $this->load->view("tp/add");
	        $this->load->view('templates/footer');
	}
	public function index(){
		$this->view();
	}
}