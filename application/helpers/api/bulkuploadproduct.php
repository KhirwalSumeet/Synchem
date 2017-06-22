<?php
	function add($label,$data){

		$authorization= "Authorization: Bearer ".$_SESSION['access_token'];
        $url = "http://localhost/Pharma/Products/add/";


        $fields = array(
        	"device" => urlencode("web"),
			$label[0] => urlencode($data[0]),
			$label[1] => urlencode($data[1]),
			$label[2] => urlencode($data[2]),
			$label[3] => urlencode($data[3]),
			$label[4] => urlencode($data[4]),
			$label[5] => urlencode($data[5]),
			$label[6] => urlencode($data[6]),
			$label[7] => urlencode($data[7])
		);

		//url-ify the data for the POST
		$fields_string="";
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded' , $authorization ));
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        // execute post
  		$result = curl_exec($ch);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($result, 0, $header_size);
		$body = substr($result, $header_size);
		return $body;
        //close connection
		curl_close($ch);
	}
	function validate($labels,$data){

		for($i=0;$i<sizeof($labels);$i++){
			if($labels[$i] == "product_name" || $labels[$i] == "product_group" || $labels[$i] == "price")
			{

				if(empty($data[$i])){
					return false;
				}
			}
		}
		return true;
	}
