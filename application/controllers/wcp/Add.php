<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Add extends CI_Controller {

	public function view($page = 'WCP')
	{
	        $data['title'] = ucfirst($page); // Capitalize the first letter
	        $this->load->helper('url');
	        $_SESSION["wcp_month"]=$_GET["month"];
	        $_SESSION["wcp_year"]=$_GET["year"];
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/navbar');
	        $this->load->view("wcp/add");
	        $this->load->view('templates/footer');
	}
	public function index(){
		$this->view();
	}
}