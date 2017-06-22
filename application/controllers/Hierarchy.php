<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Hierarchy extends CI_Controller {

	public function view($page = "Hierarchy")
	{
		$data['title'] = ucfirst($page);
	        $this->load->helper('url');
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/navbar');
	        $this->load->view('hierarchy');
	        $this->load->view('templates/footer');
	}
	public function index(){
		$this->view();
	}
}
