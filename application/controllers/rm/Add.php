<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Add extends CI_Controller {

	public function view($page = 'Add RM')
	{

			$_SESSION['profile']="'RM'";
			$_SESSION['head_profile']="'ZM'";
	        $data['title'] = ucfirst($page); // Capitalize the first letter
	        $this->load->helper('url');
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/navbar');
	        $this->load->view("add");
	        $this->load->view('templates/footer');
	}
	public function index(){
		$this->view();
	}
}

