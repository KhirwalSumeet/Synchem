<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/api/setCheck.php");
class ViewChemist extends CI_Controller {

	public function view($page = 'View Chemist')
	{
	        
			$setcheck= setCheck();
	        $data['title'] = ucfirst($page); // Capitalize the first letter
	        $this->load->helper('url');
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/navbar');
	        $this->load->view("ViewChemist");
	        $this->load->view('templates/footer');
	}
	public function index(){
		$this->view();
	}
}

