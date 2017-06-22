<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/converter/upload.php");
class ProcessBulkUpload extends CI_Controller {

	public function index(){
		$this->load->library("upload");
		$upload=upload_check($this,"gifts","./uploads/gifts");
		$this->load->library("PHPExcel");
		$upload=explode("/uploads/gifts",$upload);
		try {
					$objPHPExcel = PHPExcel_IOFactory::load('./uploads/gifts'.$upload[1]);

		    }
		catch(Exception $e)
		    {
				$this->resp->success = FALSE;
				$this->resp->msg = 'Error Uploading file';
				echo json_encode($this->resp);
				exit;
		    }
		 
		$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		$i = 0;
		foreach($allDataInSheet as $import)
		{
			if($import['A'] || $import['B'] || $import['D']){
			$x[$i][0]=$import['A'];
			$x[$i][1]=$import['B'];
			$x[$i][2]=$import['C'];
			$x[$i++][3]=$import['D'];
			}
		}
		// We have a 2D array
		echo $x[2][2];

		// Delete file after use
		unlink('./uploads/gifts'.$upload[1]);
	}
}
