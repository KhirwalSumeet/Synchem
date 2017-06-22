<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Addwcp extends CI_Controller {

	public function view($page = 'WCP')
	{
	        $data['title'] = ucfirst($page); // Capitalize the first letter
	        $month=$_SESSION["wcp_month"];
	        $year=$_SESSION["wcp_year"];
	        $fields = array(
				"month" => urlencode($month),
				"year" => urlencode($year),
				"WCPList" => urlencode($WCPList)
			);
			echo $_POST['data'];
	}
	public function index(){
		$this->view();
	}
}