<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Calendar extends CI_Controller {

	public function view($page = 'Tour Plan')
	{		
			$data['year'] = $this->input->post('year');
			$data['month'] = $this->input->post('month_index');
			$data['selectable'] = $this->input->post('editable');
			$data['button_title'] = $this->input->post('button_title');
			if($data['button_title'] == "Submit Plan"){
				$data['context'] = "submit";
				$data['function'] = 'submit()';
			}elseif($data['button_title'] == "Change Plan"){
				$data['context'] = "change";
				$data['function'] = 'submit()';
			}elseif($data['button_title'] == "Update Status"){
				$data['context'] = "update";
				$data['function'] = 'javascript:;';
			}
			else{
				$data['context'] = "view";
				$data['function'] = 'javascript:;';
			}
			$data['json'] = $this->input->post('json');
			$user_id = $this->input->post("user_id");
			if($user_id != ""){
				$data['user_id'] = $user_id;	
			}else{
			 	$data['user_id'] = $_SESSION['user_id'];
			}
	        $this->load->helper('url');
	        $this->load->view("tp/calendar/fullcalendar",$data);
	}
	public function index(){
		
		$this->view();
	}
}