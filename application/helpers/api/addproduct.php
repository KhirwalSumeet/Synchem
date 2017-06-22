<?php
	function add(){

		$authorization= "Authorization: Bearer ".$_SESSION['access_token'];
        $url = "http://localhost/Pharma/Products/add/";


        $fields = array(
        	"device" => urlencode("web"),
			"product_name" => urlencode($_POST["name"]),
			"product_group" => urlencode($_POST["group"]),
			"price" => urlencode($_POST["price"]),
			"remarks" => urlencode($_POST["remarks"]),
			"pack" => urlencode($_POST["pack"]),
			"scheme" => urlencode($_POST["scheme"]),
			"PTS" => urlencode($_POST["pts"])
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
