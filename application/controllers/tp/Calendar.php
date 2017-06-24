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
			$data['editable'] = 'false';
			$data['selectable'] = 'false';
			$data['button_title'] = 'Tour plan';
	        $this->load->helper('url');
	        $this->load->view("tp/calendar/fullcalendar",$data);
	}
	public function index(){
		$month = $this->input->get('month');
		$year = $this->input->get('year');
		$this->view($month,$year);
	}
}