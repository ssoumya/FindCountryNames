<?php

// process client request (via URL)
header("Content-Type:application/json");
include("country.php");
if(!empty($_GET['name']))
{
	//gets the variable name in url
	$name=$_GET['name'];
	
	$country_name=get_country($name);
	
	if(empty($country_name))
		get_country_name(200,"$name not found",NULL);
	else
		get_country_name(200,"$name found",$country_name);
}
else
{
	get_country_name(400,"Invalid Request",NULL);
}

// function returns the search result in json format
// $status :http status
// $status_message :http status_message
// $data : country name
function get_country_name($status, $status_message, $data)
   {
		//sends raw http data to client
		header("HTTP/1.1 $status $status_message");
		$response['status']=$status;
		$response['status_message']=$status_message;
		$response['data']=$data;
		
		$json_response=json_encode($response);
		echo $json_response;
	}
	
?>