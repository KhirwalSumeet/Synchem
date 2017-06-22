<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function view()
	{
	        $this->load->helper('url');
	        $this->load->view('login');
	}
	public function index(){
		$this->view();
	}
}
