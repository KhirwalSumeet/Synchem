<?php
function upload_check($context,$userfile,$uploadpath){
	if(isset($_FILES[$userfile])){
		if(file_exists($_FILES[$userfile]['tmp_name']) && is_uploaded_file($_FILES[$userfile]['tmp_name'])) {
				try{
					$clinic_image = upload_pic($context,$userfile,$uploadpath);
					$clinic_uploaded = true;
					return $clinic_image;
					}
				catch(Exception $e){
					return "";
			}
		}
	}
}
function upload_pic($context,$userfile,$uploadpath){
	$config['upload_path'] = $uploadpath;	 
	$config['allowed_types'] = 'jpg|png|jpeg|bmp|webp';
	$config['max_size'] = 10240;
	$config['min_height'] = 10;
	$config['min_width'] = 10;
	$config['file_ext_tolower'] = TRUE;
	$context->upload->initialize($config);
	if ( ! $context->upload->do_upload($userfile)){
		$error_msg = $context->upload->error_msg[0];
		Throw new Exception($error_msg);
		}
	else{
		  $data = $context->upload->data();
		  return $data['full_path'];
		}
	}

?>
