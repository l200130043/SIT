<?php
require_once "lib/nusoap.php";
function getInfo($name){
  //provide information details
	$data['gilang']['nama'] = 'Gilang';
	$data['gilang']['nim'] = 'L200130043';
	if (isset($data[$name])){
		return json_encode($data[$name]);
	}else{
		return "{$name} ";
	}
}

$server = new nusoap_server();
$server->configureWSDL("server","urn:server");
$server->register(
	"getInfo",
	array("name" => "xsd:string"),
	array("return" => "xsd:string"),
	"urn:one",
	"urn:one#getInfo",
	"rpc",
	"encoded",
	"get info ajalah"
	);
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
