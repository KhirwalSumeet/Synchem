<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Calendar extends CI_Controller {

	public function view($month,$year,$page = 'Tour Plan')
	{
	     	 // Capitalize the first letter
			$data['dabu'] = "Dabu";
			$data['year'] = $year;
			$data['month'] = $month;
			$data['editable'] = $this->input->post('editable');
			$data['selectable'] = $data['editable'];
			$data['button_title'] = $this->input->post('button_title');
			$data['function'] = 'submit()';
			$data['json'] = $this->input->post('json');
	        $this->load->helper('url');
	        $this->load->view("tp/calendar/fullcalendar",$data);
	}
	public function index(){
		$month = $this->input->post('month_index');
		$year = $this->input->post('year');
		$this->view($month,$year);
	}
}