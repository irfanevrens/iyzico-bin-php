<?php

/**
 * BIN Checker Sample
 *
 * @author iyzico Entegrasyon
 * 
 */

$api_id = 'IYZI_API_ID';
$secret = 'IYZICO_SECRET';
$bin	= 'BIN_NUMBER_TO_CHECK';
$url	= 'https://api.iyzico.com/bin-check';

$data	= "api_id=".$api_id.
		  "&secret=".$secret.
		  "&bin=".$bin;

$params = array('http' => array(
			'method'  => 'POST',
			'content' => $data
		));

$ctx = stream_context_create($params);
$fp = @fopen($url, 'rb', false, $ctx);
if (!$fp) {
	throw new Exception("Problem with $url, $php_errormsg");
}
$response = @stream_get_contents($fp);
if ($response === false) {
	throw new Exception("problem reading data from $url, $php_errormsg");
}

$resultJson = json_decode($response);

print_r($resultJson);
