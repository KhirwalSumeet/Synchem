<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/api/setCheck.php");
class AddDoctor extends CI_Controller {

	public function view($page = 'Add Doctor')
	{
	        // if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
	        // {
	        //         // Whoops, we don't have a page for that!
	        //         show_404();
	        // }
			$setcheck= setCheck();
	        $data['title'] = ucfirst($page); // Capitalize the first letter
	        $this->load->helper('url');
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/navbar');
	        if($setcheck== "AddDoctor")
	        	$this->load->view("AddDoctor");
	        else
	        	header("Location: AddSet");
	        $this->load->view('templates/footer');
	}
	public function index(){
		$this->view();
	}
}

