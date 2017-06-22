<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."helpers/converter/upload.php");
require_once(APPPATH."helpers/api/bulkuploadproduct.php");
class ProcessBulkUpload extends CI_Controller {

	public function index(){
		$this->load->library("upload");
		$upload=upload_check($this,"product","./uploads/product");
		$this->load->library("PHPExcel");
		$upload=explode("/uploads/product",$upload);
		try {
					$objPHPExcel = PHPExcel_IOFactory::load('./uploads/product'.$upload[1]);

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
			if($import['A'] || $import['B'] || $import['F']){
			$x[$i][0]=$import['A'];
			$x[$i][1]=$import['B'];
			$x[$i][2]=$import['C'];
			$x[$i][3]=$import['D'];
			$x[$i][4]=$import['E'];
			$x[$i][5]=$import['F'];
			$x[$i++][6]=$import['G'];
			}
		}
		$labels=$x[0];
		// We have a 2D array
		$datavalidated= [];
		$datafailed=[];
		for($j=1;$j<$i;$j++){
			$state=validate($labels,$x[$j]);
			if(!$state){
				array_push($datafailed,$x[$j]);
			}
			else{
				array_push($datavalidated,$x[$j]);
			}
		}

		for($j=0;$j<sizeof($datavalidated);$j++){
			$result=add($labels,$datavalidated[$j]);
        	$result=json_decode($result,true);
		}
		$dif=sizeof($x)-sizeof($datavalidated);
		if($dif>1){
			$dif--;
			$error=$dif." entries cannot be made due to missing data ";
			header("Location: BulkUpload?uploaded=1&&message=".$result["data"]."&&error=".$error);
		}else
			header("Location: BulkUpload?uploaded=1&&message=".$result["data"]);
		

		// Delete file after use
		unlink('./uploads/product'.$upload[1]);
	}
}
